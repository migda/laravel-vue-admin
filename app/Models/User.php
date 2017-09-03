<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'role', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * User roles in application.
     */
    const ROLE_USER = 1;
    const ROLE_ADMIN = 2;

    /**
     * Return array of roles' ids
     * @return array
     */
    public static function roles()
    {
        return [
            self::ROLE_ADMIN,
            self::ROLE_USER
        ];
    }
}
