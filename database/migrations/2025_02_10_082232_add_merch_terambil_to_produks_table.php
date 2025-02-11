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
        Schema::table('merchandises', function (Blueprint $table) {
            $table->integer('merch_terambil')->default(0);
            $table->json('merch_terambil_history')->nullable()->after('merch_terambil');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('merchandises', function (Blueprint $table) {
            //
        });
    }
};
