@extends('layouts.master_ui')
@section('content')
  <div class="header-blue" data-parallax="false" style="background-color:#00c4ff;">
      <div class="container">
        <div class="row">
          <div class="col-md-8 ml-auto mr-auto">
            <div class="brand">
              <br><br><br><br><br>
              <h1>Tiket Yang Tersedia.</h1>
              <img src='{{asset('images/pc9.png')}}'>
            </div>
          </div>
        </div>
      </div>
    </div>
<br>
    <div class="main main-raised">
      <div class="section section-basic">
        <div class="container">
            <div class="row">
              @if ($schedule->isEmpty())
                <h1>Maaf Tidak Ada jadwal atau Sudah Penuh</h1>
                @else
                  <form class="" action="{{route('order')}}" method="post">
                    <input type="hidden" name="vehicle" value="{{$vehicle}}">
                    <input type="hidden" name="total" value="{{implode(',',$total)}}">
                    <input type="hidden" name="seat" value="{{$seat}}">
                    @csrf
                  <table class="table responsive">
                    <th>
                      <tr>
                      <td>No.</td>
                      <td>Asal</td>
                      <td>Tujuan</td>
                      <td>Keberangkatan</td>
                      <td>Durasi</td>
                      <td>Nama Pesawat</td>
                      @if ($seat == "bus_seat")
                        <td>Harga 1 Kursi Bisnis</td>
                      @else
                        <td>Harga 1 Kursi Ekonomi</td>
                      @endif
                      <td>X</td>
                    </tr>
                    </th>
                    @foreach ($schedule as $data)
                      <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$data->from}}</td>
                      <td>{{$data->destination}}</td>
                      <td>{{$data->boarding_time}}</td>
                      <td>{{$data->duration}}</td>
                      <td>{{$data->plane_name}}</td>
                      @if ($seat == "bus_seat")
                        <td>IDR {{ number_format($data->bus_seat) }}</td>
                      @else
                        <td>IDR {{ number_format($data->eco_seat) }}</td>
                      @endif
                      <td> <button type="submit" name="button">Pilih</button> </td>
                      </tr>
                    @endforeach
                  </table>
                </form>

              @endif
            </div>
        </div>
        <div class='content_shadow'></div>
      </div>
    </div>


@endsection
