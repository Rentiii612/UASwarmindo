<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Laporan Kasir</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

<style>

body{
    background:#f4f6fb;
    font-family:Poppins,sans-serif;
}

/* HEADER */

.header{
    background:linear-gradient(135deg,#6C63FF,#8B5CF6);
    color:white;
    border-radius:18px;
    padding:30px;
    margin-bottom:25px;
}

.header h2{
    font-weight:bold;
}

/* CARD */

.card-report{

    border:none;

    border-radius:18px;

    transition:.3s;

    box-shadow:0 10px 25px rgba(0,0,0,.08);

}

.card-report:hover{

    transform:translateY(-5px);

}

.icon{

    width:60px;

    height:60px;

    border-radius:50%;

    display:flex;

    align-items:center;

    justify-content:center;

    color:white;

    font-size:25px;

}

.bg-purple{

    background:#7C3AED;

}

.bg-green{

    background:#16A34A;

}

.bg-blue{

    background:#2563EB;

}

.bg-orange{

    background:#EA580C;

}

.table{

    border-radius:15px;

    overflow:hidden;

}

.btn-purple{

    background:#7C3AED;

    color:white;

}

.btn-purple:hover{

    background:#6D28D9;

    color:white;

}

</style>

</head>

<body>

<div class="container py-4">

<div class="header">

<div class="d-flex justify-content-between align-items-center">

<div>

<h2>📄 Laporan Penjualan Kasir</h2>

<p class="mb-0">
Rekap transaksi Warmindo
</p>

</div>

<div>

<a href="{{ route('kasir.dashboard') }}"
class="btn btn-light">

<i class="fa fa-arrow-left"></i>

Dashboard

</a>

</div>

</div>

</div>


<div class="row g-4">

<div class="col-md-3">

<div class="card card-report p-4">

<div class="d-flex justify-content-between">

<div>

<small>Total Pendapatan</small>

<h3 class="fw-bold text-success">
Rp {{ number_format($totalPendapatan ?? 0,0,',','.') }}
</h3>

</div>

<div class="icon bg-green">

<i class="fa-solid fa-wallet"></i>

</div>

</div>

</div>

</div>

<div class="col-md-3">

<div class="card card-report p-4">

<div class="d-flex justify-content-between">

<div>

<small>Total Pesanan</small>

<h3 class="fw-bold">
{{ $totalPesanan ?? 0 }}
</h3>

</div>

<div class="icon bg-blue">

<i class="fa-solid fa-cart-shopping"></i>

</div>

</div>

</div>

</div>

<div class="col-md-3">

<div class="card card-report p-4">

<div class="d-flex justify-content-between">

<div>

<small>Menu Terjual</small>

<h3 class="fw-bold">
{{ $menuTerjual ?? 0 }}
</h3>

</div>

<div class="icon bg-orange">

<i class="fa-solid fa-bowl-food"></i>

</div>

</div>

</div>

</div>

<div class="col-md-3">

<div class="card card-report p-4">

<div class="d-flex justify-content-between">

<div>

<small>Total Transaksi</small>

<h3 class="fw-bold">
{{ $orders->count() }}
</h3>

</div>

<div class="icon bg-purple">

<i class="fa-solid fa-receipt"></i>

</div>

</div>

</div>

</div>

</div>

<div class="card mt-4 shadow-sm border-0 rounded-4">

<div class="card-body">

<div class="row align-items-end">

<div class="col-md-4">

<label>Dari Tanggal</label>

<input type="date" class="form-control">

</div>

<div class="col-md-4">

<label>Sampai</label>

<input type="date" class="form-control">

</div>

<div class="col-md-4">

<button class="btn btn-purple mt-4">

<i class="fa fa-search"></i>

Filter

</button>

</div>

</div>

</div>

</div>

<div class="card mt-4 shadow border-0 rounded-4">

<div class="card-header bg-white">

<div class="d-flex justify-content-between">

<h5>Daftar Transaksi</h5>

<div>

<button class="btn btn-danger">

<i class="fa-solid fa-file-pdf"></i>

Cetak PDF

</button>

<button class="btn btn-success">

<i class="fa-solid fa-file-excel"></i>

Export Excel

</button>

</div>

</div>

</div>

<div class="card-body">

<table class="table table-hover">

<thead class="table-dark">

<tr>

<th>No</th>

<th>No Meja</th>

<th>Total</th>

<th>Status</th>

<th>Tanggal</th>

</tr>

</thead>

<tbody>

@forelse($orders as $order)

<tr>

    <td>{{ $loop->iteration }}</td>

    <td>{{ $order->table_number }}</td>

    <td>
        Rp {{ number_format($order->total_amount,0,',','.') }}
    </td>

    <td>

        @if($order->status == 'pending')

            <span class="badge bg-warning text-dark">
                Menunggu
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

            <span class="badge bg-secondary">
                {{ $order->status }}
            </span>

        @endif

    </td>

    <td>
        {{ $order->created_at->format('d-m-Y H:i') }}
    </td>

</tr>

@empty

<tr>

<td colspan="5" class="text-center py-4">

<i class="fa-solid fa-folder-open fa-2x text-secondary mb-2"></i>

<br>

Belum ada transaksi

</td>

</tr>

@endforelse

</tbody>
</table>

</div>

</div>

</div>

</body>
</html>