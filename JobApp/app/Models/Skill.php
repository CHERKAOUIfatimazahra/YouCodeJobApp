<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;
    protected $table='skill';
    protected $fillable=[
        "skill",
    ];
    // public function announcement(){
    //     return $this->hasMany(Announcement::class);
    // }
    // public function skilable()
    // {
    //     return $this->morphTo();
    // }
    public function users()
    {
        return $this->belongsToMany(User::class, 'skill_user');
    }

    // public function announcement()
    // {
    //     return $this->morphedByMany(Announcement::class, 'skill_id');
    // }
}
