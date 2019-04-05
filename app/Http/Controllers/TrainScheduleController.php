<?php

namespace App\Http\Controllers;

use Auth;
use Alert;
use Illuminate\Http\Request;
use App\TrainSchedule;
use App\TrainFare;
use App\Train;
use App\Station;

class TrainScheduleController extends Controller
{   
    public function create()
    {

      $train = Train::all();
      $station = Station::all();
      return view('admin.train.schedule.create',compact('train','station'));
    }

  
    public function store(Request $request)
    {
      $destination = Station::find($request->destination);
      $trainschedule = new TrainSchedule();
      $trainschedule->train_id          = $request->train_id;
      $trainschedule->station_id        = $request->station_id;
      $trainschedule->from              = $request->from;
      $trainschedule->destination       = $destination->station_name;
      $trainschedule->from_code         = $request->from_code;
      $trainschedule->destination_code  = $request->destination_code;
      $trainschedule->eco_seat          = $request->eco_seat;
      $trainschedule->bus_seat          = $request->bus_seat;
      $trainschedule->exec_seat          = $request->exec_seat;
      $trainschedule->boarding_time     = $request->boarding_time;
      $trainschedule->duration          = $request->duration;
      $trainschedule->save();


      return redirect('admin/schedule')->with('create','a');
    }



    public function destroy($id)
    {
      TrainSchedule::destroy($id);
      Alert::success('Berhasil menghapus data !');
      return redirect('admin/train');
    }

    public function show($id)
    {
      $detail = TrainSchedule::where('id',$id)->with('Train')->first();
      return view('admin.train.schedule.detail', compact('detail'));
    }


    public function edit($id)
    {
      $trainschedule = TrainSchedule::where('id',$id)->with('Train')->get();
      $trainschedulee = TrainSchedule::where('id',$id)->with('Train')->first();
      $destination = Station::select('id')->where('station_name',$trainschedulee->destination)->first();
      $train = Train::select("train_name","id")->get();
      $station = Station::select("station_name","id")->get();
      return view('admin.train.schedule.edit',compact('trainschedulee','trainschedule','train','station','destination'));
    }

    public function update(Request $request, $id)
    {
      $destination = Station::find($request->destination);
      $trainschedule = TrainSchedule::findorFail($id);
      $trainschedule->train_id          = $request->train_id;
      $trainschedule->station_id        = $request->station_id;
      $trainschedule->from              = $request->from;
      $trainschedule->destination       = $destination->station_name;
      $trainschedule->from_code         = $request->from_code;
      $trainschedule->destination_code  = $request->destination_code;
      $trainschedule->eco_seat          = $request->eco_seat;
      $trainschedule->bus_seat          = $request->bus_seat;
      $trainschedule->boarding_time     = $request->boarding_time;
      $trainschedule->duration          = $request->duration;
      $trainschedule->save();
      return redirect('admin/schedule')->with('edit','a');
    }

}
