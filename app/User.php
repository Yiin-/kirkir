<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'name', 'email', 'password', 'country', 'city',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function scopeByEmail($query, $email)
    {
        return $this->where('email', $email);
    }
}
