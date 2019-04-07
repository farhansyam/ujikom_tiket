<?php

namespace App\Mail;

use App\Booking;
use App\DetailBooking;
use App\PlaneSchedule;
use App\TrainSchedule;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailTiket extends Mailable
{

    use Queueable, SerializesModels;
    
    public $booking;
    public $detail;
    public $jadwalP;
    public $jadwalT;
    public function __construct(Booking $booking,DetailBooking $detail,PlaneSchedule $jadwalP,TrainSchedule $jadwalT)
    {
        $this->booking = $booking;
        $this->detail = $detail;
        $this->jadwalP = $jadwalP;
        $this->jadwalT = $jadwalT;
        
    }

    public function build()
    {
        return $this->view('Mails.tiket');
    }
}
