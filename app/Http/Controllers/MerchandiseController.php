<?php

namespace App\Http\Controllers;

use App\Models\Merchandise;
use Illuminate\Http\Request;
use App\Models\StockHistory;
use Illuminate\Support\Facades\DB;
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


    public function show(Merchandise $merchandise)
    {
        return view('merch.show', compact('merchandise'));
    }

    public function edit(Merchandise $merchandise)
    {
        return view('merch.edit', compact('merchandise'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'merch_nama' => 'required|string|max:255',
            'merch_detail' => 'required|string',
            'merch_stok' => 'required|integer|min:0',
        ]);

        DB::transaction(function () use ($validated) {
            $merchandise = Merchandise::create($validated);

            StockHistory::create([
                'merchandise_id' => $merchandise->id,
                'change_amount' => $validated['merch_stok'],
                'previous_stock' => 0,
                'current_stock' => $validated['merch_stok'],
                'action' => 'add',
            ]);
        });

        return redirect()->route('merch.index')->with('success', 'Merchandise berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'merch_nama' => 'required|string|max:255',
            'merch_detail' => 'required|string',
            'merch_stok' => 'required|integer|min:0',
            'stok_option' => 'required|in:ganti,tambah',
        ]);

        DB::transaction(function () use ($validated, $id) {
            $merchandise = Merchandise::findOrFail($id);
            $stok_lama = $merchandise->merch_stok;

            if ($validated['stok_option'] === 'ganti') {
                $merchandise->merch_stok = $validated['merch_stok'];
            } else {
                $merchandise->merch_stok += $validated['merch_stok'];
            }

            $merchandise->save();

            StockHistory::create([
                'merchandise_id' => $id,
                'change_amount' => $validated['merch_stok'],
                'previous_stock' => $stok_lama,
                'current_stock' => $merchandise->merch_stok,
                'action' => $validated['stok_option'] === 'ganti' ? 'replace' : 'add',
            ]);
        });

        return redirect()->route('merch.index')->with('success', 'Merchandise berhasil diperbarui.');
    }

    public function destroy(Merchandise $merchandise)
    {
        $merchandise->delete();
        return redirect()->route('merch.index')->with('success', 'Merchandise berhasil dihapus.');
    }
}
