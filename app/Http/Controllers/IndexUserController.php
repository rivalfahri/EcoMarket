<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Controllers\Controller;

class IndexUserController extends Controller
{
    public function index()
    {
        // Ambil 9 produk dengan kategori 'Makanan'
        $bahanpokok = Product::where('jenis_category_id', 1) // Sesuaikan ID kategori makanan
            ->take(9)
            ->get();

        // Ambil 9 produk dengan kategori 'Aksesori'
        $minuman = Product::where('jenis_category_id', 4) // Sesuaikan ID kategori aksesori
            ->take(9)
            ->get();

        return view('user.indexuser', compact('bahanpokok', 'minuman'));
    }
}
