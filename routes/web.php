<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FasilitasUmumController;
use App\Http\Controllers\PeminjamanFasilitasController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WargaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| ROUTE GUEST
|--------------------------------------------------------------------------
*/

Route::get('/', [FasilitasUmumController::class, 'index'])->name('home');
Route::get('/about', fn() => view('guest.about'))->name('about');

// Guest FULL CRUD Fasilitas
Route::resource('fasilitas', FasilitasUmumController::class)
    ->parameters(['fasilitas' => 'fasilitas']);


/*
|--------------------------------------------------------------------------
| LOGIN (tidak mengunci akses lagi)
|--------------------------------------------------------------------------
*/
Route::get('/auth', [AuthController::class, 'index'])->name('login.form');
Route::post('/auth/login', [AuthController::class, 'login'])->name('login.process');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| ADMIN (TIDAK DIKUNCI AUTH)
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', [FasilitasUmumController::class, 'tampilan'])->name('dashboard');

Route::resource('user', UserController::class);
Route::resource('warga', WargaController::class);

/*
|--------------------------------------------------------------------------
| PEMINJAMAN
|--------------------------------------------------------------------------
*/
Route::resource('pinjam', PeminjamanFasilitasController::class)->except(['show']);
