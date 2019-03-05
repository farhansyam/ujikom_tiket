<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class TrainSchedule extends Model
{
    protected $fillable = ['id','station_id','train_id','from','destination','from_code','destination_code','boarding_time','duration','eco_seat','bus_seat','exec_seat','platform'];
    public function train()
    {
      return $this->belongsTo('App\Models\Train');
    }
    public function station()
    {
      return $this->belongsTo('App\Models\TrainStation');
    }

    public static function findSchedule($from, $destination, $date, $seat, $total)
    {
      $dataSchedule = DB::table('train_schedules')
        ->join('trains', 'trains.id', '=', 'train_schedules.train_id')
        ->join('train_fares', 'train_fares.train_id','=','train_schedules.train_id')
        ->select('train_schedules.id',
                'train_schedules.platform',
                'train_schedules.from',
                'train_schedules.destination',
                'train_schedules.boarding_time',
                'train_schedules.duration',
                'trains.train_name',
                'train_fares.'.$seat,
                'train_fares.unique_code')
        ->where([
        ['train_schedules.from_code', '=', $from],
        ['train_schedules.destination_code', '=', $destination],
        ['train_schedules.boarding_time', 'LIKE', '%'.$date.'%'],
        ['train_schedules.'.$seat, '>=', $total]
      ])->get();
      return $dataSchedule;
    }
    public static function findWithPrice(Array $id, $seat)
    {
      $data = DB::table('train_schedules')
        ->join('trains', 'trains.id', '=', 'train_schedules.train_id')
        ->join('train_fares', 'train_fares.train_id','=','train_schedules.train_id')
        ->select('train_schedules.from',
                'train_schedules.id',
                'train_schedules.platform',
                'train_schedules.destination',
                'train_schedules.boarding_time',
                'trains.train_name',
                'train_fares.'.$seat,
                'train_fares.unique_code')
        ->whereIn('train_schedules.id', $id)
        ->get();

      return $data;
    }
    public static function findPrice($id, $seat)
    {
      $data = DB::table('train_schedules')
                ->join('train_fares', 'train_fares.train_id', '=', 'train_schedules.train_id')
                ->select(
                  'train_fares.'.$seat,
                  'train_fares.unique_code')
                ->where('train_schedules.id', $id)
                ->get()->first();
      return $data;
    }
    public static function seatMath($total, $seat, $id)
    {
      TrainSchedule::whereIn('id', $id)->decrement($seat, $total);
    }
}
