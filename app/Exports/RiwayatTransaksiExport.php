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
            'id_transaksi','tanggal_transaksi', 'nama_sales', 'nomor_telepon', 'nama_pelanggan', 'telepon_pelanggan',
            'nomor_injeksi', 'aktivasi_tanggal', 'jenis_paket', 'merchandise', 'metode_pembayaran'
        )->get();
    }

    public function headings(): array
    {
        return [
            'ID Transaksi', 'Tanggal Transaksi', 'Nama Sales', 'Nomor Telepon', 'Nama Pelanggan', 'Nomor Pelanggan',
            'Nomor Injeksi', 'Aktivasi Tanggal', 'Jenis Paket', 'Merchandise', 'Metode Pembayaran'
        ];
    }
}
