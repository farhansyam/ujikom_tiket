<?php
namespace App\Exports;
use App\Passenger;
use App\Booking;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class ReportPenumpang implements FromView
{
    use Exportable;

    public function view(): View
    {
        $bookings = Booking::with('users','scheduleT','scheduleP')->get();
        return view('admin.Lbooking',compact('bookings'));
    }
}
