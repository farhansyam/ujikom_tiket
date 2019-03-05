<?php

namespace App\Http\Controllers;
Use App\Models\TrainStation;
Use App\Models\Train;
Use App\Models\TrainFare;

use Illuminate\Http\Request;

class TrainStationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $station = TrainStation::all();
      return view('admin.train.station.index', compact('station'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.train.station.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $data = $this->validate($request, [
          'station_name' => 'required',
          'code' => 'required',
          'city' => 'required'
      ]);
      TrainStation::create($data);
      return redirect('admin/station')->with('success','Berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $data = TrainStation::where('id',$id)->get();
      return view('admin/train/station/edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $data = $this->validate($request, [
          'station_name' => 'required',
          'code' => 'required',
          'city' => 'required'
        ]);
        TrainStation::find($id)->update($data);
        return redirect('admin/station')->with('success','Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $data = TrainStation::where('id',$id)->first();
      $data->delete();
      return redirect('admin/station')->with('alert-success','Data berhasi dihapus!');
    }
}
