@extends('layouts.master_ui')
@section('tittle')
<title>{{config('app.name')}} - Pemesanan</title>
@stop
@section('content')

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
      <div class="col-md-6">
        <div class="row">
          <div class="panel panel-info">
            <div class="panel-heading">Metode pembayaran</div>
            <div class="panel-body">
              <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                @foreach ($bank as $b)
                    <input type="radio" name="bank" value="{{$b->bank}}">{{$b->bank}}
                    <div id="{{$b->bank}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                      <div class="panel-body">
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
            </div>
          </div>
          <div class="panel panel-info">
            @if ($vehicle == 'plane')
              @for ($i=1; $i <= $totalCount - $total['baby']; $i++)
                <div class="panel-heading">Data penumpang {{$i}}</div>
                <div class="panel-body">
                      <div class="form-group">
                          <label for="exampleInputemail1">Nama Lengkap</label>
                          <input type="text" class="form-control" name="name[]" placeholder="Nama Lengkap">
                      </div>
                </div>
              @endfor
            @elseif($vehicle == 'train')
              @for ($i=1; $i <= $totalCount; $i++)
                <div class="panel-heading">Data penumpang {{$i}}</div>
                <div class="panel-body">
                      <div class="form-group">
                          <label for="exampleInputemail1">Nama Lengkap</label>
                          <input type="text" class="form-control" name="name[]" placeholder="Nama Lengkap">
                      </div>
                </div>
              @endfor
            @endif
          </div>
        </div>
      </div>
      <div class="col-md-5 col-md-offset-1">
        <div class="row">
          <div class="panel panel-info">
            @foreach ($schedule as $s)
              @php
                 $unique = $s->unique_code;
                 $fareTotal += $s->$seat * $totalCount + $unique;
              @endphp
              <input type="hidden" name="id[]" value="{{$s->id}}">
              <div class="panel-heading">{{$s->from}} ke {{$s->destination}}</div>
              <div class="panel-body">
                <img src="images/kai-logo.jpg" alt="">
                @if ($vehicle == 'plane')
                  <p>{{$s->plane_name}}</p>
                  <p>{{$class}}</p>
                @elseif($vehicle == 'train')
                  <p>{{$s->train_name}}</p>
                  <p>{{$class}}</p>
                @endif
                <p>{{ date('d F Y H:i:s', strtotime($s->boarding_time)) }}</p>
                <p>IDR {{number_format($s->$seat * $totalCount +$s->unique_code, 2, ',','.')}}</p>
              </div>
            @endforeach
          </div>
          <div class="panel panel-info">
          <div class="panel-heading">
              @if ($vehicle == 'plane')
                <p class="col-md-12">({{$total['adult']}} Dewasa | {{$total['child']}} Anak - anak | {{$total['baby']}} Bayi)</p>
              @elseif ($vehicle == 'train')
                <p class="col-md-12">({{$total['adult']}} Dewasa | {{$total['child']}} Anak - anak)</p>
              @endif
              <p class="col-md-4">Total
              <p class="col-md-8">IDR {{ number_format($fareTotal, 2, ',','.') }} </p>
              @if (Auth::user())
                <p class="col-md-12">*Harap transfer sesuai nominal di tiket untuk menghindari verifikasi error</p>
                <button type="submit" class="btn btn-primary">Pesan</button>
              @else
                Login sebelum pesan tiket <a href="{{ url('login') }}"><button type="button" class="btn btn-primary">Login</button> </a>
              @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
<hr class="half-rule">
@endsection
