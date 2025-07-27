<?php

use App\Http\Controllers\JabatanController;
use App\Http\Controllers\EkskulController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\PembinaController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\DashboardController; // ← Controller Dashboard
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

// Halaman Utama (Frontend)
Route::get('/', [FrontendController::class, 'index'])->name('frontend');
// Halaman Publik (Frontend)
Route::get('/ekskul', [FrontendController::class, 'showEkskul'])->name('frontend.ekskul');
Route::get('/pembina', [FrontendController::class, 'showPembina'])->name('frontend.pembina');
Route::get('/anggota', [FrontendController::class, 'showAnggota'])->name('frontend.anggota');
Route::get('/kegiatan', [FrontendController::class, 'showKegiatan'])->name('frontend.kegiatan');


// Login & Logout
Route::get('/sesi', [SessionController::class, 'index'])->name('login');
Route::post('/sesi/login', [SessionController::class, 'login'])->name('sesi.login');
Route::get('/sesi/logout', [SessionController::class, 'logout'])->name('sesi.logout');

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard')
    ->middleware('auth');

// Semua route CRUD yang dilindungi middleware auth
Route::middleware('auth')->group(function () {
    Route::resource('jabatan', JabatanController::class);
    Route::resource('ekskul', EkskulController::class);
    Route::resource('kegiatan', KegiatanController::class);
    Route::resource('pembina', PembinaController::class);
    Route::resource('anggota', AnggotaController::class);
});
