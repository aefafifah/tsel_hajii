<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Merchandise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdukController extends Controller
{
    public function index()
    {
        $produks = Produk::with('merchandises')->withTrashed()->get();
        return view('produk.index', compact('produks'));
    }

    public function create()
    {
        $merchandises = Merchandise::all();
        return view('produk.input', compact('merchandises'));
    }


        public function store(Request $request)
        {

            $validatedData = $request->validate([
                'produk_nama' => 'required|string|max:255',
                'produk_harga' => 'required|numeric|min:0',
                'produk_diskon' => 'nullable|numeric|min:0',
                'produk_stok' => 'required|integer|min:0',
                'produk_detail' => 'nullable|string',
                'produk_insentif' => 'nullable|numeric|min:0',
                'merchandises' => 'nullable|array',
                'merchandises.*' => 'exists:merchandises,id',
            ]);


            DB::beginTransaction();
            try {

                $produkId = DB::table('produks')->insertGetId([
                    'produk_nama' => $validatedData['produk_nama'],
                    'produk_harga' => $validatedData['produk_harga'],
                    'produk_diskon' => $validatedData['produk_diskon'] ?? 0,
                    'produk_stok' => $validatedData['produk_stok'],
                    'produk_detail' => $validatedData['produk_detail'] ?? '',
                    'produk_insentif' => $validatedData['produk_insentif'] ?? 0,
                    'is_active' => true,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);


                if (!empty($validatedData['merchandises'])) {
                    $merchandiseData = [];
                    foreach ($validatedData['merchandises'] as $merchandiseId) {
                        $merchandiseData[] = [
                            'produk_id' => $produkId,
                            'merchandise_id' => $merchandiseId,
                        ];
                    }

                    DB::table('merchandise_produk')->insert($merchandiseData);
                }


                DB::commit();

                return redirect()->back()->with('success', 'Produk berhasil disimpan.');
            } catch (\Exception $e) {

                DB::rollBack();

                return redirect()->back()->withErrors('Terjadi kesalahan: ' . $e->getMessage());
            }
        }




    public function edit(Produk $produk)
    {
        $merchandises = Merchandise::all();
        return view('produk.edit', compact('produk', 'merchandises'));
    }

    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'produk_nama' => 'required|string|max:255',
            'produk_harga' => 'required|numeric|min:0',
            'produk_diskon' => 'nullable|numeric|min:0',
            'produk_stok' => 'required|integer|min:0',
            'produk_detail' => 'nullable|string',
            'produk_insentif' => 'nullable|numeric|min:0',
            'merchandises' => 'nullable|array',
            'merchandises.*' => 'exists:merchandises,id',
        ]);


        DB::beginTransaction();
        try {

            DB::table('produks')->where('id', $id)->update([
                'produk_nama' => $validatedData['produk_nama'],
                'produk_harga' => $validatedData['produk_harga'],
                'produk_diskon' => $validatedData['produk_diskon'] ?? 0,
                'produk_stok' => $validatedData['produk_stok'],
                'produk_detail' => $validatedData['produk_detail'] ?? '',
                'produk_insentif' => $validatedData['produk_insentif'] ?? 0,
                'updated_at' => now(),
            ]);


            if (isset($validatedData['merchandises'])) {

                DB::table('merchandise_produk')->where('produk_id', $id)->delete();


                $merchandiseData = [];
                foreach ($validatedData['merchandises'] as $merchandiseId) {
                    $merchandiseData[] = [
                        'produk_id' => $id,
                        'merchandise_id' => $merchandiseId,
                    ];
                }
                if (!empty($merchandiseData)) {
                    DB::table('merchandise_produk')->insert($merchandiseData);
                }
            }


            DB::commit();

            return redirect()->route('produk.index')->with('success', 'Produk berhasil diperbarui.');
        } catch (\Exception $e) {

            DB::rollBack();

            return redirect()->back()->withErrors('Terjadi kesalahan: ' . $e->getMessage());
        }
    }


    public function show(Produk $produk)
    {
        $produk->load('merchandises');
        return view('produk.show', compact('produk'));
    }

    public function destroy(Produk $produk)
    {
        $produk->delete();
        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus.');
    }

    public function restore($id)
    {
        $produk = Produk::withTrashed()->findOrFail($id);
        $produk->restore();

        return redirect()->route('produk.index')->with('success', 'Produk berhasil direstore');
    }

    public function forceDelete($id)
    {
        $produk = Produk::withTrashed()->findOrFail($id);
        $produk->forceDelete();
        
        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus permanen');
    }

    
}
