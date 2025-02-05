<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PivotMerchandiseProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('merchandise_produk')->insert([
            [
                'produk_id'=>1,
                'merchandise_id'=>1,
            ],
            [
                'produk_id'=>1,
                'merchandise_id'=>2,
            ],
            [
                'produk_id'=>1,
                'merchandise_id'=>3,
            ],
            [
                'produk_id'=>1,
                'merchandise_id'=>4,
            ],
            [
                'produk_id'=>1,
                'merchandise_id'=>5,
            ],
            
        ]);
    }
}
