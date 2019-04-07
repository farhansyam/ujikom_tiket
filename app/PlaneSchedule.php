<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class PlaneSchedule extends Model
{
    protected $fillable = ['airport_id','plane_id','from','destination','from_code','eco_seat','bus_seat','boarding_time','duration'];
    public function plane()
    {
      return $this->belongsTo('App\Plane');
    }
    public function airport()
    {
      return $this->belongsTo('App\Airport');
    }

    public static function findSchedule($from, $destination, $date, $seat, $total)
    {

      $dataSchedule = DB::table('plane_schedules')
      ->join('planes', 'planes.id', '=', 'plane_schedules.plane_id')
      ->join('partners', 'partners.id', '=', 'planes.maskapai')
        ->join('plane_fares', 'plane_fares.plane_id','=','plane_schedules.plane_id')
        ->select('plane_schedules.id',
                'plane_schedules.from',
                'plane_schedules.destination',
                'plane_schedules.boarding_time',
                'plane_schedules.duration',
                'planes.plane_name',
                'partners.logo',
                'plane_fares.'.$seat,
                'plane_fares.unique_code')
        ->where([
        ['plane_schedules.from_code', '=', $from],
        ['plane_schedules.destination_code', '=', $destination],
        ['plane_schedules.boarding_time', 'LIKE', '%'.$date.'%'],
        ['plane_schedules.'.$seat, '>=', $total]
      ])->get();

      return $dataSchedule;
    }
    public static function findWithPrice(Array $id, $seat)
    {
      $data = DB::table('plane_schedules')
        ->join('planes', 'planes.id', '=', 'plane_schedules.plane_id')
        ->join('plane_fares', 'plane_fares.plane_id','=','plane_schedules.plane_id')
        ->select('plane_schedules.from',
                'plane_schedules.id',
                'plane_schedules.destination',
                'plane_schedules.boarding_time',
                'planes.plane_name',
                'plane_fares.'.$seat,
                'plane_fares.unique_code')
        ->whereIn('plane_schedules.id', $id)
        ->get();

      return $data;
    }
    public static function findPrice($id, $seat)
    {

      $data = DB::table('plane_schedules')
                ->join('plane_fares', 'plane_fares.plane_id', '=', 'plane_schedules.plane_id')
                ->select(
                  'plane_fares.'.$seat,
                  'plane_fares.unique_code'
                  )
                ->where('plane_schedules.id', $id)
                ->get()->first();
      return $data;
    }
    public static function seatMath($total, $seat, $id)
    {
      PlaneSchedule::whereIn('id', $id)->decrement($seat, $total);
    }
}
