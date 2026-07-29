@extends('layouts.customer')

@section('content')

<div class="container py-5">

    <div class="row align-items-center min-vh-100">

        <div class="col-lg-6">

            <h1 class="display-4 fw-bold mb-4">
                🍜 Selamat Datang di
                <span class="text-success">
                    WarkopMindo 43
                </span>
            </h1>

            <p class="lead text-muted mb-4">
                Pesan makanan dan minuman favoritmu langsung dari meja tanpa perlu menunggu pelayan.
            </p>

            <div class="d-flex gap-3">

                <a href="{{ route('customer.index') }}"
                   class="btn btn-success btn-lg">

                    Lihat Menu

                </a>

                <a href="{{ route('customer.tracking') }}"
                   class="btn btn-outline-success btn-lg">

                    Tracking Pesanan

                </a>

            </div>

        </div>

        <div class="col-lg-6 text-center">

            <img
                src="https://cdn-icons-png.flaticon.com/512/3075/3075977.png"
                class="img-fluid"
                style="max-height:420px;">

        </div>

    </div>

</div>

@endsection