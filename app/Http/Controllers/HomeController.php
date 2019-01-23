<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
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
        $user = auth::user();
        if ($user) {
          if ($user->role == 3) {
            return view('Admin.index');
          }
          elseif ($user->role == 2) {
            return view('layouts.Admin');
          }
          else {
            return view('user.index');
          }
        }
        else {
          return view('user.index');
        }
    }
}
