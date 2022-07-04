@extends("front.layout.header")
@section("title","Must Do And See in")
@section("content")
<!-- ======= Hero Section ======= -->
<section id="hero">
   <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">
      <ol class="carousel-indicators" id="hero-carousel-indicators">
      </ol>
      <div class="carousel-inner" role="listbox">
        
       @if(!empty($cityimage))
        @for($i=0;$i<count($cityimage);$i++)
         <div class="carousel-item {{$i==0?'active':""}}" style="background-image: url({{url('')}}/city-image/images/{{$cityimage[$i]['image']}})"></div>
        @endfor

       @endif
        
                
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
            @if(!empty($data))
            <h2 class="text-center f24">{{$data[0]['type']}} in {{$city_name}}</h2>
            @endif
         </div>
      </div>
   </div>
</section>
<!-- End Hero -->
<main id="main" class="padtb40">
  <div class="container-fluid bodyPad">
    <div class="brdCrum text-center">
      <a href="/" class="brd_link">Home</a>
     
      @if(!empty($data))
      <a href="/{{$data[0]['type']}}" class="brd_link">{{$data[0]['type']}}</a>
      <span class="name_tile">{{$city_name}}</span>
    </div>
      @for($i=0;$i<count($data);$i++)
      @if($i%2==0)
      <div class="d-flex align-center justify-bw wrapD">
      <div class="contentCol">
        <div class="text right32">
           <h3>{{$data[$i]['name']}}</h3>
          <p> {!! $data[$i]['description'] !!}</p>
        </div>
      </div>
      <div class="imgCol">
        <div class="imgCityD">
        <img src="{{url('')}}/Must-do-and-see/images/{{$data[$i]['image']}}">
        </div>
      </div>
    </div>
      @else
      <div class="d-flex align-center justify-bw wrapD">
      <div class="imgCol">
        <div class="imgCityD">
          <img src="{{url('')}}/Must-do-and-see/images/{{$data[$i]['image']}}">
        </div>
      </div>      
      <div class="contentCol">
        <div class="text left32">
          <h3>{{$data[$i]['name']}}</h3>
          <p> {!!$data[$i]['description'] !!}</p>
        </div>
      </div>
    </div>
    @endif

      @endfor

      @else
      <h1>No Any Good For</h1>
      @endif
  
    
  </div>
</main>
@endsection

