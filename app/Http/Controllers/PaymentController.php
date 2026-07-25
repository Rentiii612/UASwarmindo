<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pembayaran - Warmindo</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background: #fff7fb;
            color: #3f3d56;
        }

        .sidebar {
            position: fixed;
            width: 240px;
            height: 100vh;
            background: linear-gradient(180deg, #9b7ede, #c8a7e9);
            padding: 30px 20px;
            color: white;
        }

        .logo {
            text-align: center;
            margin-bottom: 40px;
        }

        .logo h2 {
            margin: 0;
            font-size: 25px;
        }

        .logo p {
            font-size: 13px;
            opacity: 0.9;
        }

        .menu {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .menu a {
            text-decoration: none;
            color: white;
            padding: 14px 18px;
            border-radius: 14px;
            transition: 0.3s;
        }

        .menu a:hover,
        .menu a.active {
            background: rgba(255,255,255,0.3);
            transform: translateX(5px);
        }

        .main {
            margin-left: 240px;
            padding: 40px;
            max-width: 1100px;
        }

        .header {
            margin-bottom: 30px;
        }

        .header h1 {
            margin: 0;
            font-size: 32px;
        }

        .header p {
            color: #777;
        }

        .payment-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 25px;
        }

        .card {
            background: white;
            padding: 28px;
            border-radius: 24px;
            box-shadow: 0 8px 20px rgba(100, 80, 120, 0.08);
        }

        .card h2 {
            margin-top: 0;
            margin-bottom: 22px;
        }

        .order-info {
            background: linear-gradient(135deg, #ffd6e8, #e8d7ff);
            padding: 20px;
            border-radius: 18px;
            margin-bottom: 20px;
        }

        .order-info p {
            margin: 10px 0;
        }

        .order-items {
            margin-top: 20px;
        }

        .item {
            display: flex;
            justify-content: space-between;
            padding: 12px 0;
            border-bottom: 1px solid #eee;
        }

        .total {
            display: flex;
            justify-content: space-between;
            font-size: 20px;
            font-weight: bold;
            margin-top: 20px;
            color: #7659c8;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 13px;
            border: 2px solid #eee;
            border-radius: 12px;
            font-size: 15px;
            outline: none;
        }

        .form-group input:focus,
        .form-group select:focus {
            border-color: #9b7ede;
        }

        .btn {
            width: 100%;
            padding: 15px;
            border: none;
            border-radius: 15px;
            background: #9b7ede;
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(0,0,0,0.12);
        }

        .back {
            display: inline-block;
            margin-top: 15px;
            text-decoration: none;
            color: #7659c8;
        }

        .error {
            color: #d9534f;
            font-size: 13px;
            margin-top: 5px;
        }

        @media (max-width: 900px) {
            .sidebar {
                width: 190px;
            }

            .main {
                margin-left: 190px;
            }

            .payment-container {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

    <aside class="sidebar">

        <div class="logo">
            <h2>🍜 Warmindo</h2>
            <p>Kasir Dashboard</p>
        </div>

        <nav class="menu">

            <a href="{{ route('kasir.dashboard') }}">
                🏠 Dashboard
            </a>

            <a href="{{ route('kasir.orders') }}" class="active">
                🧾 Pesanan
            </a>

            <a href="{{ route('kasir.history') }}">
                📊 Riwayat
            </a>

        </nav>

    </aside>

    <main class="main">

        <div class="header">

            <h1>Pembayaran 💳</h1>

            <p>
                Selesaikan pembayaran pesanan pelanggan 🍜✨
            </p>

        </div>

        <div class="payment-container">

            <div class="card">

                <h2>🧾 Detail Pesanan</h2>

                <div class="order-info">

                    <p>
                        <strong>Nomor Pesanan:</strong>
                        #{{ $order->order_number }}
                    </p>

                    <p>
                        <strong>Nomor Meja:</strong>
                        {{ $order->table_number ?? '-' }}
                    </p>

                    <p>
                        <strong>Status:</strong>
                        {{ ucfirst($order->status) }}
                    </p>

                </div>

                <div class="order-items">

                    <h3>🍜 Daftar Menu</h3>

                    @foreach($order->items as $item)

                        <div class="item">

                            <span>
                                {{ $item->menu->nama_menu ?? 'Menu' }}
                                x{{ $item->quantity }}
                            </span>

                            <strong>
                                Rp {{ number_format($item->subtotal, 0, ',', '.') }}
                            </strong>

                        </div>

                    @endforeach

                </div>

                <div class="total">

                    <span>Total Pembayaran</span>

                    <span>
                        Rp {{ number_format($order->total_amount, 0, ',', '.') }}
                    </span>

                </div>

            </div>

            <div class="card">

                <h2>💰 Form Pembayaran</h2>

                <form
                    action="{{ route('kasir.payment.store', $order->id) }}"
                    method="POST"
                >

                    @csrf

                    <div class="form-group">

                        <label for="payment_method">
                            💳 Metode Pembayaran
                        </label>

                        <select
                            name="payment_method"
                            id="payment_method"
                            required
                        >

                            <option value="">
                                -- Pilih Metode Pembayaran --
                            </option>

                            <option value="cash">
                                💵 Cash
                            </option>

                            <option value="qris">
                                📱 QRIS
                            </option>

                            <option value="transfer">
                                🏦 Transfer
                            </option>

                        </select>

                        @error('payment_method')

                            <div class="error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>

                    <div class="form-group">

                        <label for="amount_paid">
                            💵 Jumlah Dibayar
                        </label>

                        <input
                            type="number"
                            name="amount_paid"
                            id="amount_paid"
                            min="0"
                            placeholder="Masukkan jumlah pembayaran"
                            required
                        >

                        @error('amount_paid')

                            <div class="error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>

                    <button
                        type="submit"
                        class="btn"
                    >
                        ✅ Konfirmasi Pembayaran
                    </button>

                </form>

                <a
                    href="{{ route('kasir.orders') }}"
                    class="back"
                >
                    ← Kembali ke Daftar Pesanan
                </a>

            </div>

        </div>

    </main>

</body>

</html>