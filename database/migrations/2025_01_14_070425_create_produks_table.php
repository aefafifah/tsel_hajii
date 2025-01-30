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
        Schema::create('produks', function (Blueprint $table) {
            $table->softDeletes();

            $table->id();
            $table->string('produk_nama');
            $table->integer('produk_harga');
            $table->integer('produk_diskon')->default(0);
            $table->integer('produk_harga_akhir')->virtualAs('produk_harga - produk_diskon');
            $table->text('produk_detail');
            $table->integer('produk_stok');
            $table->integer('produk_insentif')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $table->dropSoftDeletes();
        Schema::dropIfExists('produks');
    }
};
