<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\RiwayatTransaksi;
use App\Models\Transaksi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;


class RiwayatTransaksiExport implements FromCollection, WithHeadings, WithMapping
{
    protected $filters;

    public function __construct(array $filters = [])
    {
        $this->filters = $filters;
    }

    public function collection()
    {
        $query = Transaksi::withTrashed()->with(['produk' => fn($q) => $q->withTrashed()])->where('is_paid', true);

        if (!empty($this->filters['id_supervisor'])) {
            $query->where('id_supervisor', $this->filters['id_supervisor']);
        }

        if (!empty($this->filters['metode_pembayaran'])) {
            $query->where('metode_pembayaran', $this->filters['metode_pembayaran']);
        }

        if (!empty($this->filters['tanggal_transaksi'])) {
            $query->whereDate('tanggal_transaksi', $this->filters['tanggal_transaksi']);
        }

        return $query->get();
    }
    
    public function map($item): array
    {
        return [
            $item->id_transaksi,
            $item->supervisor?->name,
            $item->tanggal_transaksi,
            $item->nama_sales,
            $item->sales->tempat_tugas ?? '-',
            $item->nomor_telepon,
            $item->nama_pelanggan,
            $item->telepon_pelanggan,
            $item->nomor_injeksi,
            $item->addon_perdana ? '✓' : '✗',
            $item->aktivasi_tanggal,
            $item->jenis_paket,
            $item->merchandise,
            $item->metode_pembayaran,
            $item->produk->produk_harga_akhir ?? 'N/A',
        ];
    }

    public function headings(): array
    {
        return [
            'ID Transaksi',
            'Kasir',
            'Tanggal Transaksi',
            'Nama Sales',
            'Tempat Bertugas',
            'Nomor Telepon',
            'Nama Pelanggan',
            'Nomor Pelanggan',
            'Nomor Injeksi',
            'Addon Perdana',
            'Aktivasi Tanggal',
            'Jenis Paket',
            'Merchandise',
            'Metode Pembayaran',
            'Harga Akhir Produk'
        ];
    }
}
