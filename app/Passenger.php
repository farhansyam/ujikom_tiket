<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\DetailBooking;

class Passenger extends Model
{
	protected $fillable = ['detail_booking_id','name'];


    public function detail_booking()
    {
      return $this->hasOne('App\Models\DetailBooking');
    }
}
