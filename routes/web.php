<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\{
    TeacherController,
    StudentController,
    PositionController,
    CommentController,
    GenerationController
};

// Route ke Dashboard (home)
Route::get('/', [DashboardController::class, 'index'])->name('home');


Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login'); // atau ke halaman mana pun
})->name('logout');

// Resource Routes
Route::resource('teachers', TeacherController::class);
Route::resource('students', StudentController::class);
Route::resource('positions', PositionController::class);
Route::resource('generations', GenerationController::class);
Route::resource('comments', CommentController::class);
