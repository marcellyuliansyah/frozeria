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

        $barangs = $query->latest()->paginate(5);

        // Stok menipis (1 - 9)
        $stokMenipis = Barang::where('stok', '<', 20)
            ->where('stok', '>', 0)
            ->get();

        // Stok habis (0)
        $stokHabis = Barang::where('stok', 0)->get();

        return view('dashboard.index', [
            'barangs' => $barangs,
            'kategoris' => Kategori::all(),
            'totalBarang' => Barang::count(),
            'totalKategori' => Kategori::count(),
            'stokMenipis' => $stokMenipis,
            'stokHabis' => $stokHabis,
        ]);
    }
}
