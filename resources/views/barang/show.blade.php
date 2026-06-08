@extends('layouts.app')

@section('content')
    <div class="card shadow-sm">

        <div class="card-header bg-info text-white">

            <h4 class="mb-0">
                Detail Barang
            </h4>

        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-4 text-center">

                    @if ($barang->foto)
                        <img src="{{ asset('storage/' . $barang->foto) }}" class="img-fluid rounded shadow-sm">
                    @else
                        <img src="https://via.placeholder.com/300x300?text=No+Image" class="img-fluid rounded">
                    @endif

                </div>

                <div class="col-md-8">

                    <table class="table table-bordered">

                        <tr>
                            <th width="200">Nama Barang</th>
                            <td>{{ $barang->nama_barang }}</td>
                        </tr>

                        <tr>
                            <th>Kategori</th>
                            <td>{{ $barang->kategori->nama }}</td>
                        </tr>

                        <tr>
                            <th>Stok</th>
                            <td>{{ $barang->stok }}</td>
                        </tr>

                        <tr>
                            <th>Harga</th>
                            <td>
                                Rp {{ number_format($barang->harga, 0, ',', '.') }}
                            </td>
                        </tr>

                        <tr>
                            <th>Deskripsi</th>
                            <td>{{ $barang->deskripsi }}</td>
                        </tr>

                    </table>

                    {{-- <a href="{{ route('barang.index') }}" class="btn btn-secondary">

                        Kembali

                    </a> --}}

                    {{-- <a href="{{ route('barang.edit', $barang->id) }}" class="btn btn-warning">

                        Edit

                    </a> --}}

                </div>

            </div>

        </div>

    </div>
@endsection
