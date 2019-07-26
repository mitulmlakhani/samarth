<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'mobile',
        'adddress',
        'avatar',
        'theme', 
        'facebook_link',
        'instagram_link',
        'pinrest_link',
        'website',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = [
        'avatar_url'
    ];

    public function albums(){
        return $this->hasMany('App\Models\Album');
    }
    
    public function banners(){
        return $this->hasMany('App\Models\Banner');
    }
    
    public function services(){
        return $this->hasMany('App\Models\Service');
    }
    
    public function teams(){
        return $this->hasMany('App\Models\Team');
    }
    
    public function portfolios(){
        return $this->hasMany('App\Models\Portfolio');
    }

    public function GetAvatarUrlAttribute() {
        return url('storage/'. ($this->avatar ?: 'user_default.png'));
    }
}
