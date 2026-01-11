<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');            // Judul Project
            $table->string('slug')->unique();   // URL (contoh: toko-online)
            $table->string('image')->nullable(); // Foto Project
            $table->text('description');        // Deskripsi Project
            $table->string('link')->nullable(); // Link Github/Demo
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};