@extends('layouts.master_ui')
<div class="header-blue" data-parallax="false"

    style="background-color:#00c4ff;"
  >
      <div class="container">
        <div class="row">
          <div class="col-md-8 ml-auto mr-auto">
            <div class="brand">
              <br><br><br><br><br>
              <h1>Verifikasi Email Dulu dong broh</h1>
            </div>
          </div>
        </div>
      </div>
    </div>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Silakan Cek email nya dulu buat verifikasi') }}
                    {{ __('Kalau belum dapet email click ->') }}, <a href="{{ route('verification.resend') }}">{{ __('KIRIM LAGI DONG') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
