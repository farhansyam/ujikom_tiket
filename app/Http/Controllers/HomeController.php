<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class HomeController extends Controller
{
    public function index()
        {
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
}
