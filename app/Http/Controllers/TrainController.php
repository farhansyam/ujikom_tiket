<?php

namespace App\Http\Controllers;

Use App\Train;
Use App\TrainFare;
Use App\TrainStation;
Use App\TrainSchedule;

use Illuminate\Http\Request;

class TrainController extends Controller
{
    public function index()
    {
      $train = Train::with('trainfare')->paginate(5);
      return view('admin.train.index',compact('train'));
    }

    public function create()
    {
      return view('admin.train.create');
    }

    public function store(Request $request)
    {
      $train = new Train();
      $train->train_name  = $request->train_name;
      $train->eco_seat    = $request->eco_seat;
      $train->bus_seat    = $request->bus_seat;
      $train->exec_seat  = $request->exec_seat;
      $train->save();

      $trainfare = new TrainFare();
      $trainfare->train_id = $train->id;
      $trainfare->eco_seat = $request->eco_seatfare;
      $trainfare->bus_seat = $request->bus_seatfare;
      $trainfare->exec_seat = $request->exec_seatfare;
      $trainfare->unique_code = mt_rand(100,999);
      $trainfare->save();
      return redirect('admin/train')->with('create','a');
    }

    public function edit($id)
    {
      $data = Train::whereId($id)->with('trainfare')->first();
      return view('admin/train/edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
      $train = Train::findOrFail($id);
      $train->train_name  = $request->train_name;
      $train->eco_seat    = $request->eco_seat;
      $train->bus_seat    = $request->bus_seat;
      $train->exec_seat   = $request->exec_seat;
      $train->save();
      $trainfare = TrainFare::findOrFail($request->id);
      $trainfare->eco_seat    = $request->eco_seatfare;
      $trainfare->bus_seat    = $request->bus_seatfare;
      $trainfare->exec_seat   = $request->exec_seatfare;
      $trainfare->save();

      return redirect('admin/train')->with('edit','a');
    }
    public function destroy($id)
    {
      Train::destroy($id);
      return redirect('admin/train')->with('delete','a');
    }

    public function trainAjax($id)
    {
      $plane = Train::whereId($id)->get();
      return response()->json($plane);
    }

}
