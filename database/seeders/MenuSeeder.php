<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    public function run(): void
    {

        Menu::insert([

        // =========================
        // MENU INDOMIE
        // =========================

    [
    'nama_menu' => 'Indomie Rebus Ori',
    'kategori' => 'Menu Indomie',
    'harga' => 10000,
    'deskripsi' => 'Indomie rebus original dengan kuah gurih yang disajikan hangat.',
    'status' => 'tersedia',
    ],

    [
    'nama_menu' => 'Indomie Goreng Ori',
    'kategori' => 'Menu Indomie',
    'harga' => 10000,
    'deskripsi' => 'Indomie goreng original dengan bumbu khas yang lezat.',
    'status' => 'tersedia',
    ],

    [
    'nama_menu' => 'Indomie Rebus Telor',
    'kategori' => 'Menu Indomie',
    'harga' => 13000,
    'deskripsi' => 'Indomie rebus original dengan tambahan telur.',
    'status' => 'tersedia',
    ],

    [
    'nama_menu' => 'Indomie Goreng Telor',
    'kategori' => 'Menu Indomie',
    'harga' => 13000,
    'deskripsi' => 'Indomie goreng original dengan tambahan telur.',
    'status' => 'tersedia',
    ],

    [
    'nama_menu' => 'Indomie Kornet',
    'kategori' => 'Menu Indomie',
    'harga' => 13000,
    'deskripsi' => 'Indomie dengan topping kornet sapi.',
    'status' => 'tersedia',
    ],

    [
    'nama_menu' => 'Indomie Keju',
    'kategori' => 'Menu Indomie',
    'harga' => 13000,
    'deskripsi' => 'Indomie dengan taburan keju parut.',
    'status' => 'tersedia',
    ],

    [
    'nama_menu' => 'Indomie Telor Keju',
    'kategori' => 'Menu Indomie',
    'harga' => 18000,
    'deskripsi' => 'Indomie dengan telur dan keju yang gurih.',
    'status' => 'tersedia',
    ],

    [
    'nama_menu' => 'Indomie Telor Kornet',
    'kategori' => 'Menu Indomie',
    'harga' => 18000,
    'deskripsi' => 'Indomie dengan telur dan topping kornet.',
    'status' => 'tersedia',
    ],

    [
    'nama_menu' => 'Internet Keju',
    'kategori' => 'Menu Indomie',
    'harga' => 20000,
    'deskripsi' => 'Indomie nyemek spesial dengan telur dan keju.',
    'status' => 'tersedia',
    ],

    [
    'nama_menu' => 'Indomie Dabel Ori',
    'kategori' => 'Menu Indomie',
    'harga' => 18000,
    'deskripsi' => 'Porsi double Indomie original.',
    'status' => 'tersedia',
    ],

    [
    'nama_menu' => 'Indomie Dabel + Telor',
    'kategori' => 'Menu Indomie',
    'harga' => 23000,
    'deskripsi' => 'Porsi double Indomie dengan tambahan telur.',
    'status' => 'tersedia',
    ],

    // =========================
    // MENU MIE
    // =========================

[
    'nama_menu' => 'Mie Bangladesh',
    'kategori' => 'Menu Mie',
    'harga' => 17000,
    'deskripsi' => 'Mie khas dengan bumbu gurih pedas yang dimasak hangat.',
    'status' => 'tersedia',
],

[
    'nama_menu' => 'Mie Nyemek',
    'kategori' => 'Menu Mie',
    'harga' => 17000,
    'deskripsi' => 'Mie dengan kuah sedikit, gurih dan kaya bumbu.',
    'status' => 'tersedia',
],

[
    'nama_menu' => 'Mie Dok Dok',
    'kategori' => 'Menu Mie',
    'harga' => 17000,
    'deskripsi' => 'Mie dok dok dengan cita rasa khas kaki lima.',
    'status' => 'tersedia',
],

[
    'nama_menu' => 'Mie Tek Tek Oseng',
    'kategori' => 'Menu Mie',
    'harga' => 17000,
    'deskripsi' => 'Mie tek tek yang ditumis dengan bumbu spesial.',
    'status' => 'tersedia',
],

[
    'nama_menu' => 'Kwetiau Kuah',
    'kategori' => 'Menu Mie',
    'harga' => 17000,
    'deskripsi' => 'Kwetiau kuah hangat dengan bumbu gurih.',
    'status' => 'tersedia',
],

[
    'nama_menu' => 'Kwetiau Goreng',
    'kategori' => 'Menu Mie',
    'harga' => 17000,
    'deskripsi' => 'Kwetiau goreng dengan bumbu khas dan sayuran.',
    'status' => 'tersedia',
],

[
    'nama_menu' => 'Mie Tek Tek Spesial',
    'kategori' => 'Menu Mie',
    'harga' => 25000,
    'deskripsi' => 'Mie tek tek lengkap dengan topping spesial.',
    'status' => 'tersedia',
],

[
    'nama_menu' => 'Mie Tek Tek Telor Ceplok',
    'kategori' => 'Menu Mie',
    'harga' => 22000,
    'deskripsi' => 'Mie tek tek dengan tambahan telur ceplok.',
    'status' => 'tersedia',
],

[
    'nama_menu' => 'Mie Bangladesh Telor 1/2 Matang',
    'kategori' => 'Menu Mie',
    'harga' => 22000,
    'deskripsi' => 'Mie Bangladesh dengan telur setengah matang.',
    'status' => 'tersedia',
],

// =========================
// MENU NASI
// =========================

[
    'nama_menu' => 'Nasi Goreng Original',
    'kategori' => 'Menu Nasi',
    'harga' => 17000,
    'deskripsi' => 'Nasi goreng original dengan bumbu khas Warmindo.',
    'status' => 'tersedia',
],

[
    'nama_menu' => 'Nasi Goreng Telur',
    'kategori' => 'Menu Nasi',
    'harga' => 22000,
    'deskripsi' => 'Nasi goreng original dengan tambahan telur.',
    'status' => 'tersedia',
],

[
    'nama_menu' => 'Nasi Goreng Kornet',
    'kategori' => 'Menu Nasi',
    'harga' => 22000,
    'deskripsi' => 'Nasi goreng dengan topping kornet sapi.',
    'status' => 'tersedia',
],

[
    'nama_menu' => 'Nasi Goreng Ati Ampela',
    'kategori' => 'Menu Nasi',
    'harga' => 22000,
    'deskripsi' => 'Nasi goreng dengan ati ampela yang gurih.',
    'status' => 'tersedia',
],

[
    'nama_menu' => 'Nasi Goreng Ayam Suwir',
    'kategori' => 'Menu Nasi',
    'harga' => 22000,
    'deskripsi' => 'Nasi goreng dengan ayam suwir berbumbu.',
    'status' => 'tersedia',
],

[
    'nama_menu' => 'Nasi Goreng Telur Kornet',
    'kategori' => 'Menu Nasi',
    'harga' => 28000,
    'deskripsi' => 'Nasi goreng dengan telur dan kornet.',
    'status' => 'tersedia',
],

[
    'nama_menu' => 'Nasi Goreng Gila',
    'kategori' => 'Menu Nasi',
    'harga' => 22000,
    'deskripsi' => 'Nasi goreng dengan aneka topping spesial.',
    'status' => 'tersedia',
],

[
    'nama_menu' => 'Magelangan',
    'kategori' => 'Menu Nasi',
    'harga' => 18000,
    'deskripsi' => 'Perpaduan nasi goreng dan mie goreng khas Magelang.',
    'status' => 'tersedia',
],

// =========================
// MENU BUBUR AYAM
// =========================

[
    'nama_menu' => 'Bubur Ayam Original',
    'kategori' => 'Menu Bubur Ayam',
    'harga' => 15000,
    'deskripsi' => 'Bubur ayam hangat dengan topping ayam suwir dan bawang goreng.',
    'status' => 'tersedia',
],

[
    'nama_menu' => 'Bubur Ayam Telur',
    'kategori' => 'Menu Bubur Ayam',
    'harga' => 18000,
    'deskripsi' => 'Bubur ayam dengan tambahan telur rebus.',
    'status' => 'tersedia',
],

[
    'nama_menu' => 'Bubur Ayam Ati Ampela',
    'kategori' => 'Menu Bubur Ayam',
    'harga' => 20000,
    'deskripsi' => 'Bubur ayam dengan topping ati ampela.',
    'status' => 'tersedia',
],

[
    'nama_menu' => 'Bubur Ayam Komplit',
    'kategori' => 'Menu Bubur Ayam',
    'harga' => 23000,
    'deskripsi' => 'Bubur ayam lengkap dengan telur, ati ampela, dan pelengkap.',
    'status' => 'tersedia',
],

[
    'nama_menu' => 'Bubur Ayam Spesial',
    'kategori' => 'Menu Bubur Ayam',
    'harga' => 25000,
    'deskripsi' => 'Bubur ayam spesial dengan topping pilihan.',
    'status' => 'tersedia',
],

// =========================
// MENU CEMILAN
// =========================

[
    'nama_menu' => 'Kentang Goreng',
    'kategori' => 'Menu Cemilan',
    'harga' => 15000,
    'deskripsi' => 'Kentang goreng renyah disajikan dengan saus.',
    'status' => 'tersedia',
],

[
    'nama_menu' => 'Sosis Goreng',
    'kategori' => 'Menu Cemilan',
    'harga' => 12000,
    'deskripsi' => 'Sosis goreng hangat.',
    'status' => 'tersedia',
],

[
    'nama_menu' => 'Nugget Goreng',
    'kategori' => 'Menu Cemilan',
    'harga' => 12000,
    'deskripsi' => 'Nugget ayam goreng renyah.',
    'status' => 'tersedia',
],

[
    'nama_menu' => 'Mix Platter',
    'kategori' => 'Menu Cemilan',
    'harga' => 25000,
    'deskripsi' => 'Kentang, sosis, dan nugget dalam satu porsi.',
    'status' => 'tersedia',
],

[
    'nama_menu' => 'Roti Bakar Coklat',
    'kategori' => 'Menu Cemilan',
    'harga' => 15000,
    'deskripsi' => 'Roti bakar dengan isian coklat.',
    'status' => 'tersedia',
],

[
    'nama_menu' => 'Roti Bakar Keju',
    'kategori' => 'Menu Cemilan',
    'harga' => 15000,
    'deskripsi' => 'Roti bakar dengan taburan keju.',
    'status' => 'tersedia',
],

[
    'nama_menu' => 'Roti Bakar Coklat Keju',
    'kategori' => 'Menu Cemilan',
    'harga' => 18000,
    'deskripsi' => 'Roti bakar dengan coklat dan keju.',
    'status' => 'tersedia',
],


// =========================
// TOPPING
// =========================

[
    'nama_menu' => 'Telur',
    'kategori' => 'Topping',
    'harga' => 3000,
    'deskripsi' => 'Tambahan telur untuk menu favoritmu.',
    'status' => 'tersedia',
],

[
    'nama_menu' => 'Keju',
    'kategori' => 'Topping',
    'harga' => 3000,
    'deskripsi' => 'Taburan keju yang gurih dan lezat.',
    'status' => 'tersedia',
],

[
    'nama_menu' => 'Kornet',
    'kategori' => 'Topping',
    'harga' => 3000,
    'deskripsi' => 'Tambahan kornet sapi.',
    'status' => 'tersedia',
],

[
    'nama_menu' => 'Ati Ampela',
    'kategori' => 'Topping',
    'harga' => 5000,
    'deskripsi' => 'Tambahan ati ampela yang gurih.',
    'status' => 'tersedia',
],

[
    'nama_menu' => 'Ayam Suwir',
    'kategori' => 'Topping',
    'harga' => 5000,
    'deskripsi' => 'Tambahan ayam suwir berbumbu.',
    'status' => 'tersedia',
],

[
    'nama_menu' => 'Sosis',
    'kategori' => 'Topping',
    'harga' => 3000,
    'deskripsi' => 'Tambahan sosis.',
    'status' => 'tersedia',
],

[
    'nama_menu' => 'Nugget',
    'kategori' => 'Topping',
    'harga' => 3000,
    'deskripsi' => 'Tambahan nugget ayam.',
    'status' => 'tersedia',
],

// =========================
// ES SUSU KETAN KEJU
// =========================

[
    'nama_menu' => 'Es Susu Ketan Keju Original',
    'kategori' => 'Es Susu Ketan Keju',
    'harga' => 15000,
    'deskripsi' => 'Es susu dengan ketan hitam dan keju parut.',
    'status' => 'tersedia',
],

[
    'nama_menu' => 'Es Susu Ketan Keju Coklat',
    'kategori' => 'Es Susu Ketan Keju',
    'harga' => 17000,
    'deskripsi' => 'Es susu ketan keju dengan siraman coklat.',
    'status' => 'tersedia',
],

[
    'nama_menu' => 'Es Susu Ketan Keju Matcha',
    'kategori' => 'Es Susu Ketan Keju',
    'harga' => 17000,
    'deskripsi' => 'Es susu ketan keju dengan rasa matcha.',
    'status' => 'tersedia',
],

[
    'nama_menu' => 'Es Susu Ketan Keju Taro',
    'kategori' => 'Es Susu Ketan Keju',
    'harga' => 17000,
    'deskripsi' => 'Es susu ketan keju dengan rasa taro.',
    'status' => 'tersedia',
],

// =========================
// MINUMAN DINGIN
// =========================

[
    'nama_menu' => 'Es Teh Manis',
    'kategori' => 'Minuman Dingin',
    'harga' => 5000,
    'deskripsi' => 'Es teh manis yang segar.',
    'status' => 'tersedia',
],

[
    'nama_menu' => 'Es Teh Tawar',
    'kategori' => 'Minuman Dingin',
    'harga' => 3000,
    'deskripsi' => 'Es teh tawar yang menyegarkan.',
    'status' => 'tersedia',
],

[
    'nama_menu' => 'Es Jeruk',
    'kategori' => 'Minuman Dingin',
    'harga' => 7000,
    'deskripsi' => 'Es jeruk segar pilihan.',
    'status' => 'tersedia',
],

[
    'nama_menu' => 'Es Lemon Tea',
    'kategori' => 'Minuman Dingin',
    'harga' => 10000,
    'deskripsi' => 'Es teh lemon dengan rasa segar.',
    'status' => 'tersedia',
],

[
    'nama_menu' => 'Es Milo',
    'kategori' => 'Minuman Dingin',
    'harga' => 12000,
    'deskripsi' => 'Minuman Milo dingin.',
    'status' => 'tersedia',
],

[
    'nama_menu' => 'Es Ovaltine',
    'kategori' => 'Minuman Dingin',
    'harga' => 12000,
    'deskripsi' => 'Minuman Ovaltine dingin.',
    'status' => 'tersedia',
],

[
    'nama_menu' => 'Es Good Day',
    'kategori' => 'Minuman Dingin',
    'harga' => 10000,
    'deskripsi' => 'Kopi Good Day dingin.',
    'status' => 'tersedia',
],

[
    'nama_menu' => 'Es Nutrisari',
    'kategori' => 'Minuman Dingin',
    'harga' => 7000,
    'deskripsi' => 'Minuman Nutrisari dingin.',
    'status' => 'tersedia',
],

[
    'nama_menu' => 'Air Mineral',
    'kategori' => 'Minuman Dingin',
    'harga' => 5000,
    'deskripsi' => 'Air mineral kemasan.',
    'status' => 'tersedia',
],

// =========================
// MINUMAN PANAS
// =========================

[
    'nama_menu' => 'Teh Manis Hangat',
    'kategori' => 'Minuman Panas',
    'harga' => 5000,
    'deskripsi' => 'Teh manis hangat.',
    'status' => 'tersedia',
],

[
    'nama_menu' => 'Teh Tawar Hangat',
    'kategori' => 'Minuman Panas',
    'harga' => 3000,
    'deskripsi' => 'Teh tawar hangat.',
    'status' => 'tersedia',
],

[
    'nama_menu' => 'Jeruk Hangat',
    'kategori' => 'Minuman Panas',
    'harga' => 7000,
    'deskripsi' => 'Jeruk hangat segar.',
    'status' => 'tersedia',
],

[
    'nama_menu' => 'Susu Putih Hangat',
    'kategori' => 'Minuman Panas',
    'harga' => 8000,
    'deskripsi' => 'Susu putih hangat.',
    'status' => 'tersedia',
],

[
    'nama_menu' => 'Susu Coklat Hangat',
    'kategori' => 'Minuman Panas',
    'harga' => 8000,
    'deskripsi' => 'Susu coklat hangat.',
    'status' => 'tersedia',
],

[
    'nama_menu' => 'Milo Hangat',
    'kategori' => 'Minuman Panas',
    'harga' => 12000,
    'deskripsi' => 'Milo hangat.',
    'status' => 'tersedia',
],

[
    'nama_menu' => 'Ovaltine Hangat',
    'kategori' => 'Minuman Panas',
    'harga' => 12000,
    'deskripsi' => 'Ovaltine hangat.',
    'status' => 'tersedia',
],

[
    'nama_menu' => 'Good Day Hangat',
    'kategori' => 'Minuman Panas',
    'harga' => 10000,
    'deskripsi' => 'Good Day hangat.',
    'status' => 'tersedia',
],

[
    'nama_menu' => 'Kopi Hitam',
    'kategori' => 'Minuman Panas',
    'harga' => 8000,
    'deskripsi' => 'Kopi hitam hangat.',
    'status' => 'tersedia',
],

[
    'nama_menu' => 'Kopi Susu',
    'kategori' => 'Minuman Panas',
    'harga' => 10000,
    'deskripsi' => 'Kopi susu hangat.',
    'status' => 'tersedia',
],

        ]);

    }
}