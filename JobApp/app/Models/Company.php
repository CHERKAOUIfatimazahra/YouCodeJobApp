<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PHPUnit\Metadata\AnnotationsAreNotSupportedForInternalClassesException;

class Company extends Model
{
    use HasFactory;

    protected $table='companies';
    protected $fillable=[
        "name","description",
    ];

    public function announcement(){
        return $this->hasMany(Announcement::class);
    }

}
