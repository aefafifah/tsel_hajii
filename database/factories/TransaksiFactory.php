<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Transaksi;

class TransaksiFactory extends Factory
{
    protected $model = Transaksi::class;
    

    public function definition(): array
    {
        $produk = \App\Models\Produk::inRandomOrder()->first();
        $merchandise = \App\Models\Merchandise::inRandomOrder()->first();
            
        return [
            'id_transaksi' => 'T' . '003' . date('dmy') . substr(uniqid(), -4),
            'nama_pelanggan' => fake()->name(),
            'nomor_telepon' => '081231780991',
            'aktivasi_tanggal' => fake()->dateTimeBetween('now', '+30 days'),
            'tanggal_transaksi' => fake()->dateTimeBetween('-30 days', 'now'),
            'nama_sales' => "Sales",
            'jenis_paket' => $produk ? $produk->id : null,
            'merchandise' => $merchandise ? $merchandise->merch_nama : null,
            'metode_pembayaran' => fake()->randomElement(['Tunai', 'Non Tunai']),
            'nomor_injeksi' => fake()->numerify('08##########'),
        ];
    }
}