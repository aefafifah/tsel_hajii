<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Produk;
use App\Models\Merchandise;

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
            'nama_sales' => 'nullable|string',               
            'jenis_paket' => 'nullable|array',               
            'merchandise' => 'nullable|array',               
            'metode_pembayaran' => 'nullable|string',         
        ]);

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

}


