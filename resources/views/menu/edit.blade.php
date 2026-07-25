@extends('layouts.admin')

@section('content')

<div class="card">

    <div class="card-header bg-warning">

        <h4 class="mb-0">

            Edit Menu

        </h4>

    </div>

    <div class="card-body">

        <form action="{{ route('menu.update',$menu->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">

                <label class="form-label">

                    Nama Menu

                </label>

                <input
                    type="text"
                    name="nama_menu"
                    class="form-control"
                    value="{{ $menu->nama_menu }}"
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
                    value="{{ $menu->kategori }}"
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
                    value="{{ $menu->harga }}"
                    required>

            </div>

            <div class="mb-3">

                <label class="form-label">

                    Deskripsi

                </label>

                <textarea
                    name="deskripsi"
                    class="form-control"
                    rows="3">{{ $menu->deskripsi }}</textarea>

            </div>

            <div class="mb-3">

                <label class="form-label">

                    Status

                </label>

                <select
                    name="status"
                    class="form-select">

                    <option value="tersedia"
                        {{ $menu->status=='tersedia' ? 'selected' : '' }}>

                        Tersedia

                    </option>

                    <option value="habis"
                        {{ $menu->status=='habis' ? 'selected' : '' }}>

                        Habis

                    </option>

                </select>

            </div>

            <button class="btn btn-warning">

                💾 Update

            </button>

            <a href="{{ route('menu.index') }}"
               class="btn btn-secondary">

                ← Kembali

            </a>

        </form>

    </div>

</div>

@endsection