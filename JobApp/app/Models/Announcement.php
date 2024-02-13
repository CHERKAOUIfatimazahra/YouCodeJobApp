<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Announcement extends Model
{   
    use SoftDeletes;    
    use HasFactory;

    protected $table = 'announcements'; // Conventionally, table names should be lowercase and plural
    protected $fillable = [
        "title", "description", "date", "company_id",
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class);
    }

    public function applies()
    {
        return $this->hasMany(Apply::class);
    }

    
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($announcement) {
            $announcement->applies()->delete();
        });
    }
}
