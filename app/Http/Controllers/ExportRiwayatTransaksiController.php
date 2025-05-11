<?php

namespace App\Http\Controllers;

use App\Exports\RiwayatTransaksiExport;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ExportRiwayatTransaksiController extends Controller
{
    public function exportExcel(Request $request)
    {
        $filters = $request->only(['id_supervisor', 'metode_pembayaran', 'tanggal_transaksi']);
        return Excel::download(new RiwayatTransaksiExport($filters), 'riwayat_transaksi.xlsx');
    }
}
