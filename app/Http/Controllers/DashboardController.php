<?php

namespace App\Http\Controllers;

use App\Models\Menu;

class DashboardController extends Controller
{
    public function index()
    {
        $totalMenu = Menu::count();

        $menuTersedia = Menu::where('status', 'tersedia')->count();

        $menuHabis = Menu::where('status', 'habis')->count();

        $menuTerbaru = Menu::latest()->take(5)->get();

        return view('dashboard', compact(
            'totalMenu',
            'menuTersedia',
            'menuHabis',
            'menuTerbaru'
        ));
    }
}