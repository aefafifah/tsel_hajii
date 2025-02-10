<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Transaksi;

class TransaksiFactory extends Factory
{
    protected $model = Transaksi::class;

    public function definition(): array
    {
        return [
            'id_transaksi' => 'T' . now()->format('dmy') . substr(uniqid(), -4),
            'nama_pelanggan' => fake()->name(),
            'nomor_telepon' => fake()->numerify('08##########'),
            'aktivasi_tanggal' => fake()->dateTimeBetween('now', '+30 days'),
            'tanggal_transaksi' => fake()->dateTimeBetween('-30 days', 'now'),
            'nama_sales' => fake()->name(),
            'jenis_paket' => fake()->randomElement([
                '1',
                '2',
                '3',
            ]),
            'merchandise' => fake()->randomElement([
                '1',
                '2',
                '3',
            ]),
            'metode_pembayaran' => fake()->randomElement(['Tunai', 'Non Tunai']),
            'nomor_injeksi' => fake()->numerify('############'),
        ];
    }
}