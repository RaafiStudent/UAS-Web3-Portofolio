<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Models\Project;
use App\Models\Skill;
use Illuminate\Support\Facades\Route;

// ====================================================
// 1. RUTE HALAMAN DEPAN (PORTFOLIO PUBLIC)
// ====================================================

// Halaman Home (Utama)
Route::get('/', function () {
    return view('layout.home', [
        'projects' => Project::all(), // Kirim data project ke home
        'skills' => Skill::all()      // Kirim data skill ke home
    ]);
})->name('home');

// Halaman About
Route::get('/about', function () {
    return view('layout.about');
})->name('about');

// Halaman Skills (Khusus detail skill jika ada)
Route::get('/skills', function () {
    return view('layout.skills', [
        'skills' => Skill::all()
    ]);
})->name('skills');

// Halaman Projects (Galeri Project)
Route::get('/projects', function () {
    return view('layout.projects', [
        'projects' => Project::all()
    ]);
})->name('projects');

// Halaman Sertifikat
Route::get('/certificates', function () {
    return view('layout.certificates');
})->name('certificates');

// Halaman Kontak
Route::get('/contact', function () {
    return view('layout.kontak');
})->name('contact');


// ====================================================
// 2. RUTE ADMIN (DASHBOARD) - WAJIB LOGIN
// ====================================================
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // CRUD PROJECTS
    Route::resource('projects', ProjectController::class);

    // CRUD SKILLS (Baru Tambah Ini)
    Route::resource('skills', \App\Http\Controllers\SkillController::class);
});

require __DIR__.'/auth.php';