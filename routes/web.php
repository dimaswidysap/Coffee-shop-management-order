<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\transaksiController;
use Illuminate\Support\Facades\Route;

Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/decrease', [CartController::class, 'decrease'])->name('cart.decrease');
Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');

Route::get('/riwayat-transaksi', [CartController::class, 'index'])->name('transaksi.index');

// menghapus transaksi
Route::delete('/transaksi/{id}', [CartController::class, 'destroy']);

// landing page
Route::get('/', function () {
    return view('page.home.landing-page');
});

Route::get('/user', [MenuController::class, 'user']);

// halaman transaksi
Route::get('/transaksi', [transaksiController::class, 'transaksi']);

Route::get('/semua-transaksi', [CartController::class, 'index']);

// Route::get('/admin/menu', fn() => view('admin.menu'))->name('admin.menu');
// Route::get('/kasir/transaksi', fn() => view('kasir.transaksi'))->name('kasir.transaksi');

Route::get('/menu', [MenuController::class, 'index']);
Route::get('/kategori', [MenuController::class, 'kategori']);

Route::get('/tambah-menu', [MenuController::class, 'tambahMenu']);
Route::post('/menu/simpan', [MenuController::class, 'simpanMenu']);
Route::get('/detail/{id}', [MenuController::class, 'detail']);

//
Route::get('/tambah-kategori', [MenuController::class, 'tambahKategori']);
// Route untuk menerima data (method POST)
Route::post('/kategori/simpan', [MenuController::class, 'simpanKategori']);
Route::get('/detail-kategori/{id}', [MenuController::class, 'kategoriDetail']);

Route::get('/kategori/{id}/edit', [MenuController::class, 'editKatgeori']);
Route::put('/kategori/{id}', [MenuController::class, 'updateKategori']);

Route::get('/menu/{id}/edit', [MenuController::class, 'editMenu']);
Route::put('/menu/{id}', [MenuController::class, 'updateMenu']);

Route::delete('menu/{id}', [MenuController::class, 'destroy']);
Route::delete('kategori/{id}', [MenuController::class, 'destroyKategori']);

// halaman user
