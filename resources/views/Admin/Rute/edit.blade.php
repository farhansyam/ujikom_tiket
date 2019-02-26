@extends('layouts.admin')
@section('content')

  <div class="container col-md-8">
<br><br>
<h1>Form Edit Rute</h1>
@if ($errors->any())
  <div class="class alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
      @endforeach
    </ul>
  </div>
@endif
<form class="" action="{{url('admin/rute')}}/{{$rute->id_rute}}" method="post">

    <div class="row col-sm-12">
        <div class="col-md-3">
          <label for="">Tujuan</label>
        </div>
<input type="hidden" name="_method" value="PUT">
        {{ csrf_field() }}
        <div class="col-md-9">
            <input type="text" name="tujuan" value="{{old('tujuan')}} {{$rute->tujuan}}" class="col-sm-6">
        </div>

        <div class="col-md-3">
          <label for="">rute awal</label>
        </div>
        <div class="col-md-9">
            <input type="text" name="rute_awal" value="{{old('rute_awal')}} {{$rute->rute_awal}}" class="col-sm-6">
        </div>

        <div class="col-md-3">
          <label for="">rute akhir</label>
        </div>
        <div class="col-md-9">
            <input type="text" name="rute_akhir" value="{{old('rute_akhir')}} {{$rute->rute_akhir}}" class="col-sm-6">
        </div>

        <div class="col-md-3">
          <label for="">Harga</label>
        </div>
        <div class="col-md-9">
            <input type="text" name="harga" value="{{old('harga')}} {{$rute->harga}}" class="col-sm-6">
        </div>

        <div class="col-md-3">
          <label for="">Transportasi</label>
        </div>
        <div class="col-md-9">
          <select class="" name="transportasi">
            @foreach ($transportasi as $transport)
              <option value="{{$transport->id_transportasi}}">{{$transport->kode}}</option>
            @endforeach
          </select>
        </div>
        <input type="submit" name="" value="Simpan" class="btn">

        </form>
    </div>

  </div>

@endsection
