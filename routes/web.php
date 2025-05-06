<?php

use App\Http\Controllers\JabatanController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Saat buka localhost:8000 langsung ke halaman login
Route::get('/', [SessionController::class, 'index'])->name('login');

// Halaman dashboard (akses manual ke /dashboard)
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Halaman ekstrakurikuler
Route::get('/ekskul', function () {
    return view('ekskul/index');
});

// CRUD jabatan
Route::resource('jabatan', JabatanController::class);

// Login dan logout
Route::get('/sesi', [SessionController::class, 'index']);
Route::post('/sesi/login', [SessionController::class, 'login']);
Route::get('/sesi/logout', [SessionController::class, 'logout']);
