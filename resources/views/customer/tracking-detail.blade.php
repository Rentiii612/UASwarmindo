@extends('layouts.customer')

@section('content')

<div class="container py-4">

    <div class="card shadow">

        <div class="card-header bg-success text-white">

            <h4 class="mb-0">
                Detail Pesanan
            </h4>

        </div>

        <div class="card-body">

            <div class="row mb-4">

                <div class="col-md-6">

                    <p>
                        <strong>Nomor Pesanan</strong><br>
                        {{ $order->order_number }}
                    </p>

                    <p>
                        <strong>Nomor Meja</strong><br>
                        {{ $order->table_number }}
                    </p>

                </div>

                <div class="col-md-6">

                    <p>
                        <strong>Status</strong><br>

                        @if($order->status=='pending')

                            <span class="badge bg-warning text-dark">
                                Pending
                            </span>

                        @elseif($order->status=='processing')

                            <span class="badge bg-primary">
                                Diproses
                            </span>

                        @elseif($order->status=='completed')

                            <span class="badge bg-success">
                                Selesai
                            </span>

                        @else

                            <span class="badge bg-danger">
                                Dibatalkan
                            </span>

                        @endif

                    </p>

                    <p>
                        <strong>Tanggal Pesanan</strong><br>
                        {{ $order->created_at->format('d M Y H:i') }}
                    </p>

                </div>

            </div>

            <hr>

            <h5 class="mb-3">
                Daftar Menu
            </h5>

            <table class="table table-bordered align-middle">

                <thead class="table-light">

                    <tr>

                        <th>Menu</th>

                        <th width="90">Qty</th>

                        <th>Harga</th>

                        <th>Subtotal</th>

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

                            Rp {{ number_format($item->subtotal,0,',','.') }}

                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

            <div class="text-end mt-4">

                <h4>

                    Total Bayar

                </h4>

                <h3 class="text-success">

                    Rp {{ number_format($order->total_amount,0,',','.') }}

                </h3>

            </div>

            <div class="mt-4 d-flex justify-content-between">

                <a href="{{ route('customer.tracking') }}"
                   class="btn btn-secondary">

                    ← Kembali

                </a>

                <a href="{{ route('customer.index') }}"
                   class="btn btn-success">

                    Pesan Lagi

                </a>

            </div>

        </div>

    </div>

</div>

@endsection