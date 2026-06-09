<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::with('kategori')
            ->latest()
            ->paginate(10);

        return view('barang.index', compact('barangs'));
    }

    public function create()
    {
        $kategoris = Kategori::all();

        return view('barang.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required',
            'nama_barang' => 'required',
            'stok' => 'required|integer',
            'satuan' => 'required',
            'stok_minimum' => 'nullable|integer',
            'berat' => 'nullable|string',
            'lokasi' => 'nullable|string|max:255',
            'harga' => 'nullable|numeric',
            'harga_beli' => 'nullable|numeric',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $foto = null;

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto')
                ->store('barang', 'public');
        }

        Barang::create([
            'kategori_id' => $request->kategori_id,
            'nama_barang' => $request->nama_barang,
            'stok' => $request->stok,
            'satuan' => $request->satuan,
            'stok_minimum' => $request->stok_minimum,
            'berat' => $request->berat,
            'lokasi' => $request->lokasi,
            'harga' => $request->harga,
            'harga_beli' => $request->harga_beli,
            'foto' => $foto,
            'deskripsi' => $request->deskripsi,
        ]);

        if ($request->from === 'dashboard') {
            return redirect()
                ->route('dashboard')
                ->with('success', 'Barang berhasil ditambahkan');
        }

        return redirect()
            ->route('barang.index')
            ->with('success', 'Barang berhasil ditambahkan');
    }

    public function show(Barang $barang)
    {
        return view('barang.show', compact('barang'));
    }

    public function edit(Barang $barang)
    {
        $kategoris = Kategori::all();

        return view('barang.edit', compact('barang', 'kategoris'));
    }

    public function update(Request $request, Barang $barang)
    {
        $request->validate([
            'kategori_id' => 'required',
            'nama_barang' => 'required',
            'stok' => 'required|integer',
            'satuan' => 'required',
            'stok_minimum' => 'nullable|integer',
            'berat' => 'nullable|string',
            'lokasi' => 'nullable|string|max:255',
            'harga' => 'nullable|numeric',
            'harga_beli' => 'nullable|numeric',
        ]);

        if ($request->hasFile('foto')) {

            if ($barang->foto) {
                Storage::disk('public')->delete($barang->foto);
            }

            $barang->foto = $request->file('foto')
                ->store('barang', 'public');
        }

        $barang->update([
            'kategori_id' => $request->kategori_id,
            'nama_barang' => $request->nama_barang,
            'stok' => $request->stok,
            'satuan' => $request->satuan,
            'stok_minimum' => $request->stok_minimum,
            'berat' => $request->berat,
            'lokasi' => $request->lokasi,
            'harga' => $request->harga,
            'harga_beli' => $request->harga_beli,
            'deskripsi' => $request->deskripsi,
            'foto' => $barang->foto
        ]);

        if ($request->from === 'dashboard') {
            return redirect()
                ->route('dashboard')
                ->with('success', 'Barang berhasil diperbarui');
        }

        return redirect()
            ->route('barang.index')
            ->with('success', 'Barang berhasil diperbarui');
    }

    public function destroy(Request $request, Barang $barang)
    {
        if ($barang->foto) {
            Storage::disk('public')->delete($barang->foto);
        }

        $barang->delete();

        // jika dari dashboard
        if ($request->from === 'dashboard') {
            return redirect()
                ->route('dashboard')
                ->with('success', 'Barang berhasil dihapus');
        }

        // default
        return redirect()
            ->route('barang.index')
            ->with('success', 'Barang berhasil dihapus');
    }
}
