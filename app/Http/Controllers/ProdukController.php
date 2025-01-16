<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $produks = Produk::all();
        return view('produk.index', compact('produks'));
    }

    public function create()
    {
        return view('produk.input');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'produk_nama' => 'required|string|max:255',
            'produk_harga' => 'required|numeric|min:0',
            'produk_diskon' => 'nullable|numeric|min:0|max:100',
            'produk_detail' => 'required|string',
            'produk_stok' => 'required|integer|min:0',
        ]);

        Produk::create($validated);

        return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function show(Produk $produk)
    {
        return view('produk.show', compact('produk'));
    }

    public function edit(Produk $produk)
    {
        return view('produk.edit', compact('produk'));
    }

    public function update(Request $request, Produk $produk)
    {
        $validated = $request->validate([
            'produk_nama' => 'required|string|max:255',
            'produk_harga' => 'required|numeric|min:0',
            'produk_diskon' => 'nullable|numeric|min:0|max:100',
            'produk_detail' => 'required|string',
            'produk_stok' => 'required|integer|min:0',
        ]);

        $produk->update($validated);

        return redirect()->route('produk.index')->with('success', 'Produk berhasil diperbarui!');
    }

    public function destroy(Produk $produk)
    {
        $produk->delete();

        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus!');
    }
}
