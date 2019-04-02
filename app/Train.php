<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Train extends Model
{
    public function trainSchedule()
    {
      return $this->hasOne('App\TrainSchedule');
    }
    public function trainFare()
    {
      return $this->hasOne('App\TrainFare');
    }

    public function Train()
    {
      return $this->belongsTo('App\partner','kereta');
    }
}
