<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FasilitasUmumController;
use App\Http\Controllers\PeminjamanFasilitasController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WargaController;
use App\Http\Middleware\AuthCheck;
use Illuminate\Support\Facades\Route;

// 🏠 Halaman utama untuk Guest (pengunjung)
Route::get('/', function () {
    return view('guest.index');
})->name('home');

// 📄 Halaman Tentang (Guest)
Route::get('/about', function () {
    return view('guest.about');
})->name('about');

// 🔐 Login untuk admin
Route::get('/auth', [AuthController::class, 'index'])->name('login.form');
Route::post('/auth/login', [AuthController::class, 'login'])->name('login.process');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// 👥 Halaman admin yang butuh login
Route::middleware([AuthCheck::class])->group(function () {

    // Dashboard admin → Data fasilitas
    Route::get('/dashboard', [FasilitasUmumController::class, 'tampilan'])->name('dashboard');

    // CRUD fasilitas
    Route::get('/', [FasilitasUmumController::class, 'index']);
    Route::resource('fasilitas', FasilitasUmumController::class);

    // CRUD user dan warga
    Route::resource('user', UserController::class);
    Route::resource('warga', WargaController::class);
});
Route::get('/about', function () {
    return view('guest/about.about');
})->name('about');

Route::resource('pinjam', PeminjamanFasilitasController::class)->except(['show']);
