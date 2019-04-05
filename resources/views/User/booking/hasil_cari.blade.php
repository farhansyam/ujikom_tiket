@extends('layouts.master_ui')
@section('content')
  <div class="header-blue" data-parallax="false"

  @if ($vehicle == 'plane')
    style="background-color:#00c4ff;"
  @else
    style="background-color:#ffa90d;"

  @endif
  >
      <div class="container">
        <div class="row">
          <div class="col-md-8 ml-auto mr-auto">
            <div class="brand">
              <br><br><br><br><br>
              <h1>Tiket Yang Tersedia.</h1>
              @if ($vehicle == 'plane')
                <img src='{{asset('images/pc9.png')}}'>
              @else
                <marquee right>
                  <img src='{{asset('images/pc2.png')}}'>
                </marquee>
              @endif
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
              <div class="col-md-12">
              @if ($schedule->isEmpty())
                <h1>Maaf Tidak Ada jadwal atau Sudah Penuh</h1>
                @else
                  <form class="" action="{{route('order')}}" method="post">
                    <input type="hidden" name="vehicle" value="{{$vehicle}}">
                    <input type="hidden" name="total" value="{{implode(',',$total)}}">
                    <input type="hidden" name="seat" value="{{$seat}}">
                    @csrf
                    @if ($vehicle == 'plane')
                      <table class="table responsive">
                        <th>
                          <tr>
                          <td>No.</td>
                          {{-- <td>Maskapai</td> --}}
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
                          {{-- <td class="center"><img src="{{asset('storage/images/'.$data->Partner->logo)}}" height="100" width="100"></td> --}}
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
                          <td> <button type="submit" name="go" value="{{$data->id}}">Pilih</button> </td>
                          </tr>
                        @endforeach

                      </table>
                    @else
                      <table class="table responsive">
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
                        @foreach ($schedule as $data)
                          <tr>
                          <td>{{$loop->iteration}}</td>
                          <td>{{$data->from}}</td>
                          <td>{{$data->destination}}</td>
                          <td>{{$data->boarding_time}}</td>
                          <td>{{$data->duration}}</td>
                          <td>{{$data->train_name}}</td>
                          @if ($seat == "bus_seat")
                            <td>IDR {{ number_format($data->bus_seat) }}</td>
                          @else
                            <td>IDR {{ number_format($data->eco_seat) }}</td>
                          @endif
                          <td> <button type="submit" name="go" value="{{$data->id}}">Pilih</button> </td>
                          </tr>
                        @endforeach

                      </table>
                    @endif
                  </form>

              @endif
            </div>
            </div>
        </div>
        <div class='content_shadow'></div>
      </div>
    </div>


@endsection
