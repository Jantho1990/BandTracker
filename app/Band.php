<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Band extends Model
{
  public function albums()
  {
    return $this->hasMany('App\Album');
  }

  public function getStillActiveStringAttribute()
  {
    return ucfirst($this->still_active);
  }
}
