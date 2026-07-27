<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Menu;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $kategoriId = $request->get('kategori');

        $query = Menu::where('status', 'tersedia');

        if ($kategoriId) {

            $kategori = Kategori::find($kategoriId);

            if ($kategori) {
                $query->where('kategori', $kategori->nama_kategori);
            }
        }

        $menus = $query->latest()->get();

        $kategoris = Kategori::orderBy('nama_kategori')->get();

        return view('customer.index', compact(
            'menus',
            'kategoris',
            'kategoriId'
        ));
    }

    public function show(Menu $menu)
    {
        return view('customer.show', compact('menu'));
    }

    public function addToCart(Request $request, Menu $menu)
    {
        $request->validate([
            'jumlah' => 'required|integer|min:1'
        ]);

        $cart = session()->get('cart', []);

        if (isset($cart[$menu->id])) {
            $cart[$menu->id]['jumlah'] += $request->jumlah;
        } else {
            $cart[$menu->id] = [
                'id' => $menu->id,
                'nama_menu' => $menu->nama_menu,
                'harga' => $menu->harga,
                'jumlah' => $request->jumlah,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->route('customer.cart')
            ->with('success', 'Menu berhasil ditambahkan ke keranjang.');
    }

    public function cart()
    {
        $cart = session()->get('cart', []);

        $total = collect($cart)->sum(function ($item) {
            return $item['harga'] * $item['jumlah'];
        });

        return view('customer.cart', compact('cart', 'total'));
    }

    public function updateCart(Request $request, $id)
    {
        $request->validate([
            'jumlah' => 'required|integer|min:1'
        ]);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['jumlah'] = $request->jumlah;
        }

        session()->put('cart', $cart);

        return back()->with('success', 'Jumlah berhasil diperbarui.');
    }

    public function removeFromCart($id)
    {
        $cart = session()->get('cart', []);

        unset($cart[$id]);

        session()->put('cart', $cart);

        return back()->with('success', 'Menu dihapus dari keranjang.');
    }
}