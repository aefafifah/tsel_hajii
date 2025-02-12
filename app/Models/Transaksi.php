<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaksi extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $primaryKey = 'id_transaksi';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $casts = [
        'tanggal_transaksi' => 'datetime',
    ];
    protected $dates = ['tanggal_transaksi'];

    protected $fillable = [
        'id_transaksi',
        'nama_pelanggan',
        'nomor_telepon',
        'nomor_injeksi',
        'aktivasi_tanggal',
        'tanggal_transaksi',
        'nama_sales',
        'jenis_paket',
        'merchandise',
        'metode_pembayaran'
    ];
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'jenis_paket', 'id');
    }

    public function merchandises()
    {
        return $this->belongsToMany(Merchandise::class, 'transaksi_merchandise', 'transaksi_id', 'merchandise_id');
    }

    

}
