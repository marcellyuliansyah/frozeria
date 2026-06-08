<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $kategori = $request->kategori;

        $query = Barang::with('kategori');

        if ($search) {
            $query->where('nama_barang', 'like', "%{$search}%");
        }

        if ($kategori) {
            $query->where('kategori_id', $kategori);
        }

        $barangs = $query->latest()->paginate(10);

        return view('dashboard.index', [
            'barangs' => $barangs,
            'kategoris' => Kategori::all(),
            'totalBarang' => Barang::count(),
            'totalKategori' => Kategori::count(),
            'totalStok' => Barang::sum('stok')
        ]);
    }
}
