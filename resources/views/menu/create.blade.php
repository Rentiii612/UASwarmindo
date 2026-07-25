@extends('layouts.admin')

@section('content')

<div class="card">

<div class="card-header bg-success text-white">

<h4 class="mb-0">

Tambah Menu

</h4>

</div>

<div class="card-body">

<form action="{{ route('menu.store') }}" method="POST">

@csrf

<div class="mb-3">

<label class="form-label">

Nama Menu

</label>

<input
type="text"
name="nama_menu"
class="form-control"
required>

</div>

<div class="mb-3">

<label class="form-label">

Kategori

</label>

<input
type="text"
name="kategori"
class="form-control"
required>

</div>

<div class="mb-3">

<label class="form-label">

Harga

</label>

<input
type="number"
name="harga"
class="form-control"
required>

</div>

<div class="mb-3">

<label class="form-label">

Deskripsi

</label>

<textarea
name="deskripsi"
class="form-control"
rows="3"></textarea>

</div>

<div class="mb-3">

<label class="form-label">

Status

</label>

<select
name="status"
class="form-select">

<option value="tersedia">

Tersedia

</option>

<option value="habis">

Habis

</option>

</select>

</div>

<button
class="btn btn-success">

💾 Simpan

</button>

<a
href="{{ route('menu.index') }}"
class="btn btn-secondary">

← Kembali

</a>

</form>

</div>

</div>

@endsection