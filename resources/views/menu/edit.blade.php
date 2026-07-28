@extends('layouts.admin')

@section('content')

<div class="card">

    <div class="card-header bg-warning">

        <h4 class="mb-0">
            Edit Menu
        </h4>

    </div>

    <div class="card-body">

        <form action="{{ route('menu.update', $menu->id) }}" method="POST">

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
                    value="{{ old('nama_menu', $menu->nama_menu) }}"
                    required>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Kategori
                </label>

                <select
                    name="kategori"
                    class="form-select"
                    required>

                    @foreach($kategoris as $kategori)

                        <option
                            value="{{ $kategori->nama_kategori }}"
                            {{ old('kategori', $menu->kategori) == $kategori->nama_kategori ? 'selected' : '' }}>

                            {{ $kategori->nama_kategori }}

                        </option>

                    @endforeach

                </select>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Harga
                </label>

                <input
                    type="number"
                    name="harga"
                    class="form-control"
                    value="{{ old('harga', $menu->harga) }}"
                    required>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Deskripsi
                </label>

                <textarea
                    name="deskripsi"
                    class="form-control"
                    rows="3">{{ old('deskripsi', $menu->deskripsi) }}</textarea>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Status
                </label>

                <select
                    name="status"
                    class="form-select"
                    required>

                    <option
                        value="tersedia"
                        {{ old('status', $menu->status) == 'tersedia' ? 'selected' : '' }}>
                        Tersedia
                    </option>

                    <option
                        value="habis"
                        {{ old('status', $menu->status) == 'habis' ? 'selected' : '' }}>
                        Habis
                    </option>

                </select>

            </div>

            <button class="btn btn-warning">
                💾 Update
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