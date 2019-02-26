!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Sumon Rahman">
    <meta name="description" content="">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title -->
    <title>F-TIKET</title>
    <!-- Place favicon.ico in the root directory -->
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="shortcut icon" type="image/ico" href="images/favicon.ico" />
    <!-- Plugin-CSS -->
    {{-- <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}"> --}}
    <link rel="stylesheet" href="{{asset('css/bootstrap1.min.css')}}">
    {{-- <link rel="stylesheet" href="{{asset('css/linearicons.css')}}"> --}}
    {{-- <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}"> --}}
    {{-- <link rel="stylesheet" href="{{asset('css/animate.css')}}">/ --}}
    <!-- Main-Stylesheets -->
    {{-- <link rel="stylesheet" href="{{asset('css/normalize.css')}}"> --}}
    <link rel="stylesheet" href="{{asset('style.css')}}">
    <link rel="stylesheet" href="{{asset('fonts/font_pro.css')}}">
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <script src="{{asset('js/vendor/modernizr-2.8.3.min.js')}}"></script>
    <style media="screen">
      .fa-plane-alt{
        color:#64b5f6;
        font-size: 20px;
      }

      .fa-train{
        font-size: 20px;
        color:#fedd9d;
      }

      .fa-ticket{
        color:#42f498;
        font-size: 20px;

      }

      .fa-headset{
        color:#faff2e;
        font-size: 20px;

      }
      .mainmenu-area .right-button a {
    padding: 2px 10px;


  }


    </style>
    <!--[if lt IE 9]>
        <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->



	<script src="{{asset('js/vendor/jquery-1.12.4.min.js')}}"></script>
	   <script type="text/javascript">
            $(document).ready(function(){
            var bg=[0,1,2];
            var index=0;
            setInterval(function(){
            index=(index + 1) % bg.length;
            $('header').css('background-image','url("images/'+index+'.jpg")');
            },5000);
            });
        </script>

        <style media="screen">

        </style>

</head>

<body data-spy="sVcroll" data-target=".mainmenu-area">
    <!-- Preloader-content -->
    <div class="preloader">
        <span><i class="lnr lnr-sun"></i></span>
    </div>
    <!-- MainMenu-Area -->
    <nav class="mainmenu-area" data-spy="affix" data-offset-top="200">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#primary_menu">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><img src="images/logo.png" alt="Logo"></a>
                <a class="navbar-brand" href="#">F-Tiket</a>
            </div>
            <div class="collapse navbar-collapse" id="primary_menu">
                <ul class="nav navbar-nav mainmenu">
                    <li class="active"><i class="fal fa-plane-alt"></i><a href="#home_page">Pesawat</a></li>
                    <li><i class="fal fa-train"></i><a href="#about_page">Kereta</a></li>
                    <li><i class="fal fa-ticket"></i><a href="#features_page">Cek Order</a></li>
                    <li><i class="fal fa-headset"></i><a href="#contact_page">Contacts</a></li>
                </ul>
                <div class="right-button hidden-xs">
                    @if (auth::user())

                      <a href="{{ url('profile') }}">
                        {{auth::user()->name}}
                      </a>
                      <a class="dropdown-item" href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                          {{ __('Logout') }}


                                                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                                  @csrf
                                                              </form>

                      </a>
                      @else
                        <a href="{{url('register')}}">register</a>
                        <a href="{{url('login')}}">Login</a>
                    @endif
                </div>
            </div>
        </div>
    </nav>
    <!-- MainMenu-Area-End -->
    <!-- Home-Area -->
    <header class="home-area overlay" id="home_page">


	  <div class="container">
      <div class="row">
        <div class="col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2 mobile-image">
          <div class="shadow p-3 mb-5 bg-white rounded">
           <figure class="wow fadeInUp" data-wow-delay="0.2s">
              <div class="panel panel-default">
                <div class="panel panel-head" style="background:#e3edff;">
                  {{-- <h3 class="center" style="color:black; font-family: 'Lato', sans-serif; margin: 8px 272px 15px;">Mau ke mana?</h3> --}}
                </div>
  							<div class="panel panel-body">
                      <i class="far fa-plane-alt" style="font-size:60px;"></i><h5>Cari harga tiket pesawat murah</h5>
                  <div class="col-sm-6">
                    <br><br>
                  </div>
                  <div class="col-sm-6">
                  </div>
                  <br><br><br><br><br>
  							</div>
						  </div>
            </div>
          </figure>
        </div>
      </div>
    </div>
    </header>
    <!-- Home-Area-End -->
    <!-- About-Area -->
    <!-- Footer-Area -->
    <footer class="footer-area" id="contact_page">
        <div class="section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="page-title text-center">
                            <h5 class="title">Contact US</h5>
                            <h3 class="dark-color">Find Us By Bellow Details</h3>
                            <div class="space-60"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-4">
                        <div class="footer-box">
                            <div class="box-icon">
                                <span class="lnr lnr-map-marker"></span>
                            </div>
                            <p>8-54 Paya Lebar Square <br /> 60 Paya Lebar Roa SG, Singapore</p>
                        </div>
                        <div class="space-30 hidden visible-xs"></div>
                    </div>
                    <div class="col-xs-12 col-sm-4">
                        <div class="footer-box">
                            <div class="box-icon">
                                <span class="lnr lnr-phone-handset"></span>
                            </div>
                            <p>+65 93901336 <br /> +65 93901337</p>
                        </div>
                        <div class="space-30 hidden visible-xs"></div>
                    </div>
                    <div class="col-xs-12 col-sm-4">
                        <div class="footer-box">
                            <div class="box-icon">
                                <span class="lnr lnr-envelope"></span>
                            </div>
                            <p>yourmail@gmail.com <br /> backpiper.com@gmail.com
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer-Bootom -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-5">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            <span>Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Go Tic <i class="lnr lnr-heart" aria-hidden="true"></i> by <a href="https://github.com/farhansyam" target="_blank">Farhan Syam</a></span>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        <div class="space-30 hidden visible-xs"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer-Bootom-End -->
    </footer>
    <!-- Footer-Area-End -->
    <!--Vendor-JS-->
    <script>
                        window.fbAsyncInit = function() {
                        FB.init({
                        appId      : '{your-app-id}',
                        cookie     : true,
                        xfbml      : true,
                        version    : '{api-version}'
                        });

                        FB.AppEvents.logPageView();

                        };

                        (function(d, s, id){
                        var js, fjs = d.getElementsByTagName(s)[0];
                        if (d.getElementById(id)) {return;}
                        js = d.createElement(s); js.id = id;
                        js.src = "https://connect.facebook.net/en_US/sdk.js";
                        fjs.parentNode.insertBefore(js, fjs);
                        }(document, 'script', 'facebook-jssdk'));


FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
});


    </script>

    <script src="{{asset('js/vendor/jquery-1.12.4.min.js')}}"></script>
    <script src="{{asset('js/vendor/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/magnific-popup.min.js')}}"></script>
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('js/vendor/jquery-ui.js')}}"></script>
    <script src="{{asset('js/scrollUp.min.js')}}"></script>
    <script src="{{asset('js/contact-form.js')}}"></script>
    <script src="{{asset('js/ajaxchimp.js')}}"></script>
    <script src="{{asset('js/wow.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
</body>

</html>
