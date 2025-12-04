<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    protected $fillable = [
        'faculty_id',
        'name',
        'photo',
        'position',
        'email',
    ];

    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }
}
