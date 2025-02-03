<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Produk;
use App\Models\Merchandise;
use Carbon\Carbon;

use Pdf;

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
            $selectedMerchandise->decrement('merch_stok', 1);
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
        $transaksi = Transaksi::all();

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
    public function kwitansi(Request $request)
    {
        $formData = $request->session()->get('form_data', []);
        $pdf = Pdf::loadView('sales.kwitansi', ['formData' => $formData]);
        return $pdf->download("trial.pdf");
        $request->session()->forget('form_data');

    }
    public function dashboard(Request $request)
    {
        if ($request->user() && $request->user()->role == 'sales') {
            $nama_sales = $request->user()->name;
            $transaksi = Transaksi::with('produk');
            if (!empty($nama_sales)) {
                $transaksi = $transaksi->where('nama_sales', $nama_sales);
            }
            $transaksi = $transaksi->get();
            $totalPenjualan = $transaksi->sum(function ($item) {
                return $item->produk ? $item->produk->produk_harga_akhir : 0;
            });
            $totalInsentif = $transaksi->sum(function ($item) {
                return $item->produk ? $item->produk->produk_insentif : 0;
            });
            $transaksi = Transaksi::with('produk')->get();
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

            return view('rekap_penjualan', compact('groupedTransaksi', 'totalsPerDate', 'totalPenjualan', 'totalInsentif'));
        }
        return redirect()->route('login')->withErrors(['role' => 'Anda harus login sebagai sales untuk mengakses halaman ini.']);
    }


}
