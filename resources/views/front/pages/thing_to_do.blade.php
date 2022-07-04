@extends("front.layout.header")
@section("title","Discover Morocco")
@section("content")
<!-- ======= Hero Section ======= -->
<section id="hero">
   <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">
      <ol class="carousel-indicators" id="hero-carousel-indicators">
      </ol>
      <div class="carousel-inner" role="listbox">
         <div class="carousel-item active" style="background-image: url(admin-assets/images/banner/042320220657266263a356090b3mosque-g0c763ecc0_1920.jpg)"></div>
         <div class="carousel-item" style="background-image: url(admin-assets/images/banner/042320220656296263a31d4ff70morocco-g2704cd356_1920.jpg)"></div>
         <div class="carousel-item" style="background-image: url(admin-assets/images/banner/7301651053764626914c409af1042320220656476263a32f9f89aarchitecture-ga99c2edd7_1920.jpg)"></div>         
      </div>
      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
      <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>
      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
      <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>
      <div class="homeSliderText">
         <div class="container">
            <!--  id="planT" -->
            <h2 class="text-center f24">MARRAKECH</h2>
         </div>
      </div>
   </div>
</section>
<!-- End Hero -->
<main id="main" class="padtb40">
  <div class="container-fluid bodyPad">
    <div class="brdCrum text-center">
      <a href="/" class="brd_link">Home</a>
      <a href="/" class="brd_link">Discover Morocco</a>
      <span class="name_tile">Marrakech</span>
    </div>
    <div class="d-flex align-center justify-bw wrapD">
      <div class="contentCol">
        <div class="text right32">
          <h3>About Marrakech</h3>
          <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
          consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
      </div>
      <div class="imgCol">
        <div class="imgCityD">
          <img src="http://triplookydev.zobofy.com/city-image/images/898670226623071649767647625574df2bc8c.png">
        </div>
      </div>
    </div>
    <div class="d-flex align-center justify-bw wrapD">
      <div class="imgCol">
        <div class="imgCityD">
          <img src="http://triplookydev.zobofy.com/city-image/images/623341908585161649402848624fe3e05e732.jpg">
        </div>
      </div>      
      <div class="contentCol">
        <div class="text left32">
          <h3>About Marrakech</h3>
          <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
          consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
      </div>
    </div>
  </div>
   <!-- <section>
      <center>
         <h2 style="color: #006994">Top Tourist Destinations</h2>
      </center>
      <br>
      <div class="container mb-3">
         <div class="row">
            @foreach($data as $list)
            <div class="col-sm-3 mb-5">
               <div class="card" style="box-shadow:0px 0px 5px rgba(0, 0, 0, 0.6);border-radius: 2px;">
                  <div class="card-body p-0 border-0" >
                     <img src="{{url('')}}/thing-to-do/{{$list->image}}" width="100%">
                  </div>
                  <div class="card-footer bg-white border-0">
                     <a href="#">
                        <p>Thing to do in {{$list->city_name}}</p>
                     </a>
                  </div>
               </div>
            </div>
            @endforeach
         </div>
      </div>
   </section> -->
</main>
@endsection