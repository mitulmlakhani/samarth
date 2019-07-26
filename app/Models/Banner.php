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

    protected $appends = ['banner_url'];

    public $timestamps = false;

    public function getBannerUrlAttribute(){
        return url('storage/banner/'.$this->attributes['banner_image']);
    }
}
