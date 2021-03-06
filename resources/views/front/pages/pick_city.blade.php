@extends("front.layout.header")
@section("title","Pick city")

@section("content")
<style>
    span {cursor:pointer; }
    .minus-day, .add-day{
      width: 40px;
      height: 33px;
      background: #f2f2f2;
      border-radius: 4px;
      padding: 0px 5px 0px 5px;
      border: 1px solid #ddd;
      display: inline-block;
      line-height: 1.3;
      vertical-align: middle;
      text-align: center;
      font-size: 26px;
    }
    .pm{
      height:34px;
      width: 100px;
      text-align: center;
      font-size: 26px;
      border:1px solid #ddd;
      border-radius:4px;
      display: inline-block;
      vertical-align: middle;
}
h6.ab-ss {
    color: #416AA8;
}
#sss .modal-title {
    color: #416AA8;
    font-size: 25px;
}
#sss {
    display: block;
    /* font-size: 20px; */
    text-align: center;
    /* color: red; */
}
.f12 {
    font-size: 12px!important;
}
.badal{
	background-image: url('front-assets/assets/img/badal.png');
	background-size: contain;
	background-position:right;
	background-repeat: no-repeat;
	margin-right: 130px;
	height: 110px;
}
.button-group-pills .btn{height:300px;}
</style>
<style>
  #hero{min-height:250px;}
  .morecontent span {
    display: none;
  }
  .morelink {
      display: block;
      float:right;
      text-decoration:underline!important;
  }
  .more {
    display: block;
    display: -webkit-box;
    max-width: 100%;
    height: auto;
    margin: 0 auto;
    -webkit-line-clamp: inherit;
    -webkit-box-orient: vertical;
    overflow: initial;
    text-overflow: initial;
}
#pt-30{padding-top:30px;}
</style>
<main id="main">
   <div id="banner">
      <div class="container-fluid bodyPad">
         <h2 class="text-center">Cities to visit</h2>
      </div>
   </div>

   <section class="form-section" id="pdt-30">
     <div class="container-fluid bodyPad">
       <div class="proBar">
        <p class="prSection active">
          <span style="display:block;text-align:center;">Cities to visit</span>
          <span class="brCheck">
            <i class="fas fa-check"></i>
          </span>
        </p>
        <p class="prSection">
          <span style="display:block;text-align:center;">Trip Calendar</span>
          <span class="brCheck">2</span>
        </p>        
        <p class="prSection">
          <span style="display:block;text-align:center;">Accomodation Type</span>
          <span class="brCheck">3</span>
        </p>
        <p class="prSection">
          <span style="display:block;text-align:center;">Tours & Activities</span>
          <span class="brCheck">4</span>
        </p>
        <p class="prSection">
          <span style="display:block;text-align:center;">Food & Drink</span>
          <span class="brCheck">5</span>
        </p>
        <p class="prSection">
          <span style="display:block;text-align:center;">Transportation</span>
          <span class="brCheck">6</span>
        </p>
        <!-- <p class="prSection">
          <span style="display:block;text-align:center;">Trip Summary</span>
          <span class="brCheck">7</span>
        </p> -->
      </div>
      <br>
       @php
        if(session()->has('all_city_details')){
         $city_data=[];
       
    
       foreach(session('all_city_details') as $key=>$city_details){

     $city_data[$key]=$city_details;
     

    
    }

    
     for($i=0;$i<count($city_data);$i++){
       $city_id[$i]= (($city_data[$i]['data']));
       $id=(($city_data[$i]['data']));
       $city_day[$id]=(($city_data[$i]['day']));
 }
      }

       @endphp
       
       
      
       <form id="pick-up-city-form">
         <div class="row">
            @for($i=0;$i<count($data);$i++)
             @if(session()->has('all_city_details'))
             @if(in_array($data[$i]['id'],array_values(session('city'))))
               <div class="col-md-4 col-xs-12 " >
             <div class="form-group wow fadeInLeft" data-wow-duration="2s" data-wow-delay="0.5s">
              
               <div class="button-group-pills text-center" data-toggle="buttons">
                <div class="citiesS">
                  <a href="javascript:void(0);" class="info-cities city-info-link" data="{{$data[$i]['id']}}" city="{{$data[$i]['city_name']}}"><i class="fa-solid fa-circle-info" ></i> Details</a>
                  <label class="btn btn-default pick-city-box active prev-selected selected-label" data="{{$data[$i]['id']}}">
                    <span class="checkCircle"></span>
                    <input type="checkbox" class="chbox" name="options">     
                    <img src="{{url('')}}/city-image/images/{{$data[$i]['image']}}" class="citiesImg">     
                    <div class="text-center citiesName">{{$data[$i]['city_name']}}</div>          
                  </label>
                  <div class="number" style="display: block !important;">
                    <span class="minus-day">-</span>
                    <input class="pm days" type="text" data="{{$data[$i]['id']}}" name="day[]" value="{{$city_day[$data[$i]['id']]}}" readonly >
                    <span class="oneN" >Night</span>
                    <span class="twoN" >Nights</span>


                
                    <span class="add-day">+</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
             @else
              <div class="col-md-4 col-xs-12 ">
             <div class="form-group wow fadeInLeft" data-wow-duration="2s" data-wow-delay="0.5s">
              
               <div class="button-group-pills text-center" data-toggle="buttons">
                <div class="citiesS">
                  <a href="javascript:void(0);" class="info-cities city-info-link" data="{{$data[$i]['id']}}" city="{{$data[$i]['city_name']}}"><i class="fa-solid fa-circle-info"></i> Details</a>
                  <label class="btn btn-default pick-city-box active prev-selected " data="{{$data[$i]['id']}}">
                    <span class="checkCircle"></span>
                    <input type="checkbox" class="chbox" name="options">     
                    <img src="{{url('')}}/city-image/images/{{$data[$i]['image']}}" class="citiesImg">     
                    <div class="text-center citiesName">{{$data[$i]['city_name']}}</div>          
                  </label>
                   <div class="number" style="display: none !important;">
                    <span class="minus-day">-</span>
                   @if(in_array($data[$i]['id'],$city_id))
                    <input class="pm days" type="text" data="{{$data[$i]['id']}}" name="day[]" value="{{$city_day[$data[$i]['id']]}}" readonly>
                   @else
                    <input class="pm days" type="text" data="{{$data[$i]['id']}}" name="day[]" value="0" readonly>
                   @endif
                    <span class="oneN" >Night</span>
                    <span class="twoN" style="display: none;">Nights</span>


                
                    <span class="add-day">+</span>
                  </div>
                </div>
              </div>
            </div>

            
          </div>
             @endif
           
             @else
              <div class="col-md-4 col-xs-12 " >
             <div class="form-group wow fadeInLeft" data-wow-duration="2s" data-wow-delay="0.5s">
              
               <div class="button-group-pills text-center" data-toggle="buttons">
                <div class="citiesS">
                  <a href="javascript:void(0);" class="info-cities city-info-link" data="{{$data[$i]['id']}}" city="{{$data[$i]['city_name']}}"><i class="fa-solid fa-circle-info" ></i> Details</a>
                  <label class="btn btn-default pick-city-box active prev-selected" data="{{$data[$i]['id']}}">
                    <span class="checkCircle"></span>
                    <input type="checkbox" class="chbox" name="options">     
                    <img src="{{url('')}}/city-image/images/{{$data[$i]['image']}}" class="citiesImg">     
                    <div class="text-center citiesName">{{$data[$i]['city_name']}}</div>          
                  </label>
                  <div class="number">
                    <span class="minus-day">-</span>
                    <input class="pm days" type="text" data="{{$data[$i]['id']}}" name="day[]" value="0" readonly>
                    <span class="oneN">Night</span>
                    <span class="twoN" style="display: none;">Nights</span>


                
                    <span class="add-day">+</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
             @endif
          
       
         @endfor
         
         
          
        
         
          
          
         
         
         </div>
        
        <div class="text-right sticy_pos">
        <a href="/" class="btn btn-default" type="button">Previous</a>
        
       
         <button class="btn btn-default" type="submit">Next</button>
       </div>
       </form>
       
     </div>
   </section>
   <!-- Modal -->
  <div class="modal fade" id="cityDetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header" id="sss">
          <h5 class="modal-title" id="city-name"></h5>
         <!--  <button type="button" class="close cut-city-modal"  aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button> -->
        </div>
        <div class="modal-body">
          <div class="d-flex justify-bw align-center">
            <div class="w-50">
               <section id="hero">
                 <div id="heroCarousel1" data-bs-interval="1000" class="carousel slide carousel-fade" data-bs-ride="carousel">

                    <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

                    <div class="carousel-inner city-carousel-inner" role="listbox">

                      <!-- Slide 1 -->  



                      
                      

                 

                   

                    </div>

                    
                   <a class="carousel-control-prev" href="javascript:void(0)" role="button" data-bs-slide="prev">
			        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
			      </a>
			      <a class="carousel-control-next" href="javascript:void(0)" role="button" data-bs-slide="next">
			        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
			      </a>
                   
                </div>
                </section>
            </div>
            <div class="w-50">
              <div style="padding-left:16px;">
                <!-- ======= Hero Section ======= -->
                 <div class="d-flex justify-bw align-center">
              <div class="infoArea text-center">
                <h4 class="mb-0">Population</h4>
                  <img src="{{url('')}}/front-assets/assets/img/population.png" class="iconAr" />
                  <p class="population">9,28,850</p>
                </div>
                <div class="infoArea text-center">
                  <h4 class="mb-0">Surface</h4>
                  <img src="{{url('')}}/front-assets/assets/img/compass.png" class="iconAr" />
                  <p class="area"></p>
                </div>
                <div class="infoArea text-center">
                  <h4 class="mb-0">Recommended Days</h4>
                  <img src="{{url('')}}/front-assets/assets/img/caln.png" class="iconAr" />
                  <p class="recommend_day"></p>
                </div>
              </div>

                <div class="current-weather mb-3">
                  <div class="right badal">
                    <i id="wicon-main" class="wi wi-main"></i>
