@extends('layouts.app')

@section('content')
    <div class="card shadow-sm">

        <div class="card-header bg-warning">

            <h4 class="mb-0">
                Edit Barang
            </h4>

        </div>

        <div class="card-body">

            <form action="{{ route('barang.update', $barang->id) }}" method="POST" enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <input type="hidden" name="from" value="{{ request('from') }}">

                <div class="mb-3">

                    <label class="form-label">
                        Kategori
                    </label>

                    <select name="kategori_id" class="form-select">

                        @foreach ($kategoris as $kategori)
                            <option value="{{ $kategori->id }}"
                                {{ $barang->kategori_id == $kategori->id ? 'selected' : '' }}>

                                {{ $kategori->nama }}

                            </option>
                        @endforeach

                    </select>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Nama Barang
                    </label>

                    <input type="text" name="nama_barang" value="{{ $barang->nama_barang }}" class="form-control">

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Stok
                    </label>

                    <input type="number" name="stok" value="{{ $barang->stok }}" class="form-control">

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Harga
                    </label>

                    <input type="number" name="harga" value="{{ $barang->harga }}" class="form-control">

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Foto Saat Ini
                    </label>

                    <br>

                    @if ($barang->foto)
                        <img src="{{ asset('storage/' . $barang->foto) }}" width="150" class="img-thumbnail">
                    @else
                        <p class="text-muted">
                            Belum ada foto
                        </p>
                    @endif

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Ganti Foto
                    </label>

                    <input type="file" name="foto" class="form-control">

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Deskripsi
                    </label>

                    <textarea name="deskripsi" rows="4" class="form-control">{{ $barang->deskripsi }}</textarea>

                </div>

                {{-- <a href="{{ route('barang.index') }}" class="btn btn-secondary">

                    Kembali

                </a> --}}

                <button type="submit" class="btn btn-warning">

                    Update

                </button>

            </form>

        </div>

    </div>
@endsection
