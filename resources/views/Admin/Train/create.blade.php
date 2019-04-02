@extends('layouts.app')
@section('content')


<div class="container">
          <div class="row">
              <div class="col-md-8 col-md-offset-2">
                  <ul class="breadcrumb">
                    <li class="active">Admin</li>

                  <li class="active"> <a href="{{url('admin/train')}}">Kereta</a></li>
                    <li class="active">Create</li>
                  </ul>
                  <div class="panel panel-default">
                      <div class="panel-heading">Tambah Kereta</div>

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
              <form action="{{ url('admin/train') }}" method="post">
                  {{ csrf_field() }}
               <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                      <label for="maskapai">Partner</label>
                      <select name="kereta" class="form-control">
                        @foreach ($partner as $data)
                      <option value="{{$data->id}}">{{$data->nama}}</option>
                        @endforeach
                      </select>
                  </div>
                </div>
              </div>   
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                      <label for="nama">Nama Kereta:</label>
                      <input type="text" class="form-control" id="train_name" name="train_name" placeholder="Ex: Kereta Json" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                      <label for="code">Kursi Ekonmi:</label>
                      <input type="text" class="form-control" id="eco_seat" name="eco_seat" placeholder="Jumlah" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      <label for="code">Harga:</label>
                      <input type="number" max="9999999999" min="1000" class="form-control" id="eco_seat" name="eco_seatfare" placeholder="/ kursi" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                      <label for="city">Kursi Bisnis:</label>
                      <input type="text" class="form-control" id="bus_seat" name="bus_seat" placeholder="Jumlah" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      <label for="city">Harga:</label>
                      <input type="number" max="999999999" min="1000" class="form-control" id="bus_seat" name="bus_seatfare" placeholder="/ kursi" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                      <label for="city">Kursi Exekutif:</label>
                      <input type="text" class="form-control" id="bus_seat" name="exec_seat" placeholder="Jumlah" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      <label for="city">Harga:</label>
                      <input type="number" max="999999999" min="1000" class="form-control" id="bus_seat" name="exec_seatfare" placeholder="/ kursi" required>
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
