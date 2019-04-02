<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plane extends Model
{
    protected $fillable = ['plane_name','eco_seat','bus_seat','maskapai'];

    public function planeSchedule()
    {
      return $this->hasOne('App\PlaneSchedule');
    }
    public function planeFare()
    {
      return $this->hasOne('App\PlaneFare');
    }

    public function partner()
    {
      return $this->belongsTo('App\partner','maskapai');
    }
}
