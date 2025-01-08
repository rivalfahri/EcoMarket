<?php

// app/Models/Penjualan.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal_penjualan',
        'produk_id',
        'jumlah',
        'total_harga',
    ];

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}