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
                    value="{{ old('nama_menu') }}"
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

                    <option value="">-- Pilih Kategori --</option>

                    @foreach($kategoris as $kategori)

                        <option
                            value="{{ $kategori->nama_kategori }}"
                            {{ old('kategori') == $kategori->nama_kategori ? 'selected' : '' }}>

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
                    value="{{ old('harga') }}"
                    required>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Deskripsi
                </label>

                <textarea
                    name="deskripsi"
                    class="form-control"
                    rows="3">{{ old('deskripsi') }}</textarea>

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
                        {{ old('status') == 'tersedia' ? 'selected' : '' }}>
                        Tersedia
                    </option>

                    <option
                        value="habis"
                        {{ old('status') == 'habis' ? 'selected' : '' }}>
                        Habis
                    </option>

                </select>

            </div>

            <button
                type="submit"
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