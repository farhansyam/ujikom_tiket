@extends('layouts.app')
@section('content')


<div class="container">
          <div class="row">
              <div class="col-md-8 col-md-offset-2">
                  <ul class="breadcrumb">
                    <li class="active">Admin</li>

                  <li class="active"> <a href="{{url('admin/partner')}}">Partner</a></li>
                    <li class="active">Create</li>
                  </ul>
                  <div class="panel panel-default">
                      <div class="panel-heading">Tambah Partner</div>

            <div class="panel-body">

              @if ($errors->any())
                <div class="class alert alert-danger">
                  <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{$error}}</li>
                    @endforeach
                  </ul>
                </div>
              @endif
              <form action="{{ url('admin/partner/'.$partner->id) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
               <input type="hidden" name="_method" value="PUT">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                      <label for="nama">Nama Partner:</label>
                  <input value="{{old('nama')}} {{$partner->nama}}" placeholder="Ex:Lion Air" type="text" class="form-control" id="partner_name" name="nama" required>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                      <label for="nama">Logo Partner:</label>
                      <input value="{{old('logo')}}" type="file" class="form-control" id="partner_name" name="logo" required>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                      <label for="nama">Jenis:</label>
                      <select name="jenis" id="" class="form-control">
                        <option value="1">Pesawat</option>
                        <option value="2">Kereta</option>
                      </select>
                    </div>
                </div>
              </div>
                  <div class="form-group">
                      <button type="submit" class="btn btn-md btn-hijau-toska">Submit</button>
                      <button type="reset" class="btn btn-md btn-kuning">Reset</button>
                  </div>
              </form>

                  </div>
              </div>
          </div>
      </div>
    </div>

@endsection
