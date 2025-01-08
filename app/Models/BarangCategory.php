<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangCategory extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'barang_category';

    // Kolom yang dapat diisi
    protected $fillable = [
        'name',
    ];

    // Menyertakan timestamps
    public $timestamps = true;
}
