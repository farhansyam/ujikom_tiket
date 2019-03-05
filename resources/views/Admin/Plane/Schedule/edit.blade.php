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
                      $('#first_seat').val(obj.first_seat);
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
                    <li class="active">Edit</li>
                  </ul>
                  <div class="panel panel-default">
                      <div class="panel-heading">Edit Jadwal Penerbangan <b>{{$planeschedule->from}}</b> Ke <b>{{$planeschedule->destination}}</b></div>

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
              <form action="{{ url('admin/schedule_plane', $planeschedule->id) }}" method="post">
                @csrf
                <input type="hidden" name="_method" value="PUT">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="code">Asal :</label>
                      <select class="select2 form-control" name="airport_id">
                        <option value="{{$planeschedule->airport_id}}">{{ $planeschedule->from }}</option>
                        @foreach($airport as $key)
                          <b><option value="{{ $key->id }}">{{ $key->airport_name }}</option>
                        @endforeach
                      </select>
                      <input type="hidden" class="form-control asal" id="asal">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="code">Tujuan :</label>
                      <select class="select2 form-control" name="destination">
                        <option value="{{$id_destination}}">{{ $planeschedule->destination }}</option>
                        @foreach($airport as $key)
                          <option value="{{ $key->id }}">{{ $key->airport_name }}</option>
                        @endforeach
                      </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="hidden" class="form-control from" id="code" value="{{$planeschedule->from}}">
                    <input type="hidden" class="form-control destination" id="codes" value="{{$planeschedule->destination}}">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="code">Nama Pesawat :</label>
                      <select class="form-control" name="plane_id">
                        <option value="{{ $planeschedule->plane_id }}">{{ $planeschedule->plane->plane_name }}</option>
                        @foreach($plane as $key)
                          <option value="{{ $key->id }}">{{ $key->plane_name }}</option>
                        @endforeach
                      </select>
                  </div>
                </div>
                      <input type="hidden"  id="eco_seat" name="eco_seat" value="{{ $planeschedule->eco_seat }}" >
                        <input type="hidden"  id="bus_seat" name="bus_seat" value="{{ $planeschedule->bus_seat }}" >
                    <div class="col-md-6">
                      <div class="form-group">
                          <label for="code">Waktu Keberangkatan:</label>
                          <div class='input-group date'>
                          <input type="text" name="boarding_time" class="form-control datetimepicker" value=" {{ $planeschedule->boarding_time }} ">
                          <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                          </span>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                          <label for="code">Durasi :</label>
                          <input type="time" name="duration" class="form-control" value="{{ date('H:i', strtotime($planeschedule->duration))}}">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                      <button type="submit" class="btn btn-md btn-primary">Update</button>
                      <button type="reset" class="btn btn-md btn-danger">Cancel</button>
                  </div>
              </form>
                  </div>
              </div>
          </div>
      </div>
    </div>

@endsection
