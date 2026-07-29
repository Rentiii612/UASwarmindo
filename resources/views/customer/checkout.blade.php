@extends('layouts.customer')

@section('content')

<div class="container py-4">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card shadow border-0 rounded-4">

                <div class="card-body p-4">

                    <h2 class="fw-bold mb-4 text-success">

                        Checkout Pesanan

                    </h2>

                    <form action="{{ route('customer.processCheckout') }}" method="POST">

                        @csrf

                        {{-- Nama --}}

                        <div class="mb-3">

                            <label class="form-label fw-semibold">

                                Nama Pelanggan

                            </label>

                            <input
                                type="text"
                                name="nama_pelanggan"
                                class="form-control"
                                placeholder="Masukkan nama"
                                required>

                        </div>

                        {{-- Nomor Meja --}}

                        <div class="mb-3">

                            <label class="form-label fw-semibold">

                                Nomor Meja

                            </label>

                            <input
                                type="text"
                                name="nomor_meja"
                                class="form-control"
                                placeholder="Contoh : A1"
                                required>

                        </div>

                        {{-- Catatan --}}

                        <div class="mb-4">

                            <label class="form-label fw-semibold">

                                Catatan

                            </label>

                            <textarea
                                name="catatan"
                                class="form-control"
                                rows="3"
                                placeholder="Opsional"></textarea>

                        </div>

                        <hr>

                        {{-- METODE PEMBAYARAN --}}

                        <h5 class="fw-bold mb-3">

                            Metode Pembayaran

                        </h5>

                        <div class="form-check mb-3">

                            <input
                                class="form-check-input"
                                type="radio"
                                name="payment_method"
                                id="cash"
                                value="cash"
                                checked>

                            <label
                                class="form-check-label"
                                for="cash">

                                Cash (Bayar di Kasir)

                            </label>

                        </div>

                        <div class="form-check mb-4">

                            <input
                                class="form-check-input"
                                type="radio"
                                name="payment_method"
                                id="qris"
                                value="qris">

                            <label
                                class="form-check-label"
                                for="qris">

                                QRIS (Scan QR Code)

                            </label>

                        </div>

                        <hr>

                        <div class="d-flex justify-content-between align-items-center">

                            <div>

                                <small class="text-muted">

                                    Total Pembayaran

                                </small>

                                <h3 class="text-success fw-bold mb-0">

                                    Rp {{ number_format($total,0,',','.') }}

                                </h3>

                            </div>

                            <button
                                class="btn btn-success btn-lg">

                                Buat Pesanan

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection