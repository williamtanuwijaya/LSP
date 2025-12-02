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
        Schema::table('users', function (Blueprint $table) {

            // 1. Cek dulu: Apakah kolom 'role' BELUM ada? Kalau belum, baru buat.
            if (!Schema::hasColumn('users', 'role')) {
                $table->enum('role', ['admin', 'camaba'])->default('camaba')->after('password');
            }

            // 2. Cek dulu: Apakah kolom 'is_active' BELUM ada? Kalau belum, baru buat.
            if (!Schema::hasColumn('users', 'is_active')) {
                // Taruh setelah 'role' jika role ada, atau setelah 'password' jika tidak
                $after = Schema::hasColumn('users', 'role') ? 'role' : 'password';
                $table->boolean('is_active')->default(false)->after($after);
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Hapus kolom hanya jika ada
            if (Schema::hasColumn('users', 'role')) {
                $table->dropColumn('role');
            }
            if (Schema::hasColumn('users', 'is_active')) {
                $table->dropColumn('is_active');
            }
        });
    }
};
