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
        'tanggal_transaksi'
    ];
}
