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
        Schema::table('insentifs', function (Blueprint $table) {
            $table->enum('tipe_insentif', ['persen', 'harga'])->after('id');
            $table->decimal('nilai_insentif', 10, 2)->after('tipe_insentif');
            $table->foreignId('produk_id')->constrained()->after('nilai_insentif');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('insentifs', function (Blueprint $table) {
            $table->dropColumn('tipe_insentif');
            $table->dropColumn('nilai_insentif');
            $table->dropForeign(['produk_id']);
            $table->dropColumn('produk_id');
        });
    }
};
