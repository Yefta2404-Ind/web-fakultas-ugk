<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // super_admin, admin
        'faculty_id', // nullable
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }
}
