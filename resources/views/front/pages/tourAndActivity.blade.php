@extends("front.layout.header")
@section("title","Tour and Activity/".$data['name'])
@section("content")
<!-- ======= Hero Section ======= -->
<section id="hero">
   <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">
      <ol class="carousel-indicators" id="hero-carousel-indicators">
      </ol>
      <div class="carousel-inner" role="listbox">
        @for($i=0 ;$i<count($imagedata);$i++)
         <div class="carousel-item {{$i==0?"active":""}}" style="background-image: url({{url('')}}/tour-and-activit-image/images/{{$imagedata[$i]['image']}})"></div>
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
      <a href="/stay" class="brd_link">Things to do</a>
      <span class="name_tile">{{$data['name']}}</span>
      
    </div>
    <div class="d-flex align-center justify-bw wrapD">
      <div class="imgCol">
        <div class="imgCityD">
          <img src="{{url('')}}/tour-and-activit-image/images/{{$data['image']}}">
        </div>
      </div>      
      <div class="contentCol">
        <div class="text left32">
          <h3>{{$data['name']}}</h3>
          <p> {!! $data['description'] !!}</p>
        </div>
      </div>
    </div>
    <br><br>
    <center><h4>Related Things To Do</h4></center>
    <br><br>
     <div class="row">
     @for($i=0;$i<count($related_data);$i++)
    
      <div class="col-md-3 form-group">
        <div class="ntSection">
          <a href="/tour-and-activity/{{$related_data[$i]['name']}}">
            <img src="{{url('')}}/tour-and-activit-image/images/{{$related_data[$i]['image']}}" alt="n">
            <p>{{$related_data[$i]['name']}}</p>
          </a>
        </div>
      </div>

      @endfor
    </div>
    </div>
   


     
  
    
  </div>
</main>
@endsection

