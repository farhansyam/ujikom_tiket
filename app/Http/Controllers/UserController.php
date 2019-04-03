<?php

namespace App\Http\Controllers;
use App\User;
use App\Booking;
use App\BankAccount;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function myOrder($id)
    {
        $bookings = Booking::whereUserId($id)->with('detail_booking','transaction','scheduleP','scheduleT')->get();
        // dd($bookings[0]->scheduleP->destination);
        // foreach($bookings as $booking)
        // {
        // $bank = BankAccount::whereBank($booking->transaction->bank)->get();
        // }

        return view('user.booking.myorder',compact('bookings','bank'));
    }

     public function index()
    {
        //
       return view('admin.users.index',['users' => User::whereRole(1)->get()]);
    }

    public function petugas()
    {
        //
       return view('admin.users.petugas',['users' => User::whereRole(2)->get()]);
    }

    public function search(Request $request){

     $findUser = User::where('email','LIKE',"%$request->q%")->orWhere('name','LIKE',"%$request->q")->paginate(10);
     return $findUser;

    }
    public function edit($id)
    {
        $user = User::find($id);
    }
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'email' => 'required|unique:users,email,'.$id.'|max:255|email',
            'name' => 'required',
        ]);

        $updateUser = User::find($id)->update(['email' => $request->email,'name' => $request->name]);
        if($updateUser){
         return response(200);
        } else {
         return response(500);
        }

    }

    public function destroy($id)
    {
       User::destroy($id);
       return redirect('admin/user')->with('delete','ss');

    }

}
