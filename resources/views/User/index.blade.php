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
            <h1>Tik-Ketik.</h1>
            <h3>Pesan Tiket Sekarang Menluncur Kemudian</h3>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="main main-raised">
    <div class="section section-basic">
      <div class="container">
        <div class="title">
          <h2>Basic Elements</h2>
        </div>
        <!--  buttons -->

    <!-- 	            end nav tabs -->
    <div class="section section-white">
      <div class="container">
        <!--                 nav pills -->
        <div id="navigation-pills">
          <div class="title">
            <h3>Navigation Pills</h3>
          </div>
          <div class="title">
            <h3>
              <small>With Icons</small>
            </h3>
          </div>
          <div class="row">
            <div class="col-lg-6 col-md-8">
              <ul class="nav nav-pills nav-pills-icons" role="tablist">
                <!--
                                color-classes: "nav-pills-primary", "nav-pills-info", "nav-pills-success", "nav-pills-warning","nav-pills-danger"
                            -->
                <li class="nav-item">
                  <a class="nav-link" href="#dashboard-1" role="tab" data-toggle="tab">
                    <i class="material-icons">dashboard</i> Dashboard
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" href="#schedule-1" role="tab" data-toggle="tab">
                    <i class="material-icons">schedule</i> Schedule
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#tasks-1" role="tab" data-toggle="tab">
                    <i class="material-icons">list</i> Tasks
                  </a>
                </li>
              </ul>
              <div class="tab-content tab-space">
                <div class="tab-pane active" id="dashboard-1">
                  Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C users after installed base benefits.
                  <br>
                  <br> Dramatically visualize customer directed convergence without revolutionary ROI.
                </div>
                <div class="tab-pane" id="schedule-1">
                  Efficiently unleash cross-media information without cross-media value. Quickly maximize timely deliverables for real-time schemas.
                  <br>
                  <br>Dramatically maintain clicks-and-mortar solutions without functional solutions.
                </div>
                <div class="tab-pane" id="tasks-1">
                  Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate one-to-one customer service with robust ideas.
                  <br>
                  <br>Dynamically innovate resource-leveling customer service for state of the art customer service.
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-12">
              <div class="row">
                <div class="col-md-3">
                  <ul class="nav nav-pills nav-pills-icons flex-column" role="tablist">
                    <!--
                                        color-classes: "nav-pills-primary", "nav-pills-info", "nav-pills-success", "nav-pills-warning","nav-pills-danger"
                                    -->
                    <li class="nav-item">
                      <a class="nav-link active" href="#dashboard-2" role="tab" data-toggle="tab">
                        <i class="material-icons">dashboard</i> Dashboard
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#schedule-2" role="tab" data-toggle="tab">
                        <i class="material-icons">schedule</i> Schedule
                      </a>
                    </li>
                  </ul>
                </div>
                <div class="col-md-8">
                  <div class="tab-content">
                    <div class="tab-pane active" id="dashboard-2">
                      Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C users after installed base benefits.
                      <br>
                      <br> Dramatically visualize customer directed convergence without revolutionary ROI.
                    </div>
                    <div class="tab-pane" id="schedule-2">
                      Efficiently unleash cross-media information without cross-media value. Quickly maximize timely deliverables for real-time schemas.
                      <br>
                      <br>Dramatically maintain clicks-and-mortar solutions without functional solutions.
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--                 end nav pills -->
      </div>
    </div>
    <!--        notifications -->

    <div class="section cd-section" id="javascriptComponents">
      <div class="container">
        <div class="title">
          <h2>Javascript components</h2>
        </div>
        <!--                 modals -->
      <div class='page'>
  <div class='content'>
    <div class='circle'>
      <div class='circle_title'>
        <h2>Great Outdoors</h2>
        <h3>Get some fresh air</h3>
      </div>
      <div class='circle_inner'>
        <div class='circle_inner__layer'>
          <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/pc1.png'>
        </div>
        <div class='circle_inner__layer'>
          <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/pc3.png'>
        </div>
        <div class='circle_inner__layer'>
          <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/pc2.png'>
        </div>
      </div>
      <div class='content_shadow'></div>
    </div>
  </div>
  <div class='content'>
    <div class='circle'>
      <div class='circle_title'>
        <h2>City Breaks</h2>
        <h3>Go somewhere new</h3>
      </div>
      <div class='circle_inner'>
        <div class='circle_inner__layer'>
          <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/pc4.png'>
        </div>
        <div class='circle_inner__layer'>
          <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/pc5.png'>
        </div>
        <div class='circle_inner__layer'>
          <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/pc6.png'>
        </div>
      </div>
      <div class='content_shadow'></div>
    </div>
  </div>
  <div class='content'>
    <div class='circle'>
      <div class='circle_title'>
        <h2>Cheap Flights</h2>
        <h3>Come fly with me</h3>
      </div>
      <div class='circle_inner'>
        <div class='circle_inner__layer'>
          <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/pc7.png'>
        </div>
        <div class='circle_inner__layer'>
          <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/pc8.png'>
        </div>
        <div class='circle_inner__layer'>
          <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/pc9.png'>
        </div>
      </div>
      <div class='content_shadow'></div>
    </div>
  </div>
