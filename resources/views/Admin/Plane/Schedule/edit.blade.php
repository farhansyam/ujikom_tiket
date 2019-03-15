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
                $('#asal').val(obj.airport_name);
                $('#code').val(obj.code);
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
                $('#codes').val(obj.code);
              });
            }
          });
        });
      });
    </script>
  @endpush


<body>
  <div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <ul class="breadcrumb">
        <li class="active">Admin</li>

      <li class="active"> <a href="{{url('admin/schedule_plane')}}">Jadwal Pesawat</a></li>
        <li class="active">Edit</li>
      </ul>

            <div class="panel panel-default">
              <div class="panel-heading">Edit Jadwal Keberangkatan <b>{{$planeschedulee->from}}</b> Ke <b>{{$planeschedulee->destination}}</b></div>
              <div class="panel-body">
            @foreach ($planeschedule as $data)
            <form action="{{ url('admin/schedule_plane', $data->id) }}" method="post">
            {{ csrf_field() }}
            {{ method_field('put')}}
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="code">Asal :</label>
                    <select class="select2 form-control" name="airport_id">
                      <option value="{{$data->airport_id}}" selected>{{ $data->from }}</option>
                      @foreach($airport as $key)
                        <b><option value="{{ $key->id }}">{{ $key->airport_name }}</option>
                      @endforeach
                    </select>
                    <input type="hidden" name="from" value="{{$data->from}}" id="asal">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="code">Tujuan :</label>
                    <select class="select2 form-control" name="destination">
                      <option value="{{$data->airport_id}}" >{{ $data->destination }}</option>
                      @foreach($airport as $key)
                        <option value="{{ $key->id }}">{{ $key->airport_name }}</option>
                      @endforeach
                    </select>
                </div>
              </div>
                  <input type="hidden" id="code" name="from_code" value="{{$data->from_code}}">
                  <input type="hidden" id="codes" name="destination_code" value="{{$data->destination_code}}">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="code">Nama Pesawat :</label>
                    <select class="form-control" name="plane_id">
                      <option value="{{ $data->plane_id }}"  selected >{{ $data->plane->plane_name }}</option>
                      @foreach($plane as $key)
                        <option value="{{ $key->id }}">{{ $key->plane_name }}</option>
                      @endforeach
                    </select>
                </div>
              </div>
                    <input type="hidden" class="form-control option" id="eco_seat" name="eco_seat" value="{{ $data->eco_seat }}">
                      <input type="hidden" class="form-control option" id="bus_seat" name="bus_seat" value="{{ $data->bus_seat }}">

                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="code">Waktu Penerbangan:</label>
                        <div class='input-group date'>
                        <input type="text" name="boarding_time" class="form-control datetimepicker" value=" {{ $data->boarding_time }} ">
                        <span class="input-group-addon">
                          <span class="fa fa-calendar"></span>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="code">Durasi :</label>
                        <div class='input-group date'>
                        <input type="time" name="duration" class="form-control" value="{{ date('H:i', strtotime($data->duration))}}">
                        <span class="input-group-addon">
                          <span class="fa fa-clock"></span>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
                <div class="form-group">
                    <button type="submit" class="btn btn-md btn-hijau">Update</button>
                    <button type="reset" class="btn btn-md btn-kuning">Reset</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>







@endsection
