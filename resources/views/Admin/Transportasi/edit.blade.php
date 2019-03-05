@extends('layouts.app')
@section('content')


<div class="container">
          <div class="row">
              <div class="col-md-8 col-md-offset-2">
                  <ul class="breadcrumb">
                    <li class="active">Admin</li>

                    <li class="active">Transportasi</li>
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
              <form class="" action="{{url('admin/transportasi')}}/{{$transportasi->id_transportasi}}" method="post">
                  <input type="hidden" name="_method" value="PUT">
                 <div class="form-group"> 
                        <label for="name" class="col-md-3 control-label" >Kode Transportasi</label>
                        <div class="col-md-7">
                        <input required type="text" name="kode_transportasi" value="{{old('kode_transportasi')}} {{$transportasi->kode}}" class="form-control">
                          <br>
                        </div>
                  </div> 
                  <div class="form-group">
                        <label for="name" class="col-md-3 control-label" >Jumlah Kursi</label>
                        <div class="col-md-7">
                        <input required type="text" name="jumlah_kursi" value="{{old('jumlah_kursi')}} {{$transportasi->jumlah_kursi}}" class="form-control">
                          <br>
                        </div>
                  </div> 
                    <div class="form-group">
                        <label for="name" class="col-md-3 control-label" >Keterangan</label>
                        <div class="col-md-7">
                        <input required type="text" name="Keterangan" value="{{old('Keterangan')}}{{$transportasi->keterangan}}" class="form-control">
                          <br>
                        </div>  
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
