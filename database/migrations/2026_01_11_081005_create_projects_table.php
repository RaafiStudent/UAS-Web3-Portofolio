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
        $table->string('title');
        $table->string('slug');
        $table->string('image');
        $table->text('description');
        $table->string('link')->nullable();
        
        // KOLOM BARU SESUAI GAMBAR BOSS
        $table->string('date')->nullable(); // Contoh: "15 April 2025"
        $table->string('technologies')->nullable(); // Contoh: "PHP, Laravel, MySQL"
        
        $table->timestamps();
    });
}

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};