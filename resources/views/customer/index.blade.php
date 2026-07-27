<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Warmindo - Menu</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>

        body {
            background: #f8f7f4;
        }

        .navbar {
            background: #ffffff;
        }

        .hero {
            background: #212529;
            color: white;
            border-radius: 24px;
            padding: 45px;
        }

        .menu-card {
            border: none;
            border-radius: 20px;
            transition: .2s;
        }

        .menu-card:hover {
            transform: translateY(-4px);
        }

        .category-btn {
            border-radius: 50px;
        }

        .price {
            font-weight: 700;
            font-size: 18px;
        }

    </style>

</head>

<body>

<nav class="navbar shadow-sm py-3">

    <div class="container">

        <a
            href="{{ route('customer.index') }}"
            class="navbar-brand fw-bold">

            🍜 Warmindo

        </a>

        <a
            href="{{ route('customer.cart') }}"
            class="btn btn-dark">

            <i class="fa-solid fa-cart-shopping"></i>

            Keranjang

            @php
                $cartCount = collect(session('cart', []))->sum('jumlah');
            @endphp

            @if($cartCount > 0)

                <span class="badge bg-danger">
                    {{ $cartCount }}
                </span>

            @endif

        </a>

    </div>

</nav>


<div class="container py-4">

    {{-- HERO --}}

    <div class="hero mb-4">

        <h1 class="fw-bold">
            Selamat Datang di Warmindo 🍜
        </h1>

        <p class="mb-0">
            Pilih makanan dan minuman favoritmu.
        </p>

    </div>


    {{-- ALERT --}}

    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif


    @if(session('error'))

        <div class="alert alert-danger">
            {{ session('error') }}
        </div>

    @endif


    {{-- KATEGORI --}}

    <div class="mb-4">

        <h4 class="fw-bold mb-3">
            Kategori
        </h4>

        <div class="d-flex flex-wrap gap-2">

            <a
                href="{{ route('customer.index') }}"
                class="btn category-btn
                    {{ !$kategoriId ? 'btn-dark' : 'btn-outline-dark' }}">

                Semua

            </a>

            @foreach($kategoris as $kategori)

                <a
                    href="{{ route('customer.index', ['kategori' => $kategori->id]) }}"
                    class="btn category-btn
                        {{ $kategoriId == $kategori->id
                            ? 'btn-dark'
                            : 'btn-outline-dark' }}">

                    {{ $kategori->nama_kategori }}

                </a>

            @endforeach

        </div>

    </div>


    {{-- MENU --}}

    <div class="row g-4">

        @forelse($menus as $menu)

            <div class="col-md-6 col-lg-4">

                <div class="card menu-card shadow-sm h-100">

                    <div class="card-body p-4">

                        <span class="badge bg-light text-dark mb-3">

                            {{ $menu->kategori }}

                        </span>

                        <h5 class="fw-bold">
                            {{ $menu->nama_menu }}
                        </h5>

                        <p class="text-muted">

                            {{ $menu->deskripsi ?? 'Menu favorit Warmindo.' }}

                        </p>

                        <div class="d-flex justify-content-between align-items-center mt-4">

                            <span class="price">

                                Rp {{ number_format($menu->harga, 0, ',', '.') }}

                            </span>

                            <a
                                href="{{ route('customer.menu.show', $menu) }}"
                                class="btn btn-dark">

                                Lihat

                            </a>

                        </div>

                    </div>

                </div>

            </div>

        @empty

            <div class="col-12">

                <div class="text-center py-5">

                    <div class="display-3">
                        🍜
                    </div>

                    <h4 class="mt-3">
                        Belum ada menu
                    </h4>

                    <p class="text-muted">
                        Menu untuk kategori ini belum tersedia.
                    </p>

                </div>

            </div>

        @endforelse

    </div>

</div>

</body>
</html> 