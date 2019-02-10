<?php

namespace App\Http\Controllers;


use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile()
    {
      $profiles = Auth::user();
      return $profiles;
    }
}
