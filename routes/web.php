<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController; 
use App\Models\Project;
use App\Models\Skill;
use Illuminate\Support\Facades\Route;

// ==========================================
// HALAMAN DEPAN (PUBLIC)
// ==========================================
Route::get('/', function () {
    // KITA UBAH 'welcome' JADI 'layout.home' SESUAI FOLDER BOSS
    return view('layout.home', [
        'projects' => Project::all(), // Kirim data project ke halaman home
        'skills' => Skill::all()      // Kirim data skill ke halaman home
    ]);
});

// ==========================================
// HALAMAN ADMIN (DASHBOARD)
// ==========================================
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// ==========================================
// GROUP ADMIN (BUTUH LOGIN)
// ==========================================
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // CRUD PROJECTS
    Route::resource('projects', ProjectController::class);
});

require __DIR__.'/auth.php';