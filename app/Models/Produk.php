<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    /** @use HasFactory<\Database\Factories\ProdukFactory> */
    use HasFactory;

    protected $table = 'produks';

    protected $fillable = [
        'produk_nama',
        'produk_harga',
        'produk_diskon',
        'produk_detail',
        'produk_stok'
    ];
}
