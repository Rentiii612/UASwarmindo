@extends('layouts.admin')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h2 class="fw-bold mb-1">
            Dashboard
        </h2>

        <p class="text-muted mb-0">
            Selamat datang di Admin Panel Warmindo 👑
        </p>
    </div>

</div>


{{-- STATISTIK --}}

<div class="row g-4 mb-4">

    {{-- Total Menu --}}

    <div class="col-md-6 col-xl-3">

        <div class="card border-0 shadow-sm h-100">

            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <p class="text-muted mb-1">
                            Total Menu
                        </p>

                        <h2 class="fw-bold mb-0">
                            {{ $totalMenu }}
                        </h2>

                    </div>

                    <div class="fs-1">
                        🍜
                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- Total Kategori --}}

    <div class="col-md-6 col-xl-3">

        <div class="card border-0 shadow-sm h-100">

            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <p class="text-muted mb-1">
                            Total Kategori
                        </p>

                        <h2 class="fw-bold mb-0">
                            {{ $totalKategori }}
                        </h2>

                    </div>

                    <div class="fs-1">
                        📂
                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- Menu Tersedia --}}

    <div class="col-md-6 col-xl-3">

        <div class="card border-0 shadow-sm h-100">

            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <p class="text-muted mb-1">
                            Menu Tersedia
                        </p>

                        <h2 class="fw-bold text-success mb-0">
                            {{ $menuTersedia }}
                        </h2>

                    </div>

                    <div class="fs-1">
                        ✅
                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- Menu Habis --}}

    <div class="col-md-6 col-xl-3">

        <div class="card border-0 shadow-sm h-100">

            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <p class="text-muted mb-1">
                            Menu Habis
                        </p>

                        <h2 class="fw-bold text-danger mb-0">
                            {{ $menuHabis }}
                        </h2>

                    </div>

                    <div class="fs-1">
                        ❌
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>


{{-- MENU TERBARU --}}

<div class="card border-0 shadow-sm">

    <div class="card-header bg-white border-0 pt-4 px-4">

        <div class="d-flex justify-content-between align-items-center">

            <div>

                <h4 class="fw-bold mb-1">
                    🍜 Menu Terbaru
                </h4>

                <p class="text-muted mb-0">
                    5 menu yang terakhir ditambahkan
                </p>

            </div>

            <a
                href="{{ route('menu.index') }}"
                class="btn btn-dark"
            >
                Lihat Semua
            </a>

        </div>

    </div>


    <div class="card-body px-4">

        <div class="table-responsive">

            <table class="table align-middle">

                <thead>

                    <tr>

                        <th>No</th>

                        <th>Nama Menu</th>

                        <th>Kategori</th>

                        <th>Harga</th>

                        <th>Status</th>

                    </tr>

                </thead>


                <tbody>

                    @forelse($menuTerbaru as $menu)

                        <tr>

                            <td>
                                {{ $loop->iteration }}
                            </td>

                            <td>

                                <strong>
                                    {{ $menu->nama_menu }}
                                </strong>

                            </td>

                            <td>

                                <span class="badge bg-light text-dark">

                                    {{ $menu->kategori }}

                                </span>

                            </td>

                            <td>

                                Rp {{ number_format($menu->harga, 0, ',', '.') }}

                            </td>

                            <td>

                                @if($menu->status === 'tersedia')

                                    <span class="badge bg-success">
                                        Tersedia
                                    </span>

                                @else

                                    <span class="badge bg-danger">
                                        Habis
                                    </span>

                                @endif

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="5" class="text-center py-4">

                                <div class="text-muted">

                                    <div class="fs-1">
                                        🍜
                                    </div>

                                    Belum ada menu.

                                </div>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection