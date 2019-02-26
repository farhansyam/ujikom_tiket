<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $users = User::Where('role',1)->Orwhere('role',2)->get();
        return view('admin.users.index',compact('users'));
    }


    public function show($id)
    {
        //
    }

    public function destroy($id)
    {
      User::whereId($id)->delete();
      return redirect('admin/users');
    }
}
