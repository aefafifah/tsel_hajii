<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('role_users', function (Blueprint $table) {
            $table->boolean('bertugas')->default(0);
            $table->string('tempat_tugas')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('role_users', function (Blueprint $table) {
            $table->dropColumn(['bertugas', 'tempat_tugas']);
        });
    }
};
