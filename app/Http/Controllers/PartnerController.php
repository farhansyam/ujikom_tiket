<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\partner;
class PartnerController extends Controller
{
    
    public function index()
    {
        $partners = partner::Paginate(5);
        return view('admin.partner.index',compact('partners'));
    }

    
    public function create()
    {
        return view('admin.partner.create');
    }

    public function store(Request $request)
    {
            $data = $this->validate($request,[
            'nama' => 'min:3',
            'logo' => 'mimes:jpeg'
            ]);
            
            $nama = time().'.jpg';
            $request->file('logo')->storeAs('public/images',$nama);
    

        partner::create([
            'nama' => $request->nama,
            'logo' => $nama,
            'jenis' => $request->jenis
        ]);
        return redirect('admin/partner')->with('create','s');
    }

    public function edit($id)
    {
        $partner = partner::find($id);
        return view('admin.partner.edit',compact('partner'));
    }

    public function update(Request $request, $id)
    {
        
        $this->validate($request,[
            'nama' => 'min:3',
            'logo' => 'mimes:jpeg'
            ]);
        
        $partner = partner::find($id);
            $nama = time().'.jpg';
            $request->file('logo')->storeAs('public/images',$nama);
    
        $partner->update([
            'nama' => $request->nama,
            'logo' => $nama,
            'jenis' => $request->jenis
        ]);

        return redirect('admin/partner')->with('update','s');
    }

    public function destroy($id)
    {
        partner::destroy($id);

        return redirect('admin/partner')->with('delete','s');
    }
}
