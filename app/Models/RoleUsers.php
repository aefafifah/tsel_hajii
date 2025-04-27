<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Traits\HasRoles;

<<<<<<< HEAD
class RoleUsers extends Authenticatable
{
    use HasFactory, HasRoles;
=======

class RoleUsers extends Authenticatable
{
    use HasFactory;
    use HasRoles;
>>>>>>> 10d144f9cce1def704a0e249b506945ec224d972

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
<<<<<<< HEAD
     * @return void
=======
>>>>>>> 10d144f9cce1def704a0e249b506945ec224d972
     */
    public function setPinAttribute($value)
    {
        $this->attributes['pin'] = bcrypt($value);
    }

    /**
<<<<<<< HEAD
     * Check if the user has the given role.
     *
     * @param string $role
     * @return bool
     */
=======
     *
     * @return bool
     */
    // public function isSuperUser(): bool
    // {
    //     return $this->role === 'supervisor' && $this->is_superuser;
    // }

    // In your RoleUsers model or User model
>>>>>>> 10d144f9cce1def704a0e249b506945ec224d972
    public function hasRole($role)
    {
        return $this->role === $role;
    }

<<<<<<< HEAD
    /**
     * Define the relationship with the Transaksi model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
=======
>>>>>>> 10d144f9cce1def704a0e249b506945ec224d972
    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
}
