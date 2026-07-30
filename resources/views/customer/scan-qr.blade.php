@extends('layouts.customer')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-6">

            <div class="card shadow border-0 rounded-4">

                <div class="card-body text-center p-5">

                    <h2 class="fw-bold text-success mb-4">
                        Scan QR Meja
                    </h2>

                    <p class="text-muted mb-4">
                        Silakan scan QR Code yang tersedia di meja untuk mulai melakukan pemesanan.
                    </p>

                    <img
                        src="{{ asset('images/qris-warkopmindo43.png') }}"
                        alt="QR Code"
                        class="img-fluid mb-4"
                        style="max-width:260px;">

                    <div class="d-grid gap-2">

                        <a href="{{ route('customer.index') }}"
                           class="btn btn-success btn-lg">

                            Saya Sudah Scan QR

                        </a>

                        <a href="{{ route('customer.landing') }}"
                           class="btn btn-outline-secondary">

                            Kembali

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection