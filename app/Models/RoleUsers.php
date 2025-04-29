<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Traits\HasRoles;

class RoleUsers extends Authenticatable
{
    use HasFactory, HasRoles;

    protected $table = 'role_users';

    protected $fillable = [
        'name',
        'email',
        'photo',
        'pin',
        'role',
        'phone',
        'is_superuser',
        'is_setoran',
        'bertugas',
        'tempat_tugas',
    ];

    /**
     * Hash the PIN before saving to the database.
     *
     * @param string $value
     * @return void
     */
    public function setPinAttribute($value)
    {
        $this->attributes['pin'] = bcrypt($value);
    }

    /**
     * Check if the user has the given role.
     *
     * @param string $role
     * @return bool
     */
    public function hasRole($role)
    {
        return $this->role === $role;
    }

    /**
     * Define the relationship with the Transaksi model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
}
