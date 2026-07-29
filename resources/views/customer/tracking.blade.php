@extends('layouts.customer')

@section('content')

<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h3 class="fw-bold">
            Tracking Pesanan
        </h3>

        <a href="{{ route('customer.index') }}" class="btn btn-success">
            ← Kembali ke Menu
        </a>

    </div>

    @if($orders->count())

    <div class="card shadow-sm">

        <div class="card-body p-0">

            <table class="table table-hover mb-0 align-middle">

                <thead class="table-success">

                    <tr>

                        <th>No Pesanan</th>

                        <th>Meja</th>

                        <th>Total</th>

                        <th>Status</th>

                        <th width="120">Aksi</th>

                    </tr>

                </thead>

                <tbody>

                @foreach($orders as $order)

                <tr>

                    <td>

                        <strong>{{ $order->order_number }}</strong>

                    </td>

                    <td>

                        {{ $order->table_number }}

                    </td>

                    <td>

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
                                Selesai
                            </span>

                        @else

                            <span class="badge bg-danger">
                                Dibatalkan
                            </span>

                        @endif

                    </td>

                    <td>

                        <a href="{{ route('customer.tracking.detail',$order->id) }}"
                           class="btn btn-success btn-sm">

                            Detail

                        </a>

                    </td>

                </tr>

                @endforeach

                </tbody>

            </table>

        </div>

    </div>

    <div class="mt-3">

        {{ $orders->links() }}

    </div>

    @else

    <div class="alert alert-info">

        Belum ada pesanan.

    </div>

    @endif

</div>

@endsection