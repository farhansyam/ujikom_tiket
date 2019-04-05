@extends('layouts.master_ui')
@section('content')
<div class="header-blue" data-parallax="false"

style="background-color:#99caac"
>
<div class="container">
  <div class="row">
    <div class="col-md-8 ml-auto mr-auto">
      <div class="brand">
        <br><br><br><br><br>
        <h1>Pemesanan Tiket</h1>
        <img src='{{asset('images/pc10.jpg')}}' height="400">
      </div>
    </div>
  </div>
</div>
</div>
<br>
<div class="main main-raised">
  <div class="section section-basic">
    
    <center>
      <head><h2>PEMESANAN TIKET</h2></head>
    </center>
    
    <form action="{{ url('booking/fixOrder') }}" method="post">
      {{ csrf_field() }}
      <input type="hidden" name="vehicle" value="{{$vehicle}}">
      <input type="hidden" name="total" value="{{implode(',',$total)}}">
      <input type="hidden" name="totalCount" value="{{$totalCount}}">
      <input type="hidden" name="seat" value="{{$seat}}">
      <input type="hidden" name="class" value="{{$class}}">
      
      <div class="container">
        <div class="row">
          <div class="col-sm-6">
             <div class="card card-info">
               <br>
              <div class="card-heading" style="margin-left:200px"><b>Metode pembayaran</b></div>
              <div class="card-body">
                <div class="card-group" id="accordion" role="tablist" aria-multiselectable="true">
                  @foreach ($bank as $b)
                  <input type="radio" name="bank" value="{{$b->bank}}">{{$b->bank}}
                  <div id="{{$b->bank}}" class="card-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                    <div class="card-body">
                      <div class="form-group">
                        <input type="radio" name="bank" value="{{$b->bank}}">
                      </div>
                      <div class="form-group">
                        <div class="col-sm-3">
                          <p>Atas nama</p>
                        </div>
                        <div class="col-sm-9">
                          <p>: {{$b->account_name}}</p>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-3">
                          <p>No. Rekening</p>
                        </div>
                        <div class="col-sm-9">
                          <p>: {{$b->account_number}}</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
              <div class="card card-info">
                @if ($vehicle == 'plane')
                @for ($i=1; $i <= $totalCount - $total['baby']; $i++)
              <div class="card-heading" style="margin-left:200px"><b>Data Penumpang {{$i}}</b></div>
                <div class="card-body">
                  <div class="form-group">
                    <input required type="text" class="form-control" name="name[]" placeholder="Nama Lengkap">
                  </div>
                </div>
                @endfor
                @elseif($vehicle == 'train')
                @for ($i=1; $i <= $totalCount; $i++)
              <div class="card-heading" style="margin-left:200px"><b>Data Penumpang {{$i}}</b></div>
                <div class="card-body">
                  <div class="form-group">
                    <input required type="text" class="form-control" name="name[]" placeholder="Nama Lengkap">
                  </div>
                </div>
                @endfor
                @endif
              </div>
              <div class="card card-info">
                @foreach ($schedule as $s)
                @php
                $unique = $s->unique_code;
                $fareTotal += $s->$seat * $totalCount + $unique;
                @endphp
                <input type="hidden" name="id[]" value="{{$s->id}}">
                <div class="card-heading" style="margin-left:170px"><b>{{$s->from}} ke {{$s->destination}}</b></div>
                <div class="card-body">
                  <img src="images/kai-logo.jpg" alt="">
                  @if ($vehicle == 'plane')
                  <p>Pesawat: {{$s->plane_name}}</p>
                  <p>Kelas :{{$class}}</p>
                  @elseif($vehicle == 'train')
                  <p>{{$s->train_name}}</p>
                  <p>{{$class}}</p>
                  @endif
                  <p>Tanggal Keberangkatan : {{ date('d F Y H:i:s', strtotime($s->boarding_time)) }}</p>
                </div>
                @endforeach
              </div>
            </div>
          <div class="col-sm-6">
             <div class="card card-info">
            <div class="card-heading">
              <br>
              @if ($vehicle == 'plane')
              <p class="col-md-12">({{$total['adult']}} Dewasa | {{$total['child']}} Anak - anak | {{$total['baby']}} Bayi)</p>
              @elseif ($vehicle == 'train')
              <p class="col-md-12">({{$total['adult']}} Dewasa | {{$total['child']}} Anak - anak)</p>
              @endif
              <p class="col-md-4">Total
                <p class="col-md-8" style="color:red">IDR {{ number_format($fareTotal, 2, ',','.') }} </p>
                @if (Auth::user())
                <p class="col-md-12">*Harap transfer sesuai nominal di tiket untuk menghindari verifikasi error</p>
                <button type="submit" class="btn btn-primary">Pesan</button>
                @else
                Login sebelum pesan tiket &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="{{ url('login') }}"><button type="button" class="btn btn-primary">Login</button> </a>
                @endif
              </div>
            </div>
          </div>
          </div>
        </div>
        
      </form>
      <hr class="half-rule">
      
    </div>
  </div>
          </div>
        </div>
<div class='content_shadow'></div>
</div>


@endsection
