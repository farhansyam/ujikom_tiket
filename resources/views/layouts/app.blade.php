<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Ticketing') }}</title>
    <script src="{{asset('js/sweetalert.min.js')}}"></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('fonts/font_pro.css')}}">
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

    </style>
</head>
<body>
    <nav class="navbar navbar-default navbar-static-top">
    <div id="app">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                    Ticketing
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                        @if(Auth::check())
                        {{-- <li class=""><router-link :to="{name: 'IndexDashboard'}" >Home</router-link></li> --}}

                        @if (Auth::user()->role == 3)

                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Master Data
                            <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{url('admin/user')}}" >User</a></li>
                                <li><a href="{{url('admin/plane')}}" >Pesawat</a></li>
                                <li><a href="{{url('admin/airport')}}" >Bandara</a></li>
                                <li><a href="{{url('admin/schedule_plane')}}" >Jadwal Pesawat</a></li>
                                <li><a href="{{url('admin/train')}}" >Kereta</a></li>
                                <li><a href="{{url('admin/station')}}" >Stasiun</a></li>
                                <li><a href="{{url('admin/schedule_train')}}" >Jadwal Kereta</a></li>

                                {{-- <li><router-link :to="{name: 'IndexKartuKredit'}" >Bank</router-link></li> --}}
                            </ul>
                        </li>
                      @endif
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Laporan
                            <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                {{-- <li><router-link :to="{name: 'IndexLaporanTransaksiKas'}" >Transaksi</router-link></li> --}}
                                {{-- <li><router-link :to="{name: 'IndexLaporanLabaRugi'}" >Laba Rugi</router-link></li> --}}
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Transaksi
                            <span class="caret"></span></a>

                            <ul class="dropdown-menu">
                                {{-- <li><router-link :to="Kereta{name: 'IndexTransaksiKas'}" >Transaksi Kas</router-link></li> --}}
                                {{-- <li><router-link :to="{name: 'IndexTransaksiKartuKredit'}" >Transaksi Kartu Kredit</router-link></li> --}}
                                {{-- <li><router-link :to="{name: 'IndexTransaksiGas'}" >Transaksi Gas</router-link></li> --}}
                                {{-- <li><router-link :to="{name: 'IndexJurnalManual'}" >Jurnal Manual</router-link></li> --}}
                            </ul>
                        </li>
                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>
    @if (session()->has('delete'))
      <script>
      swal({
        title: "Berhasil Hapus!",
        text: "Data telah di Hapus Permanen!",
        icon: "success",
        button: "Okey!",
      });
      </script>
    @endif
    @if (session()->has('edit'))
      <script>
      swal({
        title: "Berhasil Edit!",
        text: "Data telah di Edit!",
        icon: "success",
        button: "Okey!",
      });
      </script>
    @endif
    @if (session()->has('create'))
      <script>
      swal({
        title: "Berhasil Tambah Data!",
        text: "Data Pesawat Bertambah!",
        icon: "success",
        button: "Okey!",
      });
      </script>
    @endif
    <!-- Scripts -->
    <script src="{{ asset('js/app.js?v=1.0.2') }}"></script>
    @stack('scripts')

</body>
</html>
