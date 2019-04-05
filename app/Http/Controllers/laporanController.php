<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use App\Booking;
use App\Exports\ReportPenumpang;

class laporanController extends Controller
{
     public function laporanExel()
    {
        return Excel::download(new ReportPenumpang, 'Laporanbooking.xlsx');
        return redirect('admin/laporan');
    }

    public function index()
    {
        return view('admin.laporan'); 
    }

     
    }

    

