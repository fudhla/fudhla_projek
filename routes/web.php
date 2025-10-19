<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
<<<<<<< HEAD
=======
use App\Http\Controllers\HomeController;
>>>>>>> 683175343b02d72a3ddd7b0c668d28601b3c5deb
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

Route::get('/nama/{param1?}', function ($param1= '') {
    return 'Nama saya adalah: '.$param1; //required
});

Route::get('/mahasiswa', function () {
    return 'Halo Mahasiswa'; //required
})->name('mahasiswa.show');

Route::get('/mahasiswa/{param1}', [MahasiswaController::class, 'show']);

Route::get('/fasilitas', [FasilitasController::class, 'index']);

Route::get('/auth', [AuthController::class, 'index'])->name('login.form');
Route::post('/auth/login', [AuthController::class, 'login'])->name('login.process');

Route::get('/dashboard', function () {
    return view('dashboard');
});

<<<<<<< HEAD
Route::resource('/fasilitas', FasilitasUmumController::class);

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
=======
Route::get('/home',[HomeController::class,'index']);

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

>>>>>>> 683175343b02d72a3ddd7b0c668d28601b3c5deb
