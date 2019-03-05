@extends('layouts.app')
@section('content')


<div class="container">
          <div class="row">
              <div class="col-md-8 col-md-offset-2">
                  <ul class="breadcrumb">
                    <li class="active">Admin</li>

                  <li class="active"> <a href="{{url('admin/plane')}}">Plane</a></li>
                    <li class="active">Create</li>
                  </ul>
                  <div class="panel panel-default">
                      <div class="panel-heading">Edit Pesawat {{$data->plane_name}}</div>

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
              <form class="" action="{{url('admin/plane')}}/{{$data->id}}" method="post">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="id" value="{{$data->planefare->id}}">
                  @csrf
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                        <label for="nama">Nama Pesawat:</label>
                        <input value="{{old('plane_name')}} {{$data->plane_name}}" type="text" class="form-control" id="plane_name" name="plane_name" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="code">Kursi Ekonomi:</label>
                        <input value="{{old('eco_seat')}}{{$data->eco_seat}}" type="text" class="form-control" id="eco_seat" name="eco_seat" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="code">Harga:</label>
                        <input value="{{old('eco_seatfare')}}{{$data->planefare->eco_seat}}" type="number" class="form-control" id="eco_seat" name="eco_seatfare" placeholder="/ seat" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="city">Kursi Bisnis:</label>
                        <input value="{{old('bus_seat')}} {{$data->bus_seat}}" type="text" class="form-control" id="bus_seat" name="bus_seat" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="city">Harga:</label>
                        <input value="{{old('bus_seatfare')}}{{$data->planefare->bus_seat}}" type="number" class="form-control" id="bus_seat" name="bus_seatfare" placeholder="/ seat" required>
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
