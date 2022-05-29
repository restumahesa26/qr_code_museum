<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KoleksiController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubKategoriController;
use App\Http\Controllers\TanggapanController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('/scan', [HomeController::class, 'scan'])->name('scan');

Route::get('/about-us', [HomeController::class, 'about'])->name('about-us');

Route::post('/testimoni/store', [HomeController::class, 'send_testimony'])->name('send-testimoni');

Route::get('/scanning-qr-code/show-collection/{kode}', [HomeController::class, 'koleksi'])->name('scanning-qr-code.show');

Route::get('/scanning-qr-code', [HomeController::class, 'scanning'])->name('scanning-qr-code');

Route::prefix('admin')
    ->middleware(['auth'])
    ->group(function () {
        Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

        Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

        Route::get('/data-koleksi/cetak-qr-code/{id}', [KoleksiController::class, 'generate_qr_code'])->name('data-koleksi.cetak-qr-code');

        Route::resource('data-koleksi', KoleksiController::class);

        Route::resource('data-kategori', KategoriController::class);

        Route::get('/get-sub_kategori', [SubKategoriController::class, 'subKategori'])->name('data-sub-kategori.add');

        Route::resource('data-sub-kategori', SubKategoriController::class);

        Route::resource('data-pengguna', PenggunaController::class);

        Route::resource('data-tanggapan', TanggapanController::class);
    });

require __DIR__.'/auth.php';
