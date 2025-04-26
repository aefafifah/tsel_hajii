<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('stock_histories', function (Blueprint $table) {
            $table->integer('previous_stock')->nullable()->after('change_amount');
            $table->integer('current_stock')->nullable()->after('previous_stock');
        });
    }

    public function down()
    {
        Schema::table('stock_histories', function (Blueprint $table) {
            $table->dropColumn(['previous_stock', 'current_stock']);
        });
    }
};
