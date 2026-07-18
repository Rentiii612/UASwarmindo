<!DOCTYPE html>
<html>
<head>
    <title>Kelola Menu</title>
</head>
<body>

@if(session('success'))
    <p style="color:green;">
        {{ session('success') }}
    </p>
@endif

    <h1>Kelola Menu Warmindo</h1>

    <a href="{{ route('menu.create') }}">
        + Tambah Menu
    </a>

    <hr>

    <table border="1" cellpadding="10">
        <tr>
            <th>No</th>
            <th>Nama Menu</th>
            <th>Kategori</th>
            <th>Harga</th>
        </tr>

        @forelse($menus as $menu)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $menu->nama_menu }}</td>
                <td>{{ $menu->kategori }}</td>
                <td>Rp {{ number_format($menu->harga) }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="4">Belum ada menu.</td>
            </tr>
        @endforelse
    </table>

</body>
</html>