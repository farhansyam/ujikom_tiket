<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Booking;
use App\Models\Passenger;

class DetailBooking extends Model
{
	protected $fillable = ['booking_id','fare','passenger','class'];
		public function booking()
		{
			return $this->belongsTo(Booking::class);
		}
    public function passengers()
    {
      return $this->hasMany(Passenger::class);
    }
}
