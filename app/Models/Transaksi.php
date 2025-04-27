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
        'history_setoran' => 'array',
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
        'metode_pembayaran',
        'history_setoran',
        'is_setor',
        'is_paid',
        'telepon_pelanggan',
        'addon_perdana',
        'id_supervisor',
        'bertugas', // Menambahkan kolom bertugas
        'tempat_tugas', // Menambahkan kolom tempat_tugas
<<<<<<< HEAD
        'is_activated',
=======
>>>>>>> 10d144f9cce1def704a0e249b506945ec224d972
    ];

    // Relasi ke Produk
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'jenis_paket', 'id');
    }

    // Relasi ke Merchandise
    public function merchandises()
    {
        return $this->belongsToMany(Merchandise::class, 'transaksi_merchandise', 'transaksi_id', 'merchandise_id');
    }

    // Akses sejarah setoran
    public function getHistorySetoranAttribute()
    {
        return json_decode($this->attributes['history_setoran'], true) ?? [];
    }

    // Relasi ke RoleUsers (Supervisor)
    public function supervisor()
    {
        return $this->belongsTo(RoleUsers::class, 'id_supervisor');
    }

    // Relasi ke RoleUsers untuk mendapatkan data bertugas dan tempat_tugas
    public function roleUser()
    {
        return $this->belongsTo(RoleUsers::class, 'id_supervisor');
    }

    // Menambahkan fungsi untuk mendapatkan bertugas dan tempat_tugas dari RoleUsers
    public function setBertugasFromRoleUser()
    {
        if ($this->roleUser) {
            $this->bertugas = $this->roleUser->bertugas ?? 0; // default 0 jika tidak ada nilai
            $this->tempat_tugas = $this->roleUser->tempat_tugas;
            $this->save();
        }
    }
    
    public function sales()
    {
        return $this->belongsTo(RoleUsers::class, 'nama_sales', 'name');
    }
}
