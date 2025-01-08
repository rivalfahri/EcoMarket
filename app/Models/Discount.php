<?php

// app/Models/Discount.php

// app/Models/Discount.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

    public function checkout(Request $request)
    {
        // Ambil data pengguna dan keranjang
        $user = Auth::user();
        $cart = Cart::where('user_id', $user->id)->with('items.product')->first();

        // Hitung subtotal
        $subtotal = $cart->items->sum(function ($item) {
            return $item->quantity * $item->product->price;
        });

        // Ambil voucher dari database berdasarkan kode
        $voucherCode = $request->input('voucher_code');
        $voucher = Discount::where('code', $voucherCode)->first();

        // Hitung diskon
        $discount = $this->calculateDiscount($subtotal, $voucher);

        // Hitung total setelah diskon
        $total = $subtotal - $discount;

        // Simpan data ke database
        $order = Order::create([
            'user_id' => $user->id,
            'subtotal' => $subtotal,
            'discount_id' => $voucher ? $voucher->id : null,
            'discount_amount' => $discount,
            'total' => $total,
        ]);

        return redirect()->route('checkout.success')->with('success', 'Pesanan berhasil dibuat!');
    }
}