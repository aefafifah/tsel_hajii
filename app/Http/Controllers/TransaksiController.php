<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;

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
            'tanggal_transaksi' => 'nullable|date'
            'nama_sales' => 'nullable|string',             
            'jenis_paket' => 'nullable|string',               
            'merchandise' => 'nullable|string',               
            'metode_pembayaran' => 'nullable|string',
        ]);

        try {
            // Create new transaction
            Transaksi::create($validated);
            return redirect()->back()->with('success', 'Transaksi berhasil disimpan!');
        } catch (\Exception $e) {
            return redirect()->back()
                           ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                           ->withInput();
        }
    }
    public function index()
    {
        $transaksi = Transaksi::all();
        return view('sales.RiwayatTransaksi', compact('transaksi'));
    }
}


