<?php

// app/Models/Affiliate.php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Affiliate extends Authenticatable
{
    protected $guard = 'affiliate';

    // Tambahkan kolom yang bisa diisi (fillable) jika diperlukan
    protected $fillable = [
        'name',
        'email',
        'nomor_hp',
        'password',
        'affiliate_code',
    ];

    // Kolom yang harus disembunyikan (hidden)
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
