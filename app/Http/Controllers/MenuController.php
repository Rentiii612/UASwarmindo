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
        $request->validate([
            'nama_menu' => 'required',
            'kategori' => 'required',
            'harga' => 'required|numeric',
            'deskripsi' => 'nullable',
            'status' => 'required',
        ]);

        Menu::create([
            'nama_menu' => $request->nama_menu,
            'kategori' => $request->kategori,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'status' => $request->status,
        ]);

        return redirect()->route('menu.index')
            ->with('success', 'Menu berhasil ditambahkan.');
    }
}