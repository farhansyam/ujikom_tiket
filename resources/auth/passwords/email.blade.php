<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="./assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Go-ticket
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  {{-- <link rel="stylesheet" href="{{asset('fonts/font_pro.css')}}"> --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{asset('css/demo.css')}}" rel="stylesheet" />
  <style media="screen">
  .card-login .form {
  min-height: 260px;
}
  </style>
</head> <div class="section section-signup page-header" style="background-image: url('{{asset('images/city.jpg')}}');">

    <body>
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-6 ml-auto mr-auto">
              <br><br><br>
            <div class="card card-login">
            <form class="form" method="post" action="{{route('password.update')}}">
                <div class="card-header card-header-primary text-center">
                <a href="{{url('login')}}"><h4 class="card-title">Lupa Password</h4></a>
                </div>
                <p class="description text-center">Masukan email akun anda untuk mendapatkan link ganti password</p>
                <div class="card-body">
                  <div class="input-group">
                    @if (session('status'))
                      <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                      </div>
                    @endif
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="material-icons">mail</i>
                      </span>
                    </div>
                    @csrf

                    <input id="email" type="email" placeholder="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                      <h1>
                    <strong>{{ $errors->first('email') }}</strong>
                        </h1>
                    @endif
                  </div>

                </div>
                <div class="footer text-center">
                  <button type="submit" class="btn btn-primary btn-link btn-wd btn-lg">Kirim</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    </body>

</html>
