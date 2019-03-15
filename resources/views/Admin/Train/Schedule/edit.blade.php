@extends('layouts.app')


@section('content')
  @push('scripts')
    <script type="text/javascript">
      $(document).ready(function(){
        $('select[name="train_id"]').on('change', function() {
        var param = $(this).val();
          if(param) {
            $.ajax({
                url: '/admin/train/ajax/'+param,
                type: "GET",
                dataType: 'JSON',
                success:function(data) {
                  console.log(data);
                    $.each(data, function(index, obj) {
                      $('.option').empty();
                      $('#eco_seat').val(obj.eco_seat);
                      $('#bus_seat').val(obj.bus_seat);
                      $('#exec_seat').val(obj.exec_seat);

                    });
                }
            });
          }else{
              $('select[name="eco"]').empty();
          }
        });
        //taro di station
        $('select[name="station_id"]').on('change', function() {
          param = $(this).val();
          $.ajax({
            url: '/admin/station/ajax/'+param,
            type: "GET",
            dataType: 'JSON',
            success:function(data) {
              console.log(data);
              $.each(data, function(index, obj) {
                $('.from').empty();
                $('#asal').val(obj.station_name);
                $('#code').val(obj.code);
              });
            }
          });
        });
        //taro di schedule
        $('select[name="destination"]').on('change', function() {
          param = $(this).val();
          $.ajax({
            url: '/admin/station/ajax/'+param,
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

      <li class="active"> <a href="{{url('admin/schedule_train')}}">Jadwal Kereta</a></li>
        <li class="active">Edit</li>
      </ul>

            <div class="panel panel-default">
              <div class="panel-heading">Edit Jadwal Keberangkatan <b>{{$trainschedulee->from}}</b> Ke <b>{{$trainschedulee->destination}}</b></div>
              <div class="panel-body">
            @foreach ($trainschedule as $data)
            <form action="{{ url('admin/schedule_train', $data->id) }}" method="post">
            {{ csrf_field() }}
            {{ method_field('put')}}
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="code">Asal Stasiun:</label>
                    <select class="select2 form-control" name="station_id">
                      <option value="{{$data->station_id}}" selected>{{ $data->from }}</option>
                      @foreach($station as $key)
                        <b><option value="{{ $key->id }}">{{ $key->station_name }}</option>
                      @endforeach
                    </select>
                    <input type="hidden" name="from" value="{{$data->from}}" id="asal">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="code">Stasiun Tujuan :</label>
                    <select class="select2 form-control" name="destination">
                      <option value="{{$data->station_id}}" >{{ $data->destination }}</option>
                      @foreach($station as $key)
                        <option value="{{ $key->id }}">{{ $key->station_name }}</option>
                      @endforeach
                    </select>
                </div>
              </div>
                  <input type="hidden" id="code" name="from_code" value="{{$data->from_code}}">
                  <input type="hidden" id="codes" name="destination_code" value="{{$data->destination_code}}">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="code">Nama Kereta :</label>
                    <select class="form-control" name="train_id">
                      <option value="{{ $data->train_id }}"  selected >{{ $data->train->train_name }}</option>
                      @foreach($train as $key)
                        <option value="{{ $key->id }}">{{ $key->train_name }}</option>
                      @endforeach
                    </select>
                </div>
              </div>
                    <input type="hidden" class="form-control option" id="eco_seat" name="eco_seat" value="{{ $data->eco_seat }}">
                    <input type="hidden" class="form-control option" id="bus_seat" name="bus_seat" value="{{ $data->bus_seat }}">
                      <input type="hidden" class="form-control option" id="exec_seat" name="exec_seat" value="{{ $data->exec_seat }}">

                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="code">Waktu Penerbangan:</label>
                        <div class='input-group date'>
                        <input type="date" name="boarding_time" class="form-control datetimepicker" value=" {{ $data->boarding_time }} ">
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
