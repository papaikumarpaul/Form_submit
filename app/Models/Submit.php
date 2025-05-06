<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Submit extends Authenticatable
{
    use HasApiTokens, Notifiable;
    protected $table = 'submissions';
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'city',
        // 'profile_picture'
    ];
    protected $hidden = [
        'password',
    ];
}