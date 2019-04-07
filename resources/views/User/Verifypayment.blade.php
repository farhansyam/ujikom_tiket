@extends('layouts.master_ui')
@section('content')
<style>.card-login .form {
    min-height: 290px;
}</style>
<script>
var x = document.getElementById("booking_code").autofocus;
</script>
<div class="header-blue" data-parallax="false"
    style="background-color:#81ddea;"
  >
      <div class="container">
        <div class="row">
          <div class="col-md-8 ml-auto mr-auto">
            <div class="brand">
              <br><br><br><br><br>
                  <img src='{{asset('images/pc11.jpg')}}' height="400">
            </div>
          </div>
        </div>
      </div>
       <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-2" style="margin-left:390px">
              <br><br><br>
            <div class="card card-login">
            <form class="form" method="post" action="{{route('kirim')}}" enctype="multipart/form-data"><br>
                <p class="description text-center">Verifikasi Pembayaran</p>
                <div class="card-body">
                  <span id="bc-availability-status"></span>
                  <div class="input-group" id="frmCheckBC">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="material-icons">shopping_cart</i>
                      </span>
                    </div>
                    <input id="booking_code" type="booking_code" class="form-control{{ $errors->has('booking_code') ? ' is-invalid' : '' }}" name="booking_code" value="{{ old('booking_code') }}" required placeholder="kode Booking" onblur="checkAvailability()">
                    {{-- <input on="" value="CEK" type="button"> --}}
   @csrf
                    @if ($errors->has('booking_code'))
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('booking_code') }}</strong>
                    </span>
                    @endif
                  </div>
                  <p><img src="{{asset('images/LoaderIcon.gif')}}" id="loaderIcon" style="display:none" /></p>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="material-icons">add_photo_alternate</i>
                      </span>
                    </div>
                   <input id="gambar" type="file" class="form-control{{ $errors->has('gambar') ? ' is-invalid' : '' }}" name="gambar" required>
                    @csrf
                                @if ($errors->has('gambar'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('gambar') }}</strong>
                                    </span>
                                @endif
                      </div>
                </div>
                <div class="footer text-center">
                  <button type="submit" class="btn btn-primary btn-link btn-wd btn-lg" id="kirim">Kirim</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <br><br><br><br><br><br><br>
    </div>
    </div>
    </div>
    <script>


    function checkAvailability() {
      var _token = $('input[name="_token"]').val();
      var booking_code = $('#booking_code').val();
$("#loaderIcon").show();
$.ajax({
    url:"{{ route('cekBC') }}",
    method:"POST",
    data:{booking_code:booking_code, _token:_token},
    success:function(result)
    {
     if(result == 'unique')
     {
      $('#bc-availability-status').html('<label class="text-success">Kode Booking Ada</label>');
$("#loaderIcon").hide();
      $('#kirim').attr('disabled', false);
     }
     else
     {
       console.log(result)
$("#loaderIcon").hide();

      $('#bc-availability-status').html('<label class="text-danger">Kode Booking Tidak Ada</label>');
      $('kirim').attr('disabled', 'disabled');
     }
    }
   })}</script>
@endsection