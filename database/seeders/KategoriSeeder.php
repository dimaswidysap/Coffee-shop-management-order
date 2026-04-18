<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('tbl_kategori')->insert([
            [
                'id' => Str::ulid(),
                'nm_kategori' => 'nasi',
                'keterangan_kategori' => 'nasi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::ulid(),
                'nm_kategori' => 'ayam',
                'keterangan_kategori' => 'semua bagian ayam',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::ulid(),
                'nm_kategori' => 'sambal',
                'keterangan_kategori' => 'semua jenis sambal',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::ulid(),
                'nm_kategori' => 'minuman',
                'keterangan_kategori' => 'semua jenis mminuman kemasan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
