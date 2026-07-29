@extends('layouts.customer')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-7">

            <div class="card shadow border-0 rounded-4">

                <div class="card-body text-center p-5">

                    <div class="display-1 mb-3">
                        💵
                    </div>

                    <h2 class="fw-bold text-success">
                        Pembayaran Cash
                    </h2>

                    <p class="text-muted mb-4">
                        Silakan menuju kasir untuk melakukan pembayaran.
                    </p>

                    <hr>

                    <table class="table table-borderless">

                        <tr>
                            <th width="40%">Nomor Pesanan</th>
                            <td>{{ $order->order_number }}</td>
                        </tr>

                        <tr>
                            <th>Nomor Meja</th>
                            <td>{{ $order->table_number }}</td>
                        </tr>

                        <tr>
                            <th>Total Bayar</th>
                            <td class="fw-bold text-success">
                                Rp {{ number_format($order->total_amount,0,',','.') }}
                            </td>
                        </tr>

                        <tr>
                            <th>Metode</th>
                            <td>Cash</td>
                        </tr>

                    </table>

                    <div class="alert alert-warning mt-4">

                        <strong>Perhatian</strong>

                        <br>

                        Tunjukkan nomor pesanan ini kepada kasir agar pembayaran dapat diproses.

                    </div>

                    <a
                        href="{{ route('customer.tracking.detail',$order->id) }}"
                        class="btn btn-success btn-lg">

                        Lihat Status Pesanan

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection