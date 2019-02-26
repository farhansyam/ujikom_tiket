<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transportasi;
class transportasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transportasi = Transportasi::all();
        return view('admin.Transportasi.index',compact('transportasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.Transportasi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([

        'kode_transportasi' => 'required|min:3|max:10',
        'jumlah_kursi' => 'required|min:2|max:3',
        'Keterangan' => 'required|min:6|max:40',
        'type' => 'required',

      ]);

      Transportasi::create([
        'kode' => $request->kode_transportasi,
        'jumlah_kursi'      => $request->jumlah_kursi,
        'keterangan'        => $request->Keterangan,
        'id_type_transportasi' => $request->type
      ]);

      if ($request->type == 2) {
        return redirect('admin/transportasi/pesawat');
      }
      else {
        return redirect('admin/transportasi/kereta');

      }


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
        $transportasi = Transportasi::whereIdTransportasi($id)->first();
        return view('admin.transportasi.edit',compact('transportasi'));
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

        $request->validate([

          'kode_transportasi' => 'required|min:3|max:10',
          'jumlah_kursi' => 'required|min:2|max:3',
          'Keterangan' => 'required|min:6|max:40',
          'type' => 'required',

        ]);

        Transportasi::whereIdTransportasi($id)->update([
            'kode' => $request->kode_transportasi,
            'jumlah_kursi' => $request->jumlah_kursi,
            'keterangan' => $request->Keterangan,
            'id_type_transportasi' => $request->type,
        ]);

        if ($request->type == 2) {
          return redirect('admin/transportasi/pesawat');
        }
        else {
          return redirect('admin/transportasi/kereta');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $transport = Transportasi::whereIdTransportasi($id)->first();

      if ($transport->id_type_transportasi ==  2) {
        Transportasi::where('id_transportasi',$id)->delete();
        return redirect('admin/transportasi/pesawat');
      }
      else {
        Transportasi::where('id_transportasi',$id)->delete();
        return redirect('admin/transportasi/kereta');
      }
    }

    public function pesawat()
    {
      $transportasi = Transportasi::where('id_type_transportasi','2')->get();
      return view('admin.transportasi.index',compact('transportasi'));
    }

    public function kereta()
    {
      $transportasi = Transportasi::where('id_type_transportasi','1')->get();
      return view('admin.transportasi.index',compact('transportasi'));
    }
}
