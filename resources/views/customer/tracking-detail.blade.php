@extends('layouts.customer')

@section('content')

<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2 class="fw-bold text-success">
            Detail Pesanan
        </h2>

        <a href="{{ route('customer.tracking') }}"
            class="btn btn-outline-success">

            ← Kembali

        </a>

    </div>

    <div class="card shadow border-0 rounded-4">

        <div class="card-body p-4">

            <div class="row">

                <div class="col-md-6">

                    <h5 class="fw-bold mb-3">
                        Informasi Pesanan
                    </h5>

                    <table class="table table-borderless">

                        <tr>
                            <td width="170"><strong>No Pesanan</strong></td>
                            <td>{{ $order->order_number }}</td>
                        </tr>

                        <tr>
                            <td><strong>Nomor Meja</strong></td>
                            <td>{{ $order->table_number }}</td>
                        </tr>

                        <tr>
                            <td><strong>Tanggal</strong></td>
                            <td>{{ $order->created_at->format('d M Y H:i') }}</td>
                        </tr>

                        <tr>
                            <td><strong>Metode Bayar</strong></td>
                            <td>

                                @if($order->payment_method=="cash")

                                    <span class="badge bg-primary">
                                        Cash
                                    </span>

                                @elseif($order->payment_method=="qris")

                                    <span class="badge bg-success">
                                        QRIS
                                    </span>

                                @else

                                    -

                                @endif

                            </td>
                        </tr>

                    </table>

                </div>

                <div class="col-md-6">

                    <h5 class="fw-bold mb-3">
                        Status Pesanan
                    </h5>

                    @if($order->status=="pending")

                        <span class="badge bg-warning text-dark fs-6">
                            Menunggu Konfirmasi
                        </span>

                    @elseif($order->status=="processing")

                        <span class="badge bg-primary fs-6">
                            Sedang Diproses
                        </span>

                    @elseif($order->status=="completed")

                        <span class="badge bg-success fs-6">
                            Pesanan Selesai
                        </span>

                    @else

                        <span class="badge bg-danger fs-6">
                            Dibatalkan
                        </span>

                    @endif

                    <div class="mt-4">

                        <strong>Catatan</strong>

                        <div class="border rounded-3 p-3 mt-2 bg-light">

                            {!! nl2br(e($order->notes ?? '-')) !!}

                        </div>

                    </div>

                </div>

            </div>

            <hr class="my-4">

            <h4 class="fw-bold mb-3">

                Daftar Menu

            </h4>

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-success">

                        <tr>

                            <th>Menu</th>

                            <th width="90">Qty</th>

                            <th width="150">Harga</th>

                            <th width="170">Subtotal</th>

                        </tr>

                    </thead>

                    <tbody>

                    @foreach($order->items as $item)

                        <tr>

                            <td>

                                {{ $item->menu->nama_menu }}

                            </td>

                            <td>

                                {{ $item->quantity }}

                            </td>

                            <td>

                                Rp {{ number_format($item->price,0,',','.') }}

                            </td>

                            <td>

                                <strong>

                                    Rp {{ number_format($item->subtotal,0,',','.') }}

                                </strong>

                            </td>

                        </tr>

                    @endforeach

                    </tbody>

                </table>

            </div>

            <div class="card bg-success text-white mt-4">

                <div class="card-body d-flex justify-content-between align-items-center">

                    <div>

                        <small>Total Pembayaran</small>

                        <h3 class="mb-0">

                            Rp {{ number_format($order->total_amount,0,',','.') }}

                        </h3>

                    </div>

                    <a href="{{ route('customer.index') }}"
                        class="btn btn-light">

                        Pesan Lagi

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection