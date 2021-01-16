<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    public function user(){
      return $this->belongsTo('App\USer');
    }

    public function users(){
      return $this->belongsToMany('App\User')->withTimestamps();
    }
}