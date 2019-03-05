@extends('layouts.app')
@section('content')
  @push('scripts')
    <script type="text/javascript">
      $(document).ready(function(){
        $('select[name="plane_id"]').on('change', function() {
        var param = $(this).val();
          if(param) {
            $.ajax({
                url: '/admin/plane/ajax/'+param,
                type: "GET",
                dataType: 'JSON',
                success:function(data) {
                  console.log(data);
                    $.each(data, function(index, obj) {
                      $('.option').empty();
                      $('#eco_seat').val(obj.eco_seat);
                      $('#bus_seat').val(obj.bus_seat);
                    });
                }
            });
          }else{
              $('select[name="eco"]').empty();
          }
        });
        //taro di airport
        $('select[name="airport_id"]').on('change', function() {
          param = $(this).val();
          $.ajax({
            url: '/admin/airport/ajax/'+param,
            type: "GET",
            dataType: 'JSON',
            success:function(data) {
              console.log(data);
              $.each(data, function(index, obj) {
                $('.from').empty();
                $('#asal').append('<input type="hidden" name="from" value="'+ obj.airport_name +'">');
                $('#code').append('<input type="text" name="from_code" value="'+ obj.code +'">'+ obj.code +'</input>');
              });
            }
          });
        });
        //taro di schedule
        $('select[name="destination"]').on('change', function() {
          param = $(this).val();
          $.ajax({
            url: '/admin/airport/ajax/'+param,
            type: "GET",
            dataType: 'JSON',
            success:function(data) {
              console.log(data);
              $.each(data, function(index, obj) {
                $('.destination').empty();
                $('#codes').append('<input type="text" name="destination_code" value="'+ obj.code +'">'+ obj.code +'</input>');
              });
            }
          });
        });
      });
    </script>
  @endpush


<div class="container">
          <div class="row">
              <div class="col-md-8 col-md-offset-2">
                  <ul class="breadcrumb">
                    <li class="active">Admin</li>

                  <li class="active"> <a href="{{url('admin/schedule_plane')}}">Jadwal Pesawat</a></li>
                    <li class="active">Create</li>
                  </ul>
                  <div class="panel panel-default">
                      <div class="panel-heading">Tambah Jadwal Penerbangan</div>

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
              <form action="{{ url('admin/schedule_plane/') }}" method="post">
                  {{ csrf_field() }}
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="code">Asal :</label>
                      <select class="select2 form-control" name="airport_id" required>
                        <option value="0" disabled selected>Pilih bandara asal</option>
                        @foreach($airport as $key)
                          <option value="{{ $key->id }}">{{ $key->airport_name }}</option>
                        @endforeach
                      </select>
                      <input type="hidden" class="form-control asal" id="asal">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="code">Tujuan :</label>
                      <select class="select2 form-control" name="destination" required>
                        <option value="0" disabled selected>Pilih bandara tujuan</option>
                        @foreach($airport as $key)
                          <option value="{{ $key->id }}">{{ $key->airport_name }}</option>
                        @endforeach
                      </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="hidden" class="form-control from" id="code">
                    <input type="hidden" class="form-control destination" id="codes">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="code">Nama Pesawat :</label>
                      <select class="form-control" name="plane_id">
                        <option value="0">Pilih pesawat</option>
                        @foreach($plane as $key)
                          <option value="{{ $key->id }}">{{ $key->plane_name }}</option>
                        @endforeach
                      </select>
                  </div>
                </div>
                      <input type="hidden" class="form-control option" id="eco_seat" name="eco_seat" readonly>
                      <input type="hidden" class="form-control option" id="bus_seat" name="bus_seat" readonly>
                    <div class="col-md-6">
                      <div class="form-group">
                          <label for="">Waktu keberangkatan:</label>
                          <div class='input-group'>
                          <input id="w" type="date" name="boarding_time" class="form-control date-picker" required>
                          <span class="input-group-addon">
                            <label for="w" class="fa fa-calendar"></label>
                          </span>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                          <label for="">Durasi :</label>
                          <div class='input-group'>
                          <input type="time" name="duration" class="form-control" required>
                          <span class="input-group-addon">
                            <label for="" class="fa fa-clock"></label>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                      <button type="submit" class="btn btn-md btn-hijau-toska">Submit</button>
                      <button type="reset" class="btn btn-md btn-danger">Batal</button>
                  </div>
              </form>

                  </div>
              </div>
          </div>
      </div>
    </div>

@endsection
