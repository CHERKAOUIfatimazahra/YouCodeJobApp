<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;

    protected $table='Announcements';
    protected $fillable=[
        "title","description","date","company_id",
    ];
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
