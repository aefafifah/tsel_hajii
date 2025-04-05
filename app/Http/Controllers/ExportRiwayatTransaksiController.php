<?php

namespace App\Http\Controllers;

use App\Exports\RiwayatTransaksiExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class ExportRiwayatTransaksiController extends Controller
{
    public function exportExcel()
    {
        return Excel::download(new RiwayatTransaksiExport, 'riwayat_transaksi.xlsx');
    }
}
