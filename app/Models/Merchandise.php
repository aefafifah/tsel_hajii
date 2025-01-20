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
    ];

    /**
     */
    public function produks()
    {
        return $this->hasMany(Produk::class, 'merchandise_id');
    }
}
