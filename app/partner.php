<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class partner extends Model
{
    public $guarded = [];
    public $timestamps = false;

    public function plane()
    {
      return $this->belongsTo('App\Plane');
    }
}
