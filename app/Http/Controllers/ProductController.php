<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\JenisCategory;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['jenisCategory'])->get();
        return view('admin.produk.index', compact('products'));
    }

    public function create()
    {
        $jenisCategories = JenisCategory::all();

        // Cari ID berikutnya (jika database kosong, mulai dari 1)
        $nextProductId = Product::max('id') + 1 ?? 1;

        return view('admin.produk.create', compact('jenisCategories', 'nextProductId'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'berat' => 'required|numeric',
            'jenis_category_id' => 'required|integer|exists:jenis_category,id',
            'description' => 'nullable|string',
            'image_url' => 'required|image|mimes:jpeg,png,jpg|max:2048', // Validasi gambar
        ]);

        // Simpan file gambar
        $imagePath = $request->file('image_url')->store('imgProduk', 'public');

        // Simpan data produk
        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'berat' => $request->berat,
            'jenis_category_id' => $request->jenis_category_id,
            'description' => $request->description,
            'image_url' => $imagePath,
        ]);

        return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan!');
    }


    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $jenisCategories = JenisCategory::all();
        return view('admin.produk.edit', compact('product', 'jenisCategories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'berat' => 'required|numeric',
            'jenis_category_id' => 'required|integer|exists:jenis_category,id',
            'description' => 'nullable|string',
            'image_url' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $product = Product::findOrFail($id);
        $product->update($request->all());
        return redirect()->route('produk.index')->with('success', 'Produk berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus!');
    }

    // Report
    public function cetak()
    {
        $product = Product::all();
        $pdf = Pdf::loadview('admin.produk.cetak', compact('product'));
        return $pdf->download('laporan-produk.pdf');
    }

    // show product
    public function show($productId)
    {
        $product = Product::findOrFail($productId);
        return view('user.detail', compact('product'));
    }

}
