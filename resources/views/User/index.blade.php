@extends('layouts.master_ui')
<head>
<style>
@import url(https://fonts.googleapis.com/css?family=Nunito:400,700,300);
* {
  box-sizing: border-box;
}

body {
  font-family: 'Nunito', sans-serif;
}
body .page {
  margin: 0 auto;
  width: 920px;
}
body .content {
  width: 33.33%;
  display: inline-block;
  margin: 0 auto;
  position: relative;
  height: 100vh;
  max-width: 300px;
}
body .circle_inner__layer {
  width: 600px;
  height: 200px;
  transition: all .4s;
  position: absolute;
  top: 0;
  left: -200px;
}
body .circle_inner__layer img {
  width: 100%;
  position: absolute;
  bottom: 0;
}
body .circle {
  position: absolute;
  left: 0;
  right: 0;
  margin: auto;
  top: 50%;
  width: 200px;
  -webkit-transform: translateY(-50%);
          transform: translateY(-50%);
  transition: all .5s;
  cursor: pointer;
}
body .circle:hover .circle_shine {
  top: 330px;
  left: -200px;
}
body .circle_shine {
  background: white;
  width: 600px;
  transition: .3s;
  height: 200px;
  opacity: 0.2;
  top: -10px;
  left: -90px;
  -webkit-transform: rotate(45deg);
          transform: rotate(45deg);
  position: absolute;
  z-index: 2;
}
body .circle:hover h2, body .circle:hover h3 {
  opacity: 1;
  top: -36px;
}
body .circle:hover .content_shadow {
  -webkit-transform: scale(1.1);
          transform: scale(1.1);
  top: -22px;
}
body .circle:hover h3 {
  transition: all .2s .04s;
}
body .circle:hover h2 {
  transition: all .2s;
}
body .circle .circle_inner__layer:nth-of-type(1) {
  top: 0px;
  left: 0px;
}
body .circle .circle_inner__layer:nth-of-type(2) {
  top: 0px;
  left: -210px;
}
body .circle .circle_inner__layer:nth-of-type(3) {
  top: 0px;
  left: -440px;
}
body .circle_title {
  text-align: center;
}
body .circle_title h2, body .circle_title h3 {
  opacity: 0;
  color: #4A7479;
  margin: 0;
  transition: all .2s .04s;
  position: relative;
  top: -10px;
}
body .circle_title h3 {
  transition: all .2s;
  color: #B0D5D6;
  font-size: 15px;
}
body .circle_inner {
  border-radius: 200px;
  background: #B0D5D6;
  overflow: hidden;
  margin: auto;
  width: 200px;
  z-index: 1;
  transition: all .3s;
  height: 200px;
  position: relative;
}
body .circle_inner:hover {
  -webkit-transform: scale(1.1);
          transform: scale(1.1);
}
body .circle_inner:hover .circle_inner__layer:nth-of-type(1) {
  left: -80px;
  transition: all 4s linear;
}
body .circle_inner:hover .circle_inner__layer:nth-of-type(2) {
  left: -400px;
  transition: all 4s linear;
}
body .circle_inner:hover .circle_inner__layer:nth-of-type(3) {
  left: -140px;
  transition: all 4s linear;
}
body .content_shadow {
  width: 200px;
  box-shadow: 0px 31px 19px -2px #E0E8F9;
  height: 20px;
  border-radius: 70%;
  position: relative;
  top: -44px;
  transition: all .3s;
  z-index: 0;
}


</style>

</head>
@section('content')

<div class="page-header header-filter clear-filter purple-filter" data-parallax="true" style="background-image: url('{{asset('images/bg2.jpg')}}');">
    <div class="container">
      <div class="row">
        <div class="col-md-8 ml-auto mr-auto">
          <div class="brand">
            <h1>Go Tiket.</h1>
            <h3>Pesan Tiket Sekarang Menluncur Kemudian</h3>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="main main-raised">
    <div class="section section-basic">
      <div class="container">
           <ul id="tabs-swipe-demo" class="tabs">
    <li class="tab col s3"><a href="#test-swipe-1">Test 1</a></li>
    <li class="tab col s3"><a class="active" href="#test-swipe-2">Test 2</a></li>
    <li class="tab col s3"><a href="#test-swipe-3">Test 3</a></li>
  </ul>
  <div id="test-swipe-1" class="col s12 blue">Test 1</div>
  <div id="test-swipe-2" class="col s12 red">Test 2</div>
  <div id="test-swipe-3" class="col s12 green">Test 3</div>
        
        <div class="title">
          <h2>Basic Elements</h2>
        </div>
        <!--  buttons -->
      <div class="container">
<div class='page'>
  <div class='content'>
    <div class='circle'>
      <div class='circle_title'>
        <h2>Naik Kereta</h2>
        <h3>Dapatkan Tiketnya sekarang</h3>
      </div>
      <div class='circle_inner'>
        <div class='circle_inner__layer'>
          <img src='{{asset('images/pc1.png')}}'>
        </div>
        <div class='circle_inner__layer'>
          <img src='{{asset('images/pc3.png')}}'>
        </div>
        <div class='circle_inner__layer'>
          <img src='{{asset('images/pc2.png')}}'>
        </div>
      </div>
      <div class='content_shadow'></div>
    </div>
  </div>
  <div class='content'>
    <div class='circle'>
      <div class='circle_title'>
        <h2>Comming soon</h2>
        <h3>Tiket Bus</h3>
      </div>
      <div class='circle_inner'>
        <div class='circle_inner__layer'>
          <img src='{{asset('images/pc4.png')}}'>
        </div>
        <div class='circle_inner__layer'>
          <img src='{{asset('images/pc5.png')}}'>
        </div>
        <div class='circle_inner__layer'>
          <img src='{{asset('images/pc6.png')}}'>
        </div>
      </div>
      <div class='content_shadow'></div>
    </div>
  </div>
  <div class='content'>
    <div class='circle'>
      <div class='circle_title'>
        <h2>Penerbangan Murah</h2>
        <h3>Dapatkan Tiketnya sekarang</h3>
      </div>
      <div class='circle_inner'>
        <div class='circle_inner__layer'>
          <img src='{{asset('images/pc7.png')}}'>
        </div>
        <div class='circle_inner__layer'>
          <img src='{{asset('images/pc8.png')}}'>
        </div>
        <div class='circle_inner__layer'>
          <img src='{{asset('images/pc9.png')}}'>
        </div>
      </div>
      <div class='content_shadow'></div>
    </div>
  </div>
</div>


      </div>
      <div class="container">
        <!--                nav tabs	             -->
            <!-- 	            end nav tabs -->
    <div class="section section-white">
      <div class="container">
        <!--                 nav pills -->
        <div class="row">
          <div class="col-md-6">
            <b><h2>Partner Kami</h2></b>
            <h4>Anda adalah prioritas kami. Oleh karena itu kami bekerja sama dengan berbagai penyedia jasa transportasi untuk memastikan agar perjalanan Anda selalu nyaman dan menyenangkan, ke manapun Anda pergi.</h4>
          </div>
          <div class="col-md-6">
            <img src="{{asset('images/partner.svg')}}" alt="">

          </div>

        </div>
        <!--                 end nav pills -->
      </div>
    </div>
  </div>
</div>
</div>
</div>
@endsection
