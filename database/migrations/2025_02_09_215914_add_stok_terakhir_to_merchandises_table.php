<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStokTerakhirToMerchandisesTable extends Migration
{
    public function up()
    {
        Schema::table('merchandises', function (Blueprint $table) {
            $table->integer('stok_terakhir')->default(0);
        });
    }

    public function down()
    {
        Schema::table('merchandises', function (Blueprint $table) {
            $table->dropColumn('stok_terakhir');
        });
    }
}
