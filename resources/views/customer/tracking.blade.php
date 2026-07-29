@extends('layouts.customer')

@section('content')

<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold mb-1">
                Tracking Pesanan
            </h2>

            <small class="text-muted">
                Pantau status pesanan yang telah dibuat.
            </small>

        </div>

        <a href="{{ route('customer.index') }}"
           class="btn btn-success">

            ← Kembali ke Menu

        </a>

    </div>

    @if($orders->count())

    <div class="card shadow border-0 rounded-4">

        <div class="card-body p-0">

            <table class="table table-hover align-middle mb-0">

                <thead class="table-success">

                <tr>

                    <th>#</th>

                    <th>Nomor Pesanan</th>

                    <th>Meja</th>

                    <th>Pembayaran</th>

                    <th>Total</th>

                    <th>Status</th>

                    <th>Aksi</th>

                </tr>

                </thead>

                <tbody>

                @foreach($orders as $order)

                <tr>

                    <td>

                        {{ $loop->iteration }}

                    </td>

                    <td>

                        <strong>

                            {{ $order->order_number }}

                        </strong>

                    </td>

                    <td>

                         {{ $order->table_number }}

                    </td>

                    <td>

                        @if($order->payment_method == 'cash')

                            <span class="badge bg-secondary">

                                Cash

                            </span>

                        @else

                            <span class="badge bg-info text-dark">

                                QRIS

                            </span>

                        @endif

                    </td>

                    <td class="fw-bold text-success">

                        Rp {{ number_format($order->total_amount,0,',','.') }}

                    </td>

                    <td>

                        @if($order->status == 'pending')

                            <span class="badge bg-warning text-dark">

                                Pending

                            </span>

                        @elseif($order->status == 'processing')

                            <span class="badge bg-primary">

                                Diproses

                            </span>

                        @elseif($order->status == 'completed')

                            <span class="badge bg-success">

                                ✅ Selesai

                            </span>

                        @else

                            <span class="badge bg-danger">

                                ❌ Dibatalkan

                            </span>

                        @endif

                    </td>

                    <td>

                        <a href="{{ route('customer.tracking.detail',$order->id) }}"
                           class="btn btn-outline-success btn-sm">

                            Lihat Detail

                        </a>

                    </td>

                </tr>

                @endforeach

                </tbody>

            </table>

        </div>

    </div>

    <div class="mt-4">

        {{ $orders->links() }}

    </div>

    @else

    <div class="card shadow border-0 rounded-4">

        <div class="card-body text-center py-5">

            <div style="font-size:70px;">

                📭

            </div>

            <h4 class="mt-3">

                Belum Ada Pesanan

            </h4>

            <p class="text-muted">

                Silakan lakukan pemesanan terlebih dahulu.

            </p>

            <a href="{{ route('customer.index') }}"
               class="btn btn-success">

                Mulai Pesan

            </a>

        </div>

    </div>

    @endif

</div>

@endsection