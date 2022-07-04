@extends("front.layout.header")

@section("title","Home")

@section("css")
<style type="text/css">
  .planT{
    background-color: #006994 !important;
  }
  .social-media-container-fluid.vertical{display:block;}
  .carousel-indicators{
    margin-bottom: 40px !important;
  }
  .carousel-indicators li{
    width: 16px !important;
    height: 16px !important;
    border-radius: 3px !important;
    box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1) !important;
    transition: 0.8s !Important;
  }
  .carousel-indicators li.active:nth-child(even){
    background-color: orange !important;   
  }
  .carousel-indicators li.active:nth-child(odd){
    background-color: hsl(197deg 100% 29%) !important;
  }
  @media (max-width: 720px){
    #hero {
        min-height: 500px;
        padding: 16px 0px;
    }
    #saveTrip{width:100%;margin: 0px!important;font-size: 20px;}
  }
</style>
@endsection

@section("content")

 <!-- ======= Hero Section ======= -->

  <section id="hero">

    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">



      <ol class="carousel-indicators" id="hero-carousel-indicators">

        



      </ol>



      <div class="carousel-inner" role="listbox">

      @foreach($banner as $key => $list)
        <!-- Slide 1 -->

        <div class="carousel-item {{$key == 0 ? 'active' : '' }}" style="background-image: url(admin-assets/images/banner/{{$list->banner_name}});background-position: center;background-size: cover;background-origin: content-box;"></div>
       @endforeach

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
          <a href="javascript:void(0);" class="btn-get-started animated fadeInUp scrollto" id="planT">Plan Your Trip to Morocco</a>
           <a href="/stay" class="btn-get-started animated fadeInUp scrollto fndd planT" id="planB">Discover Morocco</a>
          <div id="textPlan">
            <div class="d-flex justify-content aligns-center">
              <div class="bnLeft">
                <h2 class="txtWhite">Get the most out of your next trip to Morocco!</h2>
                <p>Create a fully customized day by day plan for free.</p>
                <!-- <div class="btnSection">
                  <a href="javascript:void(0);" class="btn-get-started animated fadeInUp scrollto" id="planT">Plan Your Travel</a>
                  <a href="trending.php" class="btn-get-started animated fadeInUp scrollto fndd" id="planB">Find Tours &amp; Activity</a>
                </div> -->
              </div>
              <div class="bnRight">
                <div class="trip-form">
                  <form class="traverller-form" method="post">
                    @csrf
                    <h2 class="text-center">Itinerary planner</h2>
                    <div class="d-flex mt-5">
                <div id="reportrange" class="pull-left posRe">
                                <i class="fas fa-calendar-alt"></i>&nbsp;
                                <span class="travel-date"></span> <b class="caret"></b>
                                <input type="text" class="form-control abs g" placeholder="Arrival Date 🠒 Departure Date" id="reportrange">
                                <i class="fas fa-calendar-alt g sh" id="reportrange"></i>
                            </div>
              </div>

                <div class="travL mt-3">
                  <p class="txtL"><span>0</span> Travelers</p>
                  <div class="travlNo">
                      <div>
                        <span class="tb">Adult</span>
                        <span class="bt">
                          <div class="value-button" id="decrease" onclick="decreaseValue()" value="Decrease Value">-</div>
                            <input type="number" id="number" value="0" class="adult" minlength="1" maxlength="100" readonly />
                          <div class="value-button" id="increase" onclick="increaseValue()" value="Increase Value">+</div>
                        </span>
                      </div>
                      <div>
                        <span class="tb">Teens</span>
                        <span class="bt">
                          <div class="value-button" id="decrease1" onclick="decreaseValue1()" value="Decrease Value">-</div>
                            <input type="number" id="number1" value="0" class="teen" minlength="1" maxlength="100" readonly/>
                          <div class="value-button" id="increase1" onclick="increaseValue1()" value="Increase Value">+</div>
                        </span>
                      </div>
                      <div>
                        <span class="tb">Kids</span>
                        <span class="bt">
                          <div class="value-button" id="decrease2" onclick="decreaseValue2()" value="Decrease Value">-</div>
                            <input type="number" id="number2" value="0" class="kid" minlength="1" maxlength="100" readonly/>
                          <div class="value-button" id="increase2" onclick="increaseValue2()" value="Increase Value">+</div>
                        </span>
                      </div>
                    <a href="javascript:void(0);" class="addPass">Save</a>
                  </div>
                </div>
                    <button  class="btn btn-success next-trip-btn w-100" id="saveTrip" type="submit">Next</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>



    </div>

  </section><!-- End Hero -->







  <!-- video section -->


