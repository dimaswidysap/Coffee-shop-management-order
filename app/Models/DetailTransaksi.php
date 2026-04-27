<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailTransaksi extends Model
{
    protected $table = 'detail_transaksi';
    protected $guarded = [];

    // Relasi: Detail ini milik sebuah transaksi
    public function transaksi(): BelongsTo
    {
        return $this->belongsTo(Transaksi::class, 'id_transaksi', 'id');
    }

    // Relasi: Detail ini merujuk ke sebuah produk (asumsi tabel produk Anda bernama 'menu')
    public function produk(): BelongsTo
    {
        return $this->belongsTo(Menu::class, 'id_produk', 'id');
    }
}
