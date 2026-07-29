<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warmindo</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body{
            background:#f5f5f5;
        }

        .navbar{
            background:#198754;
        }

        .navbar-brand{
            color:white !important;
            font-weight:bold;
            font-size:22px;
        }

        .card{
            border:none;
            border-radius:15px;
            box-shadow:0 3px 12px rgba(0,0,0,.08);
        }

        .footer{
            text-align:center;
            color:#666;
            padding:20px;
            margin-top:50px;
        }

        .btn{
            border-radius:10px;
        }

        .btn-warning{
            color:white;
            font-weight:bold;
        }

        .btn-light{
            font-weight:bold;
        }

    </style>

</head>

<body>

<nav class="navbar navbar-expand-lg">

    <div class="container">

        <a class="navbar-brand"
           href="{{ route('customer.index') }}">

            🍜 Warmindo

        </a>

        <div class="d-flex gap-2">

            <a href="{{ route('customer.index') }}"
               class="btn btn-light">

                🍜 Menu

            </a>

            <a href="{{ route('customer.tracking') }}"
               class="btn btn-warning">

                📦 Tracking

            </a>

            <a href="{{ route('customer.cart') }}"
               class="btn btn-light">

                🛒 Keranjang

            </a>

        </div>

    </div>

</nav>

<div class="container mt-4">

    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show">

            {{ session('success') }}

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert">
            </button>

        </div>

    @endif

    @if(session('error'))

        <div class="alert alert-danger alert-dismissible fade show">

            {{ session('error') }}

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert">
            </button>

        </div>

    @endif

    @yield('content')

</div>

<div class="footer">

    <hr>

    <small>

        © {{ date('Y') }} Warmindo • Sistem Pemesanan Makanan

    </small>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>