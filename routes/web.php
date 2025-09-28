<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\MahasiswaController;

Route::get('/', function () {
    return view('home');
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

