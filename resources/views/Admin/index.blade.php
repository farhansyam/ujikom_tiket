@extends('layouts.app')
<head>
  <style media="screen">
  .border-left-primary {
  border-left: .25rem solid #4e73df!important;
}
.pb-2, .py-2 {
  padding-bottom: .5rem!important;
}
.pt-2, .py-2 {
  padding-top: .5rem!important;
}
.h-100 {
  height: 16%!important;

}
.shadow {
  -webkit-box-shadow: 0 .15rem 1.75rem 0 rgba(58,59,69,.15)!important;
  box-shadow: 0 .15rem 1.75rem 0 rgba(58,59,69,.15)!important;
}
.card {
  position: relative;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -ms-flex-direction: column;
  flex-direction: column;
  min-width: 0;
  word-wrap: break-word;
  background-color: #fff;
  background-clip: border-box;
  border: 1px solid #e3e6f0;
  border-radius: .35rem;
}
*, ::after, ::before {
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}
user agent stylesheet
div {
  display: block;
}
.flex-column {
  -webkit-box-orient: vertical!important;
  -webkit-box-direction: normal!important;
  -ms-flex-direction: column!important;
  flex-direction: column!important;
}
body {
  margin: 0;
  font-family: Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
  font-size: 1rem;
  font-weight: 400;
  line-height: 1.5;
  color: #858796;
  text-align: left;
  background-color: #fff;
}
  </style>
</head>
@section('content')
  <div class="container">
      <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <ul class="breadcrumb">
              <li class="active">Admin</li>

            </ul>

              <div class="panel panel-default">
                  <div class="panel-heading">Dashboard</div>

                  <div class="panel-body">
                      <div class="panel-body">
                        <div class="col-md-4">
                          <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                              {{-- <h2>&nbsp;Pesawat : {{$pesawat}}</h2> --}}
                              <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                  <i class="fa-2x text-gray-300"></i>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                              <h2>&nbsp; Pesanan</h2>
                              <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                  <i class="fa-2x text-gray-300"></i>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                              {{-- <h2>&nbsp;Kereta : {{$kereta}}</h2> --}}
                              <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                  <i class="fa-2x text-gray-300"></i>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection
