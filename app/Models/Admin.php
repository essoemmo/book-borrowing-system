<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\HasRolesAndPermissions;

class Admin extends Authenticatable implements MustVerifyEmail
{
    use HasRolesAndPermissions;
    use Notifiable;
    use SoftDeletes;

    protected $table = 'admins';

    protected $guarded = [];

    protected array $dates = ['deleted_at'];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopeWithoutSuperAdmin($query)
    {
        return $query->whereHas('roles', function ($query) {
            $query->where('name', '!=', 'super_admin');
        });
    }

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function scopeInactive($query)
    {
        return $query->where('active', 0);
    }
}
