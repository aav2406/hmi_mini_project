<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class InternalTest extends Model
{
    protected $table = 'internal_tests';
    public $timestamps = false;
    protected $fillable = [
         'ia1','subject_id','student_id','division_id','ia2','status1','status2','Avg'
    ];
    public function subject()
    {
        return $this->belongsTo('App\Subject');
    }
    public function user()
    {
        return $this->belongsTo('App\User','student_id','id');
    }
}