<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacultySection extends Model
{
    use HasFactory;

    protected $fillable = [
        'faculty_id', 'section_key', 'title', 'content', 'image'
    ];

    public function faculty() {
        return $this->belongsTo(Faculty::class);
    }
}
