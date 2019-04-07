<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>{{ config('app.name') }} | E-Tiket</title>
    <link href="{{ public_path('css/app2.css') }}" rel="stylesheet" type="text/css">
  </head>
  <body>
      <div class="container">
        <h1><b>E-Tiket</b></h1>
        @if ($booking->vehicle == 'plane')
          <h4>Jadwal penerbangan {{date('d-m-Y', strtotime($jadwalP->boarding_time))}}</h4>
        @else
          <h4>Jadwal keberangkatan {{date('d-m-Y', strtotime($jadwalT->boarding_time))}}</h4>
        @endif
      </div>

      <div class="container">
        <div class="col-md-12">
          <div class="panel panel-info">
            <div class="panel-heading">
              <h4><b>Detail Penumpang</b></h4>
            </div>
            <div class="panel-body">
              <div class="col-md-3">
                <h4>Booking code</h4>
                <h3>{{$booking->booking_code}}</h3>
              </div>
              <div class="col-md-9">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Nama penumpang</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($detail->passengers as $p)
                      <tr>
                        <td>{{$p->name}}</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-12">
          <div class="panel panel-info">
            <div class="panel-heading">
              <h4><b>Detail Perjalanan</b></h4>
            </div>
            <div class="panel-body">
            <table class="table table-striped">
              <thead>
                @if ($booking->vehicle == 'plane')
                  <tr>
                    <th><center>Pesawat</center></th>
                    <th><center>Keberangkatan</center></th>
                    <th><center>Ketibaan</center></th>
                  </tr>
                @else
                  <tr>
                    <th><center>Kereta</center></th>
                    <th><center>Keberangkatan</center></th>
                    <th><center>Ketibaan</center></th>
                  </tr>
                @endif

              </thead>
                <tr>
                  {{-- <td><center><img src="images/garuda2.png" alt="..."></center> --}}
                    @if ($booking->vehicle == 'plane')
                      <h5 class="card-title"><center><b>{{$jadwalP->plane->plane_name}}</b></center></h5></td>
                      <td>
                        <h5 class="card-title"><b>{{$jadwalP->from}} ({{$jadwalP->from_code}})</b></h5>
                        <p class="card-text">{{date('d-m-Y', strtotime($jadwalP->boarding_time))}}</p>
                        <p class="card-text">{{date('H:i', strtotime($jadwalP->boarding_time))}}</p>
                      </td>
                      <td>
                        <h5 class="card-title"><b>{{$jadwalP->destination}} ({{$jadwalP->destination_code}})</b></h5>
                        @php
                          $duration = $jadwalP->duration;
                          $range    = $jadwalP->boarding_time ."+$duration hours";
                        @endphp
                        <p class="card-text">{{$range}}</p>
                        <p class="card-text">{{$range}}</p>
                      </td>
                    @else
                      <h5 class="card-title"><center><b>{{$jadwalT->train->train_name}}</b></center></h5></td>
                      <td>
                        <h5 class="card-title"><b>{{$$jadwalT->from}} ({{$$jadwalT->from_code}})</b></h5>
                        <p class="card-text">{{date('d-m-Y', strtotime($$jadwalT->boarding_time))}}</p>
                        <p class="card-text">{{date('H:i', strtotime($$jadwalT->boarding_time))}}</p>
                      </td>
                      <td>
                        <h5 class="card-title"><b>{{$$jadwalT->destination}} ({{$$jadwalT->destination_code}})</b></h5>
                        @php
                          $duration = $jadwalT->duration;
                          $range    = $jadwalT->boarding_time ."+$duration hours";
                        @endphp
                        <p class="card-text">{{date('d-m-Y', $range)}}</p>
                        <p class="card-text">{{date('H:i', $range)}}</p>
                      </td>
                    @endif
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
  </body>
</html>
