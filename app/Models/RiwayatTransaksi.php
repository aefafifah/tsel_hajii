<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RiwayatTransaksi extends Model
{
    protected $table = 'transaksis';

    public function produk()
    {
        return $this->hasOne(Produk::class, 'produk_nama', 'jenis_paket');
    }
}
