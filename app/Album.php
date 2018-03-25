<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    public function band()
    {
        return $this->belongsTo('App\Band', 'band_id');
    }
}
