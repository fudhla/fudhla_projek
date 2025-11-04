<?php

use App\Http\Middleware\AuthCheck;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\FasilitasUmumController;

// Halaman welcome
Route::get('/', function () {
    return view('welcome');
});

// Login
Route::get('/auth', [AuthController::class, 'index'])->name('login.form');
Route::post('/auth/login', [AuthController::class, 'login'])->name('login.process');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Routes yang membutuhkan login
Route::group(['middleware' => AuthCheck::class], function () {

    // Halaman utama setelah login → Data Fasilitas
    Route::get('/fasilitas/tampilan', [FasilitasUmumController::class, 'tampilan'])->name('fasilitas.tampilan');
});
Route::get('/', function () {
    return redirect('fasilitas_umum');
});
Route::resource('fasilitas', FasilitasUmumController::class)
    ->parameters(['fasilitas' => 'fasilitas']);

Route::resource('user', UserController::class);

Route::resource('warga', WargaController::class);
