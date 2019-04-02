@extends('layouts.app')
@section('content')


<div class="container">
          <div class="row">
              <div class="col-md-8 col-md-offset-2">
                  <ul class="breadcrumb">
                    <li class="active">Admin</li>

                  <li class="active"> <a href="{{url('admin/atm')}}">Atm</a></li>
                    <li class="active">Create</li>
                  </ul>
                  <div class="panel panel-default">
                      <div class="panel-heading">Tambah Account Atm</div>

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
              <form class="" action="{{url('admin/atm/')}}" method="post">
                  @csrf
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                        <label for="nama">Bank</label>
                        <input value="{{old('bank')}}" type="text" class="form-control" id="" name="bank" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="code">Nama Akun</label>
                        <input value="{{old('account_name')}}" type="text" class="form-control" id="" name="account_name" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="code">No Rek</label>
                        <input value="{{old('account_number')}}" type="text" class="form-control" id="" name="account_number" placeholder="Kota" required>
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
