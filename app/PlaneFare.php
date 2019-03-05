<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlaneFare extends Model
{
    protected $fillable = ['plane_id','eco_seat','bus_seat'];

    public function plane()
    {
      return $this->belongsTo('App\Plane');
    }
}
