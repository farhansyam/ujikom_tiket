<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use App\Exports\ReportPenumpang;

class laporanController extends Controller
{
     public function laporanExel()
    {
        return Excel::download(new ReportPenumpang, 'users.xlsx');
        return redirect('admin/laporan');
    }

    public function index()
    {
        return view('admin.laporan');   
    }

     
    }

    