<!--                     <canvas class="icon" style="margin:0;"></canvas> -->
                    <h2 class="f12">Today, <span class="day"></span></h2>
                    <h3 class="temperature f12">Temperature: <span class="temp-data"></span></h3>
                    <h3 class="f12">Wind speed: <span id="wind-data"></span></h3>
                    <h3 class="f12">Humidity: <span id="humidity-data"></span></h3>
                  </div>
                </div>
               <!-- End Hero -->               
              </div>
            </div>
          </div>
          <div class="mt-5">
          	<h6 class="ab-ss">About City</h6>
              <p class="more" style="text-align: justify;padding-right:16px;"> </p>
          </div>
          
        
          <div class="d-flex justify-bw align-center mt-5">
            <div class="w-50 pr-3 weather-img-box">
             <img src="{{url('')}}/front-assets/assets/img/ss_1.png">
            </div>
            <div class="w-50 pl-3 busy-month-image">
              <img src="{{url('')}}/front-assets/assets/img/ss_2.png">
              
            </div>
          </div>
          <h4 class="mb-0">Good For</h4>
          <div id="good-for-box"></div>
          
          <!-- <div class="d-flex align-center">
            <p style="margin-bottom:6px;"><b>Daily Trip</b></p> <p class="ml-3" style="margin-bottom:6px;">Marrakech</p>
          </div>
          <div class="d-flex align-center">
            <p style="margin-bottom:6px;"><b>Sight Seeing</b></p> <p class="ml-3" style="margin-bottom:6px;">Marrakech</p>
          </div>
          <div class="d-flex align-center">
            <p style="margin-bottom:6px;"><b>Culture Explore</b></p> <p class="ml-3" style="margin-bottom:6px;">Marrakech</p>
          </div> -->
          <div class="map mt-2"></div>
        </div>

        <!-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div> -->
      </div>
    </div>
  </div>
</main>
<script>
  
     
$.get("https://api.ipdata.co", function (response) {
    console.log(response.currency.symbol);
}, "jsonp");
</script>

<script>
    $(document).ready(function() {
       check_no_day_greater_than_zero();

      if(sessionStorage.getItem("tour")==null){
        window.location.href="/";
      }

       //validation
var data=JSON.parse(sessionStorage.getItem("tour"));



var dateString1 = data.arrival_date; // Oct 23

var dateParts1 = dateString1.split("/");

// month is 0-based, that's why we need dataParts[1] - 1
var date1 = new Date(+dateParts1[2], dateParts1[1] - 1, +dateParts1[0]);

var dateString2 = data.departure_date; // Oct 23

var dateParts2 = dateString2.split("/");

// month is 0-based, that's why we need dataParts[1] - 1
var date2 = new Date(+dateParts2[2], dateParts2[1] - 1, +dateParts2[0]); 
var totaldate=date2.getTime()-date1.getTime();
var difference_day=totaldate/(1000*3600*24);

difference_day=difference_day;
      var select_city_name=[];
      var select_city_day=[];


      $('.minus-day').click(function () {
       
        var $input = $(this).parent().find('input');
       
        var count = parseInt($input.val()) - 1;
        count = count < 1 ? 1 : count;
        $input.val(count);
        $input.change();
        return false;
      });
   
     $(".add-day").each(function(i){
  
       $(this).click(function () {
        var total_day=1;
        var input=$(this).parent().find("input");
        
     
        
        
        
      
      var all_select_city=$("label.active");
      
       $(all_select_city).each(function(i){
         if($(this).hasClass("active")){
           var input=$(this).parent().find("input.days").val();
          total_day+=Number(input);
         }
       });

     
     
       
        if(total_day>difference_day){
            swal({
                 title: "Total Trip is "+difference_day+" Nights",
                 text: "Can`t be select More than "+difference_day+" Nights",
                 icon: "error",
                  dangerMode: true,
                   button: {
                   text: "Close",
                },


});

           
            
        }
        else{
         
           $(input.val(parseInt($(input).val())+1));
            input.change();
          
        }
      });
     });
    });
</script>
<script>
 
  $(".chbox").click(function() {
    if($(this).is(":checked")) {
        $(this).parent().parent().find(".number").show();
    } else {
      $(this).parent().parent().find(".number").hide();
    }
});

  
</script>

