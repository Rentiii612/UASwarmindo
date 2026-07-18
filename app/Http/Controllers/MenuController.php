<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    // Menampilkan daftar menu
    public function index()
    {
        $menus = Menu::all();

        return view('menu.index', compact('menus'));
    }

    // Menampilkan form tambah menu
    public function create()
    {
        return view('menu.create');
    }

    // Menyimpan menu baru
    public function store(Request $request)
    {

    }
}