<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('name');    // Nama Pengirim
            $table->string('email');   // Email Pengirim
            $table->text('message');   // Isi Pesan
            $table->timestamps();      // Waktu kirim
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};