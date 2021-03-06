@extends('layouts.app')
@section('content')


<div class="container">
          <div class="row">
              <div class="col-md-8 col-md-offset-2">
                  <ul class="breadcrumb">
                    <li class="active">Admin</li>

                  <li class="active"> <a href="{{url('admin/station')}}">Stasiun</a></li>
                    <li class="active">Edit</li>
                  </ul>
                  <div class="panel panel-default">
                      <div class="panel-heading">Edit Stasiun <b>{{$station->station_name}}</b></div>

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
              <form class="" action="{{url('admin/station')}}/{{$station->id}}" method="post">
                  @csrf
                  <input type="hidden" name="_method" value="PUT">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                        <label for="nama">Kode Stasiun</label>
                        <input value="{{old('code')}}{{$station->code}}" type="text" class="form-control" id="" name="code" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="code">Nama Stasiun</label>
                        <input value="{{old('station_name')}}{{$station->station_name}}" type="text" class="form-control" id="" name="station_name" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="code">Kota</label>
                        <input value="{{old('city')}}{{$station->city}}" type="text" class="form-control" id="" name="city" placeholder="Kota" required>
                    </div>
                  </div>
                </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-md btn-primary">Submit</button>
                        <button type="reset" class="btn btn-md btn-danger">Cancel</button>
                    </div>
        </form>

                  </div>
              </div>
          </div>
      </div>
    </div>

@endsection
