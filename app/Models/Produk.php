<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $fillable = [
        'produk_nama',
        'produk_harga',
        'produk_diskon',
        'produk_detail',
        'produk_stok',
        'produk_insentif',
        'is_active',
        'merchandise_id',
    ];

    /**
     */
    public function merchandise()
    {
        return $this->belongsTo(Merchandise::class, 'merchandise_id');
    }
}
