<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Alert;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth')    ;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      Alert::message('Welcome back! Farhan');

        $user = auth::user();
        if ($user) {
          if ($user->role == 3) {
            return redirect('admin');
          }
          elseif ($user->role == 2) {
            return redirect('petugas');
          }
          else {
            return view('user.index');
          }
        }
        else {
          return view('user.index');
        }
    }

    public function test()
    {
      return view('auth.test');
    }
}
