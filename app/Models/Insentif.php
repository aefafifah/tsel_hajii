<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insentif extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipe_insentif',
        'nilai_insentif',
        'produk_id',
    ];
}
