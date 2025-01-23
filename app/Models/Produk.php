<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $fillable = [
        'produk_nama', 'produk_harga', 'produk_diskon', 'produk_stok',
        'produk_detail', 'produk_insentif', 'is_active'
    ];

    
    public function merchandises()
    {
        return $this->belongsToMany(Merchandise::class, 'merchandise_produk');
    }
}
