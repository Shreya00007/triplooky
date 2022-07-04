@extends("front.layout.header")
@section("title","Discover Morocco")
@section("content")
<!-- ======= Hero Section ======= -->
<section id="hero">
   <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">
      <ol class="carousel-indicators" id="hero-carousel-indicators">
      </ol>
      <div class="carousel-inner" role="listbox">
         @for($i=0;$i<count($city);$i++)
          <div class="carousel-item {{$i==0?"active":""}}" style="background-image: url({{url('')}}/city-image/images/{{$city[$i]['image']}})"></div>
        
         @endfor
              
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
            <h2 class="text-center f24">DISCOVER MOROCCO</h2>
         </div>
      </div>
   </div>
</section>
<!-- End Hero -->
<main id="main" class="padtb40">
  <div class="container-fluid bodyPad">
    <div class="brdCrum text-center">
      <a href="/" class="brd_link">Home</a>
      <span class="name_tile">Discover Morocco</span>
      
    </div>
    <br>
    <div class="row">
     @for($i=0;$i<count($city); $i++)
      <div class="col-md-3 form-group">
        <div class="ntSection">
          <a href="/city/{{$city[$i]['city_name']}}">
            <img src="{{url('')}}/city-image/images/{{$city[$i]['image']}}" alt="n">
            <p>{{$city[$i]['city_name']}}</p>
          </a>
        </div>
      </div>
     @endfor
     
     
    </div>
  </div>
</main>
@endsection