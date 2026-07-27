<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $menu->nama_menu }} - Warmindo</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background:#f8f9fa;
        }

        .card-detail{
            border:none;
            border-radius:20px;
        }

        .price{
            font-size:32px;
            font-weight:bold;
            color:#198754;
        }

        .badge-status{
            font-size:14px;
        }
    </style>

</head>
<body>

<div class="container py-5">

<div class="row justify-content-center">

<div class="col-lg-8">

<div class="card shadow card-detail">

<div class="card-body p-5">

<a href="{{ route('customer.index') }}"
class="btn btn-outline-secondary mb-4">
← Kembali
</a>

<h2 class="fw-bold">

{{ $menu->nama_menu }}

</h2>

<p>

<span class="badge bg-dark">

{{ $menu->kategori }}

</span>

</p>

<div class="price mb-3">

Rp {{ number_format($menu->harga,0,',','.') }}

</div>

<p class="text-muted">

{{ $menu->deskripsi }}

</p>

@if($menu->status=='tersedia')

<span class="badge bg-success badge-status">

Tersedia

</span>

@else

<span class="badge bg-danger badge-status">

Habis

</span>

@endif

<hr>

<form
method="POST"
action="{{ route('customer.cart.add',$menu) }}">

@csrf

<label class="form-label">

Jumlah

</label>

<input
type="number"
name="jumlah"
min="1"
value="1"
class="form-control mb-3">

<button
class="btn btn-dark w-100">

Tambah ke Keranjang

</button>

</form>

</div>

</div>

</div>

</div>

</div>

</body>
</html>