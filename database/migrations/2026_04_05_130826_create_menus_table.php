<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tbl_menu', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('id_kategori');
            $table->string('nm_produk', 50);
            $table->bigInteger('harga');
            $table->text('foto');
            $table->timestamps();

            $table->foreign('id_kategori')->references('id')->on('tbl_kategori')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_menu');
    }
};
