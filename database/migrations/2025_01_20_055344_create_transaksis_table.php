<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->softDeletes();
            $table->string('id_transaksi');
            $table->string('nama_pelanggan')->nullable();
            $table->string('nomor_telepon')->nullable();
            $table->date('aktivasi_tanggal')->nullable();
            $table->date('tanggal_transaksi')->nullable();
            $table->string('nama_sales')->nullable();
            $table->string('jenis_paket')->nullable();
            $table->string('merchandise')->nullable();
            $table->string('metode_pembayaran')->nullable();
            $table->string('nomor_injeksi')->nullable();
            $table->boolean('is_paid')->default(false);
            $table->string('telepon_pelanggan')->nullable();
            $table->boolean('addon_perdana')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
