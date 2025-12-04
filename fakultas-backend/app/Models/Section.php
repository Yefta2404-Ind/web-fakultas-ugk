<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = [
        'faculty_id',
        'title',
        'content',
        'image',
        'video_url',
        'order',
    ];

    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }
}
