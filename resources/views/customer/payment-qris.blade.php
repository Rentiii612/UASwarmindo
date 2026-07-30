@extends('layouts.customer')

@section('content')

<div class="container py-5">

    <div class="card shadow">

        <div class="card-header bg-success text-white">

            <h4 class="mb-0">
                Pembayaran QRIS
            </h4>

        </div>

        <div class="card-body text-center">

            <h5 class="mb-3">
                Silakan scan QRIS di bawah ini
            </h5>

            <img
                src="{{ asset('images/qris-warkopmindo43.png') }}"
                alt="QRIS"
                class="img-fluid mb-4"
                style="max-width:300px;">

            <h4 class="text-success">
                Total Pembayaran
            </h4>

            <h2 class="fw-bold">
                Rp {{ number_format($order->total_amount,0,',','.') }}
            </h2>

            <p class="text-muted mt-3">
                Setelah melakukan pembayaran, tunjukkan bukti pembayaran kepada kasir.
            </p>

            <a href="{{ route('customer.tracking') }}"
               class="btn btn-success mt-3">

                Lihat Status Pesanan

            </a>

        </div>

    </div>

</div>

@endsection