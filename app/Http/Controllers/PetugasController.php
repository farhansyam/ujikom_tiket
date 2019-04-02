<?php

namespace App\Http\Controllers;

use App\Train;
use App\Plane;
use App\User;
use App\Partner;
use App\Booking;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    public function index()
    {
      $train = Train::count();
      $plane = Plane::count();
      $partner = partner::count();
      $user = User::count();

        $chart= Booking::getJumlahBookingPerBulan();
        return view('admin.index',compact('train','plane','user','partner','chart'));
  
    }
}
