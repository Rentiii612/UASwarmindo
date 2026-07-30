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

        body{
            background:#f8f7f4;
        }

        .navbar{
            background:#ffffff;
        }

        .hero{
            background:linear-gradient(135deg,#198754,#157347);
            color:white;
            border-radius:25px;
            padding:45px;
        }

        .menu-card{
            border:none;
            border-radius:18px;
            transition:.25s;
        }

        .menu-card:hover{
            transform:translateY(-5px);
            box-shadow:0 10px 20px rgba(0,0,0,.12);
        }

        .category-btn{
            border-radius:50px;
        }

        .price{
            font-size:19px;
            font-weight:bold;
            color:#198754;
        }

        .search-box{
            border-radius:50px;
            padding:12px 20px;
        }

        .badge-status{
            position:absolute;
            right:18px;
            top:18px;
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

        <div class="d-flex gap-2">

            <a
                href="{{ route('customer.tracking') }}"
                class="btn btn-warning">

                <i class="fa-solid fa-receipt"></i>

                Tracking

            </a>

            <a
                href="{{ route('customer.cart') }}"
                class="btn btn-dark">

                <i class="fa-solid fa-cart-shopping"></i>

                Keranjang

                @php
                    $cartCount = collect(session('cart', []))->sum('jumlah');
                @endphp

                @if($cartCount>0)

                    <span class="badge bg-danger">

                        {{ $cartCount }}

                    </span>

                @endif

            </a>

        </div>

    </div>

</nav>

<div class="container py-4">

    {{-- HERO --}}

    <div class="hero mb-4">

        <div class="row align-items-center">

            <div class="col-md-8">

                <h1 class="fw-bold">

                    Selamat Datang di Warkopmindo 43 🍜

                </h1>

                <p class="mb-0">

                    Nikmati berbagai pilihan makanan dan minuman favoritmu.

                </p>

            </div>

            <div class="col-md-4 text-end">

                <i class="fa-solid fa-bowl-food"
                   style="font-size:70px;"></i>

            </div>

        </div>

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

    {{-- PROMO --}}

<div class="alert alert-warning border-0 shadow-sm mb-4">

    <div class="row align-items-center">

        <div class="col-md-9">

            <h5 class="fw-bold mb-1">
                🎉 Promo Hari Ini
            </h5>

            <p class="mb-0">
                Gratis Es Teh untuk pembelian minimal Rp30.000.
            </p>

        </div>

        <div class="col-md-3 text-end">

            <span class="badge bg-danger fs-6">
                PROMO
            </span>

        </div>

    </div>

</div>

    {{-- SEARCH --}}

    <form
        action="{{ route('customer.index') }}"
        method="GET"
        class="mb-4">

        @if($kategoriId)

            <input
                type="hidden"
                name="kategori"
                value="{{ $kategoriId }}">

        @endif

        <div class="input-group">

            <input
                type="text"
                name="search"
                class="form-control search-box"
                placeholder="Cari menu..."

                value="{{ $search ?? '' }}">

            <button
                class="btn btn-success">

                <i class="fa-solid fa-magnifying-glass"></i>

                Cari

            </button>

        </div>

    </form>

    {{-- KATEGORI --}}

    <div class="mb-4">

        <h4 class="fw-bold">

            Kategori

        </h4>

        <div class="d-flex flex-wrap gap-2 mt-3">

            <a
                href="{{ route('customer.index') }}"
                class="btn category-btn {{ !$kategoriId ? 'btn-dark' : 'btn-outline-dark' }}">

                Semua

            </a>

            @foreach($kategoris as $kategori)

                <a
                    href="{{ route('customer.index',[
                        'kategori'=>$kategori->id,
                        'search'=>$search
                    ]) }}"
                    class="btn category-btn
                    {{ $kategoriId==$kategori->id ? 'btn-dark':'btn-outline-dark' }}">

                    {{ $kategori->nama_kategori }}

                </a>

            @endforeach

        </div>

    </div>

    {{-- MENU --}}

    <div class="row g-4">
        @forelse($menus as $menu)

<div class="col-md-6 col-lg-4">

    <div class="card menu-card shadow-sm h-100 position-relative">

        <span class="badge bg-success badge-status">

            Tersedia

        </span>

        <div class="card-body d-flex flex-column p-4">

            <span class="badge bg-light text-dark mb-3 align-self-start">

                {{ $menu->kategori }}

            </span>

            <h5 class="fw-bold">

                {{ $menu->nama_menu }}

            </h5>

            <p class="text-muted flex-grow-1">

                {{ $menu->deskripsi ?: 'Menu favorit Warmindo.' }}

            </p>

            <div class="mb-3">

                <span class="price">

                    Rp {{ number_format($menu->harga,0,',','.') }}

                </span>

            </div>

            <div class="d-grid gap-2">

                <a
                    href="{{ route('customer.menu.show',$menu) }}"
                    class="btn btn-outline-success">

                    <i class="fa-solid fa-eye"></i>

                    Lihat Detail

                </a>

                <form
                    action="{{ route('customer.cart.add',$menu) }}"
                    method="POST">

                    @csrf

                    <input
                        type="hidden"
                        name="jumlah"
                        value="1">

                    <button
                        class="btn btn-success w-100">

                        <i class="fa-solid fa-cart-plus"></i>

                        Tambah ke Keranjang

                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

@empty

<div class="col-12">

    <div class="card shadow">

        <div class="card-body text-center py-5">

            <div class="display-1">

                🍜

            </div>

            <h3 class="mt-3">

                Menu Tidak Ditemukan

            </h3>

            <p class="text-muted">

                Coba gunakan kata kunci lain atau pilih kategori yang berbeda.

            </p>

            <a
                href="{{ route('customer.index') }}"
                class="btn btn-success">

                Lihat Semua Menu

            </a>

        </div>

    </div>

</div>

@endforelse

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>