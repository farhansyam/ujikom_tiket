<?php

namespace App\Http\Controllers;

use App\Plane;
use App\Train;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
      $pesawat = Plane::all()->count();
      $kereta = Train::all()->count();
      $users = User::whereRole('1')->count();

      return view('admin.index',compact('pesawat','kereta','users'));
    }
}
