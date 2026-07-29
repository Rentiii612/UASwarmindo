@extends('layouts.customer')

@section('content')

<div class="container py-4">

    <h3 class="mb-4">🛒 Keranjang Belanja</h3>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(count($cart) > 0)

        <table class="table table-bordered align-middle">

            <thead class="table-dark">
                <tr>
                    <th>Menu</th>
                    <th>Harga</th>
                    <th width="150">Jumlah</th>
                    <th>Subtotal</th>
                    <th width="100">Aksi</th>
                </tr>
            </thead>

            <tbody>

                @foreach($cart as $item)

                <tr>

                    <td>{{ $item['nama_menu'] }}</td>

                    <td>Rp {{ number_format($item['harga'],0,',','.') }}</td>

                    <td>

                        <form action="{{ route('customer.cart.update',$item['id']) }}" method="POST">

                            @csrf
                            @method('PUT')

                            <input
                                type="number"
                                name="jumlah"
                                value="{{ $item['jumlah'] }}"
                                min="1"
                                class="form-control mb-2">

                            <button class="btn btn-warning btn-sm w-100">
                                Update
                            </button>

                        </form>

                    </td>

                    <td>
                        Rp {{ number_format($item['harga'] * $item['jumlah'],0,',','.') }}
                    </td>

                    <td>

                        <form action="{{ route('customer.cart.remove',$item['id']) }}" method="POST">

                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger btn-sm w-100">
                                Hapus
                            </button>

                        </form>

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

        <h4 class="text-end mb-4">
            Total :
            <strong>Rp {{ number_format($total,0,',','.') }}</strong>
        </h4>

        <div class="text-end">

            <a href="{{ route('customer.index') }}"
               class="btn btn-secondary">

                ← Kembali Belanja

            </a>

            <a href="{{ route('customer.checkout') }}"
               class="btn btn-success">

                Checkout →

            </a>

        </div>

    @else

        <div class="alert alert-info">

            Keranjang masih kosong.

        </div>

        <a href="{{ route('customer.index') }}"
           class="btn btn-primary">

            Lihat Menu

        </a>

    @endif

</div>

@endsection