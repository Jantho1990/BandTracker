<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Band extends Model
{
  public function album(){
    return $this->hasMany('App\Album');
  }
}
