@extends('layouts.customer')

@section('content')

<div class="container py-5">

    <div class="row align-items-center min-vh-100">

        <div class="col-lg-6">

            <span class="badge bg-success mb-3 fs-6">
                🍜 Selamat Datang
            </span>

            <h1 class="display-4 fw-bold mb-4">
                WarkopMindo  <span class="text-success">43</span>
            </h1>

            <p class="lead text-muted mb-4">
                Nikmati pengalaman memesan makanan dan minuman langsung dari meja
                hanya dengan melakukan scan QR Code. Praktis, cepat, dan tanpa
                perlu menunggu pelayan.
            </p>

            <div class="d-flex flex-wrap gap-3 mb-4">

                <a href="{{ route('customer.scan.qr') }}"
                   class="btn btn-success btn-lg px-4">

                    Scan QR Sekarang

                </a>

                <a href="{{ route('customer.tracking') }}"
                   class="btn btn-outline-success btn-lg px-4">

                    Tracking Pesanan

                </a>

            </div>

            <div class="row mt-5">

                <div class="col-4 text-center">

                    <h3 class="fw-bold text-success">
                        
                    </h3>

                    <small class="text-muted">
                        Menu Lengkap
                    </small>

                </div>

                <div class="col-4 text-center">

                    <h3 class="fw-bold text-success">
                        
                    </h3>

                    <small class="text-muted">
                        Pesan Cepat
                    </small>

                </div>

                <div class="col-4 text-center">

                    <h3 class="fw-bold text-success">
                        💳
                    </h3>

                    <small class="text-muted">
                        Cash & QRIS
                    </small>

                </div>

            </div>

        </div>

        <div class="col-lg-6 text-center">

            <img
                src="https://cdn-icons-png.flaticon.com/512/3075/3075977.png"
                alt="Warmindo"
                class="img-fluid"
                style="max-height:450px;">

            <div class="mt-4">

                <div class="alert alert-success shadow-sm">

                    <h5 class="mb-2">
                        Cara Memesan
                    </h5>

                    <ol class="text-start mb-0">

                        <li>Scan QR Code di meja.</li>

                        <li>Pilih menu favorit.</li>

                        <li>Masukkan ke keranjang.</li>

                        <li>Checkout dan pilih pembayaran.</li>

                        <li>Tunggu pesanan diantar.</li>

                    </ol>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection