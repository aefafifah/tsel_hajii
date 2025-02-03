<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\BudgetInsentif;

class HomeController extends Controller
{
        public function __construct()
    {
        $this->middleware('auth');
    }

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
        return view('supvis.home', compact('totalInsentif', 'sisaBudget'));
    }
}
