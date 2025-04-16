<?php

namespace App\Exports;

use App\Models\RiwayatTransaksi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class RiwayatTransaksiExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return RiwayatTransaksi::with('produk')->get();
    }

    public function map($item): array
    {
        return [
            $item->id_transaksi,
            $item->tanggal_transaksi,
            $item->nama_sales,
            $item->nomor_telepon,
            $item->nama_pelanggan,
            $item->telepon_pelanggan,
            $item->nomor_injeksi,
            $item->aktivasi_tanggal,
            $item->jenis_paket,
            $item->merchandise,
            $item->metode_pembayaran,
            $item->produk->produk_harga ?? 'N/A',
        ];
    }

    public function headings(): array
    {
        return [
            'ID Transaksi', 'Tanggal Transaksi', 'Nama Sales', 'Nomor Telepon', 'Nama Pelanggan', 'Nomor Pelanggan',
            'Nomor Injeksi', 'Aktivasi Tanggal', 'Jenis Paket', 'Merchandise', 'Metode Pembayaran', 'Harga Produk'
        ];
    }
}
