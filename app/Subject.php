<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Subject extends Model
{
    public $timestamps = false;
    protected $primayKey = 'id';
    //
    public function teachers()
    {
        return $this->belongsToMany('App\Teacher','division_teacher');
    }
}