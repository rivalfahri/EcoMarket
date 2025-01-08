<?php

// app/Http/Controllers/LaporanController.php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Models\Penjualan; // Sesuaikan dengan model penjualan Anda
use Carbon\Carbon;

class LaporanController extends Controller
{
    // Menampilkan form pemilihan bulan dan tahun
    public function index()
    {
        return view('admin.laporan.index');
    }

    // Menampilkan laporan penjualan berdasarkan bulan dan tahun
    public function generate(Request $request)
    {
        $request->validate([
            'bulan' => 'required|numeric|min:1|max:12',
            'tahun' => 'required|numeric|min:2000|max:2099',
        ]);

        $bulan = $request->bulan;
        $tahun = $request->tahun;

        // Ambil data penjualan berdasarkan bulan dan tahun
        $orders = Order::whereMonth('created_at', $bulan)
            ->whereYear('created_at', $tahun)
            ->with('items') // Ambil relasi items dan product
            ->get();

        return view('admin.laporan.hasil', compact('orders', 'bulan', 'tahun'));
    }
}
