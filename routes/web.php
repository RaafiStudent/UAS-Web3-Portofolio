<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\CertificateController;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Certificate;
use Illuminate\Support\Facades\Route;

// ==========================================
// HALAMAN PUBLIC (FRONTEND)
// ==========================================

Route::get('/', function () {
    return view('layout.home', [
        // PERBAIKAN DI SINI:
        // Ubah latest() menjadi orderBy('date', 'desc')
        // Agar urut berdasarkan Tanggal Proyek, bukan waktu upload
        'projects' => Project::orderBy('date', 'desc')->get(), 
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
    // PERBAIKAN DI SINI JUGA:
    // Pastikan halaman list project juga urut sesuai tanggal
    return view('layout.projects', ['projects' => Project::orderBy('date', 'desc')->get()]); 
})->name('projects');

Route::get('/certificates', function () { 
    // Kalau sertifikat mau urut waktu upload, biarkan latest(). 
    // Kalau sertifikat punya kolom tanggal juga, ganti jadi orderBy('date', 'desc')
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