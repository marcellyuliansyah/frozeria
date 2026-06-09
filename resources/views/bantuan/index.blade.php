@extends('layouts.app')

@section('content')
    <div class="container-fluid">

        <h2 class="fw-bold mb-4">
            Bantuan
        </h2>

        <div class="card shadow-sm border-0 mb-4">
            <div class="card-body">

                <h5>Cara Menambah Barang Baru</h5>

                <ol>
                    <li>Buka halaman Dashboard.</li>
                    <li>Klik tombol <strong>Tambah Barang</strong>.</li>
                    <li>Isi data barang.</li>
                    <li>Klik <strong>Simpan Barang</strong>.</li>
                </ol>

            </div>
        </div>

        <div class="card shadow-sm border-0 mb-4">
            <div class="card-body">

                <h5>Cara Update Stok Barang</h5>

                <ol>
                    <li>Cari barang pada Dashboard.</li>
                    <li>Klik tombol <strong>Edit</strong>.</li>
                    <li>Ubah jumlah stok.</li>
                    <li>Klik <strong>Simpan</strong>.</li>
                </ol>

            </div>
        </div>

        <div class="card shadow-sm border-0 mb-4">
            <div class="card-body">

                <h5>Cara Mengelola Kategori</h5>

                <ol>
                    <li>Buka menu Kategori.</li>
                    <li>Tambah, edit, atau hapus kategori.</li>
                    <li>Perubahan kategori akan tersimpan.</li>
                </ol>

            </div>
        </div>

        {{-- IDENTITAS PEMBUAT --}}
        <div class="card shadow-sm border-primary">
            <div class="card-header bg-primary text-white">
                Identitas Pembuat
            </div>

            <div class="card-body">

                <table class="table table-bordered mb-0">

                    <tr>
                        <th width="200">Nama</th>
                        <td>Azarine Winy Margaretha</td>
                    </tr>

                    <tr>
                        <th>NIM</th>
                        <td>2331740016</td>
                    </tr>

                    <tr>
                        <th>Kelas</th>
                        <td>3B</td>
                    </tr>

                    <tr>
                        <th>Alamat</th>
                        <td>Lumajang</td>
                    </tr>

                    <tr>
                        <th>No. Telepon</th>
                        <td>085324567794</td>
                    </tr>

                    <tr>
                        <th>Email</th>
                        <td>azarinemargaretha@gmail.com</td>
                    </tr>

                </table>

            </div>
        </div>

    </div>
@endsection