<style type="text/css">
.number span {
    cursor: pointer;
}
.minus-day,.plus-day{
  width: 40px;
    height: 33px;
    background: #f2f2f2;
    border-radius: 4px;
    padding: 0px 5px 0px 5px;
    border: 1px solid #ddd;
    display: inline-block;
    line-height: 1.3;
    vertical-align: middle;
    text-align: center;
    font-size: 26px;
}

  button.btn.btn-default {
    background: #006994;
    color: #ffffff;
    padding: 8px 32px;
}
span.oneN, span.twoN {
    position: absolute;
    right: 116px;
    top: 11px;
}
.pm {
    height: 34px;
    width: 73%;
    text-align: center;
    font-size: 26px;
    border: 1px solid #ddd;
    border-radius: 4px;
    display: inline-block;
    vertical-align: middle;
}
div.number {
    display: none;
    position: relative;
}
</style>

<script type="text/javascript">
  $.get('https://ipapi.co/currency/', function(data){
  console.log(data)
})
  // ajax call for get city details show details in city modal
  $(".city-info-link").each(function(){
    $(this).click(function(){
      var city=$(this).attr("city");
      
         $.get("https://api.weatherapi.com/v1/current.json?key=0f581ceadda4425782852811222505&q="+city+"&aqi=no",function(data,status,xhar){
          $(".temp-data").html(data.current.temp_c+" ??C");
          $("#wind-data").html(data.current.wind_kph+"km/h");
          $("#humidity-data").html(data.current.humidity+"%");
          console.log(data);
         });
      
      var city_id=$(this).attr("data");
      $.ajax({
        type:"GET",
        url:"/pick-city/city-details?city="+city_id,
        success:function(response){
          var good_for=JSON.parse(response.data.good_for);
         
         
          
         var slider_image=`<div class="carousel-item active">
         <img src="{{url('')}}/city-image/images/`+response.data.image+`">/div>
`;
          $(".city-name").html(response.data.city_name);
            $("#city-name").html(response.data.city_name);
          $(".population").html(response.data.population);
          $(".area").html(response.data.area+"KM <sup>2</sup>");
          $(".recommend_day").html(response.data.recommend_day);
          $(".more").html(response.data.description);
          $("#good-for-box").html("");
          $(".map").html(response.data.map_location);
           $(good_for).each(function(index,data){
            $("#good-for-box").append('<a href="/good-for/'+response.data.city_name+'/'+data+'" class="tagsbtn" target="_blank">'+data+'</a>');

          });

           //weather image and busy month
           $(".weather-img-box img").attr("src","{{url('')}}/city-image/weather/"+response.data.weather_image);
           $(".busy-month-image img").attr("src","{{url('')}}/city-image/busy-month/"+response.data.busy_month_image);

        

          //image list carousel show
       
          $(response.image).each(function(index,data1){
            slider_image+=`<div class="carousel-item">
            <img src="{{url('')}}/city-image/images/`+data1.image+`">
            </div>`;


          });

          $(".carousel-inner").html(slider_image);
           $("#heroCarousel1").carousel();
          $(".carousel-control-next").click(()=>{
            $("#heroCarousel1").carousel("next");
           

            
          });
           $(".carousel-control-prev").click(()=>{
            $("#heroCarousel1").carousel("prev");
           
           
          });
          //end image list carousel show
          $("#cityDetails").modal("show");
            $(document).trigger('ready');
        }
      });


    });
  });



//check number of days is g

  //cut city modal
  $(".cut-city-modal").click(function(){
    $("#cityDetails").modal("hide");
  });




  function check_no_day_greater_than_zero(){
    $(".number").each(function(){

      if(this.style.display==="block"){

        var input=$(this).find("input").val();
       
      if(input>1){
        $(this).find("span.oneN").addClass("d-none");
       
      
      }
      else{
       
         
          $(this).find("span.twoN").addClass("d-none");
      }
      }
    });
  }


  //preselected city on click remove active
  $(".pick-city-box").each(function(){
    $(this).click(function(){
      if($(this).hasClass("prevSelected")){
        swal({
          title: "Are you sure to remove this city",
          
           icon: "warning",
           buttons: true,
          dangerMode: true,
         })
          .then((willDelete) => {
           if (willDelete) {
            swal("Select city removed", {
           icon: "success",
         });

            $(this).removeClass("prevSelected");
            $(this).removeClass("active")
            $(this).parent().find("div.number").css({
              display:"none",
            });

           alert($(this).parent().find("div.number input.days").val());
           $(this).parent().find("div.number input.days").val("0");
           alert($(this).parent().find("div.number input.days").val("0"));


      
  } else {
    swal("Your Selected City Be Safe");
  }
});
      }
    });
  });
  //end preselected city on click remove active
</script>



<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script>
  // Weather Chart
    Highcharts.chart('container', {
    chart: {
      zoomType: 'xy'
    },
    title: {
      text: 'Weather Conditions',
      align: 'center'
    },
    xAxis: [{
      categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
        'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
      crosshair: true
    }],
    yAxis: [{ // Primary yAxis
      labels: {
        format: '{value}??C',
        style: {
          color: Highcharts.getOptions().colors[2]
        }
      },
      title: {
        text: 'Temperature',
        style: {
          color: Highcharts.getOptions().colors[2]
        }
      },
      opposite: true

    }, { // Secondary yAxis
      gridLineWidth: 0,
      title: {
        text: 'Rainfall',
        style: {
          color: Highcharts.getOptions().colors[0]
        }
      },
      labels: {
        format: '{value} mm',
        style: {
          color: Highcharts.getOptions().colors[0]
        }
      }

    }, { // Tertiary yAxis
      gridLineWidth: 0,
      title: {
        text: 'Sea-Level Pressure',
        style: {
          color: Highcharts.getOptions().colors[1]
        }
      },
      labels: {
        format: '{value} mb',
        style: {
          color: Highcharts.getOptions().colors[1]
        }
      },
      opposite: true
    }],
    tooltip: {
      shared: true
    },
    legend: {
      layout: 'vertical',
      align: 'left',
      x: 80,
      verticalAlign: 'top',
      y: 55,
      floating: true,
      backgroundColor:
        Highcharts.defaultOptions.legend.backgroundColor || // theme
        'rgba(255,255,255,0.25)'
    },
    series: [{
      name: 'Rainfall',
      type: 'column',
      yAxis: 1,
      data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4],
      tooltip: {
        valueSuffix: ' mm'
      }

    }, {
      name: 'Sea-Level Pressure',
      type: 'spline',
      yAxis: 2,
      data: [1016, 1016, 1015.9, 1015.5, 1012.3, 1009.5, 1009.6, 1010.2, 1013.1, 1016.9, 1018.2, 1016.7],
      marker: {
        enabled: false
      },
      dashStyle: 'shortdot',
      tooltip: {
        valueSuffix: ' mb'
      }

    }, {
      name: 'Temperature',
      type: 'spline',
      data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6],
      tooltip: {
        valueSuffix: ' ??C'
      }
    }],
    responsive: {
      rules: [{
        condition: {
          maxWidth: 500
        },
        chartOptions: {
          legend: {
            floating: false,
            layout: 'horizontal',
            align: 'center',
            verticalAlign: 'bottom',
            x: 0,
            y: 0
          },
          yAxis: [{
            labels: {
              align: 'right',
              x: 0,
              y: -6
            },
            showLastLabel: false
          }, {
            labels: {
              align: 'left',
              x: 0,
              y: -6
            },
            showLastLabel: false
          }, {
            visible: false
          }]
        }
      }]
    }
  });
