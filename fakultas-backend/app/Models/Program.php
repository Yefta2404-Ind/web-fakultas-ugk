<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $fillable = [
        'faculty_id',
        'name',
        'degree',
        'description',
    ];

    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }
}
