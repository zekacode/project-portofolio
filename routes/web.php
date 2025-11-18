<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Rute untuk Halaman Utama
Route::get('/', function () {
    return view('home');
})->name('home');

// Rute untuk Halaman Showcase
Route::get('/showcase', function () {
    return view('showcase.index'); 
});

// Rute untuk Halaman Detail Proyek (contoh statis)
Route::get('/showcase/contoh-proyek-statis', function () {
    return view('showcase.show');
});

// Rute untuk Halaman Resume
Route::get('/resume', function () {
    return view('resume');
});

// Route bawaan Breeze untuk profile
require __DIR__.'/auth.php';