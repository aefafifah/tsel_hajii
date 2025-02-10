<?php

namespace App\Http\Controllers;

use App\Models\StockHistory;
use Illuminate\Http\Request;

class StockHistoryController extends Controller
{
    public function index()
    {
        $stockHistories = StockHistory::with(['product', 'merchandise'])->paginate(10);
        return view('pantau_stok', compact('stockHistories'));
    }
}
