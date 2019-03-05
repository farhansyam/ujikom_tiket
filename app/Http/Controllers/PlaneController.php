<?php

namespace App\Http\Controllers;

use Auth;
use Alert;
use Illuminate\Http\Request;
use App\PlaneSchedule;
use App\PlaneFare;
use App\Plane;
use App\Airport;

class PlaneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $plane = Plane::with('planefare')->get();
      return view('admin.plane.index',compact('plane'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.plane.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $plane = new Plane();
      $plane->plane_name  = $request->plane_name;
      $plane->eco_seat    = $request->eco_seat;
      $plane->bus_seat    = $request->bus_seat;
      $plane->save();

      $planeFare = new PlaneFare();
      $planeFare->plane_id = $plane->id;
      $planeFare->eco_seat = $request->eco_seatfare;
      $planeFare->bus_seat = $request->bus_seatfare;
      $planeFare->unique_code = mt_rand(100,999);
      $planeFare->save();


      Alert::success('Berhasil Input data !');
      return redirect('admin/plane')->with('alert-success','Berhasil Menambah Data!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
      $data = Plane::where('id',$id)->with('planefare')->first();

      return view('admin.plane.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
      $plane = Plane::findOrFail($id);
      $plane->plane_name  = $request->plane_name;
      $plane->eco_seat    = $request->eco_seat;
      $plane->bus_seat    = $request->bus_seat;
      $plane->save();

      $planefare = PlaneFare::findOrFail($request->id);
      $planefare->eco_seat    = $request->eco_seatfare;
      $planefare->bus_seat    = $request->bus_seatfare;
      $planefare->save();

      Alert::success('Berhasil Edit data !');
      return redirect('admin/plane');
    }

    public function destroy($id)
    {
      Plane::destroy($id);
      Alert::success('Berhasil menghapus data !');
      return redirect('admin/plane');
    }

  
    public function planeAjax($id)
    {
      $plane = Plane::where("id",$id)->get();
      return response()->json($plane);
    }
}
