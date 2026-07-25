<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Kasir - Warmindo</title>

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
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 35px;
        }

        .header h1 {
            margin: 0;
            font-size: 32px;
        }

        .header p {
            color: #777;
            margin-top: 8px;
        }

        .welcome {
            background: linear-gradient(135deg, #ffd6e8, #e8d7ff);
            padding: 25px;
            border-radius: 25px;
            margin-bottom: 30px;
        }

        .welcome h2 {
            margin: 0 0 8px;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 22px;
        }

        .card {
            padding: 25px;
            border-radius: 22px;
            min-height: 150px;
            box-shadow: 0 8px 20px rgba(100, 80, 120, 0.08);
            transition: 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card.pink {
            background: #ffd6e8;
        }

        .card.purple {
            background: #e4d7ff;
        }

        .card.yellow {
            background: #fff0bd;
        }

        .card-icon {
            font-size: 30px;
            margin-bottom: 12px;
        }

        .card h3 {
            margin: 0;
            font-size: 16px;
        }

        .number {
            font-size: 36px;
            font-weight: bold;
            margin-top: 10px;
        }

        .quick-menu {
            margin-top: 35px;
        }

        .quick-menu h2 {
            margin-bottom: 20px;
        }

        .buttons {
            display: flex;
            gap: 15px;
        }

        .btn {
            text-decoration: none;
            padding: 14px 22px;
            border-radius: 15px;
            font-weight: bold;
            transition: 0.3s;
        }

        .btn-primary {
            background: #9b7ede;
            color: white;
        }

        .btn-secondary {
            background: #ffd6e8;
            color: #704c68;
        }

        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(0,0,0,0.12);
        }

        @media (max-width: 900px) {
            .sidebar {
                width: 190px;
            }

            .main {
                margin-left: 190px;
            }

            .cards {
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

            <a href="{{ route('kasir.dashboard') }}" class="active">
                🏠 Dashboard
            </a>

            <a href="{{ route('kasir.orders') }}">
                🧾 Pesanan
            </a>

            <a href="{{ route('kasir.history') }}">
                📊 Riwayat
            </a>

        </nav>

    </aside>

    <main class="main">

        <div class="header">

            <div>
                <h1>Dashboard Kasir 👋</h1>
                <p>Selamat datang kembali, siap melayani pelanggan hari ini!</p>
            </div>

            <div>
                🧑‍🍳
            </div>

        </div>

        <div class="welcome">

            <h2>Halo, Kasir! 🍜✨</h2>

            <p>
                Kelola pesanan dan transaksi Warmindo dengan mudah di sini.
            </p>

        </div>

        <div class="cards">

            <div class="card pink">

                <div class="card-icon">
                    🧾
                </div>

                <h3>Pesanan Baru</h3>

                <div class="number">
                    {{ $pesananBaru }}
                </div>

            </div>

            <div class="card purple">

                <div class="card-icon">
                    🍳
                </div>

                <h3>Sedang Diproses</h3>

                <div class="number">
                    {{ $diproses }}
                </div>

            </div>

            <div class="card yellow">

                <div class="card-icon">
                    🎉
                </div>

                <h3>Pesanan Selesai</h3>

                <div class="number">
                    {{ $selesai }}
                </div>

            </div>

        </div>

        <div class="quick-menu">

            <h2>Akses Cepat ⚡</h2>

            <div class="buttons">

                <a
                    href="{{ route('kasir.orders') }}"
                    class="btn btn-primary"
                >
                    🧾 Lihat Pesanan
                </a>

                <a
                    href="{{ route('kasir.history') }}"
                    class="btn btn-secondary"
                >
                    📊 Riwayat Transaksi
                </a>

            </div>

        </div>

    </main>

</body>

</html>