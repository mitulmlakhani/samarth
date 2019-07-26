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

    protected $appends = ['team_avatar'];

    public $timestamps = false;

    public function getTeamAvatarAttribute(){
        return url('storage/team/'.$this->attributes['avatar']);
    }
}
