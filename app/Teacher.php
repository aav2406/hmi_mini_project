<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent;
use App\Notifications\TeacherResetPasswordNotification;
class Teacher extends Authenticatable
{
    //
    use Notifiable;

    protected $guard = 'teacher';

    protected $fillable = [
        'name', 'email', 'password','phone_no','emp_id','class_1','class_2'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    public function divisions()
    {
        return $this->belongsToMany('App\Division','division_teacher');
    }
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new TeacherResetPasswordNotification($token));
    }  
}
