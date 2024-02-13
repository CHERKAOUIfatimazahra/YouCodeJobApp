<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Apply extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable = ['user_id', 'announcement_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function announcement()
    {
        return $this->belongsTo(Announcement::class);
    }
    // public static function boot(){
    //     parent::boot();
    //     static::deleting(function(Apply $applies){
    //         $applies->announcement()->delete();
    //     });
    // }
}
