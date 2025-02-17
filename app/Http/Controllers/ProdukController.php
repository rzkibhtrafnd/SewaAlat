<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    public function index(Request $request)
    {
        $produks = Produk::with('kategori')
            ->when($request->search, function ($query) use ($request) {
                return $query->where('nama', 'like', '%' . $request->search . '%');
            })
            ->when($request->kategori_id, function ($query) use ($request) {
                return $query->where('kategori_id', $request->kategori_id);
            })
            ->paginate(10);

        $kategoris = Kategori::all();

        return view('admin.produk.index', compact('produks', 'kategoris'));
    }

    public function create()
    {
        $kategoris = Kategori::all();
        return view('admin.produk.create', compact('kategoris'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'required|integer',
            'stok' => 'required|integer|min:0', // Validasi minimum 0 untuk stok
            'harga' => 'required|integer|min:0', // Validasi minimum 0 untuk harga
            'deskripsi' => 'required|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5012',
        ]);

        $gambarPath = $request->file('gambar')->store('public/produk');

        Produk::create([
            'nama' => $request->nama,
            'kategori_id' => $request->kategori,
            'stok' => $request->stok,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'gambar' => basename($gambarPath), // Hanya menyimpan nama file
        ]);

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit(Produk $produk)
    {
        $kategoris = Kategori::all();
        return view('admin.produk.edit', compact('produk', 'kategoris'));
    }

    public function update(Request $request, Produk $produk)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategoris,id',
            'stok' => 'required|integer|min:0',
            'harga' => 'required|integer|min:0',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->only(['nama', 'kategori_id', 'stok', 'harga', 'deskripsi']);

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama dari storage jika ada
            Storage::delete('public/produk/' . $produk->gambar);

            $gambarPath = $request->file('gambar')->store('public/produk');
            $data['gambar'] = basename($gambarPath);
        }

        $produk->update($data);

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(Produk $produk)
    {
        // Hapus gambar dari storage sebelum menghapus produk
        Storage::delete('public/produk/' . $produk->gambar);
        $produk->delete();

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil dihapus.');
    }

    public function userProduct()
    {
        $products = Produk::with('kategori')->orderBy('created_at', 'desc')->get();

        return view('product', compact('products'));
    }
}
