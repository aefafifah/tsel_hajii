<?php

namespace App\Http\Controllers;

use App\Models\Merchandise;
use Illuminate\Http\Request;

class MerchandiseController extends Controller
{
    public function index()
    {
        $merchandises = Merchandise::all();
        return view('merch.index', compact('merchandises'));
    }

    public function create()
    {
        return view('merch.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'merch_nama' => 'required|string|max:255',
            'merch_detail' => 'required|string',
            'merch_stok' => 'required|integer|min:0',
        ]);

        Merchandise::create($validated);
        return redirect()->route('merch.index')->with('success', 'Merchandise berhasil ditambahkan.');
    }

    public function show(Merchandise $merchandise)
    {
        return view('merch.show', compact('merchandise'));
    }

    public function edit(Merchandise $merchandise)
    {
        return view('merch.edit', compact('merchandise'));
    }

    public function update(Request $request, Merchandise $merchandise)
    {
        $request->validate([
            'merch_nama' => 'required|string|max:255',
            'merch_detail' => 'required|string',
            'merch_stok' => 'required|integer|min:0',
        ]);

        $merchandise->update($request->all());
        return redirect()->route('merch.index')->with('success', 'Merchandise berhasil diperbarui.');
    }

    public function destroy(Merchandise $merchandise)
    {
        $merchandise->delete();
        return redirect()->route('merch.index')->with('success', 'Merchandise berhasil dihapus.');
    }
}
