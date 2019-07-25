<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $fillable = [
        'user_id',
        'category',
        'portfolio_image',
    ];

    public $timestamps = false;
}
