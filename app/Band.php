<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Band extends Model
{
  protected $guarded = [];
  
  public function albums()
  {
    return $this->hasMany('App\Album');
  }

  public function getStillActiveStringAttribute()
  {
    return $this->still_active ? 'True' : 'False';
  }
}
