<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PlaneSchedule;
use App\User;
use App\DetailBooking;

class Booking extends Model
{
    protected $fillable = ['user_id','booking_date','status','vehicle','schedule_id'];
    public function detail_booking()
    {
      return $this->hasOne('App\DetailBooking');
    }
    public function scheP()
    {
      return $this->hasOne('App\PlaneSchedule', 'id', 'schedule_id');
    }
    public function scheT()
    {
      return $this->hasOne('App\TrainSchedule', 'id', 'schedule_id');
    }

    public function users()
    {
      return $this->belongsTo('App\User','user_idp');
    }

    public function transaction()
    {
      return $this->hasOne('App\Transaction');
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
