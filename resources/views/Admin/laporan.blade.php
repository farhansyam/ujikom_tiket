@extends('layouts.app')
@section('content')
<div class="col-md-4 col-md-offset-4" style="background:white">
                  <ul class="breadcrumb">
                    <li class="active">Admin</li>
                    <li class="active">Laporan Penumpang</li>
                  </ul>
                               

            <div class="col-sm-6">
            <a href="{{url('admin/laporan/laporanExel')}}"><i class="fa fa-file-pdf" style="font-size:90px;color:indianred"></i></a>
    </div>
    
  <a href="{{url('admin/laporan/laporanExel')}}" class="fa fa-file-excel" style="font-size:90px"></a>
<table></table>
</div>
@endsection
