<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBertugasAndTempatTugasToTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transaksis', function (Blueprint $table) {
            $table->boolean('bertugas')->default(0); // Kolom bertugas
            $table->string('tempat_tugas')->nullable(); // Kolom tempat tugas
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transaksis', function (Blueprint $table) {
            $table->dropColumn(['bertugas', 'tempat_tugas']);
        });
    }
}