</div>

      </div>
    </div>
    <!--         carousel  -->
    <div class="section" id="carousel">
      <div class="container">
        <div class="row">
          <div class="col-md-8 mr-auto ml-auto">
            <!-- Carousel Card -->
            <div class="card card-raised card-carousel">
              <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="3000">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img class="d-block w-100" src="./assets/img/bg2.jpg" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                      <h4>
                        <i class="material-icons">location_on</i> Yellowstone National Park, United States
                      </h4>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="./assets/img/bg3.jpg" alt="Second slide">
                    <div class="carousel-caption d-none d-md-block">
                      <h4>
                        <i class="material-icons">location_on</i> Somewhere Beyond, United States
                      </h4>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="./assets/img/bg.jpg" alt="Third slide">
                    <div class="carousel-caption d-none d-md-block">
                      <h4>
                        <i class="material-icons">location_on</i> Yellowstone National Park, United States
                      </h4>
                    </div>
                  </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                  <i class="material-icons">keyboard_arrow_left</i>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                  <i class="material-icons">keyboard_arrow_right</i>
                  <span class="sr-only">Next</span>
                </a>
              </div>
            </div>
            <!-- End Carousel Card -->
          </div>
        </div>
      </div>
    </div>
    <!--         end carousel -->
    <div class="section">
      <div class="container text-center">
        <div class="row">
          <div class="col-md-8 ml-auto mr-auto text-center">
            <h2>Completed with examples</h2>
            <h4>The kit comes with three pre-built pages to help you get started faster. You can change the text and images and you're good to go. More importantly, looking at them will give you a picture of what you can built with this powerful kit.</h4>
          </div>
        </div>
      </div>
    </div>
    <div class="section section-signup page-header" style="background-image: url('{{asset('images/city.jpg')}}');">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-6 ml-auto mr-auto">
            <div class="card card-login">
              <form class="form" method="" action="">
                <div class="card-header card-header-primary text-center">
                  <h4 class="card-title">Login</h4>
                  <div class="social-line">
                    <a href="#pablo" class="btn btn-just-icon btn-link">
                      <i class="fa fa-facebook-square"></i>
                    </a>
                    <a href="#pablo" class="btn btn-just-icon btn-link">
                      <i class="fa fa-twitter"></i>
                    </a>
                    <a href="#pablo" class="btn btn-just-icon btn-link">
                      <i class="fa fa-google-plus"></i>
                    </a>
                  </div>
                </div>
                <p class="description text-center">Or Be Classical</p>
                <div class="card-body">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="material-icons">face</i>
                      </span>
                    </div>
                    <input type="text" class="form-control" placeholder="First Name...">
                  </div>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="material-icons">mail</i>
                      </span>
                    </div>
                    <input type="email" class="form-control" placeholder="Email...">
                  </div>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="material-icons">lock_outline</i>
                      </span>
                    </div>
                    <input type="password" class="form-control" placeholder="Password...">
                  </div>
                </div>
                <div class="footer text-center">
                  <a href="#pablo" class="btn btn-primary btn-link btn-wd btn-lg">Get Started</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-12 text-center">
      <a href="examples/login-page.html" class="btn btn-link btn-primary btn-lg" target="_blank">View Login Page</a>
    </div>
    <div class="section section-examples">
      <div class="container-fluid text-center">
        <div class="row">
          <div class="col-md-6">
            <a href="examples/landing-page.html" target="_blank">
              <img src="./assets/img/landing.jpg" alt="Rounded Image" class="img-raised rounded img-fluid">
              <button class="btn  btn-link btn-primary btn-lg">View Landing Page</button>
            </a>
          </div>
          <div class="col-md-6">
            <a href="examples/profile-page.html" target="_blank">
              <img src="./assets/img/profile.jpg" alt="Rounded Image" class="img-raised rounded img-fluid">
              <button class="btn btn-link btn-primary btn-lg">View Profile Page</button>
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="section section-download" id="downloadSection">
      <div class="container">
        <div class="row text-center">
          <div class="col-md-8 ml-auto mr-auto">
            <h2>Do you love this UI Kit?</h2>
            <h4>Cause if you do, it can be yours for FREE. Hit the buttons below to navigate to our website where you can find the kit. Our friends from
              <a href="https://themeisle.com/?utm_campaign=mkfree-hestia&amp;utm_source=creativetim&amp;utm_medium=website" target="_blank">ThemeIsle</a> created a Wordpress Theme which can be also downloaded for free. Start a new project or give an old Bootstrap project a new look!</h4>
          </div>
          <div class="col-sm-8 col-md-6 ml-auto mr-auto">
            <a href="https://www.creative-tim.com/product/material-kit" class="btn btn-primary btn-lg">
              <i class="fa fa-html5"></i> Free HTML Download
            </a>
            <a href="https://themeisle.com/themes/hestia/?utm_campaign=mkfree-hestia&amp;utm_source=creativetim&amp;utm_medium=website" target="_blank" class="btn btn-primary btn-lg">
              <i class="fa fa-wordpress"></i> Wordpress Theme
            </a>
          </div>
        </div>
        <br>
        <br>
        <div class="row text-center">
          <div class="col-md-8 ml-auto mr-auto">
            <h2>Want more?</h2>
            <h4>We've just launched
              <a href="https://demos.creative-tim.com/material-kit-pro/presentation.html?ref=utp-mk-demos" target="_blank">Material Kit PRO</a>. It has a huge number of components, sections and example pages. Start Your Development With A Badass Bootstrap UI Kit inspired by Material Design.</h4>
          </div>
          <div class="col-sm-8 col-md-5 ml-auto mr-auto">
            <a href="https://demos.creative-tim.com/material-kit-pro/presentation.html?ref=utp-mk-demos" class="btn btn-rose btn-upgrade btn-lg" target="_blank">
              <i class="material-icons">unarchive</i> Upgrade to PRO
            </a>
          </div>
        </div>
        <div class="sharing-area text-center">
          <div class="row justify-content-center">
            <h3>Thank you for supporting us!</h3>
          </div>
          <button id="twitter" class="btn btn-raised btn-twitter sharrre">
            <i class="fa fa-twitter"></i> Tweet
          </button>
          <button id="facebook" class="btn btn-raised btn-facebook sharrre">
            <i class="fa fa-facebook-square"></i> Share
          </button>
          <button id="googlePlus" class="btn btn-raised btn-google-plus sharrre">
            <i class="fa fa-google-plus"></i> Share
          </button>
          <a id="github" href="https://github.com/creativetimofficial/material-kit" target="_blank" class="btn btn-raised btn-github">
            <i class="fa fa-github"></i> Star
          </a>
        </div>
      </div>
    </div>
  </div>
  <!-- Classic Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <i class="material-icons">clear</i>
          </button>
        </div>
        <div class="modal-body">
          <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth. Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-link">Nice Button</button>
          <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

@endsection
