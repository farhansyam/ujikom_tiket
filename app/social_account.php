<?php

namespace App;
use User;
use Illuminate\Database\Eloquent\Model;

class social_account extends Model
{
    public $guarded = [];

    public function user()
    {
      return $this->belongsTo('App\User');
    }
}
