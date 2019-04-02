<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use DB;
use App\User;
use App\PlaneSchedule;
use App\DetailBooking;

class Booking extends Model
{
     public static function getJumlahBookingPerBulan(){
 
 
    	$bulan_awal = 1;
    	$bulan_akhir = date('m');
 
    	$category = [];
 
    	$series[0]['name'] = 'Pesawat';
    	$series[1]['name'] = 'Kereta';
    	
 
 
    	$j = 0;
    	for ($i=$bulan_awal; $i <= $bulan_akhir ; $i++) { 
        
    		$series[0]['data'][] = Self::whereVehicle('plane')->where(DB::raw('MONTH(created_at)'),'like', $i.'%')->count();
    		$series[1]['data'][] = Self::whereVehicle('train')->where(DB::raw('MONTH(created_at)'),'like', $i.'%')->count();
    	}
 
      // dd($series);
    	return ['series' => $series];
 
 
    }

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
      return $this->belongsTo('App\User','user_id');
    }

    public function transaction()
    {
      return $this->hasOne('App\Transaction','booking_id');
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
