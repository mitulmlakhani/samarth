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

    protected $appends = ['portfolio_url'];

    public $timestamps = false;

    public function getPortfolioUrlAttribute(){
        return url('storage/portfolio/'.$this->attributes['portfolio_image']);
    }
}
