<?php

use App\Http\Controllers\MenuController;
use App\Http\Controllers\transaksiController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Routing\Router;

Route::get('/', function () {
    return view('beranda');
});




Route::get('/menu', [MenuController::class, 'index']);
Route::get('/kategori', [MenuController::class, 'kategori']);


Route::get('/tambah-menu', [MenuController::class, 'tambahMenu']);
Route::post('/menu/simpan', [MenuController::class, 'simpanMenu']);
Route::get('/detail/{id}',[MenuController::class,'detail']);


//
Route::get('/tambah-kategori', [MenuController::class, 'tambahKategori']);
// Route untuk menerima data (method POST)
Route::post('/kategori/simpan', [MenuController::class, 'simpanKategori']);
Route::get('/detail-kategori/{id}',[MenuController::class,'kategoriDetail']);


Route::get('/kategori/{id}/edit',[MenuController::class,'editKatgeori']);
Route::put('/kategori/{id}',[MenuController::class,'updateKategori']);

Route::get('/menu/{id}/edit', [MenuController::class, 'editMenu']);
Route::put('/menu/{id}',[MenuController::class,"updateMenu"]);


Route::delete('menu/{id}',[MenuController::class, 'destroy']);
Route::delete('kategori/{id}',[MenuController::class, 'destroyKategori']);


// halaman transaksi
Route::get('/transaksi',[transaksiController::class,'transaksi']);

