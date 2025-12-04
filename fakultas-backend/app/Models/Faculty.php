<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'hero_image',
        'logo',
    ];

    public function sections()   { return $this->hasMany(Section::class); }
    public function programs()   { return $this->hasMany(Program::class); }
    public function lecturers()  { return $this->hasMany(Lecturer::class); }
    public function facilities() { return $this->hasMany(Facility::class); }
    public function achievements(){ return $this->hasMany(Achievement::class); }
    public function news()       { return $this->hasMany(News::class); }
    public function admins()     { return $this->hasMany(User::class)->where('role', 'admin'); }
}
