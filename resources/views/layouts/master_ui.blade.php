<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="./assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Tik-Ketik
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  {{-- <link rel="stylesheet" href="{{asse  t('fonts/font_pro.css')}}"> --}}
  {{-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous"> --}}
  <!-- CSS Files -->
  <link href="{{asset('css/material-kit.css?v=2.0.5')}}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->

  <link href="{{asset('css/demo.css')}}" rel="stylesheet" />
  <link href="{{asset('fonts/font_pro.css')}}" rel="stylesheet" />
  <script src="js/jquery.min.js"></script>
	   <script type="text/javascript">
            $(document).ready(function(){
            var bg=[0,1,2,3];
            var index=1;
            setInterval(function(){
            index=(index + 1) % bg.length;
            $('.page-header').css('background-image','url("images/'+index+'.jpg")');
            },5000);
            });
        </script>
</head>

<body class="index-page sidebar-collapse">
  <nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="{{url('/')}}">
          <i class="fa fa-ticket-alt"></i>
          TIK-KETIK
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="sr-only">Toggle navigation</span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
          <li class="dropdown nav-item">
            <a href="{{url('kereta')}}" class="nav-link" rel="tooltip" title="" data-placement="bottom" data-original-title="Kereta">
              <i class="fa fa-train"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('plane')}}"  rel="tooltip" title="" data-placement="bottom" data-original-title="Pesawat">
              <i class="fa fa-plane" style="font-size:20px"></i>
            </a>
          </li>
          <li class="nav-item">
           <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="#" data-original-title="Help ?">
             <i class="fas fa-question-circle" style="font-size:20px"></i>
           </a>
          </li>
          <li class="nav-item">
           <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="#" data-original-title="Cek Pesanan">
             <i class="fa fa-search"></i>
           </a>
          </li>
           @if (auth::user())

          <li class="nav-item">
            <a class="nav-link" href="{{ url('profile') }}">
              {{str_limit(auth::user()->name,8)}}
            </a>
          </li>
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                <i class="fa fa-sign-out-alt"></i>


                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                        @csrf
                                                    </form>

            </a>
            @else
            <li class="nav-item">
                <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="{{route('register')}}">
                Register
                </a>
            </li>
            <li class="nav-item">
            <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="{{route('login')}}" >
                Login
                </a>
            </li>
          @endif
        </ul>
      </div>
    </div>
  </nav>

  @yield('content')

  <footer class="footer" data-background-color="black">
    <div class="container">
      <nav class="float-left">
        <ul>
          <li>
            <a href="#">
              UJIKOM
            </a>
          </li>
          <li>
            <a href="https://github.com/farhansyam">
              my Github
            </a>
          </li>
        </ul>
      </nav>
      <div class="copyright float-right">
        &copy;
        <script>
          document.write(new Date().getFullYear())
        </script>, made with <i class="material-icons">favorite</i> by
        <a href="https://www.facebook.com/mfarhans215">Farhan</a>.
      </div>
    </div>
  </footer>
  <!--   Core JS Files   -->
  <script src="{{asset('js/jquery.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('js/popper.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('js/bootstrap-material-design.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('js/moment.min.js')}}"></script>

    <script src="{{asset('js/bootstrap-datetimepicker.js')}}"></script>
    <script src="{{asset('js/nouislider.min.js')}}"></script>
  <script src="{{asset('js/material-kit.js?v=2.0.5')}}" type="text/javascript"></script>
  <script>
    $(document).ready(function() {
      //init DateTimePickers
      materialKit.initFormExtendedDatetimepickers();

      // Sliders Init
      materialKit.initSliders();
    });


    function scrollToDownload() {
      if ($('.section-download').length != 0) {
        $("html, body").animate({
          scrollTop: $('.section-download').offset().top
        }, 1000);
      }
    }

  </script>
  @stack('scripts')

</body>

</html>
