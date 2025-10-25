<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\FasilitasUmumController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/sid', function () {
    return "Ini adalah halaman kelas saya";
});

Route::get('/nama/{param1}', function ($param1) {
    return 'Nama saya adalah: '.$param1;
});

Route::get('/nama/{param1?}', function ($param1 = '') {
    return 'Nama saya adalah: '.$param1; // required
});

Route::get('/mahasiswa', function () {
    return 'Halo Mahasiswa';
})->name('mahasiswa.show');

Route::get('/mahasiswa/{param1}', [MahasiswaController::class, 'show']);

Route::get('/fasilitas', [FasilitasController::class, 'index']);

Route::get('/auth', [AuthController::class, 'index'])->name('login.form');
Route::post('/auth/login', [AuthController::class, 'login'])->name('login.process');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/home', [HomeController::class, 'index']);

Route::resource('/fasilitas', FasilitasUmumController::class);

// Route::get('/fasilitas/create', [FormController::class, 'create'])->name('form.create');
// Route::post('/fasilitas/store', [FormController::class, 'store'])->name('form.store');


