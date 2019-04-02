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
  <link href="{{asset('css/material-kit.min.css?v=2.0.5')}}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{asset('css/demo.css')}}" rel="stylesheet" />

  <style media="screen">
  .card-login .card-header {
  margin-top: -68px;
}
  </style>
</head> <div class="section section-signup page-header" style="background-image: url('{{asset('images/city.jpg')}}');">

    <body>
      <div class="container">
        <div class="row">
          <div class="col-lg-7 ml-auto mr-auto">
              <br><br><br>
            <div class="card card-login">
            <form class="form" method="post" action="{{route('register')}}">
              @csrf
                <div class="card-header card-header-primary text-center">
                <a href="{{url('login')}}"><h4 class="card-title">Register</h4></a>
                  <div class="social-line">
                    <a href="{{url('/redirect')}}" class="btn btn-just-icon btn-link">
                      <i class="fa fa-facebook-square"></i>
                    </a>
                  </div>
                </div>
                <p class="description text-center">Atau</p>
                <div class="card-body">
                 <div class="row">
                  <div class="col">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="material-icons">tag_faces</i>
                      </div>
                      <input id="name" placeholder="Nama" type="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                  @if ($errors->has('name'))
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $errors->first('name') }}</strong>
                                      </span>
                                  @endif
                    </div>
                  </div>
                  <div class="col">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="material-icons">lock_outline</i>
                        </span>
                      </div>
                      <input id="password" type="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                      @csrf
                      @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('password') }}</strong>
                        </span>
                      @endif
                    </div>

                  </div>
                  </div>
                  <div class="row">
                   <div class="col">
                     <div class="input-group">
                       <div class="input-group-prepend">
                         <span class="input-group-text">
                           <i class="material-icons">mail</i>
                         </span>
                       </div>
                       <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                   @if ($errors->has('email'))
                                       <span class="invalid-feedback" role="alert">
                                           <strong>{{ $errors->first('email') }}</strong>
                                       </span>
                                   @endif
                     </div>
                   </div>
                   <div class="col">
                     <div class="input-group">
                       <div class="input-group-prepend">
                         <span class="input-group-text">
                           <i class="material-icons">lock_outline</i>
                         </span>
                       </div>
                       <input id="password" placeholder="Konfirmasi Password" type="password" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation" required>
                       @csrf
                       @if ($errors->has('password_confirmation'))
                         <span class="invalid-feedback" role="alert">
                           <strong>{{ $errors->first('password_confirmation') }}</strong>
                         </span>
                       @endif
                     </div>

                   </div>
                   </div>
                   <div class="row">
                    <div class="col">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="material-icons">map</i>
                          </span>
                        </div>

                          <textarea name="alamat" rows="4" cols="80" placeholder="alamat" class="form-control"></textarea>

                                    @if ($errors->has('alamat'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('alamat') }}</strong>
                                        </span>
                                    @endif
                      </div>
                    </div>
                    <div class="col">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="material-icons">wc</i>
                          </span>
                        </div>
                          <select class="form-control" name="jenis_kelamin">
                            <option value="L">Laki-Laki</option>
                            <option value="P">Perempuan</option>
                          </select>
                        @csrf
                        @if ($errors->has('jenis_kelamin'))
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('jenis_kelamin') }}</strong>
                          </span>
                        @endif
                      </div>

                    </div>
                    </div>
                    <div class="row">
                     <div class="col">
                       <div class="input-group">
                         <div class="input-group-prepend">
                           <span class="input-group-text">
                             <i class="material-icons">call</i>
                           </span>
                         </div>
                         <input id="telpon" type="tel" placeholder="Telpon" class="form-control{{ $errors->has('telfone') ? ' is-invalid' : '' }}" name="telfone" value="{{ old('telfone') }}" required autofocus>

                                     @if ($errors->has('email'))
                                         <span class="invalid-feedback" role="alert">
                                             <strong>{{ $errors->first('email') }}</strong>
                                         </span>
                                     @endif
                       </div>
                     </div>
                     <div class="col">
                       <div class="input-group">
                         <div class="input-group-prepend">
                           <span class="input-group-text">
                             <i class="material-icons">calendar_today</i>
                           </span>
                         </div>
                         <input id="tanggal_lahir" type="date" class="form-control{{ $errors->has('tanggal_lahir') ? ' is-invalid' : '' }}" name="tanggal_lahir" required>
                         @csrf
                         @if ($errors->has('tanggal_lahir'))
                           <span class="invalid-feedback" role="alert">
                             <strong>{{ $errors->first('tanggal_lahir') }}</strong>
                           </span>
                         @endif
                       </div>

                     </div>
                     </div>
                </div>
                  <button type="submit" class="btn btn-primary btn-link btn-wd btn-lg">Register</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    </body>

</html>