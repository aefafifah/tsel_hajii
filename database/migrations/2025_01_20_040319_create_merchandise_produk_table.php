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
        Schema::create('merchandise_produk', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('produk_id');
            $table->unsignedBigInteger('merchandise_id');
            $table->timestamps();


            $table->foreign('produk_id')
                ->references('id')
                ->on('produks')
                ->onDelete('cascade');

            $table->foreign('merchandise_id')
                ->references('id')
                ->on('merchandises')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('merchandise_produk');
    }
};
