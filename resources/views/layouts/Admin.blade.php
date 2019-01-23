<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../img/apple-icon.png">
    <link rel="icon" type="image/png" href="../img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>{{auth::user()->name}}</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('css/light-bootstrap-dashboard.css?v=2.0.1')}}" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{asset('css/demo.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('fonts/font_pro.css')}}">

	<style>
		.sidebar:after, body>.navbar-collapse:after {
    background: linear-gradient(to bottom, #5fbb91 0%, #000000 100%);
    background-image: linear-gradient(rgb(95, 187, 145) 0%, rgb(0, 0, 0) 100%);
}
	</style>
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-image="../img/sidebar-5.jpg">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="http://www.creative-tim.com" class="simple-text">
                        {{auth::user()->name}}
                    </a>
                </div>
                <ul class="nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="dashboard.html">
                            <i class="nc-icon nc-chart-pie-35"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="./table.html">
                            <i class="nc-icon nc-notes"></i>
                            <p>Data Verifikasi Order</p>
                        </a>
                    </li>
                    @if (auth::user()->role == 3)
                      <li>
                        <a class="nav-link" href="./user.html">
                          <i class="nc-icon nc-circle-09"></i>
                          <p>Users</p>
                        </a>
                      </li>
                      <li>
                          <a class="nav-link" href="./typography.html">
                              <i class="fal fa-plane-alt"></i>
                              <p>Pesawat</p>
                          </a>
                      </li>
                      <li>
                          <a class="nav-link" href="./icons.html">
                              <i class="fal fa-train"></i>
                              <p>Kereta</p>
                          </a>
                      </li>
                      <li>
                          <a class="nav-link" href="./maps.html">
                              <i class="fa fa-envelope-square"></i>
                              <p>Mail</p>
                          </a>
                      </li>
                    @endif
                    <li>
                        <a class="nav-link" href="./notifications.html">
                            <i class="fa fa-file-archive"></i>
                            <p>Laporan</p>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class=" container-fluid  ">
                    <a class="navbar-brand" href="#pablo"> Dashboard </a>
                    <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <ul class="nav navbar-nav mr-auto">
                            <li class="nav-item">
                                <a href=" #" class="nav-link" data-toggle="dropdown">
                                    <span class="d-lg-none">Dashboard</span>
                                </a>
                            </li>
                        </ul>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                              <a class="dropdown-item" href="{{ route('logout') }}"
                                 onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                  {{ __('Logout') }}
                              </a>

                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                  @csrf
                              </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card ">
                                <div class="card-header ">
                                    <h4 class="card-title">Email Statistics</h4>
                                    <p class="card-category">Last Campaign Performance</p>
                                </div>
                                <div class="card-body ">
                                    <div id="chartPreferences" class="ct-chart ct-perfect-fourth"></div>
                                </div>
                                <div class="card-footer ">
                                    <div class="legend">
                                        <i class="fa fa-circle text-info"></i> Open
                                        <i class="fa fa-circle text-danger"></i> Bounce
                                        <i class="fa fa-circle text-warning"></i> Unsubscribe
                                    </div>
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-clock-o"></i> Campaign sent 2 days ago
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card ">
                                <div class="card-header ">
                                    <h4 class="card-title">Users Behavior</h4>
                                    <p class="card-category">24 Hours performance</p>
                                </div>
                                <div class="card-body ">
                                    <div id="chartHours" class="ct-chart"></div>
                                </div>
                                <div class="card-footer ">
                                    <div class="legend">
                                        <i class="fa fa-circle text-info"></i> Open
                                        <i class="fa fa-circle text-danger"></i> Click
                                        <i class="fa fa-circle text-warning"></i> Click Second Time
                                    </div>
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-history"></i> Updated 3 minutes ago
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

</body>
<!--   Core JS Files   -->
<script src="{{asset('js/core/jquery.3.2.1.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/core/popper.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/core/bootstrap.min.js')}}" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="{{asset('js/plugins/bootstrap-switch.js')}}"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!--  Chartist Plugin  -->
<script src="{{asset('js/plugins/chartist.min.js')}}"></script>
<!--  Notifications Plugin    -->
<script src="{{asset('js/plugins/bootstrap-notify.js')}}"></script>
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="{{asset('js/light-bootstrap-dashboard.js?v=2.0.1')}}" type="text/javascript"></script>
<!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
<script src="{{asset('js/demo.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // Javascript method's body can be found in js/demos.js

        $.notify({
        	// options
        	title: '##### notify #####',
        	message: 'Selamat datang {{auth::user()->name}}',
        	url: 'https://github.com/mouse0270/bootstrap-notify',
        	target: '_blank'
        },{
        	// settings
        	element: 'body',
        	position: null,
        	type: "info",
        	allow_dismiss: true,
        	newest_on_top: false,
        	showProgressbar: false,
        	placement: {
        		from: "top",
        		align: "right"
        	},
        	offset: 20,
        	spacing: 10,
        	z_index: 1031,
        	delay: 5000,
        	timer: 1000,
        	url_target: '_blank',
        	mouse_over: null,
        	animate: {
        		enter: 'animated fadeInDown',
        		exit: 'animated fadeOutUp'
        	},
        	onShow: null,
        	onShown: null,
        	onClose: null,
        	onClosed: null,
        	icon_type: 'class',
        	template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
        		'<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
        		'<span data-notify="icon"></span> ' +
        		'<span data-notify="title">{1}</span> ' +
        		'<span data-notify="message">{2}</span>' +
        		'<div class="progress" data-notify="progressbar">' +
        			'<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
        		'</div>' +
        		'<a href="{3}" target="{4}" data-notify="url"></a>' +
        	'</div>'
        });

    });
</script>

</html>
