<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kategori::create(['nama_kategori' => 'Fasilitas']);
        Kategori::create(['nama_kategori' => 'Kurikulum']);
        Kategori::create(['nama_kategori' => 'Kedisiplinan']);
        Kategori::create(['nama_kategori' => 'Lainnya']);
    }
}
