<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'price',
        'berat',
        'stock',
        'description',
        'image_url',
        'animal_category_id',
        'jenis_category_id',
    ];

    // Relasi ke JenisCategory
    public function jenisCategory()
    {
        return $this->belongsTo(JenisCategory::class, 'jenis_category_id');
    }

    // Relasi ke AnimalCategory
    public function barangCategory()
    {
        return $this->belongsTo(BarangCategory::class, 'barang_category_id');
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_product', 'product_id', 'order_id')
            ->withPivot('quantity', 'price');
    }
}
