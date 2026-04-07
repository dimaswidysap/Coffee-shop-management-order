<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids; // 1. Import trait ini
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasUlids; // 2. Gunakan trait ini di dalam class

    protected $table = 'tbl_kategori';

    // Pastikan kolom ini bisa diisi secara massal
    protected $fillable = [
        'nm_kategori',
        'keterangan_kategori'
    ];
}
