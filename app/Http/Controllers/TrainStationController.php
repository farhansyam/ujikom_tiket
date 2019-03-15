<?php

namespace App\Http\Controllers;

Use App\Train;
Use App\TrainSchedule;
Use App\TrainFare;
Use App\Station;

use Illuminate\Http\Request;

class TrainStationController extends Controller
{

    public function index()
    {
      $station = Station::paginate(5);
      return view('admin.station.index', compact('station'));
    }

    public function create()
    {
        return view('admin.station.create');
    }

    public function store(Request $request)
    {
      $data = $this->validate($request, [
          'station_name' => 'required',
          'code' => 'required',
          'city' => 'required'
      ]);

      Station::create($data);
      return redirect('admin/station')->with('create','a');
    }


    public function edit($id)
    {
      $station = Station::where('id',$id)->first();
      return view('admin/station/edit', compact('station'));
    }

    public function update(Request $request, $id)
    {
      $data = $this->validate($request, [
          'station_name' => 'required',
          'code' => 'required',
          'city' => 'required'
        ]);
        Station::find($id)->update($data);
        return redirect('admin/station')->with('edit','a');
    }

    public function destroy($id)
    {
        Station::destroy($id);
       return redirect('admin/station')->with('delete','a');
    }

    public function stationAjax($id)
    {
      $airport = Station::whereId($id)->get();
      return response()->json($airport);
    }
}
