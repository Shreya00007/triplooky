@extends("front.layout.header")
@section("title","Tours & Activities Type")
@section("content")
<style type="text/css">
   #hotls{
    height:300px;
    border-radius:6px;
    position:relative;
    /*box-shadow: 0px 0px 5px -1px rgb(0 0 0 / 50%);*/
  }
  .lbImg{height:100%;width: 100%;object-fit:cover;}
  #hotls .checkCircle{right: 32px;}
  .w-20{width:25%;position:relative;padding:0px 16px;}
  .wrap{flex-wrap: wrap;}
</style>
<main id="main">
   <div id="banner">
      <div class="container-fluid bodyPad">
         <h2 class="text-center">Tours & Activities type</h2>
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
      <br/>

       
       <form id="pick-up-activity-form">
        <div class="text-center mt-2 mb-3"> 
          <p style="margin:0;">Budget per person</p>  
          <p class="mb-3" style="font-size:30px;"><i class="fas fa-coins"></i></p>     
          <!-- Double range slider (flat design)  -->
           <div class="range-slider flat" data-ticks-position='top' style='--min:{{session("change_price")*($minprice)}}; --max:{{session("change_price")*($maxprice)}}; --value-a:{{session("change_price")*($minprice)}}; --value-b:{{session("change_price")*($maxprice)}}; --prefix:"{{session('currency_sign')}}"; --text-value-a:"{{session('change_price')*($minprice)}}"; --text-value-b:"{{session('change_price')*($maxprice)}}";width:50%;'>
            <input type="range" min="{{session('change_price')*($minprice)}}" max="{{session('change_price')*($maxprice)}}" value="{{session('change_price')*($minprice)}}" oninput="this.parentNode.style.setProperty('--value-a',this.value); this.parentNode.style.setProperty('--text-value-a', JSON.stringify(this.value))" class="activity-min-price">
            <output></output>
            <input type="range" min="{{session('change_price')*($minprice)}}" max="{{session('change_price')*($maxprice)}}" value="{{session('change_price')*($maxprice)}}" oninput="this.parentNode.style.setProperty('--value-b',this.value); this.parentNode.style.setProperty('--text-value-b', JSON.stringify(this.value))" class="activity-max-price">
            <output></output>
            <div class='range-slider__progress'></div>
          </div>  
        </div>
        <br/>
        <div class="d-flex align-items-center wrap">
         @for($i=0;$i<count($data);$i++)
         @if(session()->has('activity'))
          @if(in_array($data[$i]['name'],array_values(session('activity'))))
           <div class="w-20 wow fadeInLeftBig" data-wow-duration="2s" data-wow-delay="0.2s" data="{{$data[$i]['name']}}">
              <div class="form-group">                
                <div class="text-center">{{$data[$i]['name']}}</div>
                <div class="button-group-pills text-center" data-toggle="buttons">
                  <label class="btn btn-default activity-select-box prevSelected" id="hotls" data="{{$data[$i]['name']}}">
                    <span class="checkCircle"></span>
                    <input type="checkbox" class="chbox" name="hotel" value="hotel">
                    <img src="{{url('')}}/tour-and-activit-image/images/{{$data[$i]['image']}}" class="lbImg">
                  </label>
                </div>
              </div>
            </div>
          @else
           <div class=" w-20 wow fadeInLeftBig" data-wow-duration="2s" data-wow-delay="0.2s" data="{{$data[$i]['name']}}">
              <div class="form-group">                
                <div class="text-center">{{$data[$i]['name']}}</div>
                <div class="button-group-pills text-center" data-toggle="buttons">
                  <label class="btn btn-default activity-select-box" id="hotls" data="{{$data[$i]['name']}}">
                    <span class="checkCircle"></span>
                    <input type="checkbox" class="chbox" name="hotel" value="hotel">
                    <img src="{{url('')}}/tour-and-activit-image/images/{{$data[$i]['image']}}" class="lbImg">
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
                  <label class="btn btn-default activity-select-box" id="hotls" data="{{$data[$i]['name']}}">
                    <span class="checkCircle"></span>
                    <input type="checkbox" class="chbox" name="hotel" value="hotel">
                    <img src="{{url('')}}/tour-and-activit-image/images/{{$data[$i]['image']}}" class="lbImg">
                  </label>
                </div>
              </div>
            </div>
         @endif
          
         @endfor

           
          
           
         
           
       
           
           
           
           
          
       
         
          
        
         
          
          
         
         
         </div>
       
           <div class="text-center">
          <a href="/accomodation" class="btn btn-default">Previous</a>
       <button type="submit" class="btn btn-default" >Next</button>
       </div>
       </form>
     
     </div>
   </section>
</main>
<script type="text/javascript">
 var data=JSON.parse(sessionStorage.getItem("tour"));
if(data==null){
  window.location.href="/";

}else{
    if(data.accomodation.length==0){
    window.location.href="/accomodation";
   }
}

</script>
<script type="text/javascript">
  var data=JSON.parse(sessionStorage.getItem("tour"));
    if("{{session()->has('activity')}}"==1){
      data.activity.length=0;
      var pre_data={!! json_encode(session('activity'))!!};
      $(pre_data).each(function(index,data1){
        data.activity.push(data1);
        sessionStorage.setItem("tour",JSON.stringify(data));
      });

    }


    ///
    $(".activity-select-box").each(function(){
      $(this).click(function(){
        if($(this).hasClass("prevSelected")){
          if(data.activity.indexOf($(this).attr("data"))!=-1){
           var index= data.activity.indexOf($(this).attr("data"));
           data.activity.splice(index,1);
           sessionStorage.setItem("tour",JSON.stringify(data));
           setTimeout(()=>{
             $(this).removeClass("active");
             $(this).removeClass("prevSelected");

           },200)
          }
          else{
            data.activity.push($(this).attr("data"));
            sessionStorage.setItem("tour",JSON.stringify(data));
          }
        }
        else{
          if(data.activity.indexOf($(this).attr("data"))==-1){
             data.activity.push($(this).attr("data"));
             sessionStorage.setItem("tour",JSON.stringify(data));
          }
          else{
            var index=data.activity.indexOf($(this).attr("data"));
            data.activity.splice(index,1);
            sessionStorage.setItem("tour",JSON.stringify(data));
          }
        }
      });
    });


    //

  $("#pick-up-activity-form").submit(function(e){
    e.preventDefault();
  
 


    var data=JSON.parse(sessionStorage.getItem("tour"));
     if(data.activity.length>0){
   

   data.preferable_activity_budget=$(".preferable-activity-budget-range-input").val();
   
    $.ajax({
      type:"POST",
      url:"/user/activity",
      data:{
        data:data.activity,
        _token:$("body").attr("data"),
        activity_min_price:$(".activity-min-price").val(),
        activity_max_price:$(".activity-max-price").val(),
      },
      success:function(response){
     
        if(response=="success"){
           sessionStorage.setItem("tour",JSON.stringify(data));
   window.location.href="/tour-excursions";
        }
      }
    });
     }
     else{
     swal({
  title: "Kindly Select At Least one Tour & Activity",
  
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
</style>

@endsection