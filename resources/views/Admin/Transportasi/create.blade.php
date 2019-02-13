@extends('layouts.admin')
@section('content')


    <form class="" action="{{url('admin/transportasi/')}}" method="post">

        <div class="row col-sm-12">
            <div class="col-md-2">
              <label for="">Kode Transportasi</label>
            </div>

            {{ csrf_field() }}
            <div class="col-md-10">
                <input type="text" name="kode_transportasi" value="{{old('kode_transportasi')}}" class="col-sm-6">
            </div>

            <div class="col-md-2">
              <label for="">Jumlah kursi</label>
            </div>
            <div class="col-md-10">
                <input type="text" name="jumlah_kursi" value="{{old('jumlah_kursi')}}" class="col-sm-6">
            </div>

            <div class="col-md-2">
              <label for="">rangan</label>
            </div>
            <div class="col-md-10">
                <input type="text" name="Keterangan" value="{{old('keterangan')}}" class="col-sm-6">
            </div>

            <div class="col-md-2">
              <label for="">Type</label>
            </div>
            <div class="col-md-10">
                <select class="" name="type">
                  <option value="1">Kereta</option>
                  <option value="2">Pesawat</option>
                </select>

            </div>
            <input type="submit" name="" value="Simpan" class="btn">

            </form>
        </div>
        <h1>Form Tambah</h1>
        @if ($errors->any())
          <div class="class alert alert-danger">
            <ul>
              @foreach ($errors as $error)
                <li>{{$error}}</li>
              @endforeach
            </ul>
          </div>
        @endif


@endsection
