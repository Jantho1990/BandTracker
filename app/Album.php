<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $guarded = [];

    public function band()
    {
        return $this->belongsTo('App\Band');
    }
}
