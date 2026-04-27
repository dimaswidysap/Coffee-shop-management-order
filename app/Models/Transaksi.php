<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Transaksi extends Model
{
    protected $table = 'tbl_transaksi'; // Menghubungkan ke tabel yang Anda buat
    protected $guarded = [];

    // Relasi: Satu transaksi punya banyak detail
    public function details(): HasMany
    {
        return $this->hasMany(DetailTransaksi::class, 'id_transaksi', 'id');
    }
}