</script>
<script>
  // Busy Months Charts 
  // Create the chart
Highcharts.chart('container1', {
  chart: {
    type: 'column'
  },
  title: {
    text: 'Busy Month'
  },
  accessibility: {
    announceNewData: {
      enabled: true
    }
  },
  xAxis: {
    type: 'category'
  },
  yAxis: {
    title: {
      text: 'Total percent traveller'
    }

  },
  legend: {
    enabled: false
  },
  plotOptions: {
    series: {
      borderWidth: 0,
      dataLabels: {
        enabled: true,
        format: '{point.y:.1f}%'
      }
    }
  },

  tooltip: {
    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
  },

  series: [
    {
      name: "Month",
      colorByPoint: true,
      data: [
        {
          name: "Jan",
          y: 62.74,
          drilldown: "January"
        },
        {
          name: "Feb",
          y: 10.57,
          drilldown: "February"
        },
        {
          name: "Mar",
          y: 7.23,
          drilldown: "March"
        },
        {
          name: "Apr",
          y: 5.58,
          drilldown: "April"
        },
        {
          name: "May",
          y: 4.02,
          drilldown: "May"
        },
        {
          name: "June",
          y: 1.92,
          drilldown: "June"
        },
        {
          name: "July",
          y: 7.62,
          drilldown: "July"
        },
        {
          name: "Aug",
          y: 7.62,
          drilldown: "August"
        },
        {
          name: "Sep",
          y: 7.62,
          drilldown: "September"
        },
        {
          name: "Oct",
          y: 7.62,
          drilldown: "October"
        },
        {
          name: "Nov",
          y: 7.62,
          drilldown: "November"
        },
        {
          name: "Dec",
          y: 7.62,
          drilldown: "December"
        }
      ]
    }
  ]
});
</script>
<script>
    $(document).ready(function() {
      $('.minus').click(function () {
        var $input = $(this).parent().find('input');
        var count = parseInt($input.val()) - 1;
        count = count < 1 ? 1 : count;
        $input.val(count);
        $input.change();
        return false;
      });
      $('.plus').click(function () {
        var $input = $(this).parent().find('input');
        $input.val(parseInt($input.val()) + 1);
        $input.change();
        return false;
      });
    });
</script>
<script> 
  $(".chbox").click(function() {
    if($(this).is(":checked")) {
        $(this).parent().parent().find(".number").show();
    } else {
      $(this).parent().parent().find(".number").hide();
    }
});
</script>
<script>
   $(document).ready(function(){
    $('.pm').on('change', function() {
      if ( this.value == '1')
      {
        $(this).parent().find(".oneN").show();
        $(this).parent().find(".twoN").hide();
      }
      else
      {
        $(this).parent().find(".oneN").hide();
        $(this).parent().find(".twoN").show();
      }
    });
});
 
</script>
<script>
  (() => {
  class Box {
    constructor() {
      this.box = document.querySelector(".box");
      this.handleMouseDown = this.handleMouseDown.bind(this);
      this.handleMouseUp = this.handleMouseUp.bind(this);
      this.handleMouseMove = this.handleMouseMove.bind(this);
    }

    handleMouseDown() {
      this.box.style.cursor = "move";
      this.box.addEventListener("mouseup", this.handleMouseUp);
      document.body.addEventListener("mousemove", this.handleMouseMove);
      document.body.addEventListener("mouseleave", this.handleMouseUp);
    }

    handleMouseUp() {
      this.box.style.cursor = "default";
      document.body.removeEventListener("mousemove", this.handleMouseMove);
      document.body.removeEventListener("mouseleave", this.handleMouseUp);
    }

    handleMouseMove(e) {
      const boxRect = this.box.getBoundingClientRect();
      this.box.style.top = `${boxRect.top + e.movementY}px`;
      this.box.style.left = `${boxRect.left + e.movementX}px`;
    }

    init() {
      this.box.addEventListener("mousedown", this.handleMouseDown);
    }
  }

  const box = new Box();
  box.init();
})();

</script>
<script>
 /* scroll down to "WEATHER APP MAIN CODE" to see the source code */

