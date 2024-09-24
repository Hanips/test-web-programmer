<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EkstrakulikulerController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login']);


Route::middleware(['auth'])->group(function () {
    //admin
    Route::get('/admin/profile', [AdminController::class, 'edit'])->name('admin.profile');
    Route::post('/admin/profile', [AdminController::class, 'update']);
    
    //siswa
    Route::resource('siswa', SiswaController::class);
    
    //ekstrakulikuler
    Route::resource('siswa.ekstrakulikuler', EkstrakulikulerController::class);
    
    //admin logout
    Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
});

