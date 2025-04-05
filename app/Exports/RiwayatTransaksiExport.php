<?php

namespace App\Exports;

use App\Models\RiwayatTransaksi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RiwayatTransaksiExport implements FromCollection, WithHeadings 
{
    public function collection()
    {
        return RiwayatTransaksi::select(
            'id_transaksi', 'nomor_telepon', 'nama_pelanggan', 'aktivasi_tanggal', 
            'nama_sales', 'jenis_paket', 'merchandise', 'metode_pembayaran'
        )->get();
    }

    public function headings(): array
    {
        return [
            'ID Transaksi', 'Nomor Telepon', 'Nama Pelanggan', 'Tanggal Transaksi', 
            'Nama Sales', 'Jenis Paket', 'Merchandise', 'Metode Pembayaran'
        ];
    }
}