/* SKYCONS
 * "colored" version by https://github.com/maxdow/skycons
========================================================= */
(function(global) {
  "use strict";
  var requestInterval, cancelInterval;

  (function() {
    var raf = global.requestAnimationFrame       ||
              global.webkitRequestAnimationFrame ||
              global.mozRequestAnimationFrame    ||
              global.oRequestAnimationFrame      ||
              global.msRequestAnimationFrame     ,
        caf = global.cancelAnimationFrame        ||
              global.webkitCancelAnimationFrame  ||
              global.mozCancelAnimationFrame     ||
              global.oCancelAnimationFrame       ||
              global.msCancelAnimationFrame      ;

    if(raf && caf) {
      requestInterval = function(fn, delay) {
        var handle = {value: null};

        function loop() {
          handle.value = raf(loop);
          fn();
        }

        loop();
        return handle;
      };

      cancelInterval = function(handle) {
        caf(handle.value);
      };
    }

    else {
      requestInterval = setInterval;
      cancelInterval = clearInterval;
    }
  }());
  var KEYFRAME = 500,
      STROKE = 0.08,
      TAU = 2.0 * Math.PI,
      TWO_OVER_SQRT_2 = 2.0 / Math.sqrt(2);

  function circle(ctx, x, y, r) {
    ctx.beginPath();
    ctx.arc(x, y, r, 0, TAU, false);
    ctx.fill();
  }

  function line(ctx, ax, ay, bx, by) {
    ctx.beginPath();
    ctx.moveTo(ax, ay);
    ctx.lineTo(bx, by);
    ctx.stroke();
  }

  function puff(ctx, t, cx, cy, rx, ry, rmin, rmax) {
    var c = Math.cos(t * TAU),
        s = Math.sin(t * TAU);

    rmax -= rmin;

    circle(
      ctx,
      cx - s * rx,
      cy + c * ry + rmax * 0.5,
      rmin + (1 - c * 0.5) * rmax
    );
  }

  function puffs(ctx, t, cx, cy, rx, ry, rmin, rmax) {
    var i;

    for(i = 5; i--; )
      puff(ctx, t + i / 5, cx, cy, rx, ry, rmin, rmax);
  }

  function cloud(ctx, t, cx, cy, cw, s, color) {
    t /= 30000;

    var a = cw * 0.21,
        b = cw * 0.12,
        c = cw * 0.24,
        d = cw * 0.28;

    ctx.fillStyle = color.cloud || color;
    puffs(ctx, t, cx, cy, a, b, c, d);

    ctx.globalCompositeOperation = 'destination-out';
    puffs(ctx, t, cx, cy, a, b, c - s, d - s);
    ctx.globalCompositeOperation = 'source-over';
  }

  function sun(ctx, t, cx, cy, cw, s, color) {
    t /= 120000;

    var a = cw * 0.25 - s * 0.5,
        b = cw * 0.32 + s * 0.5,
        c = cw * 0.50 - s * 0.5,
        i, p, cos, sin;

    ctx.strokeStyle = color.sun || color;
    ctx.lineWidth = s;
    ctx.lineCap = "round";
    ctx.lineJoin = "round";

    ctx.beginPath();
    ctx.arc(cx, cy, a, 0, TAU, false);
    ctx.stroke();

    for(i = 8; i--; ) {
      p = (t + i / 8) * TAU;
      cos = Math.cos(p);
      sin = Math.sin(p);
      line(ctx, cx + cos * b, cy + sin * b, cx + cos * c, cy + sin * c);
    }
  }

  function moon(ctx, t, cx, cy, cw, s, color) {
    t /= 15000;

    var a = cw * 0.29 - s * 0.5,
        b = cw * 0.05,
        c = Math.cos(t * TAU),
        p = c * TAU / -16;

    ctx.strokeStyle = color.moon || color;
    ctx.lineWidth = s;
    ctx.lineCap = "round";
    ctx.lineJoin = "round";

    cx += c * b;

    ctx.beginPath();
    ctx.arc(cx, cy, a, p + TAU / 8, p + TAU * 7 / 8, false);
    ctx.arc(cx + Math.cos(p) * a * TWO_OVER_SQRT_2, cy + Math.sin(p) * a * TWO_OVER_SQRT_2, a, p + TAU * 5 / 8, p + TAU * 3 / 8, true);
    ctx.closePath();
    ctx.stroke();
  }

  function rain(ctx, t, cx, cy, cw, s, color) {
    t /= 1350;

    var a = cw * 0.16,
        b = TAU * 11 / 12,
        c = TAU *  7 / 12,
        i, p, x, y;

    ctx.fillStyle = color.rain || color;

    for(i = 4; i--; ) {
      p = (t + i / 4) % 1;
      x = cx + ((i - 1.5) / 1.5) * (i === 1 || i === 2 ? -1 : 1) * a;
      y = cy + p * p * cw;
      ctx.beginPath();
      ctx.moveTo(x, y - s * 1.5);
      ctx.arc(x, y, s * 0.75, b, c, false);
      ctx.fill();
    }
  }

  function sleet(ctx, t, cx, cy, cw, s, color) {
    t /= 750;

    var a = cw * 0.1875,
        b = TAU * 11 / 12,
        c = TAU *  7 / 12,
        i, p, x, y;

    ctx.strokeStyle = color.rain || color;
    ctx.lineWidth = s * 0.5;
    ctx.lineCap = "round";
    ctx.lineJoin = "round";

    for(i = 4; i--; ) {
      p = (t + i / 4) % 1;
      x = Math.floor(cx + ((i - 1.5) / 1.5) * (i === 1 || i === 2 ? -1 : 1) * a) + 0.5;
      y = cy + p * cw;
      line(ctx, x, y - s * 1.5, x, y + s * 1.5);
    }
  }

  function snow(ctx, t, cx, cy, cw, s, color) {
    t /= 3000;

    var a  = cw * 0.16,
        b  = s * 0.75,
        u  = t * TAU * 0.7,
        ux = Math.cos(u) * b,
        uy = Math.sin(u) * b,
        v  = u + TAU / 3,
        vx = Math.cos(v) * b,
        vy = Math.sin(v) * b,
        w  = u + TAU * 2 / 3,
        wx = Math.cos(w) * b,
        wy = Math.sin(w) * b,
        i, p, x, y;

    ctx.strokeStyle = color.snow || color;
    ctx.lineWidth = s * 0.5;
    ctx.lineCap = "round";
    ctx.lineJoin = "round";

    for(i = 4; i--; ) {
      p = (t + i / 4) % 1;
      x = cx + Math.sin((p + i / 4) * TAU) * a;
      y = cy + p * cw;

      line(ctx, x - ux, y - uy, x + ux, y + uy);
      line(ctx, x - vx, y - vy, x + vx, y + vy);
      line(ctx, x - wx, y - wy, x + wx, y + wy);
    }
  }

  function fogbank(ctx, t, cx, cy, cw, s, color) {
    t /= 30000;

    var a = cw * 0.21,
        b = cw * 0.06,
        c = cw * 0.21,
        d = cw * 0.28;

    ctx.fillStyle = color.fogbank || color;
    puffs(ctx, t, cx, cy, a, b, c, d);

    ctx.globalCompositeOperation = 'destination-out';
    puffs(ctx, t, cx, cy, a, b, c - s, d - s);
    ctx.globalCompositeOperation = 'source-over';
  }

  var WIND_PATHS = [
        [
          -0.7500, -0.1800, -0.7219, -0.1527, -0.6971, -0.1225,
          -0.6739, -0.0910, -0.6516, -0.0588, -0.6298, -0.0262,
          -0.6083,  0.0065, -0.5868,  0.0396, -0.5643,  0.0731,
          -0.5372,  0.1041, -0.5033,  0.1259, -0.4662,  0.1406,
          -0.4275,  0.1493, -0.3881,  0.1530, -0.3487,  0.1526,
          -0.3095,  0.1488, -0.2708,  0.1421, -0.2319,  0.1342,
          -0.1943,  0.1217, -0.1600,  0.1025, -0.1290,  0.0785,
          -0.1012,  0.0509, -0.0764,  0.0206, -0.0547, -0.0120,
          -0.0378, -0.0472, -0.0324, -0.0857, -0.0389, -0.1241,
          -0.0546, -0.1599, -0.0814, -0.1876, -0.1193, -0.1964,
          -0.1582, -0.1935, -0.1931, -0.1769, -0.2157, -0.1453,
          -0.2290, -0.1085, -0.2327, -0.0697, -0.2240, -0.0317,
          -0.2064,  0.0033, -0.1853,  0.0362, -0.1613,  0.0672,
          -0.1350,  0.0961, -0.1051,  0.1213, -0.0706,  0.1397,
          -0.0332,  0.1512,  0.0053,  0.1580,  0.0442,  0.1624,
           0.0833,  0.1636,  0.1224,  0.1615,  0.1613,  0.1565,
           0.1999,  0.1500,  0.2378,  0.1402,  0.2749,  0.1279,
           0.3118,  0.1147,  0.3487,  0.1015,  0.3858,  0.0892,
           0.4236,  0.0787,  0.4621,  0.0715,  0.5012,  0.0702,
           0.5398,  0.0766,  0.5768,  0.0890,  0.6123,  0.1055,
           0.6466,  0.1244,  0.6805,  0.1440,  0.7147,  0.1630,
           0.7500,  0.1800
        ],
        [
          -0.7500,  0.0000, -0.7033,  0.0195, -0.6569,  0.0399,
          -0.6104,  0.0600, -0.5634,  0.0789, -0.5155,  0.0954,
          -0.4667,  0.1089, -0.4174,  0.1206, -0.3676,  0.1299,
          -0.3174,  0.1365, -0.2669,  0.1398, -0.2162,  0.1391,
          -0.1658,  0.1347, -0.1157,  0.1271, -0.0661,  0.1169,
          -0.0170,  0.1046,  0.0316,  0.0903,  0.0791,  0.0728,
           0.1259,  0.0534,  0.1723,  0.0331,  0.2188,  0.0129,
           0.2656, -0.0064,  0.3122, -0.0263,  0.3586, -0.0466,
           0.4052, -0.0665,  0.4525, -0.0847,  0.5007, -0.1002,
           0.5497, -0.1130,  0.5991, -0.1240,  0.6491, -0.1325,
           0.6994, -0.1380,  0.7500, -0.1400
        ]
      ],
      WIND_OFFSETS = [
        {start: 0.36, end: 0.11},
        {start: 0.56, end: 0.16}
      ];

  function leaf(ctx, t, x, y, cw, s, color) {
    var a = cw / 8,
        b = a / 3,
        c = 2 * b,
        d = (t % 1) * TAU,
        e = Math.cos(d),
        f = Math.sin(d);

    ctx.fillStyle = color.leaf || color;
    ctx.strokeStyle = color.leaf || color;
    ctx.lineWidth = s;
    ctx.lineCap = "round";
    ctx.lineJoin = "round";

    ctx.beginPath();
    ctx.arc(x        , y        , a, d          , d + Math.PI, false);
    ctx.arc(x - b * e, y - b * f, c, d + Math.PI, d          , false);
    ctx.arc(x + c * e, y + c * f, b, d + Math.PI, d          , true );
    ctx.globalCompositeOperation = 'destination-out';
    ctx.fill();
    ctx.globalCompositeOperation = 'source-over';
    ctx.stroke();
  }

  function swoosh(ctx, t, cx, cy, cw, s, index, total, color) {
    t /= 2500;

    var path = WIND_PATHS[index],
        a = (t + index - WIND_OFFSETS[index].start) % total,
        c = (t + index - WIND_OFFSETS[index].end  ) % total,
        e = (t + index                            ) % total,
        b, d, f, i;

    ctx.strokeStyle = color.cloud || color;
    ctx.lineWidth = s;
    ctx.lineCap = "round";
    ctx.lineJoin = "round";

    if(a < 1) {
      ctx.beginPath();

      a *= path.length / 2 - 1;
      b  = Math.floor(a);
      a -= b;
      b *= 2;
      b += 2;

      ctx.moveTo(
        cx + (path[b - 2] * (1 - a) + path[b    ] * a) * cw,
        cy + (path[b - 1] * (1 - a) + path[b + 1] * a) * cw
      );

      if(c < 1) {
        c *= path.length / 2 - 1;
        d  = Math.floor(c);
        c -= d;
        d *= 2;
        d += 2;

        for(i = b; i !== d; i += 2)
          ctx.lineTo(cx + path[i] * cw, cy + path[i + 1] * cw);

        ctx.lineTo(
          cx + (path[d - 2] * (1 - c) + path[d    ] * c) * cw,
          cy + (path[d - 1] * (1 - c) + path[d + 1] * c) * cw
        );
      }

      else
        for(i = b; i !== path.length; i += 2)
          ctx.lineTo(cx + path[i] * cw, cy + path[i + 1] * cw);

      ctx.stroke();
    }

    else if(c < 1) {
      ctx.beginPath();

      c *= path.length / 2 - 1;
      d  = Math.floor(c);
      c -= d;
      d *= 2;
      d += 2;

      ctx.moveTo(cx + path[0] * cw, cy + path[1] * cw);

      for(i = 2; i !== d; i += 2)
        ctx.lineTo(cx + path[i] * cw, cy + path[i + 1] * cw);

      ctx.lineTo(
        cx + (path[d - 2] * (1 - c) + path[d    ] * c) * cw,
        cy + (path[d - 1] * (1 - c) + path[d + 1] * c) * cw
      );

      ctx.stroke();
    }

    if(e < 1) {
      e *= path.length / 2 - 1;
      f  = Math.floor(e);
      e -= f;
      f *= 2;
      f += 2;

      leaf(
        ctx,
        t,
        cx + (path[f - 2] * (1 - e) + path[f    ] * e) * cw,
        cy + (path[f - 1] * (1 - e) + path[f + 1] * e) * cw,
        cw,
        s,
        color
      );
    }
  }

  var Skycons = function(opts) {
        opts = opts || {};
        this.list        = [];
        this.interval    = null;
        this.monochrome = typeof(opts.monochrome) === "undefined" ? true :  opts.monochrome;
        opts.colors = opts.colors || {};
        this.colors = {
            main    : opts.colors.main    || "#111",
            moon    : opts.colors.moon    || "#353545",
            fog     : opts.colors.fog     || "#CCC",
            fogbank : opts.colors.fogbank || "#AAA",
            cloud   : opts.colors.cloud   || "#666",
            snow    : opts.colors.snow    || "#C2EEFF",
            leaf    : opts.colors.leaf    || "#2C5228",
            rain    : opts.colors.rain    || "#7FDBFF",
            sun     : opts.colors.sun     || "#FFDC00"
        };
        if(this.monochrome) {
            this.color = opts.color || this.colors.main;
        } else {
            this.color = this.colors ;
        }
        this.resizeClear = !!(opts && opts.resizeClear);
      };

  Skycons.CLEAR_DAY = function(ctx, t, color) {
    var w = ctx.canvas.width,
        h = ctx.canvas.height,
        s = Math.min(w, h);

    sun(ctx, t, w * 0.5, h * 0.5, s, s * STROKE, color);
  };

  Skycons.CLEAR_NIGHT = function(ctx, t, color) {
    var w = ctx.canvas.width,
        h = ctx.canvas.height,
        s = Math.min(w, h);

    moon(ctx, t, w * 0.5, h * 0.5, s, s * STROKE, color);
  };

  Skycons.PARTLY_CLOUDY_DAY = function(ctx, t, color) {
    var w = ctx.canvas.width,
        h = ctx.canvas.height,
        s = Math.min(w, h);

    sun(ctx, t, w * 0.625, h * 0.375, s * 0.75, s * STROKE, color);
    cloud(ctx, t, w * 0.375, h * 0.625, s * 0.75, s * STROKE, color);
  };

  Skycons.PARTLY_CLOUDY_NIGHT = function(ctx, t, color) {
    var w = ctx.canvas.width,
        h = ctx.canvas.height,
        s = Math.min(w, h);

    moon(ctx, t, w * 0.667, h * 0.375, s * 0.75, s * STROKE, color);
    cloud(ctx, t, w * 0.375, h * 0.625, s * 0.75, s * STROKE, color);
  };

  Skycons.CLOUDY = function(ctx, t, color) {
    var w = ctx.canvas.width,
        h = ctx.canvas.height,
        s = Math.min(w, h);

    cloud(ctx, t, w * 0.5, h * 0.5, s, s * STROKE, color);
  };

  Skycons.RAIN = function(ctx, t, color) {
    var w = ctx.canvas.width,
        h = ctx.canvas.height,
        s = Math.min(w, h);

    rain(ctx, t, w * 0.5, h * 0.37, s * 0.9, s * STROKE, color);
    cloud(ctx, t, w * 0.5, h * 0.37, s * 0.9, s * STROKE, color);
  };

  Skycons.SLEET = function(ctx, t, color) {
    var w = ctx.canvas.width,
        h = ctx.canvas.height,
        s = Math.min(w, h);

    sleet(ctx, t, w * 0.5, h * 0.37, s * 0.9, s * STROKE, color);
    cloud(ctx, t, w * 0.5, h * 0.37, s * 0.9, s * STROKE, color);
  };

  Skycons.SNOW = function(ctx, t, color) {
    var w = ctx.canvas.width,
        h = ctx.canvas.height,
        s = Math.min(w, h);

    snow(ctx, t, w * 0.5, h * 0.37, s * 0.9, s * STROKE, color);
    cloud(ctx, t, w * 0.5, h * 0.37, s * 0.9, s * STROKE, color);
  };

  Skycons.WIND = function(ctx, t, color) {
    var w = ctx.canvas.width,
        h = ctx.canvas.height,
        s = Math.min(w, h);

    swoosh(ctx, t, w * 0.5, h * 0.5, s, s * STROKE, 0, 2, color);
    swoosh(ctx, t, w * 0.5, h * 0.5, s, s * STROKE, 1, 2, color);
  };

  Skycons.FOG = function(ctx, t, color) {
    var w = ctx.canvas.width,
        h = ctx.canvas.height,
        s = Math.min(w, h),
        k = s * STROKE;

    fogbank(ctx, t, w * 0.5, h * 0.32, s * 0.75, k, color);

    t /= 5000;

    var a = Math.cos((t       ) * TAU) * s * 0.02,
        b = Math.cos((t + 0.25) * TAU) * s * 0.02,
        c = Math.cos((t + 0.50) * TAU) * s * 0.02,
        d = Math.cos((t + 0.75) * TAU) * s * 0.02,
        n = h * 0.936,
        e = Math.floor(n - k * 0.5) + 0.5,
        f = Math.floor(n - k * 2.5) + 0.5;

    ctx.strokeStyle = color.fog || color;
    ctx.lineWidth = k;
    ctx.lineCap = "round";
    ctx.lineJoin = "round";

    line(ctx, a + w * 0.2 + k * 0.5, e, b + w * 0.8 - k * 0.5, e);
    line(ctx, c + w * 0.2 + k * 0.5, f, d + w * 0.8 - k * 0.5, f);
  };

  Skycons.prototype = {
    _determineDrawingFunction: function(draw) {
      if(typeof draw === "string")
        draw = Skycons[draw.toUpperCase().replace(/-/g, "_")] || null;

      return draw;
    },
    add: function(el, draw) {
      var obj;

      if(typeof el === "string")
        el = document.getElementById(el);

      // Does nothing if canvas name doesn't exists
      if(el === null)
        return;

      draw = this._determineDrawingFunction(draw);

      // Does nothing if the draw function isn't actually a function
      if(typeof draw !== "function")
        return;

      obj = {
        element: el,
        context: el.getContext("2d"),
        drawing: draw
      };

      this.list.push(obj);
      this.draw(obj, KEYFRAME);
    },
    set: function(el, draw) {
      var i;

      if(typeof el === "string")
        el = document.getElementById(el);

      for(i = this.list.length; i--; )
        if(this.list[i].element === el) {
          this.list[i].drawing = this._determineDrawingFunction(draw);
          this.draw(this.list[i], KEYFRAME);
          return;
        }

      this.add(el, draw);
    },
    remove: function(el) {
      var i;

      if(typeof el === "string")
        el = document.getElementById(el);

      for(i = this.list.length; i--; )
        if(this.list[i].element === el) {
          this.list.splice(i, 1);
          return;
        }
    },
    draw: function(obj, time) {
      var canvas = obj.context.canvas;

      if(this.resizeClear)
        canvas.width = canvas.width;

      else
        obj.context.clearRect(0, 0, canvas.width, canvas.height);

      obj.drawing(obj.context, time, this.color);
    },
    play: function() {
      var self = this;

      this.pause();
      this.interval = requestInterval(function() {
        var now = Date.now(),
            i;

        for(i = self.list.length; i--; )
          self.draw(self.list[i], now);
      }, 1000 / 60);
    },
    pause: function() {
      var i;

      if(this.interval) {
        cancelInterval(this.interval);
        this.interval = null;
      }
    }
  };

  global.Skycons = Skycons;
}(this));
/* END OF SKYCONS
================= */

