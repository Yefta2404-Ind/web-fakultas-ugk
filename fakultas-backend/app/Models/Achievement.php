<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    protected $fillable = [
        'faculty_id',
        'title',
        'description',
        'year',
        'image',
    ];

    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }
}
