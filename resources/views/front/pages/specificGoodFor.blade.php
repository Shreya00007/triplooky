@extends("front.layout.header")
@section("title","Nature Marrakech")
@section("content")
<!-- ======= Hero Section ======= -->
<section id="hero">
   <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">
      <ol class="carousel-indicators" id="hero-carousel-indicators">
      </ol>
      <div class="carousel-inner" role="listbox">
        @for($i=0 ;$i<count($image);$i++)
         <div class="carousel-item {{$i==0?"active":""}}" style="background-image: url({{url('')}}/Must-do-and-see/images/{{$image[$i]['image']}})"></div>
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
            <h2 class="text-center f24">{{$data['name']}}</h2>
         </div>
      </div>
   </div>
</section>
<!-- End Hero -->
<main id="main" class="padtb40">
  <div class="container-fluid bodyPad">
    <div class="brdCrum text-center">
      <a href="/" class="brd_link">Home</a>
      <a href="/stay" class="brd_link">Must Do & See</a>
      <span class="name_tile">{{$data['name']}}</span>
      
    </div>
    <div class="d-flex align-center justify-bw wrapD">
      <div class="imgCol">
        <div class="imgCityD">
          <img src="{{url('')}}/Must-do-and-see/images/{{$data['image']}}">
        </div>
      </div>      
      <div class="contentCol">
        <div class="text left32">
          <h3>{{$data['name']}}</h3>
          <p> {!!$data['description']!!}</p>
        </div>
      </div>
    </div>
    <br><br>
    
    </div>
   


     
  
    
  </div>
</main>
@endsection

