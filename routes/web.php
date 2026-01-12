<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\CertificateController; // Tambahkan ini
use App\Models\Project;
use App\Models\Skill;
use App\Models\Certificate; // Tambahkan ini (PENTING!)
use Illuminate\Support\Facades\Route;

// ==========================================
// HALAMAN PUBLIC (FRONTEND)
// ==========================================

Route::get('/', function () {
    return view('layout.home', [
        'projects' => Project::all(),
        'skills' => Skill::all()
    ]);
})->name('home');

Route::get('/about', function () { 
    return view('layout.about'); 
})->name('about');

// RUTE SKILLS (Kirim data $skills)
Route::get('/skills', function () { 
    return view('layout.skills', ['skills' => Skill::all()]); 
})->name('skills');

// RUTE PROJECTS (Kirim data $projects)
Route::get('/projects-list', function () { 
    return view('layout.projects', ['projects' => Project::all()]); 
})->name('projects');

// RUTE SERTIFIKAT (INI YANG BIKIN ERROR TADI)
// Sekarang kita kirim data ['certificates' => ...]
Route::get('/certificates', function () { 
    return view('layout.certificates', ['certificates' => Certificate::all()]); 
})->name('certificates');

Route::get('/contact', function () { 
    return view('layout.kontak'); 
})->name('contact');


// ==========================================
// HALAMAN ADMIN (DASHBOARD)
// ==========================================
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // CRUD ADMIN
    Route::resource('admin/projects', ProjectController::class)->names('projects');
    Route::resource('admin/skills', SkillController::class)->names('skills');
    Route::resource('admin/certificates', CertificateController::class)->names('certificates');
});

require __DIR__.'/auth.php';