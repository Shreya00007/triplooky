

@extends("front.layout.header")
@section("title","My Trip Plan")
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
    .swiper-button-next, .swiper-button-prev{top:35px;}
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
    .edit-plan-btn{background: #006994;
    color: #ffffff;
    padding: 8px 12px;
    width: 175px;
  }
  #btPad{
    padding: 2px 14px;
    width: auto;
}
.just-end {
    justify-content: end;
    }
</style>


<main id="main">

  <div id="banner">
      <div class="container-fluid bodyPad">
          <h2 class="text-center">My Trip Plan</h2>
      </div>
  </div>
  <div class="mainBody container-fluid bodyPad">
    <div class="text-center mt-5">
      <a href="/trip_summary" class="btn btn-default edit-plan-btn">Edit</a>
      @if(session()->has('myplan'))
      <button class="btn btn-default plan-btn">Delete</button>
      @else
      <button class="plan-btn btn btn-default plan-btn save-my-plan-btn">Save My Plan</button>
      @endif
    </div>

      <div class="total_budget text-right top72" style="width:100%;">
                  <div class="d-flex align-center just-end">
                     <div style="margin-right:16px;">
                        <p class="tbudget">Total Budget<br> per Person</p>
                        <p><b><span class="total-price">{{session('currency_sign')}}{{(int)(session('change_price')*$total_price)}}</span></b></p>
                     </div>
                     <p style="font-size:30px;margin:0;"><i class="fas fa-coins"></i><span class="total_budget_price"></span></p>
                  </div>
               </div>
    <!-- Tabs Start to day trip -->
    <div class="tile mt-5" id="tile-1">
      <div class="swiper-container " id="dd1">
        <div class="swiper-wrapper">
         
        @for($i=0;$i<count($accomodation_data);$i++)
        
        
           <div class="swiper-slide">
            <div class="day_section p-3 card date">
              <h3><i class="fa-solid fa-cloud-sun mr-3"></i> Day {{$i+1}} 
              

              </date></h3>
              <p><i class="fa-solid fa-calendar mr-3"></i><span style="margin-left: 10px;font-weight: 600" class="p-font select-date">{{$accomodation[$i]['date']}}</span> </p>
            </div>
               @for($a=0;$a<count($accomodation_data);$a++)
               @if($accomodation[$a]['date']==$accomodation[$i]['date'])
                <div class="day_card accomodation" date="{{$accomodation[$i]['date']}}" data="{{$accomodation_data[$i]['id']}}">
              <div class="img_day">
                <img src="{{url('')}}/accomodation-image/images/{{$accomodation_data[$i]['image']}}">
              </div>
              <div class="content_fi">
                <p class="d-flex align-items justify-bw">
                  <span class="acm">{{$accomodation_data[$i]['type']}}</span>
                  <span>{{session('currency_sign')}}{{(int)(session('change_price')*$accomodation_data[$i]['price'])}}</span>
                </p>
                <p class="d-flex align-items justify-bw">
                  <span>{{$accomodation_data[$i]['name']}}</span>
                  <a href="{{$accomodation_data[$i]['link']}}" class="btn btn-default" id="btPad" target="_blank">Book</a>
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
                <p class="d-flex align-items justify-bw">
                  <span class="tr_act">{{$tour_data[$j]['type']}}</span>
                  <span>{{session('currency_sign')}}{{(int)(session('change_price')*$tour_data[$j]['price'])}}</span>
                </p>         
                <p class="d-flex align-items justify-bw">
                  <span>{{$tour_data[$j]['name']}}</span>
                  <a href="{{$tour_data[$j]['link']}}" class="btn btn-default" id="btPad" target="_blank">Book</a>
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
                <p class="d-flex align-items justify-bw">
                  <span class="tr_act">{{$fooddrink_data[$k]['type']}}</span>
                  <span>{{session('currency_sign')}}{{(int)(session('change_price')*$fooddrink_data[$k]['price'])}}</span>
                </p>              
                <p class="d-flex align-items justify-bw">
                  <span>${{$fooddrink_data[$k]['name']}}</span>  
                  <a href="{{$fooddrink_data[$k]['link']}}" class="btn btn-default" id="btPad" target="_blank">Book</a>
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
                <p class="d-flex align-items justify-bw">
                  <span class="tr_act">{{$transportation_data[$l]['type']}}</span>
                  <span>{{session('currency_sign')}}{{(int)(session('change_price')*$transportation_data[$l]['price'])}}</span>
                </p>          
                <p class="d-flex align-items justify-bw">
                  <span>${{$transportation_data[$l]['name']}}</span>
                  <a href="{{$transportation_data[$l]['link']}}" class="btn btn-default" id="btPad" target="_blank">Book</a>
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
    <!-- Close -->
  </div>
