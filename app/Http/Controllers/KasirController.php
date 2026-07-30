<?php

namespace App\Http\Controllers;

use App\Models\Order;

class KasirController extends Controller
{
    public function dashboard()
    {
        $pesananBaru = Order::where('status', 'pending')->count();
        $diproses = Order::where('status', 'processing')->count();
        $selesai = Order::where('status', 'completed')->count();

        return view('kasir.dashboard', compact(
            'pesananBaru',
            'diproses',
            'selesai'
        ));
    }

    public function orders()
    {
        $orders = Order::with('items.menu')
            ->whereIn('status', ['pending', 'processing'])
            ->latest()
            ->get();

        return view('kasir.orders', compact('orders'));
    }

    public function history()
    {
        $orders = Order::with('payment')
            ->where('status', 'completed')
            ->latest()
            ->get();

        return view('kasir.history', compact('orders'));
    }

    public function laporan()
{
    $orders = Order::with(['items', 'payment'])
        ->latest()
        ->get();

    $totalPesanan = $orders->count();

    $totalPendapatan = $orders->sum('total_amount');

    $menuTerjual = $orders->sum(function ($order) {
        return $order->total_item;
    });

    return view('kasir.laporan', compact(
        'orders',
        'totalPesanan',
        'totalPendapatan',
        'menuTerjual'
    ));
}
}