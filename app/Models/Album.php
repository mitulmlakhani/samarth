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

    public function user(){
        return $this->hasOne('Models\User');
    }
}
