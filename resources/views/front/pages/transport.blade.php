@extends("front.layout.header")
@section("title","Transportation")
@section("content")
<style>
  #hotls{
    height:300px;
    border-radius:6px;
    position:relative;
    /*box-shadow: 0px 0px 5px -1px rgb(0 0 0 / 50%);*/
  }
  .lbImg{height:100%;width: 100%;object-fit:cover;object-position:center;}
  #hotls .checkCircle{right: 32px;}
 .w-20{width:25%;position:relative;padding:0px 16px;}
  .wrap{flex-wrap: wrap;}
 button.btn.btn-default {
    background: #006994;
    color: #ffffff;
    padding: 8px 32px;
}
</style>
<main id="main">
   <div id="banner">
      <div class="container-fluid bodyPad">
         <h2 class="text-center">Transportation</h2>
      </div>
   </div>

   <section class="form-section mt-3">
     <div class="container-fluid bodyPad">
       <div class="proBar">
        <p class="prSection active">
          <span style="display:block;text-align:center;">Pickup Cities</span>
          <span class="brCheck">
            <i class="fas fa-check"></i>
          </span>
        </p>
        <p class="prSection active">
          <span style="display:block;text-align:center;">Trip Start</span>
          <span class="brCheck">2</span>
        </p>        
        <p class="prSection active">
          <span style="display:block;text-align:center;">Accomodation</span>
          <span class="brCheck">3</span>
        </p>
        <p class="prSection active">
          <span style="display:block;text-align:center;">Preferable Activities</span>
          <span class="brCheck">4</span>
        </p>
        <p class="prSection active">
          <span style="display:block;text-align:center;">Tour Excursions</span>
          <span class="brCheck">5</span>
        </p>
        <p class="prSection active">
          <span style="display:block;text-align:center;">Transportation</span>
          <span class="brCheck">6</span>
        </p>
        <!-- <p class="prSection">
          <span style="display:block;text-align:center;">Trip Summary</span>
          <span class="brCheck">7</span>
        </p> -->
      </div>

         <div class="text-center mt-5 mb-5"> 
          <p style="margin:0;">Budget per person</p>  
          <p class="mb-3" style="font-size:30px;"><i class="fas fa-coins"></i></p>     
          <!-- Double range slider (flat design)  -->
           <div class="range-slider flat" data-ticks-position='top' style='--min:{{session("change_price")*($minprice)}}; --max:{{session("change_price")*($maxprice)}}; --value-a:{{session("change_price")*($minprice)}}; --value-b:{{session("change_price")*($maxprice)}}; --prefix:"{{session('currency_sign')}}"; --text-value-a:"{{session('change_price')*($minprice)}}"; --text-value-b:"{{session('change_price')*($maxprice)}}";width:50%;'>
            <input type="range" min="{{session('change_price')*($minprice)}}" max="{{session('change_price')*($maxprice)}}" value="{{session('change_price')*($minprice)}}" oninput="this.parentNode.style.setProperty('--value-a',this.value); this.parentNode.style.setProperty('--text-value-a', JSON.stringify(this.value))" class="transportation-min-price">
            <output></output>
            <input type="range" min="{{session('change_price')*($minprice)}}" max="{{session('change_price')*($maxprice)}}" value="{{session('change_price')*($maxprice)}}" oninput="this.parentNode.style.setProperty('--value-b',this.value); this.parentNode.style.setProperty('--text-value-b', JSON.stringify(this.value))" class="transportation-max-price">
            <output></output>
            <div class='range-slider__progress'></div>
          </div> 
        </div>
       <form id="transport-form" class="transport-form">
          <div class="d-flex align-items-center  wrap">

          @for($i=0;$i<count($data);$i++)
             @if(session()->has('transportation'))
              @if(in_array($data[$i]['name'],array_values(session()->get('transportation'))))
               <div class=" w-20 wow fadeInLeftBig" data-wow-duration="2s" data-wow-delay="0.2s" data="{{$data[$i]['name']}}">
              <div class="form-group">                
                <div class="text-center">{{$data[$i]['name']}}</div>
                <div class="button-group-pills text-center" data-toggle="buttons">
                  <label class="btn btn-default prevSelected transport-box" id="hotls" data="{{$data[$i]['name']}}">
                    <span class="checkCircle"></span>
                    <input type="checkbox" class="chbox" name="options" value="transfer">
                    <img src="{{url('')}}/transportation-image/images/{{$data[$i]['image']}}" class="lbImg">
                  </label>
                </div>
              </div>
            </div>
              @else
               <div class=" w-20 wow fadeInLeftBig" data-wow-duration="2s" data-wow-delay="0.2s" data="{{$data[$i]['name']}}">
              <div class="form-group">                
                <div class="text-center">{{$data[$i]['name']}}</div>
                <div class="button-group-pills text-center" data-toggle="buttons">
                  <label class="btn btn-default transport-box" id="hotls" data="{{$data[$i]['name']}}">
                    <span class="checkCircle"></span>
                    <input type="checkbox" class="chbox" name="options" value="transfer">
                    <img src="{{url('')}}/transportation-image/images/{{$data[$i]['image']}}" class="lbImg">
                  </label>
                </div>
              </div>
            </div>
              @endif
             @else
              <div class=" w-20 wow fadeInLeftBig" data-wow-duration="2s" data-wow-delay="0.2s" data="{{$data[$i]['name']}}">
              <div class="form-group">                
                <div class="text-center">{{$data[$i]['name']}}</div>
                <div class="button-group-pills text-center" data-toggle="buttons">
                  <label class="btn btn-default transport-box" id="hotls" data="{{$data[$i]['name']}}">
                    <span class="checkCircle"></span>
                    <input type="checkbox" class="chbox" name="options" value="transfer">
                    <img src="{{url('')}}/transportation-image/images/{{$data[$i]['image']}}" class="lbImg">
                  </label>
                </div>
              </div>
            </div>
             @endif
            @endfor
           
           
         </div>
         <div class="text-center">
            <a href="/tour-excursions" class="btn btn-default" type="button">Previous</a>
            <button class="btn btn-default" type="submit">Next</button>
       </div>
       </div>
       </form>


      
     </div>
   </section>
   <!--end show car modal --->
