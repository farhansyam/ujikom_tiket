<?php

namespace App\Http\Controllers;

use Auth;
use Alert;
use Illuminate\Http\Request;
use App\Airport;

class AirportController extends Controller
{

    public function index()
    {
        $airport = Airport::all();
        return view('admin.airport.index',compact('airport'));
    }

    public function create()
    {
        return view('admin.airport.create');
    }
    public function store(Request $request)
    {
        $data = $this->validate($request, [
          'airport_name' => 'required',
          'code' => 'required',
          'city' => 'required'
        ]);
        
        Airport::create($data);
        Alert::success('Berhasil Input data !');
        return redirect('admin/airport');
   }

    public function edit($id)
    {
        $airport = Airport::findOrFail($id);
        return view('admin.airport.edit',compact('airport'));
    }

    public function update(Request $request, $id)
    {
        //
        $update = $this->validate($request, [
          'airport_name' => 'required',
          'code' => 'required',
          'city' => 'required'
        ]);

        Alert::success('Berhasil edit data !');
        Airport::find($id)->update($update);
        return redirect('admin/airport');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Airport::destroy($id);

        Alert::success('Berhasil Hapus data !');
        return redirect('admin/airport');
    }

    public function airportAjax($id)
    {
      $airport = Airport::where("id",$id)->get();
      return response()->json($airport);
    }
}
