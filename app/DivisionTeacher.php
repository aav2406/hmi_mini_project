<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DivisionTeacher extends Model
{
    protected $table='division_teacher';
    public $timestamps = false;
    public function subject()
    {
        return $this->belongsTo('App\Subject','subject_id','id');
    }
    public function division()
    {
        return $this->belongsTo('App\Division','division_id','id');
    }
}
