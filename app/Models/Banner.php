<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'banner_image',
    ];

    public $timestamps = false;
}
