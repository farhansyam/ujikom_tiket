<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
      // $pesawat = Transportasi::where('id_type_transportasi',2)->count();
      // $kereta = Transportasi::where('id_type_transportasi',1)->count();

      return view('admin.index');
    }
}
