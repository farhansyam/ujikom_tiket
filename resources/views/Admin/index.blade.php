@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-2" style="    background-color: #00c0ef !important;
    margin-left: 33px;">
              <!-- small box -->
              <div class="small-box">
                <div class="inner">
                  <h3 style="color:white"><b>{{$user}}</b></h3>
                  <p style="color:white">Users</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
              </div>
            </div>
    <div class="col-lg-2" style="    background-color: #00efcb !important;
    margin-left: 10px;">
              <!-- small box -->
              <div class="small-box">
                <div class="inner">
                  <h3 style="color:white"><b>{{$plane}}</b></h3>
                  <p style="color:white">Pesawat</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
              </div>
            </div>
    <div class="col-lg-2" style="    background-color: #ebf350 !important;
    margin-left: 10px;">
              <!-- small box -->
              <div class="small-box">
                <div class="inner">
                  <h3 style="color:white"><b>{{$train}}</b></h3>
                  <p style="color:white">Kereta</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
              </div>
            </div>
    <div class="col-lg-2" style="    background-color: #ff8710 !important;
    margin-left: 10px;">
              <!-- small box -->
              <div class="small-box">
                <div class="inner">
                  <h3 style="color:white"><b>{{$partner}}</b></h3>
                  <p style="color:white">partner</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
              </div>
            </div>
</div>
<br>
 <div class="col-md-8">
                        <div class="card ">
                            <div class="header">
                                <h4 class="title">Penjualan 2019</h4>
                                <p class="category">Penjualan Tiket Pesawat dan Kereta</p>
                            </div>
                            <div class="content">
                                <div id="ChartTiket" class=""></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                       <div class="card ">
                            <div class="header">
                                <h4 class="title">Notifikasi</h4>
                                <p class="category">Notifikasi Sistem Tiketik</p>
                            </div>
                            <div class="content">
                                <div class="footer">
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-history"></i> Updated 3 minutes ago
                                    </div>
                                </div>
                                <div class="table-full-width">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td>
                                                </td>
                                                <td>Sign contract for "What are conference organizers afraid of?"</td>
                                                <td class="td-actions text-right">
                                                    <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-xs">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
@endsection
@push('scripts')
  <script src="{{asset('js/highchart.js')}}"></script>
  <script>
  Highcharts.chart('ChartTiket', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Grafik Penjualan Tiket'
    },
    
    xAxis: {
        categories: [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'May',
            'Jun',
            'Jul',
            'Aug',
            'Sep',
            'Oct',
            'Nov',
            'Dec'
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Tiket'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} Tiket</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
},
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: {!!json_encode($chart['series'])!!}

});</script>
@endpush
