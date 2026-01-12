<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SkillController; // Pastikan ini di-import
use App\Models\Project;
use App\Models\Skill;
use Illuminate\Support\Facades\Route;

// HALAMAN PUBLIC (DEPAN)
Route::get('/', function () {
    return view('layout.home', [
        'projects' => Project::all(),
        'skills' => Skill::all()
    ]);
})->name('home');

Route::get('/about', function () { return view('layout.about'); })->name('about');
Route::get('/skills', function () { 
    return view('layout.skills', ['skills' => Skill::all()]); 
})->name('skills'); // INI YANG BIKIN ERROR TADI (SEKARANG SUDAH ADA)

Route::get('/projects-list', function () { 
    return view('layout.projects', ['projects' => Project::all()]); 
})->name('projects');

Route::get('/certificates', function () { return view('layout.certificates'); })->name('certificates');
Route::get('/contact', function () { return view('layout.kontak'); })->name('contact');

// HALAMAN ADMIN (DASHBOARD)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // CRUD ADMIN
    Route::resource('admin/projects', ProjectController::class)->names('projects');
    Route::resource('admin/skills', SkillController::class)->names('skills_admin');
});

require __DIR__.'/auth.php';