</main>
<script src="https://unpkg.com/@yaireo/knobs"></script>
<script>

// These slider range component was used in my other component:
// https://github.com/yairEO/color-picker
/*

var settings = {
  visible: 0, 
  theme: {
    backgroud: "rgba(0,0,0,.9)",
  },
  CSSVarTarget: document.querySelector('.range-slider'),
  knobs: [
    "Thumb",
    {
      cssVar: ['thumb-size', 'px'],
      label: 'thumb-size',
      type: 'range',
      min: 6, max: 33 //  value: 16,
    },
    "Value",
    {
      cssVar: ['value-active-color'], // alias for the CSS variable
      label: 'value active color',
      type: 'color',
      value: 'white'
    },
    {
      cssVar: ['value-background'], // alias for the CSS variable
      label: 'value-background',
      type: 'color',
    },
    {
      cssVar: ['value-background-hover'], // alias for the CSS variable
      label: 'value-background-hover',
      type: 'color',
    },
    {
      cssVar: ['primary-color'], // alias for the CSS variable
      label: 'primary-color',
      type: 'color',
    },
    {
      cssVar: ['value-offset-y', 'px'],
      label: 'value-offset-y',
      type: 'range', value: 5, min: -10, max: 20
    },
    "Track",
    {
      cssVar: ['track-height', 'px'],
      label: 'track-height',
      type: 'range', value: 8, min: 6, max: 33
    },
    {
      cssVar: ['progress-radius', 'px'],
      label: 'progress-radius',
      type: 'range', value: 20, min: 0, max: 33
    },
    {
      cssVar: ['progress-color'], // alias for the CSS variable
      label: 'progress-color',
      type: 'color',
      value: '#EEEEEE'
    },
    {
      cssVar: ['fill-color'], // alias for the CSS variable
      label: 'fill-color',
      type: 'color',
      value: '#1cd31c'
    },
    "Ticks",
    {
      cssVar: ['show-min-max'],
      label: 'hide min/max',
      type: 'checkbox',
      value: 'none'
    },
    {
      cssVar: ['ticks-thickness', 'px'],
      label: 'ticks-thickness',
      type: 'range',
      value: 1, min: 0, max: 10
    },
    {
      cssVar: ['ticks-height', 'px'],
      label: 'ticks-height',
      type: 'range',
      value: 5, min: 0, max: 15
    },
    {
      cssVar: ['ticks-gap', 'px'],
      label: 'ticks-gap',
      type: 'range',
      value: 5, min: 0, max: 15
    },
    {
      cssVar: ['min-max-x-offset', '%'],
      label: 'min-max-x-offset',
      type: 'range',
      value: 10, step: 1, min: 0, max: 100
    },
    {
      cssVar: ['min-max-opacity'],
      label: 'min-max-opacity',
      type: 'range', value: .5, step: .1, min: 0, max: 1
    },
    {
      cssVar: ['ticks-color'], // alias for the CSS variable
      label: 'ticks-color',
      type: 'color',
      value: '#AAAAAA'
    },
  ]
};

new Knobs(settings);

*/

