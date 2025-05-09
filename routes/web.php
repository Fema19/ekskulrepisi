<?php

use App\Http\Controllers\JabatanController;
use App\Http\Controllers\EkskulController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\PembinaController;
use App\Http\Controllers\TestController;
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

Route::get('/test', [TestController::class, 'test']);

// CRUD jabatan
Route::resource('jabatan', JabatanController::class);
Route::resource('ekskul', EkskulController::class);

Route::resource('kegiatan', KegiatanController::class);
Route::resource('pembina', PembinaController::class);
// Login dan logout
Route::get('/sesi', [SessionController::class, 'index']);
Route::post('/sesi/login', [SessionController::class, 'login']);
Route::get('/sesi/logout', [SessionController::class, 'logout']);
