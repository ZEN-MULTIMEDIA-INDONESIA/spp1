<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KlienController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\PemantauanProyekController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\ProyekController;
use App\Http\Controllers\TaskController;
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

// Route::get('/', function () {
//     return redirect()->route('proyek');
// });

Route::controller(LandingController::class)->group(function () {
    Route::get('/', 'index')->name('landing');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'index')->name('login');
    Route::get('/logout', 'logout')->name('logout');

    Route::post('/credentials', 'credentials')->name('credentials');
});

Route::controller(ProyekController::class)->group(function () {
    Route::get('/proyek', 'index')->name('proyek');
    Route::get('/proyek/restorasi', 'restorasi')->name('proyek.restorasi');
    Route::get('/proyek/tambah', 'tambah')->name('proyek.tambah');
    Route::get('/proyek/edit/{uuid}', 'edit')->name('proyek.edit');
    Route::get('/proyek/detail/{uuid}', 'detail')->name('proyek.detail');

    Route::put('/proyek/restore/{uuid}', 'restore')->name('proyek.restore');
    Route::put('/proyek/update/{uuid}', 'update')->name('proyek.update');

    Route::delete('/proyek/hapus/{uuid}', 'hapus')->name('proyek.hapus');
    Route::delete('/proyek/hapus-permanen/{proyek}', 'hapus_permanen')->name('proyek.hapus-permanen');

    Route::post('/proyek/store', 'store')->name('proyek.store');
});

Route::controller(TaskController::class)->group(function () {
    Route::get('/task', 'index')->name('task');
    Route::get('/task/tambah', 'tambah')->name('task.tambah');
    Route::get('/task/restorasi', 'restorasi')->name('task.restorasi');
    Route::get('/task/edit/{uuid}', 'edit')->name('task.edit');
    Route::get('/task/detail/{uuid}', 'detail')->name('task.detail');

    Route::put('/task/update/{uuid}', 'update')->name('task.update');
    Route::put('/task/restore/{uuid}', 'restore')->name('task.restore');
    Route::put('/task/update/terima-task/{uuid}', 'terima_task')->name('task.terima-task');
    Route::put('/task/update/penyelesaian-task/{uuid}', 'penyelesaian_task')->name('task.penyelesaian-task');

    Route::delete('/task/hapus/{uuid}', 'hapus')->name('task.hapus');
    Route::delete('/task/hapus-permanen/{uuid}', 'hapus_permanen')->name('task.hapus_permanen');

    Route::post('/task/store', 'store')->name('task.store');
});

Route::controller(KlienController::class)->group(function () {
    Route::get('/klien', 'index')->name('klien');
    Route::get('/klien/restorasi', 'restorasi')->name('klien.restorasi');
    Route::get('/klien/tambah', 'tambah')->name('klien.tambah');
    Route::get('/klien/edit/{uuid}', 'edit')->name('klien.edit');

    Route::put('/klien/restore/{uuid}', 'restore')->name('klien.restore');
    Route::put('/klien/update/{uuid}', 'update')->name('klien.update');

    Route::delete('/klien/hapus/{uuid}', 'hapus')->name('klien.hapus');
    Route::delete('/klien/hapus-permanen/{uuid}', 'hapus_permanen')->name('klien.hapus-permanen');

    Route::post('/klien/store', 'store')->name('klien.store');
});

Route::controller(PenggunaController::class)->group(function () {
    Route::get('/pengguna', 'index')->name('pengguna');
    Route::get('/pengguna/tambah', 'tambah')->name('pengguna.tambah');
    Route::get('/pengguna/restorasi', 'restorasi')->name('pengguna.restorasi');
    Route::get('/pengguna/edit/{uuid}', 'edit')->name('pengguna.edit');

    Route::put('/pengguna/restore/{uuid}', 'restore')->name('pengguna.restore');
    Route::put('/pengguna/update/{uuid}', 'update')->name('pengguna.update');

    Route::delete('/pengguna/hapus/{uuid}', 'hapus')->name('pengguna.hapus');
    Route::delete('/pengguna/hapus-permanen/{uuid}', 'hapus_permanen')->name('pengguna.hapus-permanen');

    Route::post('/pengguna/store', 'store')->name('pengguna.store');
});

Route::controller(DashboardController::class)->group(function () {
    Route::get('/dashboard', 'dashboard')->name('dashboard');
});

Route::controller(PemantauanProyekController::class)->group(function () {
    Route::get('/pemantauan-proyek', 'index')->name('pemantauan-proyek');
});
