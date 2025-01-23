<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Produk;
use App\Models\Merchandise;

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

        ]);

        try {
            // Create new transaction
            Transaksi::create([
                'id_transaksi' => $request->id_transaksi,
                'nomor_telepon' => $request->nomor_telepon,
                'nama_pelanggan' => $request->nama_pelanggan,
                'aktivasi_tanggal' => $request->aktivasi_tanggal,
                'tanggal_transaksi' => $request->tanggal_transaksi,
                'jenis_paket' => $selectedProduk->produk_nama,
                'merchandise' => $selectedMerchandise->merch_nama,
                'metode_pembayaran' => $request->metode_pembayaran,
            ]);

            return redirect()->route('sales.transaksi.kwitansi')->with('success', 'Transaksi berhasil disimpan!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }


        // try {
        //     // Buat data transaksi baru
        //     $transaksi = Transaksi::create($validated);

        //     // Sync jenis_paket (produks) ke relasi produks
        //     if ($request->has('jenis_paket')) {
        //         $produkIds = Produk::whereIn('id', $request->jenis_paket)->pluck('id')->toArray();
        //         $transaksi->produks()->sync($produkIds);
        //     }

        //     // Sync merchandise ke relasi merchandises
        //     if ($request->has('merchandise')) {
        //         $merchandiseIds = Merchandise::whereIn('id', $request->merchandise)->pluck('id')->toArray();
        //         $transaksi->merchandises()->sync($merchandiseIds);
        //     }

        //     return redirect()->back()->with('success', 'Transaksi berhasil disimpan!');
        // } catch (\Exception $e) {
        //     return redirect()->back()
        //                    ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
        //                    ->withInput();
        // }
    }
    public function index()
    {
        $transaksi = Transaksi::all();
        return view('sales.RiwayatTransaksi', compact('transaksi'));
    }
    public function create()
    {
        $produks = Produk::with('merchandises')->get(); // Ambil produk beserta merchandise terkait
        return view('sales.transaksi', compact('produks'));
    }

    public function kwitansi(Request $request)
    {
        $formData = $request->session()->get('form_data', []);
        $pdf = Pdf::loadView('sales.kwitansi', ['formData' => $formData]);
        return $pdf->download("trial.pdf");
        $request->session()->forget('form_data');

    }

}


