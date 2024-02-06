<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use PHPUnit\Metadata\AnnotationsAreNotSupportedForInternalClassesException;

class Company extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $table='companies';
    protected $fillable=[
        "name","description",
    ];

    public function announcement(){
        return $this->hasMany(Announcement::class);
    }

}
