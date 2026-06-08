@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold">
                Data Barang
            </h2>

            <p class="text-muted">
                Kelola stok frozen food
            </p>

        </div>

        <a href="{{ route('barang.create') }}" class="btn btn-primary">

            + Tambah Barang

        </a>

    </div>

    @if (session('success'))
        <div class="alert alert-success">

            {{ session('success') }}

        </div>
    @endif

    <div class="card shadow-sm">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead class="table-light">

                        <tr>

                            <th class="text-center">No</th>
                            <th class="text-center">Foto</th>
                            <th class="text-center">Nama Barang</th>
                            <th class="text-center">Kategori</th>
                            <th class="text-center">Stok</th>
                            <th class="text-center">Harga</th>
                            <th width="250" class="text-center">
                                Aksi
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($barangs as $barang)
                            <tr>

                                <td>
                                    {{ $loop->iteration }}
                                </td>

                                <td width="100">

                                    @if ($barang->foto)
                                        <img src="{{ asset('storage/' . $barang->foto) }}" width="80">
                                    @else
                                        -
                                    @endif

                                </td>

                                <td>
                                    {{ $barang->nama_barang }}
                                </td>

                                <td>
                                    {{ $barang->kategori->nama }}
                                </td>

                                <td>

                                    @if ($barang->stok < 10)
                                        <span class="badge bg-danger">
                                            {{ $barang->stok }}
                                        </span>
                                    @elseif($barang->stok < 20)
                                        <span class="badge bg-warning">
                                            {{ $barang->stok }}
                                        </span>
                                    @else
                                        <span class="badge bg-success">
                                            {{ $barang->stok }}
                                        </span>
                                    @endif

                                </td>

                                <td>

                                    Rp {{ number_format($barang->harga, 0, ',', '.') }}

                                </td>

                                <td class="text-center">

                                    <div class="d-flex justify-content-center align-items-center gap-2">

                                        <a href="{{ route('barang.show', $barang->id) }}" class="btn btn-info btn-sm">

                                            <i class="bi bi-eye"></i>
                                            Detail

                                        </a>

                                        <a href="{{ route('barang.edit', $barang->id) }}" class="btn btn-warning btn-sm">

                                            <i class="bi bi-pencil-square"></i>
                                            Edit

                                        </a>

                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#hapusModal{{ $barang->id }}">

                                            <i class="bi bi-trash"></i>
                                            Hapus

                                        </button>

                                    </div>

                                    <!-- Modal Hapus -->
                                    <div class="modal fade" id="hapusModal{{ $barang->id }}" tabindex="-1"
                                        aria-hidden="true">

                                        <div class="modal-dialog modal-dialog-centered">

                                            <div class="modal-content">

                                                <div class="modal-header bg-danger text-white">

                                                    <h5 class="modal-title">

                                                        <i class="bi bi-exclamation-triangle-fill me-2"></i>
                                                        Konfirmasi Hapus

                                                    </h5>

                                                    <button type="button" class="btn-close btn-close-white"
                                                        data-bs-dismiss="modal">
                                                    </button>

                                                </div>

                                                <div class="modal-body text-center">

                                                    <i class="bi bi-trash-fill text-danger display-4"></i>

                                                    <h5 class="mt-3">

                                                        Hapus Barang?

                                                    </h5>

                                                    <p class="mb-1">

                                                        Apakah Anda yakin ingin menghapus:

                                                    </p>

                                                    <h6 class="fw-bold">

                                                        {{ $barang->nama_barang }}

                                                    </h6>

                                                    <small class="text-muted">

                                                        Data yang sudah dihapus tidak dapat dikembalikan.

                                                    </small>

                                                </div>

                                                <div class="modal-footer justify-content-center">

                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">

                                                        Batal

                                                    </button>

                                                    <form action="{{ route('barang.destroy', $barang->id) }}"
                                                        method="POST">

                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit" class="btn btn-danger">

                                                            <i class="bi bi-trash"></i>
                                                            Ya, Hapus

                                                        </button>

                                                    </form>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="7" class="text-center">

                                    Belum ada data barang

                                </td>

                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

            {{ $barangs->links() }}

        </div>

    </div>
@endsection
