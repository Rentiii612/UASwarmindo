<!DOCTYPE html>
<html>
<head>
    <title>Tambah Menu</title>
</head>
<body>

<h1>Tambah Menu</h1>

<form action="{{ route('menu.store') }}" method="POST">

    @csrf

    <label>Nama Menu</label><br>
    <input type="text" name="nama_menu"><br><br>

    <label>Kategori</label><br>
    <input type="text" name="kategori"><br><br>

    <label>Harga</label><br>
    <input type="number" name="harga"><br><br>

    <label>Deskripsi</label><br>
    <textarea name="deskripsi"></textarea><br><br>

    <label>Status</label><br>

    <select name="status">
        <option value="tersedia">Tersedia</option>
        <option value="habis">Habis</option>
    </select>

    <br><br>

    <button type="submit">
        Simpan
    </button>

</form>

<br>

<a href="{{ route('menu.index') }}">
    Kembali
</a>

</body>
</html>