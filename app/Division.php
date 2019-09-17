<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    //
    public function teachers()
    {
        return $this->belongsToMany('App\Teacher','division_teacher');
    }
}
