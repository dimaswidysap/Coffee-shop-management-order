<?php

use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;

Route::get('/', function () {
    return view('beranda');
});




Route::get('/menu', [MenuController::class, 'index']);
Route::get('/kategori', [MenuController::class, 'kategori']);
Route::get('/tambah-menu', [MenuController::class, 'tambahMenu']);

