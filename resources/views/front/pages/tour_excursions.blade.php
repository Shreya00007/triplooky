@extends("front.layout.header")
@section("title","Food & Drink")
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
</style>
<main id="main">
   <div id="banner">
      <div class="container-fluid bodyPad">
         <h2 class="text-center">Food & Drink</h2>
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
        <p class="prSection active">
          <span style="display:block;text-align:center;">Trip Calendar</span>
          <span class="brCheck">2</span>
        </p>        
        <p class="prSection active">
          <span style="display:block;text-align:center;">Accomodation Type</span>
          <span class="brCheck">3</span>
        </p>
        <p class="prSection active">
          <span style="display:block;text-align:center;">Tours & Activities</span>
          <span class="brCheck">4</span>
        </p>
        <p class="prSection active">
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
        <form id="tour-form">
          <div class="text-center mt-2 mb-3"> 
          <p style="margin:0;">Budget per person</p>  
          <p class="mb-3" style="font-size:30px;"><i class="fas fa-coins"></i></p>     
          <!-- Double range slider (flat design)  -->
          <div class="range-slider flat" data-ticks-position='top' style='--min:{{session("change_price")*($minprice)}}; --max:{{session("change_price")*($maxprice)}}; --value-a:{{session("change_price")*($minprice)}}; --value-b:{{session("change_price")*($maxprice)}}; --prefix:"{{session('currency_sign')}}"; --text-value-a:"{{session('change_price')*($minprice)}}"; --text-value-b:"{{session('change_price')*($maxprice)}}";width:50%;'>
            <input type="range" min="{{session('change_price')*($minprice)}}" max="{{session('change_price')*($maxprice)}}" value="{{session('change_price')*($minprice)}}" oninput="this.parentNode.style.setProperty('--value-a',this.value); this.parentNode.style.setProperty('--text-value-a', JSON.stringify(this.value))" class="food-and-drink-min-price">
            <output></output>
            <input type="range" min="{{session('change_price')*($minprice)}}" max="{{session('change_price')*($maxprice)}}" value="{{session('change_price')*($maxprice)}}" oninput="this.parentNode.style.setProperty('--value-b',this.value); this.parentNode.style.setProperty('--text-value-b', JSON.stringify(this.value))" class="food-and-drink-max-price">
            <output></output>
            <div class='range-slider__progress'></div>
          </div> 
        </div>
          <div class="d-flex align-items-center wrap">

            @for($i=0;$i<count($data);$i++)
            @if(session()->has('fooddrink'))
             @if(in_array($data[$i]['name'],(session('fooddrink'))))
              <div class=" w-20 wow fadeInLeftBig" data-wow-duration="2s" data-wow-delay="0.4" data="{{$data[$i]['name']}}">
              <div class="form-group">                
                <div class="text-center">{{$data[$i]['name']}}</div>
                <div class="button-group-pills text-center" data-toggle="buttons">
                  <label class="btn btn-default prevSelected tour-box" id="hotls" data="{{$data[$i]['name']}}">
                    <span class="checkCircle"></span>
                    <input type="checkbox" class="chbox" name="fooddrink" value="food-drinks">
                    <img src="{{url('')}}/food-and-drink-image/images/{{$data[$i]['image']}}" class="lbImg">
                  </label>
                </div>
              </div>
            </div>
             @else
              <div class=" w-20 wow fadeInLeftBig" data-wow-duration="2s" data-wow-delay="0.4" data="{{$data[$i]['name']}}">
              <div class="form-group">                
                <div class="text-center">{{$data[$i]['name']}}</div>
                <div class="button-group-pills text-center" data-toggle="buttons">
                  <label class="btn btn-default tour-box " id="hotls" data="{{$data[$i]['name']}}">
                    <span class="checkCircle"></span>
                    <input type="checkbox" class="chbox" name="fooddrink" value="food-drinks">
                    <img src="{{url('')}}/food-and-drink-image/images/{{$data[$i]['image']}}" class="lbImg">
                  </label>
                </div>
              </div>
            </div>
             @endif
            @else
             <div class="w-20 wow fadeInLeftBig" data-wow-duration="2s" data-wow-delay="0.4" data="{{$data[$i]['name']}}">
              <div class="form-group">                
                <div class="text-center">{{$data[$i]['name']}}</div>
                <div class="button-group-pills text-center" data-toggle="buttons">
                  <label class="btn btn-default tour-box " id="hotls" data="{{$data[$i]['name']}}">
                    <span class="checkCircle"></span>
                    <input type="checkbox" class="chbox" name="fooddrink" value="food-drinks">
                    <img src="{{url('')}}/food-and-drink-image/images/{{$data[$i]['image']}}" class="lbImg">
                  </label>
                </div>
              </div>
            </div>
            @endif
            @endfor
          
           
            
         
          
           
         
          
            
         
           
            
       

           
            
           
           
            
         </div>
          <div class="text-center">
         <a href="/preferable-activity" class="btn btn-default">Previous</a>
        <button class="btn btn-default" type="submit">Next</button>
       </div>
       </form>


      
     </div>
   </section>
