<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Airport;

class AirportController extends Controller
{
    public function cek()
    {   
       $gettoken = "https://api-sandbox.tiket.com/apiv1/payexpress?method=getToken&secretkey=97d49db434398b13be386401157ab001&output=json";
       $TokenJSON=json_decode(file_get_contents($gettoken),true);
       $Token=$TokenJSON['token'];

       $get_airport = "https://api-sandbox.tiket.com/flight_api/all_airport?token=".$Token."&output=json";
       $airports = json_decode(file_get_contents($get_airport),true);
        foreach($airports as $airport)
       {
           
       } 
       dd($airport);
    }

    public function index()
    {
        $airport = Airport::Paginate(5);
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
        return redirect('admin/airport')->with('create','asd');
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

        Airport::find($id)->update($update);
        return redirect('admin/airport')->with('edit','a');
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

        return redirect('admin/airport')->with('delete','a');
    }

    public function airportAjax($id)
    {
      $airport = Airport::where("id",$id)->get();
      return response()->json($airport);
    }
}
