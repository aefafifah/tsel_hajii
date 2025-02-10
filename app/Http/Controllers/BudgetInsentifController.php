<?php

namespace App\Http\Controllers;

use App\Models\BudgetInsentif;
use App\Models\Transaksi;
use App\Models\BudgetHistory;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;




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
        $request->validate([
            'total_insentif' => 'required|numeric|min:0',
            'action' => 'required|in:tambah,ganti',
        ]);

        $budgetInsentif = BudgetInsentif::firstOrCreate([], ['total_insentif' => 0]);

        $previousBudget = $budgetInsentif->total_insentif;
        $changeAmount = $request->input('total_insentif');

        if ($request->input('action') == 'tambah') {
            $budgetInsentif->increment('total_insentif', $changeAmount);
            $actionType = 'add';
        } else {
            $budgetInsentif->update(['total_insentif' => $changeAmount]);
            $actionType = 'update';
        }

        BudgetHistory::create([
            'budget_insentif_id' => $budgetInsentif->id,
            'change_amount' => $changeAmount,
            'previous_budget' => $previousBudget,
            'current_budget' => $budgetInsentif->total_insentif,
            'action' => $actionType,
        ]);

        return redirect()->route('supvis.budget_insentif.index')->with('status', 'Budget Insentif berhasil diperbarui!');
    }

    public function pantau()
    {
        $budgetInsentif = BudgetInsentif::first();
        $totalBudget = $budgetInsentif ? $budgetInsentif->total_insentif : 0;
        $budgetHistories = BudgetHistory::orderBy('id', 'asc')->paginate(10);
        return view('supvis.budget_insentif.pantau', compact('totalBudget', 'budgetHistories'));
    }
}

