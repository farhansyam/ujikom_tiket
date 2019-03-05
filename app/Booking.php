<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\PlaneSchedule;
use App\Models\DetailBooking;

class Booking extends Model
{
    protected $fillable = ['user_id','booking_date','status','vehicle','schedule_id'];
    public function detail_booking()
    {
      return $this->hasOne('App\Models\DetailBooking');
    }
    public function scheP()
    {
      return $this->hasOne('App\Models\PlaneSchedule', 'id', 'schedule_id');
    }
    public function scheT()
    {
      return $this->hasOne('App\Models\TrainSchedule', 'id', 'schedule_id');
    }

    public function transaction()
    {
      return $this->hasOne('App\Models\Transaction');
    }

    //
    public static function singleTrip($go, $userID)
    {
      $planeSchedule = PlaneSchedule::find($go);
      $bookings = new Booking();
      $bookings->user_id = $userID;
      $bookings->booking_date = date('Y-m-d H:i:s');
      $bookings->status = 1;
      $bookings->type = "Pesawat";
      $bookings->schedule_id = $go;
      $bookings->save();
    }

}
