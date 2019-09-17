<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

<<<<<<< HEAD
class User extends Authenticatable
=======
class User extends Authenticatable implements MustVerifyEmail
>>>>>>> 49a2da52f01bfe480968e3127d13be8a72d8e06d
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
<<<<<<< HEAD
        'name', 'email', 'password',
=======
        'name', 'email', 'password','roll_no','division','phone_no','parentname1','parentemail1','parentname2','parentmail2','parentphone_no1','parentphone_no2',
>>>>>>> 49a2da52f01bfe480968e3127d13be8a72d8e06d
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
}
