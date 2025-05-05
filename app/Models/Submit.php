<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Submit extends Model
{
    protected $table = 'submissions';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'city',
        'profile_picture'
    ];
}