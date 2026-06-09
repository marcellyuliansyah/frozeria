<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $fillable = [
        'kategori_id',
        'nama_barang',
        'stok',
        'satuan',
        'stok_minimum',
        'berat',
        'lokasi',
        'harga',
        'harga_beli',
        'foto',
        'deskripsi'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
