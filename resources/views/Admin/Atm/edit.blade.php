@extends('layouts.app')
@section('content')


<div class="container">
          <div class="row">
              <div class="col-md-8 col-md-offset-2">
                  <ul class="breadcrumb">
                    <li class="active">Admin</li>

                  <li class="active"> <a href="{{url('admin/atm')}}">Atm</a></li>
                    <li class="active">Edit</li>
                  </ul>
                  <div class="panel panel-default">
                      <div class="panel-heading">Edit Atm <b>{{$atms->bank}}</b></div>

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
              <form class="" action="{{url('admin/atm')}}/{{$atms->id}}" method="post">
                  @csrf
                  <input type="hidden" name="_method" value="PUT">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                        <label for="nama">Bank</label>
                        <input value="{{old('bank')}}{{$atms->bank}}" type="text" class="form-control" id="" name="bank" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="bank">Nama</label>
                        <input value="{{old('account_name')}}{{$atms->account_name}}" type="text" class="form-control" id="" name="account_name" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="bank">No.Rek</label>
                        <input value="{{old('account_number')}}{{$atms->account_number}}" type="text" class="form-control" id="" name="account_number" placeholder="Kota" required>
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
