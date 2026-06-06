<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // Tampilkan untuk User & Admin
    public function index()
    {
        $products = Product::with(['category', 'brand'])->get();
        $categories = Category::all();
        $brands = Brand::all();

        return view('dashboard', compact('products', 'categories', 'brands'));
    }

    // Simpan Data Baru (Admin Only)
    public function store(Request $request)
    {
        $request->validate([
            'nama_product' => 'required|string',
            'category_id'  => 'required',
            'brand_id'     => 'required',
            'harga'        => 'required|numeric',
            'stok'         => 'required|numeric',
            'gambar'       => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $path = $request->file('gambar')->store('products', 'public');

        Product::create([
            'nama_product' => $request->nama_product,
            'category_id' => $request->category_id,
            'brand_id'    => $request->brand_id,
            'harga'       => $request->harga,
            'stok'        => $request->stok,
            'gambar'      => $path
        ]);

        return redirect()->back()->with('success', 'Mobil berhasil ditambahkan!');
    }

    // Ambil data untuk form edit modal
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return response()->json($product);
    }

    // Update Data (Admin Only)
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'nama_product' => 'required|string',
            'harga'        => 'required|numeric',
            'stok'         => 'required|numeric',
            'gambar'       => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($product->gambar) {
                Storage::disk('public')->delete($product->gambar);
            }
            $product->gambar = $request->file('gambar')->store('products', 'public');
        }

        $product->update([
            'nama_product' => $request->nama_product,
            'harga'        => $request->harga,
            'stok'         => $request->stok,
            'gambar'       => $product->gambar
        ]);

        return redirect()->back()->with('success', 'Data mobil berhasil diperbarui!');
    }

    // Hapus Data (Admin Only)
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if ($product->gambar) {
            Storage::disk('public')->delete($product->gambar);
        }
        $product->delete();

        return redirect()->back()->with('success', 'Mobil berhasil dihapus!');
    }
}