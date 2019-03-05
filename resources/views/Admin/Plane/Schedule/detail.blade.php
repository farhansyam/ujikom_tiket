@extends('layouts.app')
@section('content')


<div class="container">
          <div class="row">
              <div class="col-md-8 col-md-offset-2">
                  <div class="panel panel-default">
                      <div class="panel-heading">Detail Penerbangan <b>{{$detail->from}}</b> ke <b>{{$detail->destination}}</b></div>
            <div class="panel-body">
                <div class="container">
                  <div class="row">
                      <b>Nama Pesawat:</b> {{$detail->Plane->plane_name}}
                        <br>
                    <ul>
                      <li><b>{{$detail->Plane->eco_seat}}</b> Kursi Ekonomi</li>
                      <li><b>{{$detail->Plane->bus_seat}}</b> Kursi Bisnis</li>
                    </ul>
                    <b>Waktu Keberangkatan :</b> {{$detail->boarding_time}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <b>Durasi :</b> {{date('g:i', strtotime($detail->duration))}} JAM

                 </div>
                </div>
          </div>
      </div>
    </div>

@endsection
