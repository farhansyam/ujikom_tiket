<?php

namespace App\Http\Controllers;
use DB;
use Carbon\Carbon;
use App\Plane;
use App\Train;
use App\User;
use App\partner;
use App\Booking;
use Illuminate\Http\Request;

class AdminController extends Controller
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