/* WEATHER APP MAIN CODE
======================== */
var $container = $(".container");
var $icons = $(".icon");
var $summary = $("#summary");
var $right = $(".right");
var $location = $("#location");
var $day = $(".day");
var $temperature = $(".temperature");
var $temp = $(".temp");
var $wind = $("#wind");
var $humidity = $("#humidity");

/* generate icons
 * http://darkskyapp.github.io/skycons */
var skycons = new Skycons({
  "monochrome": false,
  "colors": {
    "main": "white",
    "cloud": "#c1c1c1",
    "moon": "#494960"
  }
});

// store celsius
var celsiusArr = [];
// store fahrenheit
var fahrenheitArr = [];

// options for getCurrentPosition()
var options = { timeout: 5000 }


// get the current position & retrive weather information
navigator.geolocation.getCurrentPosition(success, error, options);

// let user insert location
$location.keyup(function(event) {
  // store address from user input
  var address = $location.val();
  // check if "enter" key is pressed & check if input field has text
  if(event.which === 13 & $location.length > 0) {
    // delete aprox location
    $("#aprox").remove();
    // convert address to coords
    var url = "https://maps.googleapis.com/maps/api/geocode/json?address=" + address;
    var coords;
    $.getJSON(url, function(json) {
      console.log(json);
      coords = json.results[0].geometry.location.lat + "," + json.results[0].geometry.location.lng;
      // show formatted address
      address = json.results[0].formatted_address            
      address = address
                  // remove every words after a comma
                  .split(",").shift()
                  // remove numbers from address
                  .replace(/\d/g, "")
                  // remove two or more consecutive capital letters
                  .replace(/[A-Z]{2,}/g, "")
                  // remove the first space
                  .replace(/^\s/, "")
                  // remove the last space
                  .replace(/\s$/, "");
      // show location
      $location.val(address);
      // auto scale input width
      autoScalingInput($location, 10, 20, 240);
    }).done(function() {
      // delete temperature arrays
      celsiusArr = [];
      fahrenheitArr = [];
      // get weather information
      getWeather(coords);
    });
  }
});

