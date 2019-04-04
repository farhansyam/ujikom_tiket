<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\DetailBooking;

class Passenger extends Model
{
	protected $fillable = ['detail_booking_id','name'];


    public function detail_booking()
    {
      return $this->hasOne('App\DetailBooking','id','detail_booking_id');
    }
}
