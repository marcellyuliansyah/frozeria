@extends('layouts.app')

@section('content')
    <div class="container-fluid">

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>
                {{ session('success') }}

                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
                <i class="bi bi-x-circle-fill me-2"></i>
                {{ session('error') }}

                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="mb-4 d-flex justify-content-between align-items-center">

            <div>

                <h2 class="fw-bold">
                    Dashboard Frozeria
                </h2>

                <p class="text-muted mb-0">
                    Sistem Stok Opname Frozen Food
                </p>

            </div>

            <a href="{{ route('barang.create', ['from' => 'dashboard']) }}" class="btn btn-success">
                <i class="bi bi-plus-circle"></i>
                Tambah Barang
            </a>

        </div>

        <div class="row mb-4">

            <div class="col-md-3">

                <div class="card shadow-sm border-0">

                    <div class="card-body">

                        <h6 class="text-muted">
                            Total Barang
                        </h6>

                        <h2 class="fw-bold">
                            {{ $totalBarang }}
                        </h2>

                    </div>

                </div>

            </div>

            <div class="col-md-3">

                <div class="card shadow-sm border-0">

                    <div class="card-body">

                        <h6 class="text-muted">
                            Total Kategori
                        </h6>

                        <h2 class="fw-bold">
                            {{ $totalKategori }}
                        </h2>

                    </div>

                </div>

            </div>

            <div class="col-md-3">

                <div class="card shadow-sm border-warning">

                    <div class="card-body">

                        <h6 class="text-warning">
                            Stok Menipis
                        </h6>

                        <h2 class="fw-bold text-warning">
                            {{ $stokMenipis->count() }}
                        </h2>

                    </div>

                </div>

            </div>

            <div class="col-md-3">

                <div class="card shadow-sm border-danger">

                    <div class="card-body">

                        <h6 class="text-danger">
                            Stok Habis
                        </h6>

                        <h2 class="fw-bold text-danger">
                            {{ $stokHabis->count() }}
                        </h2>

                    </div>

                </div>

            </div>

        </div>

        @if ($stokMenipis->count() > 0)
            <div class="alert alert-danger shadow-sm">

                <h5>

                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    Peringatan Stok Menipis

                </h5>

                <ul class="mb-0">

                    @foreach ($stokMenipis as $barang)
                        <li>

                            <strong>{{ $barang->nama_barang }}</strong>
                            - Stok tersisa {{ $barang->stok }}

                        </li>
                    @endforeach

                </ul>

            </div>
        @endif

        @if ($stokHabis->count() > 0)
            <div class="alert alert-danger shadow-sm">

                <h5>
                    <i class="bi bi-x-octagon-fill me-2"></i>
                    Peringatan Stok Habis
                </h5>

                <ul class="mb-0">

                    @foreach ($stokHabis as $barang)
                        <li>
                            <strong>{{ $barang->nama_barang }}</strong>
                            - Stok habis 0
                        </li>
                    @endforeach

                </ul>

            </div>
        @endif

        <div class="card shadow-sm border-0">

            <div class="card-body">

                <form method="GET">

                    <div class="row">

                        <div class="col-md-5">

                            <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                                placeholder="Cari nama barang...">

                        </div>

                        <div class="col-md-4">

                            <select name="kategori" class="form-select" onchange="this.form.submit()">

                                <option value="">
                                    Semua Kategori
                                </option>

                                @foreach ($kategoris as $kategori)
                                    <option value="{{ $kategori->id }}"
                                        {{ request('kategori') == $kategori->id ? 'selected' : '' }}>

                                        {{ $kategori->nama }}

                                    </option>
                                @endforeach

                            </select>

                        </div>

                        <div class="col-md-3">

                            <button class="btn btn-primary w-100">

                                Cari

                            </button>

                        </div>

                    </div>

                </form>

            </div>

        </div>

        <div class="card shadow-sm border-0 mt-4">

            <div class="card-header bg-white">

                <h5 class="mb-0">
                    Daftar Barang
                </h5>

            </div>

            <div class="card-body">

                <table class="table table-bordered">

                    <thead class="table-light">

                        <tr>

                            <th class="text-center">No</th>
                            <th class="text-center">Nama Barang</th>
                            <th class="text-center">Kategori</th>
                            <th class="text-center">Stok</th>
                            <th class="text-center">Satuan</th>
                            <th class="text-center" width="220">Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($barangs as $barang)
                            <tr>

                                <td>
                                    {{ $loop->iteration }}
                                </td>

                                <td>
                                    {{ $barang->nama_barang }}
                                </td>

                                <td>
                                    {{ $barang->kategori->nama ?? '-' }}
                                </td>

                                <td>
                                    {{ $barang->stok }}
                                </td>

                                <td>
                                    {{ $barang->satuan ?? '-' }}
                                </td>

                                <td class="text-center align-middle">

                                    <div class="d-flex justify-content-center align-items-center gap-2">

                                        {{-- DETAIL --}}
                                        <a href="{{ route('barang.show', $barang->id) }}"
                                            class="btn btn-info btn-sm d-inline-flex align-items-center gap-1 px-2 py-1">

                                            <i class="bi bi-eye"></i>
                                            <span>Detail</span>

                                        </a>

                                        {{-- EDIT --}}
                                        <a href="{{ route('barang.edit', $barang->id) }}?from=dashboard"
                                            class="btn btn-warning btn-sm d-inline-flex align-items-center gap-1 px-2 py-1">

                                            <i class="bi bi-pencil-square"></i>
                                            <span>Edit</span>

                                        </a>

                                        {{-- HAPUS --}}
                                        <button type="button"
                                            class="btn btn-danger btn-sm d-inline-flex align-items-center gap-1 px-2 py-1"
                                            data-bs-toggle="modal" data-bs-target="#hapusDashboard{{ $barang->id }}">

                                            <i class="bi bi-trash"></i>
                                            <span>Hapus</span>

                                        </button>

                                    </div>

                                    {{-- MODAL HAPUS --}}
                                    <div class="modal fade" id="hapusDashboard{{ $barang->id }}" tabindex="-1">

                                        <div class="modal-dialog modal-dialog-centered">

                                            <div class="modal-content">

                                                <div class="modal-header bg-danger text-white">

                                                    <h5 class="modal-title">
                                                        Konfirmasi Hapus
                                                    </h5>

                                                    <button type="button" class="btn-close btn-close-white"
                                                        data-bs-dismiss="modal">
                                                    </button>

                                                </div>

                                                <div class="modal-body text-center">

                                                    <p>Yakin ingin menghapus barang:</p>

                                                    <h5 class="fw-bold">
                                                        {{ $barang->nama_barang }}
                                                    </h5>

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
                                                        <input type="hidden" name="from" value="dashboard">
                                                        <button type="submit" class="btn btn-danger">
                                                            Ya Hapus
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

                                <td colspan="6" class="text-center">

                                    Belum ada data barang

                                </td>

                            </tr>
                        @endforelse

                    </tbody>

                </table>

                <div class="d-flex justify-content-between align-items-center mt-3">

                    <div class="text-muted">

                        Menampilkan
                        {{ $barangs->firstItem() ?? 0 }}
                        -
                        {{ $barangs->lastItem() ?? 0 }}
                        dari
                        {{ $barangs->total() }}
                        barang

                    </div>

                    <div>

                        {{ $barangs->links() }}


                    </div>

                </div>

            </div>

        </div>

    </div>
@endsection