<div class="mosc">
  <div class="container-fluid">

    <div class="section-title text-center">
        <br>

        <h2 style="color: hsl(197deg 100% 29%);">How Triplooky Works?</h2>
        


    </div>

      <div class="bnb">

    <iframe src="https://www.youtube.com/embed/{{$how_to_video->video_link}}" width="100%" class="vidIframe"></iframe>

</div>

  </div>
</div>



  <main id="main">            


    <div class="container-fluid">
     
      <div class="icon-section">
               
<br>




          <div class="section-title text-center">

            <h2 style="color: hsl(197deg 100% 29%);">Why use Triplooky?</h2>


          </div>

          <div class="icons-bar text-center form-group">
            <div class="container-fluid">
              <div class="row">
                <div class="col-sm-12 d-flex justify-content-center align-items-center">
                  <img src="{{url('')}}/front-assets/assets/img/grChart.svg" />
                </div>
              </div>

            </div>

              <!---<div class="row">

                  @foreach($triplooky as $data)
                  <div class="col-lg-3 col-md-3 col-sm-6">

                    <div class="thumb-1-wrap align-c">

                      <span class="bbs" style="background-image:url({{url('')}}/why_triplooy/{{$data->image}});background-size: cover;background-position: center;"></span>

                      <p>

                        <b class="h-label">{{$data->heading}}</b>

                        

                      </p>
                      <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. </p>

                    </div>

                  </div>
                  @endforeach

                  

                  

                  

              </div>
              <----->

          </div>

      </div>

  </div>

<!-- End video section -->



<!--- most popular destination---->
<div class="container mt-3">
  <div class="section-title text-center">

        <h2>Most Popular Destinations</h2>

       </div>
  <!-- <center><h2 class="" style="color: hsl(197deg 100% 29%);">Most Popular Destination</h2></center> -->
  
  <div class="row">
   @foreach($city as $city_list)
    <div class="col-lg-4 mb-2 col-md-6 col-sm-12 " >
      <div class="position-relative">
        <a href="/city/{{$city_list->city_name}}">
          <div class="city-img" style="background-image: url({{url('')}}/city-image/images/{{$city_list->image}});background-position: center;background-size: cover;">
            
          </div>
          <div class="city-content"><p>{{$city_list->city_name}}</p></div>
        </a>
      </div>
    </div>
   @endforeach
  </div>
</div>
<!--end most popular destination ------->

   <!-- image section started -->
   <div id="things_morocco">

   <div class="container">

    <div class="image-section">

       <div class="section-title text-center">

        <h2>Things To Do in Morocco</h2>

       </div>
     

      <div class="row form-group">
        
       
     @foreach($tour_and_activity as $tour)
      <div class="col-lg-4 mb-4 col-md-6 col-sm-12">
              <a href="/tour-and-activity/{{$tour->name}}">
                 <div class="image-part">
                 <div class="image">
                     <img src="{{url('')}}/tour-and-activit-image/images/{{$tour->image}}" width="100">
                     <div class="image-text">
                         <p>{{$tour->name}}</p>
                     </div>
                 </div>
             </div>
              </a>
            </div>
    @endforeach
       </div>


    </div>

</div>











<!-- imnahjhsajhsjh -->

<!-- logo croisel -->

<!-- <section id="clients" class="clients">



    <div class="container-fluid" data-aos="fade-up">

        <div class="section-title">

            <h2>Travelling loking partner</h2>

            <p class="select-hotel"> Select Flight, hotels , homestays and tour form any these top international travel brand in our vacation Planner</p>

        </div>



      <div class="clients-slider swiper mt-4" id="sw">

        <div class="swiper-wrapper align-items-center">

          

           @foreach($partner as $list)
         <div class="swiper-slide"> <img src="{{url('')}}/travel-looking-partner/{{$list->travel_partner_company_logo}}"></div>
         @endforeach
          

         

        

         

         

         
         

        </div>

        <div class="swiper-pagination"></div>

      </div>

    </div>



  </section> -->
  <!-- End Clients Section -->







<!-- Blog listing section start -->

  <input type="hidden" value="0" id="firstV" class="add">

  <input type="hidden" value="0" id="secondV" class="add">

  <input type="hidden" value="0" id="thirdV" class="add">



  </main>

