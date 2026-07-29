<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Menampilkan halaman pembayaran kasir
     */
    public function index($id)
    {
        $order = Order::with('items.menu')->findOrFail($id);

        return view('kasir.payment', compact('order'));
    }

    /**
     * Menyimpan pembayaran
     */
    public function store(Request $request, $id)
    {
        $request->validate([
            'payment_method' => 'required|in:cash,qris,transfer',
            'amount_paid'    => 'required|numeric|min:0',
        ]);

        $order = Order::findOrFail($id);

        if ($request->amount_paid < $order->total_amount) {
            return back()->withErrors([
                'amount_paid' => 'Jumlah pembayaran kurang.'
            ])->withInput();
        }

        // Simpan metode pembayaran
        $order->payment_method = $request->payment_method;

        // Ubah status pesanan menjadi selesai
        $order->status = 'completed';

        $order->save();

        return redirect()
            ->route('kasir.orders')
            ->with('success', 'Pembayaran berhasil diproses.');
    }
}