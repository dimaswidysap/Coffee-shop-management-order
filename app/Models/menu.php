<?php

namespace App\Models; // Gunakan M kapital

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;

class Menu extends Model
{
    use HasUlids;

    protected $table = 'tbl_menu';
    // protected $primaryKey = 'id';

    // Tambahkan ini agar bisa simpan data lewat Menu::create
    protected $fillable = ['id_kategori', 'nm_produk', 'harga', 'foto'];
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id');
    }
}
