<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\ContactController; // <--- JANGAN LUPA INI
use App\Models\Project;
use App\Models\Skill;
use App\Models\Certificate;
use Illuminate\Support\Facades\Route;

// ==========================================
// HALAMAN PUBLIC (FRONTEND)
// ==========================================

Route::get('/', function () {
    return view('layout.home', [
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
    return view('layout.projects', ['projects' => Project::orderBy('date', 'desc')->get()]); 
})->name('projects');

Route::get('/certificates', function () { 
    return view('layout.certificates', ['certificates' => Certificate::orderBy('date', 'desc')->get()]); 
})->name('certificates');

// --- ROUTE KONTAK DIPERBARUI ---
Route::get('/contact', function () { 
    return view('layout.kontak'); 
})->name('contact');

// Route untuk Proses Kirim Pesan (POST)
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');


// ==========================================
// HALAMAN ADMIN (DASHBOARD)
// ==========================================
Route::get('/dashboard', function () {
    $totalProjects = Project::count();
    $totalSkills = Skill::count();
    $totalCertificates = Certificate::count();
    // Hitung pesan masuk juga (Opsional)
    $totalMessages = \App\Models\Contact::count();

    return view('dashboard', compact('totalProjects', 'totalSkills', 'totalCertificates', 'totalMessages'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // CRUD ADMIN
    Route::resource('admin/projects', ProjectController::class)->names('projects');
    Route::resource('admin/skills', SkillController::class)->names('skills');
    Route::resource('admin/certificates', CertificateController::class)->names('certificates');

    // ROUTE ADMIN PESAN MASUK
    Route::get('/admin/messages', [ContactController::class, 'index'])->name('admin.contacts');
    Route::delete('/admin/messages/{id}', [ContactController::class, 'destroy'])->name('admin.contacts.destroy');
});

require __DIR__.'/auth.php';