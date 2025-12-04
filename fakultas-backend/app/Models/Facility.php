<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    protected $fillable = [
        'faculty_id',
        'name',
        'description',
        'image',
    ];

    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }
}
