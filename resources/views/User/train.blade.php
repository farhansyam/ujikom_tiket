@extends('layouts.master_ui')
<head>
  @push('scripts')
    <script type="text/javascript">
    $('.dataB').hide();
    $('.type').change(function(){
      if ($(this).val() == 'pp') {
        $('.dataB').show();
        // $('.set6').set('.col-lg-6 col-sm-4 dataB');
      }else{
        $('.dataB').hide();
      }
    });
</script>
@endpush

@push('scripts')
  <script type="text/javascript">
 //  $(document).ready(function () {
 // $("#loading").hide();
 // $(".form_input").on('submit', function(event)
 //        {
 //          event.preventDefault();
 //    var form_data = $(this).serialize();
    // var from_code=$("#from_code :selected").text();
    // var destination_code=$("#destination_code :selected").text();
    // var kelas=$("#kelas :selected").text();
    // var type=$("#type :selected").text();
    // var adult=$("adult").val();
    // var child=$("#child").val();
    // var baby=$("#baby").val();
    // var date=$("#date").val();

    // $("#terbang").hide();/
    // $("#loading").show();
    //       $.ajax({
    //  url:"",
    //  method:"post",
    //  // data:"from_code="+from_code+"&destination_code="+destination_code+"&kelas="+kelas+"&type="+type+"&adult="+adult+"&child="+child+"&baby="+baby+"&date="+date,
    //  data:form_data,
    //  dataType:"json",
    //  success:function(data)
    //  {
    //    $("#terbang").show();
    //    $("#terbang").html(data);
    //    $("#loading").hide();
    //  }
    // });
//         }
//      );
// });
//   </script>
 @endpush

<style>
h6{
  font-color:black;
}
</style>

</head>

@section('content')
<div class="page-header header-filter clear-filter purple-filter" data-parallax="true" style="background-image: url('{{asset('images/bg2.jpg')}}');">
    <div class="container">
      <div class="row">
        <div class="col-md-8 ml-auto mr-auto">
          <div class="main main-raised">

          <div id="inputs">
        <div class="title">
          <br>
          <h3 style="color:grey">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cari Tiket Kereta Anda  Sekarang</h3><br>
        </div>
        <div class="container">
          <form class="form_input" method="post"  action="{{route('search')}}">
            @csrf
            <input type="hidden" name="vehicle" value="train">
        <div class="row">
          <div class="col-lg-3 col-sm-4">
            <div class="form-group has-default">
              <label for="asal">Asal Stasiun</label>
              <select class="select2 item_id form-control" name="from_code" id="from_code">
                @foreach ($station as $data)
                  <option value="{{$data->code}}">{{$data->station_name}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="col-lg-3 col-sm-4">
            <div class="form-group has-default">
              <label for="tujuan">Tujuan</label>
              <select class="select2 item_id form-control" name="destination_code" id="destination_code">
                @foreach ($station as $data)
                  <option value="{{$data->code}}">{{$data->station_name}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="col-lg-3 col-sm-4">
            <div class="form-group has-default">
              <label for="kelas">Kelas Penerbangan</label>
              <select class="form-control" name="class" id="kelas">
                <option value="Ekonomi">Ekonomi</option>
                <option value="Bisnis">Bisnis</option>
              </select>
            </div>
          </div>
          <div class="col-lg-3 col-sm-4">
            <div class="form-group has-default">
              <label for="Perjalanan">Perjalanan</label>
              <select class="form-control type" name="type" id="type">
                <option value="st">Satu Kali</option>
                <option value="pp">Pulang Pergi</option>
              </select>
            </div>
          </div>

          <div class="col-lg-3 col-sm-4">
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">face</i>
                  </span>
                </div>
                <input type="number" max="10" name="adult" class="form-control" placeholder="Dewasa" id="adult" required>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-sm-4">
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">child_care</i>
                  </span>
                </div>
                <input type="number" max="10" name="child" class="form-control" placeholder="Anak-Anak" id="child" required>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-sm-4">
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">child_friendly</i>
                  </span>
                </div>
                <input type="number" name="baby"  max="3" class="form-control" placeholder="Bayi" id="baby" required>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-sm-4 set6">
            <div class="form-group">
              <div class="input-group">
                <input type="date" class="form-control" name="date" value="" placeholder="Tanggal Berangkat" id="date">
                {{-- <input type="text" class="form-control datetimepicker" value="" placeholder="Tanggal Berangkat"> --}}
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-sm-4 dataB set6">
            <div class="form-group">
              <div class="input-group">
                <input type="text" class="form-control datetimepicker" value="" placeholder="Tanggal Berangkat">
              </div>
            </div>
          </div>
            <button class="btn btn-primary col-sm-12" type="submit">Cari</button>
          </form>
        </div>
      </div>
    </div>
        </div>
        </div>
      </div>
    </div>
  </div>
    <!--         carousel  -->
@push('script')

<script type="text/javascript">
$(document).ready(function() {
  //init DateTimePickers
  materialKit.initFormExtendedDatetimepickers();

});

</script>
@endpush

@section('content')
@endsection
