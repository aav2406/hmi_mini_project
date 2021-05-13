<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Admin extends Authenticatable
{
    use notifiable;
    protected $guard = 'admin';
    //
    protected $fillable = [
        'name', 'email', 'password','phone_no',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
