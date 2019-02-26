@extends('layouts.admin')
@section('content')

  <div class="container col-md-8">
<br><br>
<h1>Form Tambah</h1>
@if ($errors->any())
  <div class="class alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
      @endforeach
    </ul>
  </div>
@endif
<form class="" action="{{url('admin/transportasi')}}/{{$transportasi->id_transportasi}}" method="post">

    <div class="row col-sm-12">
        <div class="col-md-3">
          <label for="">Kode Transportasi</label>
        </div>
<input type="hidden" name="_method" value="PUT">
        {{ csrf_field() }}
        <div class="col-md-9">
            <input type="text" name="kode_transportasi" value="{{old('kode_transportasi')}} {{$transportasi->kode}}" class="col-sm-6">
        </div>

        <div class="col-md-3">
          <label for="">Jumlah kursi</label>
        </div>
        <div class="col-md-9">
            <input type="text" name="jumlah_kursi" value="{{old('jumlah_kursi')}} {{$transportasi->jumlah_kursi}}" class="col-sm-6">
        </div>

        <div class="col-md-3">
          <label for="">keterangan</label>
        </div>
        <div class="col-md-9">
            <input type="text" name="Keterangan" value="{{old('keterangan')}} {{$transportasi->keterangan}}" class="col-sm-6">
        </div>

        <div class="col-md-3">
          <label for="">Type</label>
        </div>
        <div class="col-md-9">
            @if ($transportasi->id_type_transportasi  == 1)
              <select class="" name="type">
                <option value="1">Kereta</option>
              </select>
            @else
              <select class="" name="type">
                <option value="2">Pesawat</option>
              </select>
            @endif

        </div>
        <input type="submit" name="" value="Simpan" class="btn">

        </form>
    </div>

  </div>

@endsection