<style>

  .swiper-slide{padding: 16px;}


</style>
<script>
  function ch(){
    document.querySelector('.sh').style.display="block";
    document.querySelector('.g').style.display="block";
    document.querySelector('.travel-date').style.display="none";
  }

  if(sessionStorage.getItem("tour")!=null){
    sessionStorage.removeItem("tour");
  }

  if(sessionStorage.getItem("city_details")!=null){
    sessionStorage.removeItem("city_details");
  }
  if(sessionStorage.getItem("accomodation")!=null){
    sessionStorage.removeItem("accomodation");
  }
  if(sessionStorage.getItem("tour-and-activity")!=null){
    sessionStorage.removeItem("tour-and-activity");
  }
  if(sessionStorage.getItem("fooddrink")!=null){
    sessionStorage.removeItem("fooddrink");
  }
  if(sessionStorage.getItem("transportation")!=null){
    sessionStorage.removeItem("transportation");
  }
  //traveller form submit
  $(".traverller-form").submit(function(e){
    e.preventDefault();

    if(sessionStorage.getItem("tour")!=null){
   
         alert();
    var data=JSON.parse(sessionStorage.getItem("tour"));
    if(1){
      if(confirm("Your All Previous Selected Data Will Be Reset")){
      
       data.city.length=0;

          var date=$(".travel-date").html();
        
          
        
    var alldate=date.split("-");
    if(parseInt($(".teen").val())==0 && parseInt($(".kid").val())==0 && parseInt($(".adult").val())==0){
    swal({
  title: "Kindly Select Traveller",
  
  icon: "warning",

  dangerMode: true,
  button:"Close",
})
    }
    else{

       if(alldate.length>0){
        var travel_data=JSON.stringify({arrival_date:alldate[0],departure_date:alldate[1],teen:$(".teen").val(),adult:$(".adult").val(),kid:$(".kid").val()});

        $.ajax({
          type:"POST",
          url:"/user/travel",
          data:{
            data:travel_data,
            _token:$("body").attr("data"),
          },
          success:function(response){
           
           
              var tour_data={arrival_date:alldate[0],departure_date:alldate[1],teen:$(".teen").val(),adult:$(".adult").val(),kid:$(".kid").val(),city:[],activity:[],accomodation:[],transportation:[],tour:[],accomodation_budget:"",preferable_activity_budget:"",food_drink_budget:"",transportation_budget:""};
    sessionStorage.setItem("tour",JSON.stringify(tour_data));
    window.location.href="/pick-city";
          }
        });
    
      
       }
       else{
        swal({
  title: "Kindly Select Travel Date",
  
  icon: "warning",

  dangerMode: true,
  button:"Close",
})
       }
    }
    
    

      }
      else{

      }
    }
   }
   else{
       var date=$(".travel-date").html();
        
          
        
    var alldate=date.split("-");
    if(parseInt($(".teen").val())==0 && parseInt($(".kid").val())==0 && parseInt($(".adult").val())==0){
    swal({
  title: "Kindly Select Traveller",
  
  icon: "warning",

  dangerMode: true,
  button:"Close",
})
    }
    else{

       if(alldate.length>0){
        var travel_data=JSON.stringify({arrival_date:alldate[0],departure_date:alldate[1],teen:$(".teen").val(),adult:$(".adult").val(),kid:$(".kid").val()});

        $.ajax({
          type:"POST",
          url:"/user/travel",
          data:{
            data:travel_data,
            _token:$("body").attr("data"),
          },
          success:function(response){
           
           
              var tour_data={arrival_date:alldate[0],departure_date:alldate[1],teen:$(".teen").val(),adult:$(".adult").val(),kid:$(".kid").val(),city:[],activity:[],accomodation:[],transportation:[],tour:[],accomodation_budget:"",preferable_activity_budget:"",food_drink_budget:"",transportation_budget:""};
    sessionStorage.setItem("tour",JSON.stringify(tour_data));
    window.location.href="/pick-city";
          }
        });
    
      
       }
       else{
        swal({
  title: "Kindly Select Travel Date",
  
  icon: "warning",

  dangerMode: true,
  button:"Close",
})
       }
    }
   }
   
      

   
  
   

    

  });
  //end traveller form submit
   
   
</script>

<!--modal login and register --->


<!---end coding of modal login or register ---page--->

@endsection