</script>


<style type="text/css">
.feature-navbar{
   border: none !important;

}
  .feature-navbar li{
    border: none !important;
    margin-left: 10px !Important;

  }
  .feature-navbar li button{
    border: none !important;
  
    border-radius: 2px !important;
    padding: 5px 20px !Important;
    color: black !important;


  }
  .feature-navbar li button.active{
    background: darkblue !Important;
    color: white !Important; 
  }
  .feature-navbar li button:hover{
      background: #f3f6f9 !Important;
  }
  .feature-navbar li button.active:hover{
    background: darkblue !Important;
  }
  .facility-icon{
    box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.5);
    display: flex;
    justify-content: center;
    align-items: center;
    width: 60px;
    height: 60px;
    border-radius: 50%;
    color: white;
    font-size: 20px;
  }
.facility-box{
  box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.3);
  padding: 15px 0px;
  border-radius: 2px;
  width: 200px;
  min-height: 150px;
  margin-left: 50px;
}
.view-more-car-image{
  position: absolute;
  bottom: -5px;
  left: 0;
  width: 100%;
  height: 0px;
  z-index: 99;
  background: #f3f6f9;
  display: flex;
 
  align-items: center;
  transition: 0.5s;
  padding: 0px 5.3px;
  
 opacity: 0;
  visibility: hidden;

}
.view-more-car-image button{
  background: white;
  border: none;
  outline: none;
  width: fit-content;
  height: fit-content;
  padding: 8px 15px;
  border-radius: 3rem;

  color: black;
 font-weight: 500;
  font-size: 14px;
  box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.5);
  margin-right: 8px;

}
.small-car-image-box{
  width: fit-content;
  height: fit-content;
  border: 2px solid white;
  padding: 10px 8px;
  border-radius: 2px;
  background: white;
  cursor: pointer;
}
.car-box{
  overflow: hidden;
  transition: 05s;
}


