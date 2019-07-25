<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'position',
        'avatar',
    ];

    public $timestamps = false;
}
