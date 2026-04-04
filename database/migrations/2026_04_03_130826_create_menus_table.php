<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {



        Schema::create('tbl_menu', function (Blueprint $table) {
    $table->id();

    $table->string('id_produk', 10)->unique();

    $table->integer('id_kategori');

    $table->string('nm_produk', 50);

    $table->integer('harga');

    $table->text('foto')->nullable();

    $table->timestamps();
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
