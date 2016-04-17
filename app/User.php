<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function statuses()
    {
      return $this->hasMany('App\Status');
    }

    public function follows()
    {
        // return $this->hasMany('User', 'followers', 'follow_id', 'user_id')->withTimestamps();
        return $this->hasMany('App\Follow');
    }

    // public function following()
    // {
    //     return $this->belongsToMany('User', 'followers', 'user_id', 'follow_id')->withTimestamps();
    // }
}
