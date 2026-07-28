@extends('layouts.admin')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1">📊 Laporan Admin</h2>
        <p class="text-muted mb-0">
            Ringkasan data menu dan kategori Warmindo.
        </p>
    </div>

    <button onclick="window.print()" class="btn btn-dark">
        🖨️ Cetak Laporan
    </button>
</div>

<div class="row g-4 mb-4">

    <div class="col-md-3">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <p class="text-muted mb-1">Total Menu</p>
                <h2 class="fw-bold">{{ $totalMenu }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <p class="text-muted mb-1">Menu Tersedia</p>
                <h2 class="fw-bold text-success">
                    {{ $menuTersedia }}
                </h2>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <p class="text-muted mb-1">Menu Habis</p>
                <h2 class="fw-bold text-danger">
                    {{ $menuHabis }}
                </h2>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <p class="text-muted mb-1">Total Kategori</p>
                <h2 class="fw-bold">
                    {{ $totalKategori }}
                </h2>
            </div>
        </div>
    </div>

</div>

<div class="card shadow-sm border-0">

    <div class="card-header bg-white py-3">
        <h5 class="mb-0 fw-bold">
            📋 Daftar Menu
        </h5>
    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-hover align-middle">

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

                    @forelse($menus as $menu)

                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            <td class="fw-semibold">
                                {{ $menu->nama_menu }}
                            </td>

                            <td>
                                {{ $menu->kategori }}
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
                            <td colspan="5"
                                class="text-center text-muted py-4">
                                Belum ada data menu.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

<style>
@media print {

    .sidebar,
    nav,
    .btn,
    form {
        display: none !important;
    }

    body {
        background: white !important;
    }

}
</style>

@endsection