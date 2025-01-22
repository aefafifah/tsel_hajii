<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $primaryKey = 'id_transaksi';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;


    protected $fillable = [
        'id_transaksi',
        'nama_pelanggan',
        'nomor_telepon',
        'aktivasi_tanggal',
        'tanggal_transaksi',
        'nama_sales',
        'jenis_paket',
        'merchandise',
        'metode_pembayaran'
    ];
    public function produks()
    {
        return $this->belongsToMany(Produk::class, 'transaksi_produk', 'transaksi_id', 'produk_id');
    }

    public function merchandises()
    {
        return $this->belongsToMany(Merchandise::class, 'transaksi_merchandise', 'transaksi_id', 'merchandise_id');
    }

}    
