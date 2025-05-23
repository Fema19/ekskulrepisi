<?php

use App\Http\Controllers\JabatanController;
use App\Http\Controllers\EkskulController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\PembinaController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\AnggotaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Halaman utama (Frontend)
Route::get('/', [FrontEndController::class, 'index'])->name('frontend');

// Login & Logout
Route::get('/sesi', [SessionController::class, 'index'])->name('login');
Route::post('/sesi/login', [SessionController::class, 'login']);
Route::get('/sesi/logout', [SessionController::class, 'logout']);

// Dashboard (hanya bisa diakses jika login)
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware('auth');

// Semua route CRUD yang dilindungi dengan middleware auth
Route::middleware('auth')->group(function () {
    Route::resource('jabatan', JabatanController::class);
    Route::resource('ekskul', EkskulController::class);
    Route::resource('kegiatan', KegiatanController::class);
    Route::resource('pembina', PembinaController::class);
    Route::resource('anggota', AnggotaController::class);
});
