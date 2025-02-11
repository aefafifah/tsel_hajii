<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merchandise extends Model
{
    use HasFactory;

    protected $fillable = [
        'merch_nama',
        'merch_detail',
        'merch_stok',
        'merch_terambil_history'
    ];

    /**
     */
    public function produks()
    {
        return $this->belongsToMany(Produk::class, 'merchandise_produk');
    }
}