// toggle between celsius and fahrenheit
$temperature.on("click", function() {
  $temp.each(function(i) {
    // check if the current temp is in celsius
    if ($(this).html().search(/??C/g) > -1) {
      // show fahrenheit
      $(this).html(fahrenheitArr[i] + " ??F");
    } else {
      // show celsius
      $(this).html(celsiusArr[i] + " ??C");
    }
  });
}); // END of "click" listener

// if getCurrentPosition succeed then run success()
function success(position) {
  // store coords using HTML5 geolocation
  var coords = position.coords.latitude + "," + position.coords.longitude;
  // get address
  getAddress(coords);
  // get weather information
  getWeather(coords);
}

// if getCurrentPosition() trow an error then run error()
function error(err) {
  // show error in console
  console.warn("ERROR(${err.code}): ${err.message}");
  // store api url
  var url = "https://ipinfo.io/geo?callback=?";
  // retrive coords based on ip address
  $.getJSON(url, function(json) {
    // log json data
    console.log(json);
    // store address
    var address = json.city + ', ' + json.country;
    address = address
                  // remove every words after a comma
                  .split(",").shift()
                  // remove numbers from address
                  .replace(/\d/g, "")
                  // remove two or more consecutive capital letters
                  .replace(/[A-Z]{2,}/g, "")
                  // remove the first space
                  .replace(/^\s/, "")
                  // remove the last space
                  .replace(/\s$/, "");
    // warn the user that the location is approximate
    // $right.prepend('<p id="aprox" style="font-size: 1.2em">Aprox location</p>');
    // show location
    $location.val(address);
    // auto scale input width
    autoScalingInput($location, 10, 20, 240);
    // store coords
    var coords = json.loc;
    // get weather information
    getWeather(coords);
  });
}

