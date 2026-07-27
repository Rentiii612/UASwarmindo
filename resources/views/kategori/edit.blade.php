@extends('layouts.admin')

@section('content')

<div class="card">

    <div class="card-header">
        <h3>Edit Kategori</h3>
    </div>

    <div class="card-body">

        <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">

                <label class="form-label">Nama Kategori</label>

                <input
                    type="text"
                    name="nama_kategori"
                    class="form-control"
                    value="{{ $kategori->nama_kategori }}"
                    required>

            </div>

            <button class="btn btn-primary">
                Update
            </button>

            <a href="{{ route('kategori.index') }}" class="btn btn-secondary">
                Kembali
            </a>

        </form>

    </div>

</div>

@endsection