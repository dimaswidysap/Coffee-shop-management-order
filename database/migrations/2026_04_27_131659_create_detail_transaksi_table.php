<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('detail_transaksi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_transaksi');
            $table->ulid('id_produk');
            $table->integer('qty');
            $table->integer('subtotal');
            $table->timestamps();

            // Mendeklarasikan Relasi (Foreign Key)
            // Jika transaksi dihapus, maka detail transaksinya ikut terhapus (cascade)
            $table->foreign('id_transaksi')
                ->references('id')
                ->on('tbl_transaksi')
                ->onDelete('cascade');

            $table->foreign('id_produk')->references('id')->on('tbl_menu')->onDelete('cascade');

            // Catatan: Pastikan nama tabel menu Anda sesuai ('menu' atau 'tbl_produk' dll)
            // Jika nama tabel produk/menu Anda berbeda, ubah 'menu' pada baris di bawah ini
            // $table->foreign('id_produk')->references('id')->on('menu')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detail_transaksi');
    }
};
