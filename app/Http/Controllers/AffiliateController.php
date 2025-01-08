<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AffiliateController extends Controller
{
    public function index()
    {
        return view('user.affiliate');
        $affiliates = Affiliate::all();
        return view('admin.affiliates.index', compact('affiliates'));
    }
    public function show($id)
    {
        $affiliate = Affiliate::findOrFail($id);
        return view('admin.affiliates.show', compact('affiliate'));
    }

    // Menampilkan form untuk menambah affiliate
    public function create()
    {
        return view('admin.affiliates.create');
    }

    // Menyimpan data affiliate baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:affiliates',
            'password' => 'required|string|min:8',
        ]);

        Affiliate::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('admin.affiliates.index')->with('success', 'Affiliate berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit affiliate
    public function edit($id)
    {
        $affiliate = Affiliate::findOrFail($id);
        return view('admin.affiliates.edit', compact('affiliate'));
    }

    // Mengupdate data affiliate
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:affiliates,email,' . $id,
            'password' => 'nullable|string|min:8',
        ]);

        $affiliate = Affiliate::findOrFail($id);
        $affiliate->name = $request->name;
        $affiliate->email = $request->email;
        if ($request->password) {
            $affiliate->password = bcrypt($request->password);
        }
        $affiliate->save();

        return redirect()->route('admin.affiliates.index')->with('success', 'Affiliate berhasil diperbarui.');
    }

    // Menghapus data affiliate
    public function destroy($id)
    {
        $affiliate = Affiliate::findOrFail($id);
        $affiliate->delete();

        return redirect()->route('admin.affiliates.index')->with('success', 'Affiliate berhasil dihapus.');
    }
}