</style>
<script type="text/javascript">
  $(document).ready(function(){
    $(".car-box").each(function(){
      $(this).mouseenter(function(){
    $(this).find(".view-more-car-image").css({
      opacity:"1",
      visibility:"visible",
      height:"60px",
     });
    });
    });
    $(".car-box").each(function(){
      $(this).mouseleave(function(){
     $(this).find(".view-more-car-image").css({
      opacity:"0",
      visibility:"hidden",
      height:"0px",
     });
    });
    });

    $(".show-more-car-image-btn").each(function(){
      $(this).click(function(){
      
        $("#car-image-show-modal").modal("show");
      });
    });

    $(".cut-car-show-image-btn").click(function(){
       
        $("#car-image-show-modal").modal("hide");
      });


    $(".small-car-image-box").each(function(){
      $(this).click(function(){
       
        var src=$(this).find("img").attr("src");
        $(".big-car-image").find("img").attr("src",src);
        $(".big-car-image").find("img").fadeIn();
      });

    });
  

   //next step move to activity
  //    var transportation=[];
  //  $(".transport-box").each(function(){

  //   $(this).click(function(){
  //      alert($(this).attr("data"));
  //     $(this).find("input").attr("select_transport","yes");
  //     if(transportation.indexOf($(this).attr("data"))!=-1){
  //       transportation.push($(this).attr("data"));
  //     }



  //   });
  //  });
     
  //  $(".transport-form").submit(function(e){
  //   e.preventDefault();
 
  
     

  //         var data=JSON.parse(sessionStorage.getItem("tour"));

  //           for(transportation_data of transportation){
  //            if(data.transportation.indexOf(transportation_data)==-1){
  //              data.transportation.push(btoa(transportation_data));
  //            }
  //           }
  //           //accomodation budget value update or setup
  //           data.transportation_budget=$(".transport-budget-range-input").val();

  //           sessionStorage.setItem("tour",JSON.stringify(data));
    
  //   window.location.href="/trip_summary";
  //  });
   
  //  //end next step move to preferable activity

  // });

 
</script>
<script type="text/javascript">
  var data=JSON.parse(sessionStorage.getItem('tour'));
  if(data!=null){
    data.transportation.length=0;
    sessionStorage.setItem("tour",JSON.stringify(data));
  }
if("{{session()->has('transportation')}}"==1){
    var data=JSON.parse(sessionStorage.getItem("tour"));
    var pre_data={!! json_encode(session('transportation'))!!};
   
    $(pre_data).each(function(index,data1){
      data.transportation.push(data1);
      sessionStorage.setItem("tour",JSON.stringify(data));
    });
    
  }




  var data=JSON.parse(sessionStorage.getItem("tour"));
    $(".transport-box").each(function(){
      $(this).click(function(){
      
        if($(this).hasClass("prevSelected")){
        
          if(data.transportation.indexOf($(this).attr("data"))!=-1){
            
           var index= data.transportation.indexOf($(this).attr("data"));
           data.transportation.splice(index,1);
           sessionStorage.setItem("tour",JSON.stringify(data));
           setTimeout(()=>{
             $(this).removeClass("active");
             $(this).removeClass("prevSelected");

           },200);
          }
          else{
           
            data.transportation.push($(this).attr("data"));
            sessionStorage.setItem("tour",JSON.stringify(data));
          }
        }
        else{

         
         
          if(data.transportation.indexOf($(this).attr("data"))==-1){
            
             data.transportation.push($(this).attr("data"));
             sessionStorage.setItem("tour",JSON.stringify(data));
          }
          else{
            
            var index=data.transportation.indexOf($(this).attr("data"));
            data.transportation.splice(index,1);
            sessionStorage.setItem("tour",JSON.stringify(data));
          }
        }
      });
    });

  $(".transport-form").submit(function(e){
   

    e.preventDefault();
   
  //  transportation_data=transportation;
  // if(transportation.length>0){
  //    var data=JSON.parse(sessionStorage.getItem("tour"));
  //  for(transportation of transportation){
  //   if(data.transportation.indexOf(transportation)==-1){
  //     data.transportation.push(transportation);
  //   }
  //  }
   
   var data=JSON.parse(sessionStorage.getItem('tour'));
   if(data.transportation.length!=0){
  $.ajax({
    type:"POST",
    url:"/user/transportation",
    data:{
      _token:$("body").attr("data"),
      data:data.transportation,
      min_price:$(".transportation-min-price").val(),
      max_price:$(".transportation-max-price").val(),
    },
    success:function(response){
      if(response=="success"){
         data.transportation_budget=$(".transportation-budget-range-input").val();
        sessionStorage.setItem("tour",JSON.stringify(data)); 
        window.location.href="/trip_summary"; 
      }
    }
  }); 
  }
  else{
    swal({
  title: "Kindly Select At Least One Transportation",
  
  icon: "warning",

  dangerMode: true,
  button:"Close",
})
  }
  
  });
</script>
@endsection