// get weather information
function getWeather(coords) {
  /* store api url
   * api documentation: https://darksky.net/dev/docs/forecast
   * use JSONP to access data from different server's domain by 
   * adding callback=? at the end of the url */
  var url = "https://api.darksky.net/forecast/a5ea3a75b7361771323e8adc14b09b66/" 
            + coords + "?exclude=minutely,hourly,flags" + "&units=si" + "&callback=?";
  // json call to get weather information
  $.getJSON(url, function(json) {
    // log json data
    console.log(json);
    // get current date
    var time = new TimeConverter(json.currently.time);
    $day.first().html(time.day + " " + time.dayNum);
    // get current celsius
    var celsius = json.currently.temperature;
    // convert celsius to fahrenheit and store both in arrays
    storeTemp(celsius);
    // show celsius by default
    $temp.first().html(celsiusArr[0] + " ??C");
    // get wind
    $wind.html(json.currently.windSpeed + 'm/s');
    // get humidity
    var humidity = Math.round(json.currently.humidity * 100);
    $humidity.html(humidity + '%');
    // show current weather summary
    $summary.html(json.currently.summary);
    // get current icon
    getIcon(json.currently.icon, $icons[0]);
    // get days of week weather
    for (i = 1; i < $day.length; i++) {
      // date
      time = new TimeConverter(json.daily.data[i].time);
      $($day[i]).html(time.dayShort + " " + time.dayNum);
      // icon
      getIcon(json.daily.data[i].icon, $icons[i]);
      // temp
      celsius = (json.daily.data[i].temperatureMax + json.daily.data[i].temperatureMin) / 2;
      storeTemp(celsius);
      $($temp[i]).html(celsiusArr[i] + " ??C");
    }
    // set icons width and height
    $icons.each(function() {
      this.width = 128;
      this.height = 128;
    });
    // start icons animation
    skycons.play();
  }).done(function() {
    /* when json call is finished
     * display the app */
    $container.css("display", "block");
  }); // END of getJSON() dark sky api
} // END of getWeather()

// get address using google maps geocoding api
function getAddress(coords) {
  var url = "https://maps.googleapis.com/maps/api/geocode/json?latlng=" + coords;
  $.getJSON(url, function(json) {
    console.log(json);
    var address = json.results[1].formatted_address;
    address = address
                  // remove every words after a comma
                  .split(",").shift()
                  // remove numbers from address
                  .replace(/\d/g, "")
                  // remove two or more consecutive capital letters
                  .replace(/[A-Z]{2,}/g, "")
                  // remove the first space
                  .replace(/^\s/, "")
                  // remove the last space
                  .replace(/\s$/, "");
    // show location
    $location.val(address);
    // auto scale input width
    autoScalingInput($location, 10, 20, 240);
  });
}

// https://stackoverflow.com/questions/847185/convert-a-unix-timestamp-to-time-in-javascript
function TimeConverter(UNIX_timestamp) {
  var date = new Date(UNIX_timestamp * 1000);
  var week = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
  var weekShort = ["Sun","Mon","Tue","Wed","Thu","Fri","Sat"];
  this.day = week[date.getDay()];
  this.dayNum = date.getDate();
  this.dayShort = weekShort[date.getDay()];
}

// convert celsius to fahrenheit and store both in arrays
function storeTemp(celsius) {
  celsius = Math.round(celsius);
  celsiusArr.push(celsius);
  var fahrenheit = Math.round( (celsius*9)/5 + 32 );
  fahrenheitArr.push(fahrenheit);
}

// get weather icons
// http://darkskyapp.github.io/skycons/
function getIcon(icon, iconID) {
  var weather = ["clear-day","clear-night","rain","snow","sleet","wind","fog","cloudy","partly-cloudy-day","partly-cloudy-night"];
  var currentIcon = icon.replace(/-/g, '_').toUpperCase();
  return skycons.set(iconID, Skycons[currentIcon]);
}

/* auto scaling <input> to width of value
 * https://stackoverflow.com/a/22423199 */
function autoScalingInput(elements, offset, min, max) {

    // Initialize parameters
    offset = offset || 0;
    min    = min    || 0;
    max    = max    || Infinity;
    elements.each(function() {
        var element = $(this);

        // Add element to measure pixel length of text
        var id = btoa(Math.floor(Math.random() * Math.pow(2, 64)));
        var tag = $('<span id="' + id + '">' + element.val() + '</span>').css({
            'display': 'none',
            'font-family': element.css('font-family'),
            'font-size': element.css('font-size'),
        }).appendTo('body');

        // Adjust element width on keydown
        function update() {

            // Give browser time to add current letter
            setTimeout(function() {

                // Prevent whitespace from being collapsed
                tag.html(element.val().replace(/ /g, '&nbsp'));

                // Clamp length and prevent text from scrolling
                var size = Math.max(min, Math.min(max, tag.width() + offset));
                if (size < max)
                    element.scrollLeft(0);

                // Apply width to element
                element.width(size);
            }, 0);
        };
        update();
        element.keydown(update);
    });
}

// See more
$(document).ready(function() {
    // Configure/customize these variables.
    var showChar =700;  // How many characters are shown by default
    var ellipsestext = "";
    var moretext = "Read More";
    var lesstext = "Read Less";
    

    $('.more').each(function() {
        var content = $(this).html();
 
        if(content.length > showChar) {
 
            var c = content.substr(0, showChar);
            var h = content.substr(showChar, content.length - showChar);
 
            var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="javascript:void(0);" class="morelink">' + moretext + '</a></span>';
 
            $(this).html(html);
        }
 
    });
 
    $(".morelink").click(function(){
        if($(this).hasClass("less")) {
            $(this).removeClass("less");
            $(this).html(moretext);
        } else {
            $(this).addClass("less");
            $(this).html(lesstext);
        }
        $(this).parent().prev().toggle();
        $(this).prev().toggle();
        return false;
    });
});


</script>






@endsection

