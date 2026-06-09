@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <h3 class="fw-bold mb-0">
                Tambah Barang Baru
            </h3>

            <a href="{{ request('from') == 'dashboard' ? route('dashboard') : route('barang.index') }}"
                class="btn btn-secondary">

                <i class="bi bi-arrow-left"></i>
                Kembali

            </a>

        </div>

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

        <div class="card shadow-sm border-0">

            <div class="card-body">

                <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <input type="hidden" name="from" value="{{ request('from') }}">

                    {{-- FOTO --}}
                    <div class="mb-4">

                        <label class="form-label fw-semibold">
                            Foto Barang
                        </label>

                        <input type="file" name="foto" class="form-control">

                    </div>

                    <div class="row">

                        {{-- NAMA BARANG --}}
                        <div class="col-md-6 mb-3">

                            <label class="form-label fw-semibold">
                                Nama Barang <span class="text-danger">*</span>
                            </label>

                            <input type="text" name="nama_barang" class="form-control" value="{{ old('nama_barang') }}"
                                required>

                        </div>

                        {{-- KATEGORI --}}
                        <div class="col-md-6 mb-3">

                            <label class="form-label fw-semibold">
                                Kategori <span class="text-danger">*</span>
                            </label>

                            <select name="kategori_id" class="form-select" required>

                                <option value="">
                                    Pilih Kategori
                                </option>

                                @foreach ($kategoris as $kategori)
                                    <option value="{{ $kategori->id }}"
                                        {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}>

                                        {{ $kategori->nama }}

                                    </option>
                                @endforeach

                            </select>

                        </div>

                        {{-- STOK --}}
                        <div class="col-md-6 mb-3">

                            <label class="form-label fw-semibold">
                                Jumlah Stok <span class="text-danger">*</span>
                            </label>

                            <input type="number" name="stok" class="form-control" value="{{ old('stok') }}" required>

                        </div>

                        {{-- STOK MINIMUM --}}
                        <div class="col-md-6 mb-3">

                            <label class="form-label fw-semibold">
                                Stok Minimum
                            </label>

                            <input type="number" name="stok_minimum" class="form-control" value="{{ old('stok_minimum') }}"
                                placeholder="Contoh: 10">

                        </div>

                        {{-- HARGA JUAL --}}
                        <div class="col-md-6 mb-3">

                            <label class="form-label fw-semibold">
                                Harga Jual (Rp)
                            </label>

                            <input type="number" name="harga" class="form-control" value="{{ old('harga') }}"
                                placeholder="Contoh: 35000">

                        </div>

                        {{-- HARGA BELI --}}
                        <div class="col-md-6 mb-3">

                            <label class="form-label fw-semibold">
                                Harga Beli (Rp)
                            </label>

                            <input type="number" name="harga_beli" class="form-control" value="{{ old('harga_beli') }}"
                                placeholder=>

                        </div>

                        {{-- SATUAN --}}
                        <div class="col-md-6 mb-3">

                            <label class="form-label fw-semibold">
                                Satuan <span class="text-danger">*</span>
                            </label>

                            <input type="text" name="satuan" class="form-control" value="{{ old('satuan') }}"
                                placeholder="Contoh: pcs, pack" required>

                        </div>

                        {{-- BERAT / UKURAN --}}
                        <div class="col-md-6 mb-3">

                            <label class="form-label fw-semibold">
                                Berat / Ukuran
                            </label>

                            <input type="text" name="berat" class="form-control" value="{{ old('berat') }}"
                                placeholder="Contoh: 50 gram">

                        </div>

                        {{-- LOKASI PENYIMPANAN --}}
                        <div class="col-md-6 mb-3">

                            <label class="form-label fw-semibold">
                                Lokasi Penyimpanan
                            </label>

                            <input type="text" name="lokasi" class="form-control" value="{{ old('lokasi') }}"
                                placeholder>

                        </div>


                        {{-- DESKRIPSI --}}
                        <div class="col-12 mb-3">

                            <label class="form-label fw-semibold">
                                Deskripsi
                            </label>

                            <textarea name="deskripsi" rows="4" class="form-control">{{ old('deskripsi') }}</textarea>

                        </div>

                    </div>

                    <div class="d-flex justify-content-end gap-2 mt-3">

                        <a href="{{ request('from') == 'dashboard' ? route('dashboard') : route('barang.index') }}"
                            class="btn btn-secondary">

                            Batal

                        </a>

                        <button type="submit" class="btn btn-success">

                            <i class="bi bi-check-circle"></i>
                            Simpan Barang

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

@endsection
