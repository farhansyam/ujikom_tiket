<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainFare extends Model
{
    protected $fillable = ['train_name','eco_seat','bus_seat','exec_seat'];
    
    public function train()
    {
      return $this->belongsTo('App\Train');
    }
}
