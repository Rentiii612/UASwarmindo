<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Kategori;

class ReportController extends Controller
{
    public function index()
    {
        $totalMenu = Menu::count();

        $menuTersedia = Menu::where('status', 'tersedia')->count();

        $menuHabis = Menu::where('status', 'habis')->count();

        $totalKategori = Kategori::count();

        $menus = Menu::latest()->get();

        return view('report.index', compact(
            'totalMenu',
            'menuTersedia',
            'menuHabis',
            'totalKategori',
            'menus'
        ));
    }
}