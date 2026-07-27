<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        // Hapus semua kategori lama
        Kategori::query()->delete();

        // Tambahkan kategori Warmindo
        $kategoris = [
            'Menu Indomie',
            'Menu Mie',
            'Menu Nasi/Goreng',
            'Menu Bubur Ayam',
            'Menu Cemilan',
            'Topping',
            'Es Susu Ketan Keju',
            'Minuman Dingin',
            'Minuman Panas',
        ];

        foreach ($kategoris as $nama) {
            Kategori::create([
                'nama_kategori' => $nama,
            ]);
        }
    }
}