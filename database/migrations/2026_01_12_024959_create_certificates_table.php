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
    Schema::create('certificates', function (Blueprint $table) {
        $table->id();
        $table->string('title');        // Judul Sertifikat
        $table->string('issuer');       // Penyelenggara (BNSP, Sololearn, dll)
        $table->string('issued_at');    // Tanggal (Kita pakai string biar bisa tulis "Juli 2025" atau rentang waktu)
        $table->text('description');    // Deskripsi sertifikat
        $table->string('image');        // File Gambar
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificates');
    }
};
