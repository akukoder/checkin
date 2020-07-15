<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isSuperAdmin()
    {
        if ($this->role == 1) {
            return true;
        }

        return false;
    }

    public function isAdmin()
    {
        if ($this->role == 2) {
            return true;
        }

        return false;
    }

    public function isStaff()
    {
        if ($this->role == 3) {
            return true;
        }

        return false;
    }
    public function isPpz()
    {
        if ($this->role == 4) {
            return true;
        }

        return false;
    }
}
