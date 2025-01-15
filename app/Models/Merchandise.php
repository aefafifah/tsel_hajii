<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merchandise extends Model
{
    /** @use HasFactory<\Database\Factories\MerchandiseFactory> */
    use HasFactory;

    protected $table = 'merchandises';

    protected $fillable = [
        'merch_nama',
        'merch_detail',
        'merch_stok'
    ];
}