</main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.1/js/swiper.min.js"></script>
<script>
  $(document).ready(function() {
   
    // Swiper: Slider
        new Swiper('.swiper-container', {
            loop: false,
            nextButton: '.swiper-button-next',
            prevButton: '.swiper-button-prev',
            slidesPerView: 4,
            paginationClickable: true,
            spaceBetween: 0,
            breakpoints: {
                1920: {
                    slidesPerView:4,
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

  // // tabs js
//   $("#tile-1 .nav-tabs a").click(function() {
//     var position = $(this).parent().position();
//     var width = $(this).parent().width();
//       $("#tile-1 .slider").css({"left":+ position.left,"width":width});
//   });
//   var actWidth = $("#tile-1 .nav-tabs").find(".active").parent("li").width();
//   var actPosition = $("#tile-1 .nav-tabs .active").position();
//   $("#tile-1 .slider").css({"left":+ actPosition.left,"width": actWidth});

// $(".save-my-plan-btn").click(function(){
//   $(this).attr("href","/save-my-plan");
// });

//-------------- USER SAVE PLAN --------------------//
$(".save-my-plan-btn").click(function(){
  var accomodation=[];
  
  var tour=[];
  var tour_date=[];
  var fooddrink=[];
  var fooddrink_date=[];
  var transportation=[];
  var transportation_date=[];
 

   $(".select-date").each(function(index,data1){
      $(".accomodation").each(function(index,data2){
        if($(data1).text()==$(data2).attr("date")){
          var obj={"date":$(data1).text(),"accomodation":$(data2).attr("data")};
          accomodation.push(obj);
        }
      });

       $(".tour").each(function(index,data3){
        if($(data1).text()==$(data3).attr("date")){
          var obj={"date":$(data1).text(),"tour":$(data3).attr("data")};
          tour.push(obj);
        }
      });

        $(".fooddrink").each(function(index,data4){
        if($(data1).text()==$(data4).attr("date")){
          var obj={"date":$(data1).text(),"tour":$(data4).attr("data")};
          fooddrink.push(obj);
        }
      });
        $(".fooddrink").each(function(index,data4){
        if($(data1).text()==$(data4).attr("date")){
          var obj={"date":$(data1).text(),"tour":$(data4).attr("data")};
          fooddrink.push(obj);
        }
      });
        $(".transportation").each(function(index,data5){
        if($(data1).text()==$(data5).attr("date")){
          var obj={"date":$(data1).text(),"tour":$(data5).attr("data")};
          transportation.push(obj);
        }
      });
   });
 var city=[];
 var data=JSON.parse(sessionStorage.getItem("city_details"));
 $(data).each(function(index,data){
  var city_data=atob(data.data);
  var day=atob(data.day);
  var obj={"city":city_data,"day":day};
  city.push(obj);
 });
   console.log(accomodation);
   console.log(tour);
   console.log(fooddrink);
   console.log(transportation);
   console.log(city);


   var currency=$(".default-currency").text();
   var start_date=$(".select-date")[0].innerHTML.trim();
   var len=$(".select-date").length;
   var end_date=$(".select-date")[len-1].innerHTML.trim();
     if("{{session()->get('user_login')}}"!=""){
      $.ajax({
      type:"POST",
      url:"/save-my-plan-data",
      data:{
        accomodation:accomodation,
        tour:tour,
        fooddrink:fooddrink,
        transportation:transportation,
        currency:currency,
        start_date:start_date,
        end_date:end_date,
        city:city,
        _token:$("body").attr("data"),
      },

      beforeSend:function(){
        $(".loader1").removeClass("d-none");
      },
      success:function(response){
        $(".loader1").addClass("d-none");
        if(response.message=="success"){
           swal({
                 title: "Your Plan Have Save Successfully",
                
                
                  dangerMode: false,
                  icon:"success"
                 

                   


});

           setTimeout(()=>{
            window.location.href="/";
           },2000);
      
           }
           else{
             swal({
                 title: response.message,
                
                
                  dangerMode: true,
                  icon:"error"
                 

                   


});

           }
      }
     });
     }
     else{
      $(".login-modal-link").click();
     }
});


//--------------- END USER SAVE PLAN ----------------//
</script>

@endsection
