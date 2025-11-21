<?php

use Illuminate\Support\Facades\Route;

// Import semua controller otentikasi yang dibutuhkan
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Admin\ProjectController;

/*
|--------------------------------------------------------------------------
| Rute Publik (Untuk Pengunjung)
|--------------------------------------------------------------------------
|
| Rute-rute ini dapat diakses oleh siapa saja.
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/showcase', function () {
    return view('showcase.index'); 
})->name('showcase.index');

Route::get('/showcase/contoh-proyek-statis', function () {
    return view('showcase.show');
})->name('showcase.show.static'); // Beri nama unik untuk versi statis

Route::get('/resume', function () {
    return view('resume');
})->name('resume.index');


/*
|--------------------------------------------------------------------------
| Rute Admin (Tersembunyi & Terproteksi)
|--------------------------------------------------------------------------
|
| Semua rute yang berhubungan dengan panel admin dan otentikasi
| ditempatkan di dalam grup ini dengan prefix yang unik.
| Ganti 'portal-admin-rahasia-123xyz' dengan prefix pilihanmu.
|
*/

Route::prefix('portal-admin-rahasia-123xyz')->name('admin.')->group(function () {

    // --- Rute yang hanya bisa diakses setelah login (Authenticated) ---
    Route::middleware('auth')->group(function() {
        
        // Dashboard Admin
        Route::get('/dashboard', function () {
            // Arahkan dashboard langsung ke daftar proyek
            return redirect()->route('admin.projects.index');
        })->name('dashboard');

        Route::resource('projects', ProjectController::class);

        // Rute otentikasi yang butuh login
        Route::get('verify-email', EmailVerificationPromptController::class)->name('verification.notice');
        Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)->middleware(['signed', 'throttle:6,1'])->name('verification.verify');
        Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])->middleware('throttle:6,1')->name('verification.send');
        Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])->name('password.confirm');
        Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);
        Route::put('password', [PasswordController::class, 'update'])->name('password.update');
        Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    });

    // --- Rute yang hanya bisa diakses oleh tamu (Guest) ---
    Route::middleware('guest')->group(function () {
        
        // Rute Registrasi (Sengaja Dinonaktifkan)
        // Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
        // Route::post('register', [RegisteredUserController::class, 'store']);

        // Rute Login
        Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
        Route::post('login', [AuthenticatedSessionController::class, 'store']);

        // Rute Lupa Password
        Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
        Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
        Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
        Route::post('reset-password', [NewPasswordController::class, 'store'])->name('password.store');
    });
});