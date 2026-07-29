<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Menu;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $kategoriId = $request->get('kategori');
        $search = $request->get('search');

        $query = Menu::whereRaw('LOWER(status) = ?', ['tersedia']);

        // Filter kategori
        if ($kategoriId) {

            $kategori = Kategori::find($kategoriId);

            if ($kategori) {
                $query->where('kategori', $kategori->nama_kategori);
            }
        }

        // Search
        if ($search) {

            $query->where(function ($q) use ($search) {

                $q->where('nama_menu', 'like', '%' . $search . '%')
                  ->orWhere('kategori', 'like', '%' . $search . '%')
                  ->orWhere('deskripsi', 'like', '%' . $search . '%');

            });

        }

        $menus = $query->latest()->get();

        $kategoris = Kategori::orderBy('nama_kategori')->get();

        return view('customer.index', compact(
            'menus',
            'kategoris',
            'kategoriId',
            'search'
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

        if (isset($cart[$id])) {
            unset($cart[$id]);
        }

        session()->put('cart', $cart);

        return back()->with('success', 'Menu dihapus dari keranjang.');
    }

    public function checkout()
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('customer.cart')
                ->with('error', 'Keranjang masih kosong.');
        }

        $total = collect($cart)->sum(function ($item) {
            return $item['harga'] * $item['jumlah'];
        });

        return view('customer.checkout', compact('cart', 'total'));
    }

    public function processCheckout(Request $request)
    {
        $request->validate([
            'nama_pelanggan' => 'required|string|max:100',
            'nomor_meja' => 'required|string|max:20',
            'catatan' => 'nullable|string',
        ]);

        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('customer.cart')
                ->with('error', 'Keranjang masih kosong.');
        }

        $total = collect($cart)->sum(function ($item) {
            return $item['harga'] * $item['jumlah'];
        });

        DB::beginTransaction();

        try {

            $order = Order::create([
                'order_number' => 'ORD' . date('YmdHis'),
                'table_number' => $request->nomor_meja,
                'total_amount' => $total,
                'status' => 'pending',
                'notes' => "Pelanggan : {$request->nama_pelanggan}\nCatatan : " . ($request->catatan ?: '-')
            ]);

            foreach ($cart as $item) {

                OrderItem::create([
                    'order_id' => $order->id,
                    'menu_id' => $item['id'],
                    'quantity' => $item['jumlah'],
                    'price' => $item['harga'],
                    'subtotal' => $item['harga'] * $item['jumlah']
                ]);

            }

            DB::commit();

            session()->forget('cart');

            return redirect()
                ->route('customer.tracking.detail', $order->id)
                ->with('success', 'Pesanan berhasil dibuat.');

        } catch (\Exception $e) {

            DB::rollBack();

            return back()->with('error', $e->getMessage());

        }
    }

    public function tracking()
    {
        $orders = Order::latest()->paginate(10);

        return view('customer.tracking', compact('orders'));
    }

    public function trackingDetail(Order $order)
    {
        $order->load('items.menu');

        return view('customer.tracking-detail', compact('order'));
    }
}