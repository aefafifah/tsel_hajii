<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('budget_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('budget_insentif_id')->constrained('budget_insentif')->onDelete('cascade');
            $table->decimal('change_amount', 15, 2);
            $table->decimal('previous_budget', 15, 2);
            $table->decimal('current_budget', 15, 2);
            $table->enum('action', ['add', 'update', 'remove']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('budget_histories');
    }
};
