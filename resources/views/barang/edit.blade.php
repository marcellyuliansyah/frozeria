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

                <div class="row">

                    {{-- KATEGORI --}}
                    <div class="col-md-6 mb-3">

                        <label class="form-label fw-semibold">
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

                    {{-- NAMA BARANG --}}
                    <div class="col-md-6 mb-3">

                        <label class="form-label fw-semibold">
                            Nama Barang
                        </label>

                        <input type="text" name="nama_barang" value="{{ $barang->nama_barang }}" class="form-control">

                    </div>

                    {{-- STOK --}}
                    <div class="col-md-6 mb-3">

                        <label class="form-label fw-semibold">
                            Stok
                        </label>

                        <input type="number" name="stok" value="{{ $barang->stok }}" class="form-control">

                    </div>

                    {{-- STOK MINIMUM --}}
                    <div class="col-md-6 mb-3">

                        <label class="form-label fw-semibold">
                            Stok Minimum
                        </label>

                        <input type="number" name="stok_minimum" value="{{ $barang->stok_minimum }}" class="form-control">

                    </div>

                    {{-- SATUAN --}}
                    <div class="col-md-6 mb-3">

                        <label class="form-label fw-semibold">
                            Satuan
                        </label>

                        <input type="text" name="satuan" value="{{ $barang->satuan }}" class="form-control">

                    </div>

                    {{-- BERAT --}}
                    <div class="col-md-6 mb-3">

                        <label class="form-label fw-semibold">
                            Berat / Ukuran
                        </label>

                        <input type="text" name="berat" value="{{ $barang->berat }}" class="form-control"
                            placeholder="Contoh: 500 gr">

                    </div>

                    {{-- LOKASI --}}
                    <div class="col-md-6 mb-3">

                        <label class="form-label fw-semibold">
                            Lokasi Penyimpanan
                        </label>

                        <input type="text" name="lokasi" value="{{ $barang->lokasi }}" class="form-control"
                            placeholder="Contoh: Freezer A1">

                    </div>

                    {{-- HARGA BELI --}}
                    <div class="col-md-6 mb-3">

                        <label class="form-label fw-semibold">
                            Harga Beli (Rp)
                        </label>

                        <input type="number" name="harga_beli" value="{{ $barang->harga_beli }}" class="form-control">

                    </div>

                    {{-- HARGA JUAL --}}
                    <div class="col-md-6 mb-3">

                        <label class="form-label fw-semibold">
                            Harga Jual (Rp)
                        </label>

                        <input type="number" name="harga" value="{{ $barang->harga }}" class="form-control">

                    </div>

                    {{-- FOTO SAAT INI --}}
                    <div class="col-md-12 mb-3">

                        <label class="form-label fw-semibold">
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

                    {{-- GANTI FOTO --}}
                    <div class="col-md-12 mb-3">

                        <label class="form-label fw-semibold">
                            Ganti Foto
                        </label>

                        <input type="file" name="foto" class="form-control">

                    </div>

                    {{-- DESKRIPSI --}}
                    <div class="col-md-12 mb-3">

                        <label class="form-label fw-semibold">
                            Deskripsi
                        </label>

                        <textarea name="deskripsi" rows="4" class="form-control">{{ $barang->deskripsi }}</textarea>

                    </div>

                </div>

                <div class="d-flex justify-content-end gap-2">

                    <a href="{{ request('from') == 'dashboard' ? route('dashboard') : route('barang.index') }}"
                        class="btn btn-secondary">

                        Batal

                    </a>

                    <button type="submit" class="btn btn-warning">

                        <i class="bi bi-check-circle"></i>
                        Update Barang

                    </button>

                </div>

            </form>

        </div>

    </div>
@endsection
