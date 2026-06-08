@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card shadow-sm border-0">

                <div class="card-header bg-warning">

                    <h4 class="mb-0">
                        Edit Kategori
                    </h4>

                </div>

                <div class="card-body">

                    <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">

                        @csrf
                        @method('PUT')

                        <div class="mb-3">

                            <label class="form-label">
                                Nama Kategori
                            </label>

                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                                value="{{ old('nama', $kategori->nama) }}" placeholder="Masukkan nama kategori">

                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <div class="d-flex justify-content-between">

                            <a href="{{ route('kategori.index') }}" class="btn btn-secondary">

                                Kembali

                            </a>

                            <button type="submit" class="btn btn-warning">

                                Update

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>
@endsection
