<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Produk;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('produks')->insert([
            [
                'produk_nama' => '11GB_COMBO_20D_590000',
                'produk_detail' => '11 GB - COMBO - 20D',
                'produk_stok' => 100,
                'produk_harga' => 590000,
            ],
            [
                'produk_nama' => '17GB_COMBO_30D_850000',
                'produk_detail' => '17 GB - COMBO - 30D',
                'produk_stok' => 100,
                'produk_harga' => 850000,
            ],
            [
                'produk_nama' => '23GB_COMBO_45D_1010000',
                'produk_detail' => '23 GB - COMBO - 45D',
                'produk_stok' => 100,
                'produk_harga' => 1010000,
            ]
        ]);
    }
}
