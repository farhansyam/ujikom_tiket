@extends('layouts.app')
@section('content')


<div class="container">
          <div class="row">
              <div class="col-md-8 col-md-offset-2">
                  <ul class="breadcrumb">
                    <li class="active">Admin</li>

                  <li class="active"> <a href="{{url('admin/transportasi')}}">Transportasi</a></li>
                    <li class="active">Create</li>
                  </ul>
                  <div class="panel panel-default">
                      <div class="panel-heading">Kelola Rute</div>

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
              <form class="" action="{{url('admin/transportasi/')}}" method="post">

                 <div class="form-group">
                        <label for="name" class="col-md-3 control-label" >Kode Transportasi</label>
                        <div class="col-md-7">
                          <input required type="text" name="kode_transportasi" value="{{old('kode_transportasi')}}" class="form-control">
                          <br>
                        </div>
                  </div> 
                  <div class="form-group">
                        <label for="name" class="col-md-3 control-label" >Jumlah Kursi</label>
                        <div class="col-md-7">
                          <input required type="text" name="jumlah_kursi" value="{{old('jumlah_kursi')}}" class="form-control">
                          <br>
                        </div>
                  </div> 
                    <div class="form-group">
                        <label for="name" class="col-md-3 control-label" >Keterangan</label>
                        <div class="col-md-7">
                          <input required type="text" name="Keterangan" value="{{old('Keterangan')}}" class="form-control">
                          <br>
                        </div>  
                      </div> 
                      <div class="form-group">
                        <label for="name" class="col-md-3 control-label" >Type</label>
                        
                        <div class="col-md-4">
                  <select class="" name="type">
                    <option value="1">Kereta</option>
                    <option value="2">Pesawat</option>
                  </select>


                        </div>
                        <br><br><br><br><br><br><br><br>
                        <input type="submit" name="" value="Simpan" class="btn btn-primary">

                      </div>
                    
                {{ csrf_field() }}
          </form>
              
                  </div>
              </div>
          </div>
      </div>
    </div>

@endsection
