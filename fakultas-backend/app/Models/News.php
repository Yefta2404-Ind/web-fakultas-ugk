<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'faculty_id',
        'title',
        'content',
        'thumbnail',
        'published_at',
    ];

    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }
}
