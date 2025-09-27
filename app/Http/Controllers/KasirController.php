<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoleUsers;
use App\Models\Produk;
use App\Models\Merchandise;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;


class KasirController extends Controller
{
    public function index()
    {
        return view('kasir.home');
    }
}

