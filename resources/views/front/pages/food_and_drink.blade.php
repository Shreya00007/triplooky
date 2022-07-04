@extends("front.layout.header")
@section("title","Tour Excursion")
@section("content")
<style>
  #hotls{
    height:200px;
    border-radius:6px;
  }
  .lbImg {
    height: 177px;
    width: 100%;
    border-radius: 6px;
}
 
</style>
<main id="main">
   <div id="banner">
      <div class="container-fluid bodyPad">
         <h2 class="text-center">Food & Drink</h2>
      </div>
   </div>
   <section class="form-section mt-3">
     <div class="container-fluid bodyPad">
       <form id="tour-form-data">
         <div class="text-center mb-5"> 
          <p style="margin-bottom:0px;">Budget per tour per person</p> 
          <p class="mb-5" style="font-size:30px;"><i class="fas fa-coins"></i></p>       
          <!-- Double range slider (flat design)  -->
          <div class="range-slider flat" data-ticks-position='top' style='--min:00; --max:2500; --value-a:0; --value-b:400; --prefix:"$"; --text-value-a:"0"; --text-value-b:"400";width:50%;'>
            <input type="range" min="0" max="2500"  oninput="this.parentNode.style.setProperty('--value-a',this.value); this.parentNode.style.setProperty('--text-value-a', JSON.stringify(this.value))">
            <output></output>
            <input type="range" min="0" max="2500"  oninput="this.parentNode.style.setProperty('--value-b',this.value); this.parentNode.style.setProperty('--text-value-b', JSON.stringify(this.value))" class="food_drink_budget">
            <output></output>
            <div class='range-slider__progress'></div>
          </div>
        </div>
          <div class="row">
         
            @for($i=0;$i<count($data);$i++)
           @for($j=0;$j<count($data[$i]);$j++)
          
        
          
            <div class="col-md-4 col-xs-12 tour-box" data="{{ $data[$i][$j]['id']}}">
              <div class="form-group">                
                <div class="text-center">{{ $data[$i][$j]['heading']}}</div>
                <div class="button-group-pills text-center" data-toggle="buttons">
                  <label class="btn btn-default active" id="hotls">
                    <input type="checkbox" class="chbox" name="options">
                    <img src="{{url('')}}/tour/images/{{ $data[$i][$j]['image']}}" class="lbImg" width="100%">
                  </label>
                </div>
              </div>
            </div>
            
         
          
            
           @endfor
           @endfor
           
            
       

           
            
           
           
            
         </div>
          <div class="text-right">
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
  var tour=[];
  $(".tour-box").each(function(){
    $(this).click(function(){

     if(tour.indexOf($(this).attr("data"))==-1){
      tour.push($(this).attr("data"));
     }
    });
  });

  //tour form submit
  $("#to").submit(function(e){
     e.preventDefault();
    alert($(".food_drink_budget").val());
    return false;
   
  if(tour.length>0){
     var data=JSON.parse(sessionStorage.getItem("tour"));
     data.food_drink_budget=$(".food_drink_budget").val();
   for(tour of tour){
    if(data.tour.indexOf(tour)==-1){
      data.tour.push(tour);
    }
   }
   data.food_drink_budget=$(".food_drink_budget").val();
   sessionStorage.setItem("tour",JSON.stringify(data)); 
   window.location.href="/transport";  
  }
  else{
    alert("Kindly Select Tour at least one");
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