@extends('layouts.admin')

@section('content')

<div class="card">

    <div class="card-header">
        <h3>Tambah Kategori</h3>
    </div>

    <div class="card-body">

        <form action="{{ route('kategori.store') }}" method="POST">

            @csrf

            <div class="mb-3">
                <label class="form-label">Nama Kategori</label>

                <input
                    type="text"
                    name="nama_kategori"
                    class="form-control"
                    required>
            </div>

            <button class="btn btn-success">
                Simpan
            </button>

            <a href="{{ route('kategori.index') }}"
               class="btn btn-secondary">
                Kembali
            </a>

        </form>

    </div>

</div>

@endsection