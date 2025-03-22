<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Produk;
use App\Models\Merchandise;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function submit(Request $request)
    {
        // Validate the form data
        $validated = $request->validate([
            'id_transaksi' => 'required',
            'nomor_telepon' => 'nullable|numeric',
            'nama_pelanggan' => 'nullable|string',
            'aktivasi_tanggal' => 'nullable|date',
            'tanggal_transaksi' => 'nullable|date',
            'produk' => 'required|exists:produks,id',
            'merchandise' => 'required|exists:merchandises,id',
            'nama_sales' => 'required|string',
            'nomor_injeksi' => 'required|string|max:12'
        ]);

        $selectedProdukId = $request->input('produk');
        $selectedMerchandiseId = $request->input('merchandise');

        // Get complete data from database
        $selectedProduk = Produk::findOrFail($selectedProdukId);
        $selectedMerchandise = Merchandise::findOrFail($selectedMerchandiseId);

        // Store form data in session
        $request->session()->put('form_data', [
            'id_transaksi' => $request->id_transaksi,
            'nomor_telepon' => $request->nomor_telepon,
            'nama_pelanggan' => $request->nama_pelanggan,
            'aktivasi_tanggal' => $request->aktivasi_tanggal,
            'tanggal_transaksi' => $request->tanggal_transaksi,
            'icon' => public_path('admin_asset/img/photos/icon_telkomsel.png'),
            'logo' => public_path('admin_asset/img/photos/logo_telkomsel.png'),
            'produk_nama' => $selectedProduk->produk_nama,
            'produk_harga' => $selectedProduk->produk_harga,
            'produk_harga_akhir' => $selectedProduk->produk_harga_akhir,
            'merch_nama' => $selectedMerchandise->merch_nama,
            'metode_pembayaran' => $request->metode_pembayaran,
            'nama_sales' => $request->nama_sales,
            'nomor_injeksi' => $request->nomor_injeksi
        ]);

        try {
            if ($selectedProduk->produk_stok <= 0) {
                throw new \Exception('Stok produk habis');
            }
            if ($selectedMerchandise->merch_stok <= 0) {
                throw new \Exception('Stok merchandise habis');
            }
            \DB::beginTransaction();
            $selectedProduk->decrement('produk_stok', 1);
            $selectedProduk->increment('produk_terjual', 1);
            $selectedMerchandise->decrement('merch_stok', 1);
            $selectedMerchandise->increment('merch_terambil', 1);
            $history = json_decode($selectedProduk->produk_terjual_history ?? '[]', true);
            $history[] = [
                'tanggal' => Carbon::parse($request->tanggal_transaksi)->toDateTimeString(),
                'jumlah' => 1,
                'produk_nama' => $selectedProduk->produk_nama
            ];
            $selectedProduk->update([
                'produk_terjual_history' => json_encode($history)
            ]);
            $selectedProduk->refresh();
            $merchHistory = json_decode($selectedMerchandise->merch_terambil_history ?? '[]', true);
            $merchHistory[] = [
                'tanggal' => Carbon::parse($request->tanggal_transaksi)->toDateTimeString(),
                'jumlah' => 1,
                'merch_nama' => $selectedMerchandise->merch_nama
            ];
            $selectedMerchandise->update([
                'merch_terambil_history' => json_encode($merchHistory)
            ]);

            Transaksi::create([
                'id_transaksi' => $request->id_transaksi,
                'nomor_telepon' => $request->nomor_telepon,
                'nama_pelanggan' => $request->nama_pelanggan,
                'nama_sales' => $request->nama_sales,
                'aktivasi_tanggal' => $request->aktivasi_tanggal,
                'tanggal_transaksi' => $request->tanggal_transaksi,
                'jenis_paket' => $selectedProduk->id,
                'merchandise' => $selectedMerchandise->merch_nama,
                'metode_pembayaran' => $request->metode_pembayaran,
                'nomor_injeksi' => $request->nomor_injeksi,
            ]);
            \DB::commit();
            return redirect()->route('sales.transaksi.kwitansi')->with('success', 'Transaksi berhasil disimpan!');
        } catch (\Exception $e) {
            \DB::rollBack();
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }
    public function index()
    {
        $transaksi = Transaksi::withTrashed()
            ->with([
                'produk' => function ($query) {
                    $query->withTrashed(); // Add this to include trashed products
                }
            ])
            ->get();

        $totalPenjualan = 0;

        foreach ($transaksi as $item) {
            if ($item->produk) {
                $totalPenjualan += $item->produk->produk_harga_akhir;
            }
        }

        $totalInsentif = 0;

        foreach ($transaksi as $item) {
            if ($item->produk) {
                $totalInsentif += $item->produk->produk_insentif;
            }
        }

        return view('supvis.RiwayatTransaksi', compact('transaksi', 'totalPenjualan', 'totalInsentif'));
    }
    public function create()
    {
        $produks = Produk::with('merchandises')->get();
        return view('sales.transaksi', compact('produks'));
    }
    public function kwitansi(Request $request, $action = 'stream')
    {
        $formData = $request->session()->get('form_data', []);
        $pdf = Pdf::loadView('sales.kwitansi', ['formData' => $formData]);

        // Clear session, supaya ga kecolong
        $request->session()->forget('form_data');

        // Return based on action, sekarang blm ada action nya
        return $action === 'download'
            ? $pdf->download("{$formData['id_transaksi']}.pdf")
            : $pdf->stream("{$formData['id_transaksi']}.pdf");
    }
    public function dashboard(Request $request)
    {
        if ($request->user() && $request->user()->role == 'sales') {
            $nama_sales = $request->user()->name;

            // Ambil transaksi yang BELUM disetor sesuai nama sales yang login
            $transaksi = Transaksi::withTrashed()
                ->with([
                    'produk' => function ($query) {
                        $query->withTrashed(); // Memastikan produk yang terhapus tetap dimuat
                    }
                ])
                ->where('is_setor', false)
                ->where('nama_sales', $nama_sales) // Filter langsung dari query
                ->orderBy('tanggal_transaksi', 'desc')
                ->get();

            // Kelompokkan transaksi berdasarkan tanggal transaksi
            $groupedTransaksi = $transaksi->groupBy(function ($item) {
                return Carbon::parse($item->tanggal_transaksi)->format('Y-m-d');
            });

            // Hitung total penjualan dan insentif per tanggal
            $totalsPerDate = $groupedTransaksi->map(function ($items) {
                return [
                    'totalPenjualan' => $items->sum(fn($item) => $item->produk ? $item->produk->produk_harga_akhir : 0),
                    'totalInsentif' => $items->sum(fn($item) => $item->produk ? $item->produk->produk_insentif : 0),
                ];
            });

            // Total keseluruhan
            $totalPenjualan = $totalsPerDate->sum('totalPenjualan');
            $totalInsentif = $totalsPerDate->sum('totalInsentif');

            // Cek apakah semua transaksi dalam satu tanggal adalah voided (terhapus)
            $allVoided = $groupedTransaksi->map(fn($items) => $items->every->trashed());

            // Ambil transaksi yang sudah disetor untuk nama sales ini
            $setoranTransaksi = Transaksi::where('is_setor', true)
                ->where('nama_sales', $nama_sales)
                ->with('produk')
                ->orderBy('tanggal_transaksi', 'desc')
                ->get();

            return view('sales/rekap', compact('groupedTransaksi', 'totalsPerDate', 'totalPenjualan', 'totalInsentif', 'allVoided', 'setoranTransaksi'));
        }

        return redirect()->route('login')->withErrors(['role' => 'Anda harus login sebagai sales untuk mengakses halaman ini.']);
    }


    public function toggleVoid(Request $request, $id)
    {
        $transaksi = Transaksi::withTrashed()->findOrFail($id);

        if ($request->is_void) {
            $transaksi->delete(); // Soft delete
        } else {
            $transaksi->restore(); // Restore from soft delete
        }

        return response()->json(['message' => 'Transaction status updated successfully']);
    }

    public function supvisvoid(Request $request)
    {
        $transaksi = Transaksi::onlyTrashed()
            ->with('produk')
            ->orderBy('tanggal_transaksi', 'desc')
            ->get();
        $totalPenjualan = $transaksi->sum(function ($item) {
            return $item->produk ? $item->produk->produk_harga_akhir : 0;
        });
        $totalInsentif = $transaksi->sum(function ($item) {
            return $item->produk ? $item->produk->produk_insentif : 0;
        });
        $groupedTransaksi = $transaksi->groupBy(function ($item) {
            return Carbon::parse($item->tanggal_transaksi)->format('Y-m-d');
        });
        $totalsPerDate = $groupedTransaksi->map(function ($items) {
            $totalPenjualan = $items->sum(function ($item) {
                return $item->produk ? $item->produk->produk_harga_akhir : 0;
            });
            $totalInsentif = $items->sum(function ($item) {
                return $item->produk ? $item->produk->produk_insentif : 0;
            });

            return [
                'totalPenjualan' => $totalPenjualan,
                'totalInsentif' => $totalInsentif,
            ];
        });

        $totalPenjualan = $totalsPerDate->sum('totalPenjualan');
        $totalInsentif = $totalsPerDate->sum('totalInsentif');

        return view('supvis/void', compact('groupedTransaksi', 'totalsPerDate', 'totalPenjualan', 'totalInsentif'));

    }

    public function supvisdestroy($id)
    {
        try {
            // Find the transaction
            $transaksi = Transaksi::withTrashed()->findOrFail($id);

            // Perform the hard delete
            $transaksi->forceDelete();

            return redirect()
                ->back()
                ->with('success', 'Transaksi berhasil dihapus.');

        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Gagal menghapus transaksi: ' . $e->getMessage());
        }
    }


}
