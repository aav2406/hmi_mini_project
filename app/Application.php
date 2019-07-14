<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Application extends Model
{
    
    public $timestamps = false;
    protected $table = 'applications';
    protected $fillable = [
        'reason', 'certificate', 'subject_id','student_id','status','test_no','teacher_id','division_id',
    ];
     public function user()
     {
         return $this->belongsTo('App\User','student_id','id');
     }
     public function subject()
     {
         return $this->belongsTo('App\Subject','subject_id','id');
     }
     public function division()
     {
         return $this->belongsTo('App\Division','division_id','id');
     }
     public function teacher()
     {
         return $this->belongsTo('App\Teacher');
     }
}