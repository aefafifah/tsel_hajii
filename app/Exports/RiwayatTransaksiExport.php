<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\RiwayatTransaksi;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Models\Transaksi;
use App\Models\Produk;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;


class RiwayatTransaksiExport implements FromView, ShouldAutoSize
{
    protected $filters;

    public function __construct(array $filters = [])
    {
        $this->filters = $filters;
    }

    //UPDATED Export Excel by VALEN
    public function view(): View
    {
        $produkRenameMap = [
            '15GB 20D INTERNET HAJI' => '15GB 20D INTERNET HAJI',
            '15GB 20D ROAMAX COMBO' => '15GB 20D ROAMAX COMBO',
            '17GB_COMBO_30D_850000' => '17GB_COMBO_30D_850000',
            '23GB 30D INTERNET HAJI' => '23GB 30D INTERNET HAJI',
            '23GB 30D ROAMAX COMBO' => '23GB 30D ROAMAX COMBO',
            '23GB_COMBO_45D_1010000' => '23GB_COMBO_45D_1010000',
            '30GB 45D INTERNET HAJI' => '30GB 45D INTERNET HAJI',
            '30GB 45D ROAMAX COMBO' => '30GB 45D ROAMAX COMBO',
            'MUHAMMADIYAH_COMBO 15GB 20HARI' => 'MUHAMMADIYAH_COMBO 15GB 20HARI',
            'MUHAMMADIYAH_COMBO 23GB 30HARI' => 'MUHAMMADIYAH_COMBO 23GB 30HARI',
            'MUHAMMADIYAH_COMBO 30GB 45HARI' => 'MUHAMMADIYAH_COMBO 30GB 45HARI',
            'MUHAMMADIYAH_INTERNET 15GB 20HARI' => 'MUHAMMADIYAH_INTERNET 15GB 20HARI',
            'MUHAMMDIYAH_INTERNET 30GB 45HARI' => 'MUHAMMDIYAH_INTERNET 30GB 45HARI',
            'POSKO_Combo 15GB 20 HARI' => 'POSKO_Combo 15GB 20 HARI',
            'SHAFIRA_COMBO 15GB 20HARI' => 'SHAFIRA_COMBO 15GB 20HARI',
            'SHAFIRA_COMBO 23GB 30HARI' => 'SHAFIRA_COMBO 23GB 30HARI',
            'SHAFIRA_COMBO 30GB 45HARI' => 'SHAFIRA_COMBO 30GB 45HARI',
            'SHAFIRA_INTERNET 15GB 20HARI' => 'SHAFIRA_INTERNET 15GB 20HARI',
            'SHAFIRA_INTERNET 23GB 30HARI' => 'SHAFIRA_INTERNET 23GB 30HARI',
            'SHAFIRA_INTERNET 30GB 45HARI' => 'SHAFIRA_INTERNET 30GB 45HARI',
            'TAKHOBAR_COMBO 15GB 20HARI' => 'TAKHOBAR_COMBO 15GB 20HARI',
            'TAKHOBAR_COMBO 23GB 30HARI' => 'TAKHOBAR_COMBO 23GB 30HARI',
            'TAKHOBAR_COMBO 30GB 45HARI' => 'TAKHOBAR_COMBO 30GB 45HARI',
            'TAKHOBAR_INTERNET 15GB 20HARI' => 'TAKHOBAR_INTERNET 15GB 20HARI',
            'TAKHOBAR_INTERNET 23GB 30HARI' => 'TAKHOBAR_INTERNET 23GB 30HARI',
            'TAKHOBAR_INTERNET 30GB 45HARI' => 'TAKHOBAR_INTERNET 30GB 45HARI'
        ];

        $transaksi = Transaksi::with('produk')->get();

        $rekapFlat = $transaksi
            ->groupBy(fn($item) => \Carbon\Carbon::parse($item->tanggal_transaksi)->format('Y-m-d'))
            ->flatMap(function ($items, $tanggal) use ($produkRenameMap) {
                return $items
                    ->groupBy(fn($item) => $item->produk->produk_nama ?? 'Produk tidak ditemukan')
                    ->map(function ($group, $produkNamaAsli) use ($tanggal, $produkRenameMap) {
                        $qty = $group->count();
                        $produk = $group->first()->produk;
                        $harga = $produk->produk_harga_akhir ?? 0;

                        // Rename produk
                        $produkNama = $produkRenameMap[$produkNamaAsli] ?? $produkNamaAsli;

                        return [
                            'tanggal' => $tanggal,
                            'produk' => $produkNama,
                            'qty' => $qty,
                            'harga_satuan' => $harga,
                            'revenue' => $qty * $harga,
                        ];
                    });
            })->values();

        $rekapFlat = $rekapFlat->sortBy('tanggal')->values();

        return view('supvis.rekappenjualan', [
            'rekapFlat' => $rekapFlat
        ]);
    }
}
