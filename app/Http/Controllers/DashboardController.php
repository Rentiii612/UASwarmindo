<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Kategori;

class DashboardController extends Controller
{
    public function index()
    {
        // Statistik menu
        $totalMenu = Menu::count();

        $menuTersedia = Menu::where('status', 'tersedia')->count();

        $menuHabis = Menu::where('status', 'habis')->count();

        // Statistik kategori
        $totalKategori = Kategori::count();

        // 5 menu terbaru
        $menuTerbaru = Menu::latest()
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'totalMenu',
            'totalKategori',
            'menuTersedia',
            'menuHabis',
            'menuTerbaru'
        ));
    }
}