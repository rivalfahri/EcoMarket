<?php

// app/Http/Controllers/Admin/DiscountController.php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Discount;
use Carbon\Carbon;

class DiscountController extends Controller
{
    // Menampilkan daftar diskon
    public function index()
    {
        $discounts = Discount::all();
        return view('admin.discounts.index', compact('discounts'));
    }

    // Menampilkan form tambah diskon
    public function create()
    {
        return view('admin.discounts.create');
    }

    // Menyimpan data diskon baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|unique:discounts',
            'amount' => 'required|numeric|min:0',
            'type' => 'required|in:percentage,fixed',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        Discount::create($request->all());

        return redirect()->route('admin.discounts.index')->with('success', 'Diskon berhasil ditambahkan.');
    }

    // Menampilkan form edit diskon
    public function edit($id)
    {
        $discount = Discount::findOrFail($id);
        return view('admin.discounts.edit', compact('discount'));
    }

    // Mengupdate data diskon
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|unique:discounts,code,' . $id,
            'amount' => 'required|numeric|min:0',
            'type' => 'required|in:percentage,fixed',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        $discount = Discount::findOrFail($id);
        $discount->update($request->all());

        return redirect()->route('admin.discounts.index')->with('success', 'Diskon berhasil diperbarui.');
    }

    // Menghapus data diskon
    public function destroy($id)
    {
        $discount = Discount::findOrFail($id);
        $discount->delete();

        return redirect()->route('admin.discounts.index')->with('success', 'Diskon berhasil dihapus.');
    }
}