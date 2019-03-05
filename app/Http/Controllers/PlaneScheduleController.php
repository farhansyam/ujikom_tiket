<?php

namespace App\Http\Controllers;

use Auth;
use Alert;
use Illuminate\Http\Request;
use App\PlaneSchedule;
use App\PlaneFare;
use App\Plane;
use App\Airport;

class PlaneScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $schedule = PlaneSchedule::with('airport','plane')->get();
      return view('admin.plane.schedule.index',compact('schedule'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

      $plane = Plane::all();
      $airport = Airport::all();
      return view('admin.plane.schedule.create',compact('plane','airport'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

      Alert::success('Berhasil Input data !');

      return redirect('admin/schedule_plane/');
    }



    public function destroy($id)
    {
      PlaneSchedule::destroy($id);
      Alert::success('Berhasil menghapus data !');
      return redirect('admin/plane');
    }

    public function show($id)
    {
      $detail = PlaneSchedule::where('id',$id)->with('Plane')->first();
      return view('admin.plane.schedule.detail', compact('detail'));
    }

    public function createSchedule()
    {
      $plane = Plane::select("plane_name","id")->get();
      $airport = Airport::select("airport_name","id")->get();
      return view('admin.plane.schedule.create',compact('plane','airport'));
    }


    public function edit($id)
    {
      $planeschedule = PlaneSchedule::where('id',$id)->with('Plane')->first();

      $id_destination = Airport::select('id')->where('airport_name',$planeschedule->destination)->first();
      $plane = Plane::select("plane_name","id")->get();
      $airport = Airport::select("airport_name","id")->get();
      return view('admin.plane.schedule.edit',compact('planeschedule','plane','airport','id_destination'));
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
      Alert::success('Sukses Edit');
      return redirect('admin/schedule_plane');
    }

    public function destroySchedule($id)
    {
      $data = PlaneSchedule::where('id',$id)->first();
      $data->delete();
      return redirect('admin/schedule_plane/');
    }
}
