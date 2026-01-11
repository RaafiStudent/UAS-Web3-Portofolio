<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('layout.home', ['title' => 'Home']);
});

Route::get('/home', function () {
    return view('layout.home', ['title' => 'Home']);
});

Route::get('/about', function () {
    return view('layout.about', ['title' => 'About Me']);
});

Route::get('/skills', function () {
    return view('layout.skills', ['title' => 'Skills']);
});

Route::get('/certificates', function () {
    return view('layout.certificates', ['title' => 'Sertifikat']);
});

Route::get('/contact', function () {
    return view('layout.kontak', ['title' => 'Hubungi Saya']);
});

Route::get('/projects', function () {
    return view('layout.projects', ['title' => 'Proyek']);
});