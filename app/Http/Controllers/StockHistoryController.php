<?php

namespace App\Http\Controllers;

use App\Models\StockHistory;
use Illuminate\Http\Request;

class StockHistoryController extends Controller
{
    public function index()
    {
        // Get records where product_id is NULL
        $merchandiseStockHistories = StockHistory::whereNull('product_id')
        ->with(['merchandise'=> function ($query) {
            $query->withTrashed();
            }
        ]) // Eager load the merchandise relationship
        ->orderBy('created_at', 'desc')
        ->get();

        // Get records where merchandise_id is NULL
        $productStockHistories = StockHistory::whereNull('merchandise_id')
            ->with(['product'=> function ($query) {
                $query->withTrashed();
                }
            ]) // Eager load the product relationship
            ->orderBy('created_at', 'desc')
            ->get();

        // Return view with both variables
        return view('pantau_stok', [
            'merchandiseStockHistories' => $merchandiseStockHistories,
            'productStockHistories' => $productStockHistories
        ]);
    }
}
