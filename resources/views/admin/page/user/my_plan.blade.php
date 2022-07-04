@extends("useradmin.layout.header")
@section("title","My Profile")
@section("content")
<style>
   .imgM {
   max-width: 300px;
   width:100%;
   height: 200px;
   object-fit: cover;
   border-radius: 6px;
   margin-right:16px;
   }
   .swiper-container {
   width: 100%;
   height: 100%;
   }
   .swiper-slide img{
   width:100%;
   height:200px;
   object-fit:cover;
   border-radius:6px;
   }
   .swiper-slide {
   text-align: center;
   font-size: 18px;
   background: #fff;
   /* Center slide text vertically */
   display: -webkit-box;
   display: -ms-block;
   display: -webkit-block;
   display: block;
   -webkit-box-pack: center;
   -ms-flex-pack: center;
   -webkit-justify-content: center;
   justify-content: center;
   -webkit-box-align: center;
   -ms-flex-align: center;
   -webkit-align-items: center;
   align-items: center;
   }
   .swiper-slide{padding:8px 16px;/*border:1px solid #eeeeee;*/}
   .swiper-button-prev, .swiper-container-rtl .swiper-button-next{
   left: 3px;
   right: auto;
   font-size: 35px;
   transform: rotate(-90deg);
   color:#000000;
   }
   .swiper-button-next, .swiper-container-rtl .swiper-button-prev{
   right: 3px;
   left: auto;
   font-size: 35px;
   transform: rotate(90deg);
   color:#000000;
   }
   .swiper-container{box-shadow:0px 0px 0px;}
   .swiper-button-next, .swiper-button-prev{top:50px;}
   .swiper-slide{max-height:100%;}
   .nav-tabs .nav-link{margin-bottom:0;}
   .nav-tabs a.nav-link{
   color: #000;
   }
   /*.mainBody{
   background-image: url(https://triplookydev.zobofy.com/front-assets/assets/img/cloud.svg);
   }*/
   .active .day_section {
   background: #006994;
   box-shadow: rgb(250 129 40 / 15%) 1.95px 1.95px 2.6px;
   border-right: 3px solid #fa8128;
   }
   .active .day_section *{
   color: #ffffff;
   }
   .fi_img {
   background-image: url(https://triplookydev.zobofy.com/front-assets/assets/img/pin.png);
   background-position: top;
   background-size: cover;
   height: 370px;
   position:relative;
   }
   .img{
   width: 256px;
   height: 256px;
   border-radius: 50%;
   background: #ffffff;
   position: absolute;
   top: 25px;
   left: 50%;
   transform: translate(-50%, 0px);
   }
   .fi_img img {
   width: 100%;
   height: 100%;
   border-radius: 50%;
   object-fit: cover;
   object-position: center;
   }
   .trip_div {
   width: 20%;
   padding: 20px;
   }
   .plan-btn{
   background: #006994;
   color: #ffffff;
   padding: 8px 12px;
   width: 175px;
   }
   .plan-btn:hover{
   color: white;
   }
</style>
<div class="row align-items-center">
   <div class="col-lg-6">
      <div class="breadcrumb-content">
         <div class="section-heading">
            <h2 class="sec__title font-size-30 text-white p-font">My Plan</h2>
         </div>
      </div>
      <!-- end breadcrumb-content -->
   </div>
   <!-- end col-lg-6 -->
   <div class="col-lg-6">
      <div class="breadcrumb-list text-right">
         <ul class="list-items">
            <li><a href="index.html" class="text-white">Home</a></li>
            <li>Profile</li>
         </ul>
      </div>
      <!-- end breadcrumb-list -->
   </div>
   <!-- end col-lg-6 -->
</div>
<!-- end row -->
</div>
</div><!-- end dashboard-bread -->
<div class="dashboard-main-content mt-5">
    <div class="container">
        <div class="tile mt-5" id="tile-1">
           <div class="swiper-container " id="dd1">
              <div class="swiper-wrapper">
                 @for($i=0;$i<count($accomodation_data);$i++)
                 <div class="swiper-slide">
                    <div class="day_section p-3 card date">
                       <h3><i class="fa-solid fa-cloud-sun mr-3"></i> Day {{$i+1}} 
                          </date>
                       </h3>
                       <p><i class="fa-solid fa-calendar mr-3"></i><span style="margin-left: 10px;font-weight: 600" class="p-font select-date">{{$accomodation[$i]['date']}}</span> </p>
                    </div>
                    @for($a=0;$a<count($accomodation_data);$a++)
                    @if($accomodation[$a]['date']==$accomodation[$i]['date'])
                    <div class="day_card accomodation" date="{{$accomodation[$i]['date']}}" data="{{$accomodation_data[$i]['id']}}">
                       <div class="img_day">
                          <img src="{{url('')}}/accomodation-image/images/{{$accomodation_data[$i]['image']}}">
                       </div>
                       <div class="content_fi">
                          <span class="acm">{{$accomodation_data[$i]['type']}}</span>
                          <p>{{$accomodation_data[$i]['name']}}</p>
                          <p class="d-flex align-items justify-bw">
                             <span>{{session('currency_sign')}}{{(int)(session('change_price')*$accomodation_data[$i]['price'])}}</span>
                             <a href="{{$accomodation_data[$i]['link']}}" class="btn btn-default" id="btPad">Book</a>
                          </p>
                       </div>
                    </div>
                    @endif
                    @endfor        
                    @for($j=0;$j<count($tour_data);$j++)
                    @if($accomodation[$i]['date']==$tour[$j]['date'])
                    <div class="day_card tour" date="{{$accomodation[$i]['date']}}" data="{{$tour_data[$j]['id']}}">
                       <div class="img_day">
                          <img src="{{url('')}}/tour-and-activit-image/images/{{$tour_data[$j]['image']}}">
                       </div>
                       <div class="content_fi">
                          <span class="tr_act">{{$tour_data[$j]['type']}}</span>
                          <p>{{$tour_data[$j]['name']}}</p>
                          <p class="d-flex align-items justify-bw">
                             <span>{{session('currency_sign')}}{{(int)(session('change_price')*$tour_data[$j]['price'])}}</span>
                             <a href="{{$tour_data[$j]['link']}}" class="btn btn-default" id="btPad">Book</a>
                          </p>
                       </div>
                    </div>
                    @endif
                    @endfor
                    @for($k=0;$k<count($fooddrink_data);$k++)
                    @if($accomodation[$i]['date']==$fooddrink[$k]['date'])
                    <div class="day_card fooddrink" date="{{$accomodation[$i]['date']}}" data="{{$fooddrink_data[$k]['id']}}">
                       <div class="img_day">
                          <img src="{{url('')}}/food-drink-image/images/{{$fooddrink_data[$k]['image']}}">
                       </div>
                       <div class="content_fi">
                          <span class="tr_act">{{$fooddrink_data[$k]['type']}}</span>
                          <p>${{$fooddrink_data[$k]['name']}}</p>
                          <p class="d-flex align-items justify-bw">
                             <span>{{session('currency_sign')}}{{(int)(session('change_price')*$fooddrink_data[$k]['price'])}}</span>
                             <a href="{{$fooddrink_data[$k]['link']}}" class="btn btn-default" id="btPad">Book</a>
                          </p>
                       </div>
                    </div>
                    @endif
                    @endfor
                    @for($l=0;$l<count($transportation_data);$l++)
                    @if($accomodation[$i]['date']==$transportation[$l]['date'])
                    <div class="day_card transportation"  date="{{$accomodation[$i]['date']}}" data="{{$transportation_data[$l]['id']}}">
                       <div class="img_day">
                          <img src="{{url('')}}/transportation-image/images/{{$transportation_data[$l]['image']}}">
                       </div>
                       <div class="content_fi">
                          <span class="tr_act">{{$transportation_data[$l]['type']}}</span>
                          <p>${{$transportation_data[$l]['name']}}</p>
                          <p class="d-flex align-items justify-bw">
                             <span>{{session('currency_sign')}}{{(int)(session('change_price')*$transportation_data[$l]['price'])}}</span>
                             <a href="{{$transportation_data[$l]['link']}}" class="btn btn-default" id="btPad">Book</a>
                          </p>
                       </div>
                    </div>
                    @endif
                    @endfor
                 </div>
                 @endfor
              </div>
              <!-- If we need navigation buttons -->
              <div class="swiper-button-prev">
                 <i class="fas fa-sort-up"></i>
              </div>
              <div class="swiper-button-next">
                 <i class="fas fa-sort-up"></i>
              </div>
           </div>
        </div>
    </div>
</div>
<link href="{{url('')}}/front-assets/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>                   
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.1/js/swiper.min.js"></script>
<script>
$(document).ready(function() {
// Swiper: Slider
new Swiper('#dd1', {
loop: false,
nextButton: '.swiper-button-next',
prevButton: '.swiper-button-prev',
slidesPerView: 3,
paginationClickable: true,
spaceBetween: 0,
breakpoints: {
1920: {
slidesPerView:3,
spaceBetween:0
},
1028: {
slidesPerView: 3,
spaceBetween: 0
},
480: {
slidesPerView: 1,
spaceBetween: 0
}
}
});
});  
</script>                       
@endsection