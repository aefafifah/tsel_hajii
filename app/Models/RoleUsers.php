<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
class RoleUsers extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\RoleUsersFactory> */
    use HasFactory;
    use HasRoles;

    protected $table = 'role_users';
    protected $fillable = [
        'name',
        'email',
        'photo',
        'pin',
        'role',
        'is_superuser',
    ];

    public function setPinAttribute($value)
    {
        $this->attributes['pin'] = bcrypt($value); // Hash the PIN
    }

    // public function isSUperUser(): bool {
    //     return $this -> role === 'supervisor' && $this->is_superuser;
    // }
}
