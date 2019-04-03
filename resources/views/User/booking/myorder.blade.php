@extends('layouts.master_ui')
<style>
.card .card-header:not([class*=header-]) {
    box-shadow: 0 16px 38px -12px #fafafa, 0 4px 25px 0 rgba(0,0,0,.12), 0 8px 10px -5px rgba(255, 255, 255, 0.2);
}
</style>
<div class="header-blue" data-parallax="false"

    style="background-color:#00c4ff;"
  >
      <div class="container">
        <div class="row">
          <div class="col-md-8 ml-auto mr-auto">
            <div class="brand">
              <br><br><br><br><br>
              <h1>Pesanana Saya</h1>
            </div>
          </div>
        </div>
      </div>
    </div>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        @foreach ($bookings as $booking)
            <div class="col-md-4">
            <div class="card">
                <br>
           @if ($booking->transaction->status == 1)
               <div class="card-header" style="background:#82ff87">Pembayaran Selesai</div>
               @else
               <div class="card-header" style="background:#ffb97be6">Belum Bayar !</div>
           @endif
           <br>
                <div class="card-body">
                <p>Kode Booking : {{$booking->booking_code}}</p>
                <p>Jenis Transportasi : @if ($booking->vehicle == 'train')
                    Kereta
                    @else
                    Pesawat
                @endif</p>
                <p>Rute : 
                    @if ($booking->vehicle == 'train')
                        {{$booking->scheduleT->from}} - {{$booking->ScheduleT->destination}} 
                    @else
                        {{$booking->scheduleP->from}} - {{$booking->ScheduleP->destination}} 
                    @endif
                    
                </p>
                <p style="color:red">Total  : IDR {{ number_format($booking->bill)}}</p>
                @if($booking->transaction->status == 0)
            <p>Expire: {{$booking->expire}}</p>
                <h5><b>
                    * Silakan Transfer Sesuai Nominal 
                    </b>
                </h5>
                @endif
            <p>Bank: {{$booking->transaction->bank}}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
