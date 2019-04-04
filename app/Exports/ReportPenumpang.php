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
        $penumpangs = Passenger::With('detail_booking')->get();
        foreach($penumpangs as $penumpang)
        $bookings = Booking::whereId($penumpang->detail_booking->booking_id)->get();

        return view('admin.Lpassanger',compact('penumpangs','bookings'));
    }
}
