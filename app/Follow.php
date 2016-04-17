<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $fillable = ['follower_id'];
    public function users()
    {
      return $this->belongsTo('App\User');
    }
}
