<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class News extends Model
{
    protected $table = "news";
    protected $fillable = [
         'Notification', 'expiry',
    ];
    protected $primaryKey ='id';
    public $timestamps = false;
    
    public static function boot()
    {
        parent::boot();
    
        static::creating(function ($model) {
            $model->created_at = $model->freshTimestamp();
         });
    }
    
}