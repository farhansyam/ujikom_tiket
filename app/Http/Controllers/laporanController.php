<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use PDF;
use App\Booking;
use App\Exports\ReportPenumpang;

class laporanController extends Controller
{
     public function laporanExel()
    {
        return Excel::download(new ReportPenumpang, 'Laporanbooking.xlsx');
        return redirect('admin/laporan');
    }

    public function laporanPDF()
    {
        $bookings = Booking::with('users','scheduleT','scheduleP')->get();
        $pdf = PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif'])
        ->loadView('admin.LbookingPDF', compact('bookings'));
    return $pdf->stream();

    }

    public function index()
    {
        $bookings = Booking::with('users','scheduleT','scheduleP')->get();
        return view('admin.laporan',compact('bookings')); 
    }

     
    }

    

