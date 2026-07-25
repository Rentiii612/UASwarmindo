<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pesanan - Warmindo</title>

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

        .order-card {
            background: white;
            padding: 25px;
            margin-bottom: 20px;
            border-radius: 22px;
            box-shadow: 0 8px 20px rgba(100, 80, 120, 0.08);
        }

        .order-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #eee;
            padding-bottom: 15px;
        }

        .order-header h2 {
            margin: 0;
        }

        .status {
            padding: 8px 15px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: bold;
        }

        .status-pending {
            background: #fff0bd;
            color: #8a6d1d;
        }

        .status-processing {
            background: #dcd0ff;
            color: #654bb5;
        }

        .status-completed {
            background: #d5f5e3;
            color: #277a4b;
        }

        .order-info {
            margin-top: 18px;
        }

        .order-info p {
            margin: 10px 0;
        }

        .btn-payment {
            display: inline-block;
            margin-top: 15px;
            padding: 12px 20px;
            background: #9b7ede;
            color: white;
            text-decoration: none;
            border-radius: 14px;
            transition: 0.3s;
        }

        .btn-payment:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(0,0,0,0.12);
        }

        .empty {
            background: linear-gradient(135deg, #ffd6e8, #e8d7ff);
            padding: 45px;
            text-align: center;
            border-radius: 25px;
        }

        .empty-icon {
            font-size: 55px;
        }

        @media (max-width: 900px) {
            .sidebar {
                width: 190px;
            }

            .main {
                margin-left: 190px;
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

            <h1>Daftar Pesanan 🧾</h1>

            <p>
                Kelola semua pesanan pelanggan Warmindo di sini 🍜✨
            </p>

        </div>

        @forelse($orders as $order)

            <div class="order-card">

                <div class="order-header">

                    <h2>
                        Pesanan #{{ $order->order_number }}
                    </h2>

                    @if($order->status == 'pending')

                        <span class="status status-pending">
                            ⏳ Menunggu

                        </span>

                    @elseif($order->status == 'processing')

                        <span class="status status-processing">
                            🍳 Diproses
                        </span>

                    @else

                        <span class="status status-completed">
                            ✅ Selesai
                        </span>

                    @endif

                </div>

                <div class="order-info">

                    <p>
                        🪑 <strong>Meja:</strong>
                        {{ $order->table_number ?? '-' }}
                    </p>

                    <p>
                        💰 <strong>Total:</strong>
                        Rp {{ number_format($order->total_amount, 0, ',', '.') }}
                    </p>

                    <p>
                        🕒 <strong>Dibuat:</strong>
                        {{ $order->created_at->format('d/m/Y H:i') }}
                    </p>

                    @if($order->status != 'completed')

                        <a
                            href="{{ route('kasir.payment', $order->id) }}"
                            class="btn-payment"
                        >
                            💳 Proses Pembayaran
                        </a>

                    @endif

                </div>

            </div>

        @empty

            <div class="empty">

                <div class="empty-icon">
                    🍜
                </div>

                <h2>Belum Ada Pesanan</h2>

                <p>
                    Pesanan pelanggan akan muncul di halaman ini.
                </p>

            </div>

        @endforelse

    </main>

</body>

</html>