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
// ==========================================
// HALAMAN PUBLIC (FRONTEND)
// ==========================================

Route::get('/', function () {
    return view('layout.home', [
        // Gunakan latest() supaya yang tampil di Home adalah yang BARU diinput
        'projects' => Project::latest()->get(), 
        'skills' => Skill::all()
    ]);
})->name('home');

Route::get('/about', function () { 
    return view('layout.about'); 
})->name('about');

Route::get('/skills', function () { 
    return view('layout.skills', ['skills' => Skill::all()]); 
})->name('skills');

Route::get('/projects-list', function () { 
    // Di halaman list project juga kita urutkan dari yang terbaru
    return view('layout.projects', ['projects' => Project::latest()->get()]); 
})->name('projects');

Route::get('/certificates', function () { 
    // Sertifikat juga bagusnya dari yang terbaru
    return view('layout.certificates', ['certificates' => Certificate::latest()->get()]); 
})->name('certificates');

Route::get('/contact', function () { 
    return view('layout.kontak'); 
})->name('contact');


// ==========================================
// HALAMAN ADMIN (DASHBOARD)
// ==========================================
Route::get('/dashboard', function () {
    // Hitung jumlah data
    $totalProjects = Project::count();
    $totalSkills = Skill::count();
    $totalCertificates = Certificate::count();

    return view('dashboard', compact('totalProjects', 'totalSkills', 'totalCertificates'));
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