
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Go tiket</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" />


    <!--  Light Bootstrap Table core CSS    -->
    <link href="{{asset('css/light-bootstrap-dashboard.css?v=1.4.0')}}" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{asset('css/demo.css')}}" rel="stylesheet" />


    <!--     Fonts and icons     -->
<link rel="stylesheet" href="{{asset('fonts/font_pro.css')}}">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="{{asset('css/pe-icon-7-stroke.css')}}" rel="stylesheet" />
 <style>
    .breadcrumb {
    background-color: #d5ffd4;
    }
    .btn-hijau {
    color: #fff;
    background-color: #83ec99;
}
.btn-biru {
    color: #fff;
    background-color: #56bdd2;
}
.btn-kuning {
    color: #fff;
    background-color: #ece659;
}
.btn-oren {
    color: #fff;
    background-color: #f98253;
    4: ;
}
.btn-hijau-toska {
    color: #fff;
    background-color: #19dabd;
}
.btn-birmud {
    color: #fff;
    background-color: #bcf3ea;
}
.btn-tsc {
    color: #fff;
    background-color: #15f7c0;
}
    </style>
</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="img/sidebar-5.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="" class="simple-text">
                    @if (Auth::user()->role == 3)
                    Administrator
                    @else
                    Petugas
                    @endif
                </a>
            </div>

            <ul class="nav">
                @if(Auth::user()->role == 2)
                <li class="{{set_active('admin')}}">
                    <a href="{{url('petugas')}}">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="{{set_active('booking.index')}}">
                        <a href="{{url('petugas/booking')}}">
                                <i class="pe-7s-cash"></i>
                                <p>Data Booking</p>
                            </a>
                        </li>
                        
            <li>
                <a href="{{url('petugas/laporan')}}">
                    <i class="pe-7s-copy-file"></i>
                    <p>Laporan</p>
                </a>
            </li>
                @endif
                @if(Auth::user()->role == 3)
                     <li class="{{set_active('admin')}}">
                    <a href="{{url('admin')}}">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="{{set_active('booking.index')}}">
                        <a href="{{url('admin/booking')}}">
                                <i class="pe-7s-cash"></i>
                                <p>Data Booking</p>
                            </a>
                        </li>
                        <li class="{{set_active('user.index')}}">
                                <a href="{{url('admin/user')}}">
                                    <i class="pe-7s-user"></i>
                                    <p>Data Users</p>
                                </a>
                            </li>
            <li class="{{set_active('laporan')}}">
            <a href="{{url('admin/laporan')}}">
                    <i class="pe-7s-copy-file"></i>
                    <p>Laporan</p>
                </a>
            </li>
            <li class="{{set_active('petugas')}}">
                    <a href="{{url('admin/petugas')}}">
                        <i class="pe-7s-id"></i>
                        <p>Data Petugas</p>
                    </a>
                </li>
            <li class="{{set_active('plane.index')}}">
                    <a href="{{url('admin/plane')}}">
                        <i class="pe-7s-plane"></i>
                        <p>Pesawat</p>
                    </a>
                </li>
                <li class="{{set_active('train.index')}}">
                    <a href="{{url('admin/train')}}">
                        <i class="fa fa-train"></i>
                        <p>Kereta</p>
                    </a>
                </li>
            <li class="{{set_active('jadwal')}}">
                    <a href="{{url('admin/schedule')}}">
                        <i class="pe-7s-date"></i>
                        <p>Jadwal Rute</p>
                    </a>
                </li>
            <li class="{{set_active('partner.index')}}">
                    <a href="{{url('admin/partner')}}">
                        <i class="pe-7s-science"></i>
                        <p>Partner</p>
                    </a>
                </li>
                <li>
                    <a href="maps.html">
                        <i class="pe-7s-config"></i>
                        <p>Config</p>
                    </a>
                </li>
              @endif  
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Dashboard</a>
                    <a class="navbar-brand btn-tsc" href="{{url('admin/airport')}}">Bandara</a>
                    <a class="navbar-brand btn-birmud" href="{{url('admin/station')}}">Stasiun</a>
                </div>
                <div class="collapse navbar-collapse">

                    <ul class="nav navbar-nav navbar-right">
                        </li>
                        <li>
                               <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                        </li>
						<li class="separator hidden-lg"></li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">          
                <div class="row">
                    @yield('content')
                </div>
            </div>
        </div>


        <footer class="footer">
            <div class="container-fluid">
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="https/www.gits">Creative Tim</a>, made with love for a better web
                </p>
            </div>
        </footer>

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="{{asset('js/jquery.3.2.1.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/sweetalert.min.js')}}"></script>
    @if (session('create'))
    <script>
        swal({
                title: "Berhasil!",
                text: "Berhasi Insert Data",
                icon: "success",
            });

    </script>
@endif
@if (session('edit'))
    <script>
        swal({
                title: "Sukses edit Data",
                icon: "success",
            });

    </script>
@endif
@if (session('delete'))
    <script>
        swal({
                title: "Sukses Delete Data",
                icon: "success",
            });

    </script>
@endif

    @stack('scripts')

    <!--  Notifications Plugin    -->
    <script src="{{asset('js/bootstrap-notify.js')}}"></script>


    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="{{asset('js/light-bootstrap-dashboard.js?v=1.4.0')}}"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="{{asset('js/demo.js')}}"></script>

	
</html>
