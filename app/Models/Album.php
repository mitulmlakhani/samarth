<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable = [
        'user_id',
        'remark',
        'thumb_image',
        'album_url',
        'pin',
        'mobile',
    ];

    public function studio() {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function distributor(){
        return $this->hasOneThrough('App\Models\Distributor', 'App\Models\User');
    }

    public function setAlbumUrlAttribute($value){
        return $this->attributes['album_url'] = substr_replace($value, 1, -1);
    }

    public function setThumbImageAttribute($value){
        return $this->attributes['thumb_image'] = substr_replace($value, 1, -1);
    }
}
