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
}
