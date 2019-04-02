<?php

namespace App\Http\Controllers;


use App\BankAccount;
use Illuminate\Http\Request;

class AtmController extends Controller
{
    public function index()
    {
        $atms = BankAccount::paginate(6);
        return view('admin.atm.index',compact('atms'));
    }

    public function create()
    {
      return view('admin.atm.create');
    }

    public function store(Request $request)
    {
        $atms = $this->validate($request,[
            'bank' => 'min:4',
            'account_name' => 'min:2',
            'account_number' => 'min:4'
        ]);

        BankAccount::create($atms);
        return redirect('admin/atm')->with('create','s');
    }

    public function edit($id)
    {
        $atms = BankAccount::find($id);
        return view('admin.atm.edit',compact('atms'));
    }

     public function update(Request $request,$id)
     {
         $atms = $this->validate($request,[
             'bank' => 'min:4',
             'account_name' => 'min:2',
             'account_number' => 'min:4'
         ]);

         $bank = BankAccount::find($id);
         $bank->update($atms);

         return redirect('admin/atm')->with('edit','s');
     }

    public function destroy($id)
    {
        BankAccount::destroy($id);
        return redirect('admin/atm')->with('delete','s');
    }
}
