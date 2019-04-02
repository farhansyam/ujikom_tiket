<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{   
    public $guarded = [];
    public function booking()
    {
      return $this->belongsTo('App\Booking');
    }
}
