<?php

namespace App\Http\Controllers;
use App\Transportasi;
use App\Rute;
use Illuminate\Http\Request;

class RuteController extends Controller
{

    public function index()
    {
        $rutes = Rute::all();
        return view('admin.rute.index',compact('rutes'));
    }

    public function create()
    {
        $transportasi = Transportasi::all();
        return view('admin.rute.create',compact('transportasi'));
    }

    public function store(Request $request)
    {
      $request->validate([

        'tujuan'       => 'required',
        'rute_awal'    => 'required',
        'rute_akhir'   => 'required',
        'harga'        => 'required',
        'transportasi' => 'required',

      ]);

      Rute::create([
        'tujuan'         => $request->tujuan,
        'rute_awal'      => $request->rute_awal,
        'rute_akhir'     => $request->rute_akhir,
        'harga'          => $request->harga,
        'id_transportasi'   => $request->transportasi
      ]);

        return redirect('admin/rute');

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
      $rute = Rute::whereIdRute($id)->first();
      $transportasi = Transportasi::all();
      return view('admin.rute.edit',compact('rute','transportasi'));
    }

    public function update(Request $request, $id)
    {
      $request->validate([

        'tujuan' => 'required',
        'rute_awal' => 'required',
        'rute_akhir' => 'required',
        'harga' => 'required',
        'transportasi' => 'required',

      ]);

      Rute::whereIdRute($id)->update([
          'tujuan' => $request->tujuan,
          'rute_awal' => $request->rute_awal,
          'rute_akhir' => $request->rute_akhir,
          'harga' => $request->harga,
          'id_transportasi' => $request->transportasi,
      ]);

      return redirect('admin/rute');



    }

    public function destroy($id)
    {
      Rute::whereIdRute($id)->delete();
      return redirect('admin/rute');
    }
}
