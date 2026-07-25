@extends('layouts.admin')

@section('content')

<h2 class="mb-4">

Dashboard

</h2>

<div class="row">

<div class="col-md-4">

<div class="card">

<div class="card-body">

<h5>Total Menu</h5>

<h1>

{{ $totalMenu }}

</h1>

</div>

</div>

</div>

<div class="col-md-4">

<div class="card">

<div class="card-body">

<h5>Menu Tersedia</h5>

<h1>

{{ $menuTersedia }}

</h1>

</div>

</div>

</div>

<div class="col-md-4">

<div class="card">

<div class="card-body">

<h5>Menu Habis</h5>

<h1>

{{ $menuHabis }}

</h1>

</div>

</div>

</div>

</div>

<br>

<div class="card">

<div class="card-body">

<h4>5 Menu Terbaru</h4>

<table class="table table-striped">

<thead>

<tr>

<th>No</th>

<th>Nama</th>

<th>Kategori</th>

<th>Harga</th>

<th>Status</th>

</tr>

</thead>

<tbody>

@forelse($menuTerbaru as $menu)

<tr>

<td>{{ $loop->iteration }}</td>

<td>{{ $menu->nama_menu }}</td>

<td>{{ $menu->kategori }}</td>

<td>Rp {{ number_format($menu->harga) }}</td>

<td>{{ ucfirst($menu->status) }}</td>

</tr>

@empty

<tr>

<td colspan="5">

Belum ada menu.

</td>

</tr>

@endforelse

</tbody>

</table>

</div>

</div>

@endsection