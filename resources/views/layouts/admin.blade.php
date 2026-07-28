<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Warmindo Admin</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<style>

body{
    background:#f5f7fb;
}

.sidebar{
    width:260px;
    min-height:100vh;
    background:#212529;
}

.sidebar a{
    color:white;
    text-decoration:none;
    display:block;
    padding:14px 20px;
}

.sidebar a:hover{
    background:#343a40;
}

.content{
    flex:1;
}

.card{
    border:none;
    box-shadow:0 0 20px rgba(0,0,0,.08);
}

</style>

</head>

<body>

<div class="d-flex">

    <div class="sidebar">

        <h3 class="text-center text-white py-4">
            🍜 Warkopmindo 43
        </h3>

        <a href="{{ route('dashboard') }}">
            <i class="fa-solid fa-house"></i>
            Dashboard
        </a>

        <a href="{{ route('menu.index') }}">
            <i class="fa-solid fa-utensils"></i>
            Kelola Menu
        </a>

        <a href="{{ route('kategori.index') }}">
            <i class="fa-solid fa-folder"></i>
            Kelola Kategori
        </a>

        <a href="{{ route('customer.index') }}">
            <i class="fa-solid fa-users"></i>
            Kelola Customer
        </a>

        <a href="{{ route('report.index') }}">
            <i class="fa-solid fa-chart-line"></i>
            Laporan
        </a>

        <form action="{{ route('logout') }}" method="POST">

            @csrf

            <button
                class="btn btn-link text-white text-decoration-none w-100 text-start px-3 py-3">

                <i class="fa-solid fa-right-from-bracket"></i>

                Logout

            </button>

        </form>

    </div>

    <div class="content">

        <nav class="navbar bg-white shadow-sm">

            <div class="container-fluid">

                <h4 class="mb-0">
                    
                </h4>

                <span>
                    Admin
                </span>

            </div>

        </nav>

        <div class="container mt-4">

            @if(session('success'))

                <div class="alert alert-success alert-dismissible fade show" role="alert">

                    {{ session('success') }}

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="alert">
                    </button>

                </div>

            @endif

            @if(session('error'))

                <div class="alert alert-danger alert-dismissible fade show" role="alert">

                    {{ session('error') }}

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="alert">
                    </button>

                </div>

            @endif

            @if($errors->any())

                <div class="alert alert-danger">

                    <ul class="mb-0">

                        @foreach($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif

            @yield('content')

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>

setTimeout(function(){

    let alert = document.querySelector('.alert');

    if(alert){

        let bsAlert = bootstrap.Alert.getOrCreateInstance(alert);

        bsAlert.close();

    }

},3000);

</script>

</body>
</html>