</main>

<script src="https://unpkg.com/@yaireo/knobs"></script>
<script>

// These slider range component was used in my other component:
// https://github.com/yairEO/color-picker

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
}

new Knobs(settings)


</script>

<script type="text/javascript">

 var data=JSON.parse(sessionStorage.getItem("tour"));
if(data==null){
  window.location.href="/";

}else{
    if(data.activity.length==0){
    window.location.href="/preferable-activity";
   }
}

</script>
<script type="text/javascript">
  var data=JSON.parse(sessionStorage.getItem("tour"));
  if(data.tour.length>0){
    data.tour.length=0;
    sessionStorage.setItem("tour",JSON.stringify(data));
  }

  if("{{session()->has('fooddrink')}}"==1){
    var data=JSON.parse(sessionStorage.getItem("tour"));
    var pre_data={!! json_encode(session('fooddrink'))!!};
   
    $(pre_data).each(function(index,data1){
      data.tour.push(data1);
      sessionStorage.setItem("tour",JSON.stringify(data));
    });
    
  }




  var data=JSON.parse(sessionStorage.getItem("tour"));
    $(".tour-box").each(function(){
      $(this).click(function(){
      
        if($(this).hasClass("prevSelected") || $(this).hasClass("active")){
         
          if(data.tour.indexOf($(this).attr("data"))!=-1){
            
           var index= data.tour.indexOf($(this).attr("data"));
           data.tour.splice(index,1);
           sessionStorage.setItem("tour",JSON.stringify(data));
           setTimeout(()=>{
             $(this).removeClass("active");
             $(this).removeClass("prevSelected");

           },200)
          }
          else{
           
            data.tour.push($(this).attr("data"));
            sessionStorage.setItem("tour",JSON.stringify(data));
          }
        }
        else{
         
         
          if(data.tour.indexOf($(this).attr("data"))==-1){
            
             data.tour.push($(this).attr("data"));
             sessionStorage.setItem("tour",JSON.stringify(data));
          }
          else{
            
            var index=data.tour.indexOf($(this).attr("data"));
            data.tour.splice(index,1);
            sessionStorage.setItem("tour",JSON.stringify(data));
          }
        }
      });
    });

  //tour form submit
  $("#tour-form").submit(function(e){
   
     
    e.preventDefault();
    var data=JSON.parse(sessionStorage.getItem("tour"));

  if(data.tour.length>0){
    
  

   $.ajax({
      type:"POST",
      url:"/user/fooddrink",
      data:{
        fooddrink:data.tour,
        _token:$("body").attr("data"),
        max_price:$(".food-and-drink-max-price").val(),
        min_price:$(".food-and-drink-min-price").val(),
      },
      success:function(response){
        if(response=="success"){
           data.tour_and_excursion_budget=$(".tour-excursion-budget-range-input").val();
   sessionStorage.setItem("tour",JSON.stringify(data)); 
   window.location.href="/transport";  
        }

      }
    });
  
  }
  else{
    swal({
  title: "Kindly Select At Least One Food & Drink",
  
  icon: "warning",

  dangerMode: true,
  button:"Close",
})
  }
  
  });
</script>

<style type="text/css">
  button.btn.btn-default {
    background: #006994;
    color: #ffffff;
    padding: 8px 32px;
}
<style type="text/css">
  a.btn.btn-default {
    background: #006994;
    color: #ffffff;
    padding: 8px 32px;
}
</style>
</style>

@endsection