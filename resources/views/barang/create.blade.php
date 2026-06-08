@extends('layouts.app')

@section('content')

    <div class="card shadow-sm">

        <div class="card-header bg-primary text-white">
            Tambah Barang
        </div>

        <div class="card-body">

            {{-- ERROR VALIDASI --}}
            @if ($errors->any())
                <div class="alert alert-danger">

                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>

                </div>
            @endif

            <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">

                @csrf

                {{-- KATEGORI --}}
                <div class="mb-3">

                    <label class="form-label">Kategori</label>

                    <select name="kategori_id" class="form-select" required>

                        @foreach ($kategoris as $kategori)
                            <option value="{{ $kategori->id }}">
                                {{ $kategori->nama }}
                            </option>
                        @endforeach

                    </select>

                </div>

                {{-- NAMA BARANG --}}
                <div class="mb-3">

                    <label class="form-label">Nama Barang</label>

                    <input type="text" name="nama_barang" class="form-control" required>

                </div>

                {{-- STOK --}}
                <div class="mb-3">

                    <label class="form-label">Stok</label>

                    <input type="number" name="stok" class="form-control" required>

                </div>

                {{-- HARGA --}}
                <div class="mb-3">

                    <label class="form-label">Harga</label>

                    <input type="text" name="harga" class="form-control" placeholder="Contoh: 10000 atau 10.000">

                    <small class="text-muted">
                        Masukkan angka tanpa wajib titik (akan diproses sistem)
                    </small>

                </div>

                {{-- FOTO --}}
                <div class="mb-3">

                    <label class="form-label">Foto</label>

                    <input type="file" name="foto" class="form-control">

                </div>

                {{-- DESKRIPSI --}}
                <div class="mb-3">

                    <label class="form-label">Deskripsi</label>

                    <textarea name="deskripsi" rows="4" class="form-control"></textarea>

                </div>

                {{-- BUTTON --}}
                <button type="submit" class="btn btn-primary">
                    Simpan
                </button>

            </form>

        </div>

    </div>

@endsection
