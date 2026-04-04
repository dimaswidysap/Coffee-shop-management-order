<?php

namespace App\Models; // Gunakan M kapital

use Illuminate\Database\Eloquent\Model;

class menu extends Model
{
    // Beritahu Laravel bahwa tabelnya bernama tb_produks
    protected $table = 'tbl_menu';

    // Jika primary key kamu bukan 'id', tambahkan ini (berdasarkan chat sebelumnya):
    protected $guarded=['id'];
    protected $primaryKey = 'id';
}

