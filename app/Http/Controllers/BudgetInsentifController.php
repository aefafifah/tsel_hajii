<?php

namespace App\Http\Controllers;

use App\Models\BudgetInsentif;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class BudgetInsentifController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::all();
        $totalInsentif = 0;
        foreach ($transaksi as $item) {

            if ($item->produk && $item->produk->produk_insentif !== null) {
                $totalInsentif += $item->produk->produk_insentif;
            }
        }
        $budgetInsentif = BudgetInsentif::first();
        $totalBudget = $budgetInsentif ? $budgetInsentif->total_insentif : 0;
        $sisaBudget = $totalBudget - $totalInsentif;
        return view('supvis.budget_insentif.index', compact('totalInsentif', 'sisaBudget', 'totalBudget'));
    }




    public function update(Request $request)
    {
        $budgetInsentif = BudgetInsentif::find(1);
        if (!$budgetInsentif) {
            $budgetInsentif = new BudgetInsentif();
        }
        $budgetInsentif->total_insentif += $request->input('total_insentif');
        $budgetInsentif->save();
        return redirect()->route('supvis.budget_insentif.index')->with('status', 'Budget Insentif berhasil diupdate!');
    }



}
