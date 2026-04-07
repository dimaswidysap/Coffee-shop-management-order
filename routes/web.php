<?php

use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Route;



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

