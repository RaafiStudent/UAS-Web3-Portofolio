<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController; // <--- JANGAN LUPA INI DITAMBAHKAN
use App\Models\Project;
use App\Models\Skill;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome', [
        'projects' => Project::all(),
        'skills' => Skill::all()
    ]);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// GROUP ADMIN
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // CRUD PROJECTS (Baris Sakti ini Boss!)
    Route::resource('projects', ProjectController::class);
});

require __DIR__.'/auth.php';