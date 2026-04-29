<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tbl_transaksi', function (Blueprint $table) {
            // Menggunakan id() standar Laravel (otomatis menjadi primary key, auto increment, unsigned big integer)
            $table->id();
            $table->dateTime('tanggal');
            $table->integer('total_harga'); // Menggunakan integer karena nominal Rupiah biasanya bilangan bulat
            $table->integer('uang_pelanggan');
            $table->integer('kembalian');
            // Opsional: Jika kasir login, buka komentar di bawah ini untuk mencatat kasir yang melayani
            // $table->unsignedBigInteger('id_user');
            // $table->foreign('id_user')->references('id')->on('users');

            $table->timestamps(); // Otomatis membuat kolom created_at dan updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tbl_transaksi');
    }
};
