<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
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
Route::get('/about', function () {
    return view('guest.about.about');
})->name('about');

// Guest FULL CRUD Fasilitas
// Route::resource('fasilitas', FasilitasUmumController::class)
//     ->parameters(['fasilitas' => 'fasilitas'])
//     ->middleware('checkislogin');

Route::middleware(['checkislogin'])->group(function () {
    Route::resource('fasilitas', FasilitasUmumController::class);
});

/*
|--------------------------------------------------------------------------
| LOGIN (tidak mengunci akses lagi)
|--------------------------------------------------------------------------
*/
Route::controller(AuthController::class)->group(function () {
    Route::get('/auth', 'index')->name('login.form');           // GET Login page
    Route::post('/auth/login', 'login')->name('login.process'); // POST Login
    Route::get('/logout', 'logout')->name('logout');            // GET Logout
});

/*
|--------------------------------------------------------------------------
| ADMIN (TIDAK DIKUNCI AUTH)
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => ['checkrole:admin']], function () {

    Route::resource('user', UserController::class);
});


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('warga', WargaController::class);

/*
|--------------------------------------------------------------------------
| PEMINJAMAN
|--------------------------------------------------------------------------
*/
Route::resource('pinjam', PeminjamanFasilitasController::class);

// web.php
Route::delete('media/{media}', [MediaController::class, 'destroy'])->name('media.destroy');
