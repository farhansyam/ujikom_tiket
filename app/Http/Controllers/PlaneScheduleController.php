<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\PlaneSchedule;
use App\TrainSchedule;
use App\PlaneFare;
use App\Plane;
use App\Airport;

class PlaneScheduleController extends Controller
{
    public function index()
    {
      $schedule2 = PlaneSchedule::with('airport','plane')->paginate(5);
      $schedule1 = TrainSchedule::with('station','train')->paginate(5);
      return view('admin.schedule.index_schedule',compact('schedule1','schedule2'));
    }

    public function create()
    {

      $plane = Plane::all();
      $airport = Airport::all();
      return view('admin.plane.schedule.create',compact('plane','airport'));
    }

    public function store(Request $request)
    {
      $destination = Airport::find($request->destination);
      $planeschedule = new PlaneSchedule();
      $planeschedule->plane_id          = $request->plane_id;
      $planeschedule->airport_id        = $request->airport_id;
      $planeschedule->from              = $request->from;
      $planeschedule->destination       = $destination->airport_name;
      $planeschedule->from_code         = $request->from_code;
      $planeschedule->destination_code  = $request->destination_code;
      $planeschedule->eco_seat          = $request->eco_seat;
      $planeschedule->bus_seat          = $request->bus_seat;
      $planeschedule->boarding_time     = $request->boarding_time;
      $planeschedule->duration          = $request->duration;
      $planeschedule->save();


      return redirect('admin/schedule_plane/')->with('create','a');
    }

    public function destroy($id)
    {
      PlaneSchedule::destroy($id);
      return redirect('admin/plane')->with('delete','a');
    }

    public function show($id)
    {
      $detail = PlaneSchedule::whereId($id)->with('Plane')->first();
      return view('admin.plane.schedule.detail', compact('detail'));
    }


    public function edit($id)
    {
      $planeschedule = PlaneSchedule::whereId($id)->with('Plane')->get();
      $planeschedulee = PlaneSchedule::whereId($id)->with('Plane')->first();
      $asal = Airport::select('id')->whereCode($planeschedulee->destination_code)->first();
      $destination = Airport::select('id')->whereAirportName($planeschedulee->destination)->first();
      $plane = Plane::select("plane_name","id")->get();
      $airport = Airport::select("airport_name","id")->get();
      return view('admin.plane.schedule.edit',compact('planeschedule','planeschedulee','plane','airport','id_destination','asal'));
    }

    public function update(Request $request, $id)
    {
      $destination = Airport::find($request->destination);
      $planeschedule = PlaneSchedule::findorFail($id);
      $planeschedule->plane_id          = $request->plane_id;
      $planeschedule->airport_id        = $request->airport_id;
      $planeschedule->from              = $request->from;
      $planeschedule->destination       = $destination->airport_name;
      $planeschedule->from_code         = $request->from_code;
      $planeschedule->destination_code  = $request->destination_code;
      $planeschedule->eco_seat          = $request->eco_seat;
      $planeschedule->bus_seat          = $request->bus_seat;
      $planeschedule->boarding_time     = $request->boarding_time;
      $planeschedule->duration          = $request->duration;
      $planeschedule->save();
      return redirect('admin/schedule_plane')->with('edit','a');
    }

}
