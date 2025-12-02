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
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('calon_mahasiswa_id')->constrained()->onDelete('cascade');
            $table->string('bukti_bayar'); // Nama file gambar
            $table->decimal('jumlah_bayar', 10, 2);
            $table->dateTime('tanggal_bayar');
            // Status Bayar: pending, lunas, ditolak
            $table->enum('status_bayar', ['pending', 'lunas', 'ditolak'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
