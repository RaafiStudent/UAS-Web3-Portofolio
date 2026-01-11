<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController; // <-- Panggil Controller Admin
use App\Models\Project;
use App\Models\Skill;
use Illuminate\Support\Facades\Route;

// HALAMAN DEPAN (PUBLIC)
Route::get('/', function () {
    return view('welcome', [
        'projects' => Project::all(), // Kirim data project ke depan
        'skills' => Skill::all()      // Kirim data skill ke depan
    ]);
});

// HALAMAN ADMIN (DASHBOARD) - HANYA BISA DIAKSES KALAU LOGIN
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// GROUPING ROUTE ADMIN (Biar rapi)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Nanti kita tambah route CRUD Project di sini
});

require __DIR__.'/auth.php';