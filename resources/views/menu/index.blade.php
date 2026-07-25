@extends('layouts.admin')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

<h2>Kelola Menu</h2>

<a href="{{ route('menu.create') }}"
class="btn btn-success">

<i class="fa-solid fa-plus"></i>

Tambah Menu

</a>

</div>

@if(session('success'))

<div class="alert alert-success">

{{ session('success') }}

</div>

@endif

<div class="card">

<div class="card-body">

<table class="table table-hover align-middle">

<thead class="table-dark">

<tr>

<th>No</th>

<th>Nama Menu</th>

<th>Kategori</th>

<th>Harga</th>

<th>Status</th>

<th width="180">

Aksi

</th>

</tr>

</thead>

<tbody>

@forelse($menus as $menu)

<tr>

<td>

{{ $loop->iteration }}

</td>

<td>

{{ $menu->nama_menu }}

</td>

<td>

{{ $menu->kategori }}

</td>

<td>

Rp {{ number_format($menu->harga) }}

</td>

<td>

@if($menu->status=='tersedia')

<span class="badge bg-success">

Tersedia

</span>

@else

<span class="badge bg-danger">

Habis

</span>

@endif

</td>

<td>

<a href="{{ route('menu.edit',$menu->id) }}"
class="btn btn-warning btn-sm">

Edit

</a>

<form action="{{ route('menu.destroy',$menu->id) }}"
method="POST"
class="d-inline">

@csrf

@method('DELETE')

<button
class="btn btn-danger btn-sm"
onclick="return confirm('Yakin ingin menghapus menu?')">

Hapus

</button>

</form>

</td>

</tr>

@empty

<tr>

<td colspan="6"
class="text-center">

Belum ada menu.

</td>

</tr>

@endforelse

</tbody>

</table>

</div>

</div>

@endsection