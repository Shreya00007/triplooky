@extends("front.layout.header")
@section("title","Accomodation")
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
div.text-center{
   font-size: 20px;
    font-weight: 600;
    margin-bottom: 10px;
}
</style>
<main id="main">
   <div id="banner">
      <div class="container-fluid bodyPad">
         <h2 class="text-center">Accomodation type</h2>
      </div>
   </div>
   <section class="form-section">
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

         <div class="text-center mt-2 mb-5"> 
          <p style="margin:0;">Budget per night</p>  
          <p class="mb-3" style="font-size:30px;"><i class="fas fa-coins"></i></p>     
          <!-- Double range slider (flat design)  -->
          <div class="range-slider flat" data-ticks-position='top' style='--min:{{session("change_price")*($minprice)}}; --max:{{session("change_price")*($maxprice)}}; --value-a:{{session("change_price")*($minprice)}}; --value-b:{{session("change_price")*($maxprice)}}; --prefix:"{{session('currency_sign')}}"; --text-value-a:"{{session('change_price')*($minprice)}}"; --text-value-b:"{{session('change_price')*($maxprice)}}";width:50%;'>
            <input type="range" min="{{session('change_price')*($minprice)}}" max="{{session('change_price')*($maxprice)}}" value="{{session('change_price')*($minprice)}}" oninput="this.parentNode.style.setProperty('--value-a',this.value); this.parentNode.style.setProperty('--text-value-a', JSON.stringify(this.value))" class="accomodation-min">
            <output></output>
            <input type="range" min="{{session('change_price')*($minprice)}}" max="{{session('change_price')*($maxprice)}}" value="{{session('change_price')*($maxprice)}}" oninput="this.parentNode.style.setProperty('--value-b',this.value); this.parentNode.style.setProperty('--text-value-b', JSON.stringify(this.value))" class="accomodation-budget-range-input">
            <output></output>
            <div class='range-slider__progress'></div>
          </div> 
        </div>
       <form id="accomodation-form">
          <div class="d-flex align-items-center  wrap">
          @for($i=0;$i<count($data);$i++)
           @if(session()->has('accomodation'))
            @if(in_array($data[$i]['name'],array_values(session('accomodation'))))
            <div class="w-20 wow fadeInLeftBig" data-wow-duration="2s" data-wow-delay="0.2s" >
              <div class="form-group">                
                <div class="text-center">{{$data[$i]['name']}}</div>
                <div class="button-group-pills text-center" data-toggle="buttons">
                  <label class="btn btn-default accomodation-box prevSelected" id="hotls" data="{{$data[$i]['name']}}">
                    <span class="checkCircle"></span>
                    <input type="checkbox" class="chbox" name="options" value="{{$data[$i]['name']}}"  select_accomodation="yes">
                    <img src="{{url('')}}/accomodation-image/images/{{$data[$i]['image']}}" class="lbImg">
                  </label>
                </div>
              </div>
            </div>
            @else
            <div class="w-20 wow fadeInLeftBig" data-wow-duration="2s" data-wow-delay="0.2s" data="{{$data[$i]['name']}}">
              <div class="form-group">                
                <div class="text-center">{{$data[$i]['name']}}</div>
                <div class="button-group-pills text-center" data-toggle="buttons">
                  <label class="btn btn-default accomodation-box 1" id="hotls" data="{{$data[$i]['name']}}">
                    <span class="checkCircle"></span>
                    <input type="checkbox" class="chbox selected" name="options" value="{{$data[$i]['name']}}">
                    <img src="{{url('')}}/accomodation-image/images/{{$data[$i]['image']}}" class="lbImg">
                  </label>
                </div>
              </div>
            </div>
            @endif
           @else
             <div class=" w-20 wow fadeInLeftBig" data-wow-duration="2s" data-wow-delay="0.2s" >
              <div class="form-group">                
                <div class="text-center">{{$data[$i]['name']}}</div>
                <div class="button-group-pills text-center " data-toggle="buttons">
                  <label class="btn btn-default active accomodation-box 1" id="hotls" data="{{$data[$i]['name']}}">
                    <span class="checkCircle"></span>
                    <input type="checkbox" class="chbox" name="options"  value="{{$data[$i]['name']}}" >
                    <img src="{{url('')}}/accomodation-image/images/{{$data[$i]['image']}}" class="lbImg">
                  </label>
                </div>
              </div>
            </div>

           @endif
            @endfor
           
           
         </div>
         <div class="text-center">
            <a href="/trip-start" class="btn btn-default" type="button">Previous</a>
            <button class="btn btn-default pick-city-next-btn" type="submit">Next</button>
       </div>
       </div>
       </form>


      
     </div>
   </section>
   <!-- <div class="accomodation-box-show container">
     <div class="hotel-box-show row mb-4 d-none">
      <h4 class="p-font mb-4">Hotels of your City</h4>
      
       
     </div><div class="hotel-list-box"></div>
     
     
     <div class="appartment-box-show mb-4 d-none">
        <h4 class="p-font mb-4">Appartments of your City</h4>
      <div class="apprtment-list-box"></div>
     </div>
     <div class="ride-box-show"></div>
     <div class="gate-box-show"></div>
   </div>
   <div class="container d-none">
    <div class="row  mb-5">
     <div class="col-sm-12 d-flex justify-content-center align-items-center">
      <button class="btn  mr-2" style="margin-right: 10px;padding: 6px 15px;margin-bottom: 10px;">All Type</button>
        <button class=" mr-2" style="margin-right: 10px;margin-bottom: 10px;">Luxiary Car</button>
      <button class="btn btn-success mr-2" style="margin-right: 10px;margin-bottom: 10px;">Normal Car</button>
      <button class=" mr-2" style="margin-right: 10px;margin-bottom: 10px;">Cab</button>
      <button class="btn btn-success" style="margin-bottom: 10px;margin-right: 10px;">Bike</button>
       <button class="btn btn-success" style="margin-bottom: 10px;margin-right: 10px;">Bike</button>
        <button class="btn btn-success" style="margin-bottom: 10px;margin-right: 10px;">Bike</button>
         <button class="btn btn-success" style="margin-bottom: 10px;margin-right: 10px;">Bike</button>
     </div>
    </div>
     <div class="row">
        <div class="col-sm-3 mb-5">
         <div class="card car-box" style="box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);border-radius: 2px;">
           <div class="card-body p-1 rounded-0 pt-3 position-relative">
            <div class=""> <center><img src="{{url('')}}//b.png" width="100%"></center></div>
             <div class="ride-content pt-3 px-2 pb-1">
              <div>Car</div>
              <div><i class="fa fa-star text-warning"></i>
                <i class="fa fa-star text-warning"></i>
                <i class="fa fa-star text-warning"></i>
                <i class="fa fa-star text-warning"></i>
                <i class="fa fa-star text-warning"></i>
                <span>5.0 Review</span>

              </div>
              <div><p class="m-1 p-font"><span>Type : </span><span style="margin-left:5px;">Disel</span></p></div>
              <div><p class="m-1 p-font"><span>Price : </span><span style="margin-left:5px;"><i class="fa fa-inr"></i> 5000/day</span></p></div>
               <div><p class="m-1 p-font"><span>Brand :  </span><span style="margin-left:5px;"> BMW</span></p></div>

              
                <div><p class="m-1 p-font"><span>Availability : </span><span style="margin-left:5px;color: green;background: green;color: white;width: fit-content;height: fit-content;padding: 2px 15px !important; border-radius: 3rem;font-size: 12px;">Available</span></p></div>

                


             </div>

             <div class="view-more-car-image">
               <button class="show-more-car-image-btn">Veiw Photo</button>
              <button class="" >Check Details </button>
             </div>
           </div>
         </div>
       </div>
         <div class="col-sm-3 mb-5">
         <div class="card car-box" style="box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);border-radius: 2px;">
           <div class="card-body p-1 rounded-0 pt-3 position-relative">
            <div class=""> <center><img src="{{url('')}}//b.png" width="100%"></center></div>
             <div class="ride-content pt-3 px-2 pb-1">
              <div>Car</div>
              <div><i class="fa fa-star text-warning"></i>
                <i class="fa fa-star text-warning"></i>
                <i class="fa fa-star text-warning"></i>
                <i class="fa fa-star text-warning"></i>
                <i class="fa fa-star text-warning"></i>
                <span>5.0 Review</span>

              </div>
              <div><p class="m-1 p-font"><span>Type : </span><span style="margin-left:5px;">Disel</span></p></div>
              <div><p class="m-1 p-font"><span>Price : </span><span style="margin-left:5px;"><i class="fa fa-inr"></i> 5000/day</span></p></div>
               <div><p class="m-1 p-font"><span>Brand :  </span><span style="margin-left:5px;"> BMW</span></p></div>

              
                <div><p class="m-1 p-font"><span>Availability : </span><span style="margin-left:5px;color: green;background: green;color: white;width: fit-content;height: fit-content;padding: 2px 15px !important; border-radius: 3rem;font-size: 12px;">Available</span></p></div>

                


             </div>

             <div class="view-more-car-image">
               <button class="show-more-car-image-btn">Veiw Photo</button>
              <button class="" >Check Details </button>
             </div>
           </div>
         </div>
       </div>
         <div class="col-sm-3 mb-5">
         <div class="card car-box" style="box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);border-radius: 2px;">
           <div class="card-body p-1 rounded-0 pt-3 position-relative">
            <div class=""> <center><img src="{{url('')}}//b.png" width="100%"></center></div>
             <div class="ride-content pt-3 px-2 pb-1">
              <div>Car</div>
              <div><i class="fa fa-star text-warning"></i>
                <i class="fa fa-star text-warning"></i>
                <i class="fa fa-star text-warning"></i>
                <i class="fa fa-star text-warning"></i>
                <i class="fa fa-star text-warning"></i>
                <span>5.0 Review</span>

              </div>
              <div><p class="m-1 p-font"><span>Type : </span><span style="margin-left:5px;">Disel</span></p></div>
              <div><p class="m-1 p-font"><span>Price : </span><span style="margin-left:5px;"><i class="fa fa-inr"></i> 5000/day</span></p></div>
               <div><p class="m-1 p-font"><span>Brand :  </span><span style="margin-left:5px;"> BMW</span></p></div>

              
                <div><p class="m-1 p-font"><span>Availability : </span><span style="margin-left:5px;color: green;background: green;color: white;width: fit-content;height: fit-content;padding: 2px 15px !important; border-radius: 3rem;font-size: 12px;">Available</span></p></div>

                


             </div>

             <div class="view-more-car-image">
               <button class="show-more-car-image-btn">Veiw Photo</button>
              <button class="" >Check Details </button>
             </div>
           </div>
         </div>
       </div>
         <div class="col-sm-3 mb-5">
         <div class="card car-box" style="box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);border-radius: 2px;">
           <div class="card-body p-1 rounded-0 pt-3 position-relative">
            <div class=""> <center><img src="{{url('')}}//b.png" width="100%"></center></div>
             <div class="ride-content pt-3 px-2 pb-1">
              <div>Car</div>
              <div><i class="fa fa-star text-warning"></i>
                <i class="fa fa-star text-warning"></i>
                <i class="fa fa-star text-warning"></i>
                <i class="fa fa-star text-warning"></i>
                <i class="fa fa-star text-warning"></i>
                <span>5.0 Review</span>

              </div>
              <div><p class="m-1 p-font"><span>Type : </span><span style="margin-left:5px;">Disel</span></p></div>
              <div><p class="m-1 p-font"><span>Price : </span><span style="margin-left:5px;"><i class="fa fa-inr"></i> 5000/day</span></p></div>
               <div><p class="m-1 p-font"><span>Brand :  </span><span style="margin-left:5px;"> BMW</span></p></div>

              
                <div><p class="m-1 p-font"><span>Availability : </span><span style="margin-left:5px;color: green;background: green;color: white;width: fit-content;height: fit-content;padding: 2px 15px !important; border-radius: 3rem;font-size: 12px;">Available</span></p></div>

                


             </div>

             <div class="view-more-car-image">
               <button class="show-more-car-image-btn">Veiw Photo</button>
              <button class="" >Check Details </button>
             </div>
           </div>
         </div>
       </div>
         <div class="col-sm-3 mb-5">
         <div class="card car-box" style="box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);border-radius: 2px;">
           <div class="card-body p-1 rounded-0 pt-3 position-relative">
            <div class=""> <center><img src="{{url('')}}//b.png" width="100%"></center></div>
             <div class="ride-content pt-3 px-2 pb-1">
              <div>Car</div>
              <div><i class="fa fa-star text-warning"></i>
                <i class="fa fa-star text-warning"></i>
                <i class="fa fa-star text-warning"></i>
                <i class="fa fa-star text-warning"></i>
                <i class="fa fa-star text-warning"></i>
                <span>5.0 Review</span>

              </div>
              <div><p class="m-1 p-font"><span>Type : </span><span style="margin-left:5px;">Disel</span></p></div>
              <div><p class="m-1 p-font"><span>Price : </span><span style="margin-left:5px;"><i class="fa fa-inr"></i> 5000/day</span></p></div>
               <div><p class="m-1 p-font"><span>Brand :  </span><span style="margin-left:5px;"> BMW</span></p></div>

              
                <div><p class="m-1 p-font"><span>Availability : </span><span style="margin-left:5px;color: green;background: green;color: white;width: fit-content;height: fit-content;padding: 2px 15px !important; border-radius: 3rem;font-size: 12px;">Available</span></p></div>

                


             </div>

             <div class="view-more-car-image">
               <button class="show-more-car-image-btn">Veiw Photo</button>
              <button class="" >Check Details </button>
             </div>
           </div>
         </div>
       </div>
          <div class="col-sm-3 mb-5">
         <div class="card car-box" style="box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);border-radius: 2px;">
           <div class="card-body p-1 rounded-0 pt-3 position-relative">
            <div class=""> <center><img src="{{url('')}}//b.png" width="100%"></center></div>
             <div class="ride-content pt-3 px-2 pb-1">
              <div>Car</div>
              <div><i class="fa fa-star text-warning"></i>
                <i class="fa fa-star text-warning"></i>
                <i class="fa fa-star text-warning"></i>
                <i class="fa fa-star text-warning"></i>
                <i class="fa fa-star text-warning"></i>
                <span>5.0 Review</span>

              </div>
              <div><p class="m-1 p-font"><span>Type : </span><span style="margin-left:5px;">Disel</span></p></div>
              <div><p class="m-1 p-font"><span>Price : </span><span style="margin-left:5px;"><i class="fa fa-inr"></i> 5000/day</span></p></div>
               <div><p class="m-1 p-font"><span>Brand :  </span><span style="margin-left:5px;"> BMW</span></p></div>

              
                <div><p class="m-1 p-font"><span>Availability : </span><span style="margin-left:5px;color: green;background: green;color: white;width: fit-content;height: fit-content;padding: 2px 15px !important; border-radius: 3rem;font-size: 12px;">Available</span></p></div>

                


             </div>

             <div class="view-more-car-image">
               <button class="show-more-car-image-btn">Veiw Photo</button>
              <button class="" >Check Details </button>
             </div>
           </div>
         </div>
       </div>
          <div class="col-sm-3 mb-5">
         <div class="card car-box" style="box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);border-radius: 2px;">
           <div class="card-body p-1 rounded-0 pt-3 position-relative">
            <div class=""> <center><img src="{{url('')}}//b.png" width="100%"></center></div>
             <div class="ride-content pt-3 px-2 pb-1">
              <div>Car</div>
              <div><i class="fa fa-star text-warning"></i>
                <i class="fa fa-star text-warning"></i>
                <i class="fa fa-star text-warning"></i>
                <i class="fa fa-star text-warning"></i>
                <i class="fa fa-star text-warning"></i>
                <span>5.0 Review</span>

              </div>
              <div><p class="m-1 p-font"><span>Type : </span><span style="margin-left:5px;">Disel</span></p></div>
              <div><p class="m-1 p-font"><span>Price : </span><span style="margin-left:5px;"><i class="fa fa-inr"></i> 5000/day</span></p></div>
               <div><p class="m-1 p-font"><span>Brand :  </span><span style="margin-left:5px;"> BMW</span></p></div>

              
                <div><p class="m-1 p-font"><span>Availability : </span><span style="margin-left:5px;color: green;background: green;color: white;width: fit-content;height: fit-content;padding: 2px 15px !important; border-radius: 3rem;font-size: 12px;">Available</span></p></div>

                


             </div>

             <div class="view-more-car-image">
               <button class="show-more-car-image-btn">Veiw Photo</button>
              <button class="" >Check Details </button>
             </div>
           </div>
         </div>
       </div>
         <div class="col-sm-3 mb-5">
         <div class="card car-box" style="box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);border-radius: 2px;">
           <div class="card-body p-1 rounded-0 pt-3 position-relative">
            <div class=""> <center><img src="{{url('')}}//b.png" width="100%"></center></div>
             <div class="ride-content pt-3 px-2 pb-1">
              <div>Car</div>
              <div><i class="fa fa-star text-warning"></i>
                <i class="fa fa-star text-warning"></i>
                <i class="fa fa-star text-warning"></i>
                <i class="fa fa-star text-warning"></i>
                <i class="fa fa-star text-warning"></i>
                <span>5.0 Review</span>

              </div>
              <div><p class="m-1 p-font"><span>Type : </span><span style="margin-left:5px;">Disel</span></p></div>
              <div><p class="m-1 p-font"><span>Price : </span><span style="margin-left:5px;"><i class="fa fa-inr"></i> 5000/day</span></p></div>
               <div><p class="m-1 p-font"><span>Brand :  </span><span style="margin-left:5px;"> BMW</span></p></div>

              
                <div><p class="m-1 p-font"><span>Availability : </span><span style="margin-left:5px;color: green;background: green;color: white;width: fit-content;height: fit-content;padding: 2px 15px !important; border-radius: 3rem;font-size: 12px;">Available</span></p></div>

                


             </div>

             <div class="view-more-car-image">
               <button class="show-more-car-image-btn">Veiw Photo</button>
              <button class="" >Check Details </button>
             </div>
           </div>
         </div>
       </div>
         <div class="col-sm-3 mb-5">
         <div class="card car-box" style="box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);border-radius: 2px;">
           <div class="card-body p-1 rounded-0 pt-3 position-relative">
            <div class=""> <center><img src="{{url('')}}//b.png" width="100%"></center></div>
             <div class="ride-content pt-3 px-2 pb-1">
              <div>Car</div>
              <div><i class="fa fa-star text-warning"></i>
                <i class="fa fa-star text-warning"></i>
                <i class="fa fa-star text-warning"></i>
                <i class="fa fa-star text-warning"></i>
                <i class="fa fa-star text-warning"></i>
                <span>5.0 Review</span>

              </div>
              <div><p class="m-1 p-font"><span>Type : </span><span style="margin-left:5px;">Disel</span></p></div>
              <div><p class="m-1 p-font"><span>Price : </span><span style="margin-left:5px;"><i class="fa fa-inr"></i> 5000/day</span></p></div>
               <div><p class="m-1 p-font"><span>Brand :  </span><span style="margin-left:5px;"> BMW</span></p></div>

              
                <div><p class="m-1 p-font"><span>Availability : </span><span style="margin-left:5px;color: green;background: green;color: white;width: fit-content;height: fit-content;padding: 2px 15px !important; border-radius: 3rem;font-size: 12px;">Available</span></p></div>

                


             </div>

             <div class="view-more-car-image">
               <button class="show-more-car-image-btn">Veiw Photo</button>
              <button class="" >Check Details </button>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div> -->
   <!--modal for car image show -->
  <!--  <div class="modal " id="car-image-show-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content  rounded-0" style="background:rgba(0, 0, 0, 0.9);">
      <div class="modal-header">
       
        <button type="button" class="close cut-car-show-image-btn" data-dismiss="modal" aria-label="Close" style="width:25px;height: 25px;float: right;">
          <span aria-hidden="true" >&times;</span>
        </button>
      </div>
      <div class="modal-body " style="background:rgba(0, 0, 0, 0.9);">
       <center><div class="loader-bar d-none">
        <img src="{{url('')}}/loader3.jpg" width="50"><div>
      </div></center>
      <div class="row">
        <div class="col-sm-4 d-flex justify-content-between" style="height: fit-content;">
          <div class="row">
            <div class="col-6 mb-2"><div class="small-car-image-box"><img src="{{url('')}}/b.png" width="150"></div></div>
            <div class="col-6 mb-2"><div class="small-car-image-box"><img src="{{url('')}}/i.png" width="150"></div></div>
            <div class="col-6 mb-2"><div class="small-car-image-box"><img src="{{url('')}}/b.png" width="150"></div></div>
            <div class="col-6 mb-2"><div class="small-car-image-box"><img src="{{url('')}}/g.png" width="150"></div></div>
              <div class="col-6 mb-2"><div class="small-car-image-box"><img src="{{url('')}}/c.png" width="150"></div></div>
            <div class="col-6 mb-2"><div class="small-car-image-box"><img src="{{url('')}}/d.png" width="150"></div></div>
            <div class="col-6 mb-2"><div class="small-car-image-box"><img src="{{url('')}}/e.png" width="150"></div></div>
            <div class="col-6 mb-2"><div class="small-car-image-box"><img src="{{url('')}}/h.png" width="150"></div></div>
          </div>
         
         
        
          

        </div>
        <div class="col-sm-8 bg-light d-flex justify-content-center align-items-center py-3">
          <div class="row">
            <div class="col-sm-12 py-5 big-car-image">
              <img src="{{url('')}}/f.png" width="100%">
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </div>
</div> -->
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

    var data=JSON.parse(sessionStorage.getItem("tour"));
    if("{{session()->has('accomodation')}}"==1){
      var pre_data={!! json_encode(session('accomodation'))!!};
      data.accomodation.length=0;
      $(pre_data).each(function(index,data1){
        data.accomodation.push(data1);
        sessionStorage.setItem("tour",JSON.stringify(data));
      });
      //onclick check is alredy exist
      // var all_selected_accomodation=$("label.prevSelected");
      //  $(all_selected_accomodation).each(function(){
      //    $(this).click(function(){
      //     if(data.accomodation.indexOf($(this).attr("data"))!=-1){
      //        var index=data.accomodation.indexOf($(this).attr("data"));
      //        data.accomodation.splice(index,1);
      //        sessionStorage.setItem("tour",JSON.stringify(data));
      //        setTimeout(function(){
             
              
      //         $(this).removeClass("active");
      //         $(this).removeClass("prevSelected");

             
      //        },100);
      //     }
      //     else{
      //       alert("not found");
      //     }
      //    });
      //  });

    }
   
   
    // $(".car-box").each(function(){
    //   $(this).mouseenter(function(){
    // $(this).find(".view-more-car-image").css({
    //   opacity:"1",
    //   visibility:"visible",
    //   height:"60px",
    //  });
    // });
    // });
    // $(".car-box").each(function(){
    //   $(this).mouseleave(function(){
    //  $(this).find(".view-more-car-image").css({
    //   opacity:"0",
    //   visibility:"hidden",
    //   height:"0px",
    //  });
    // });
    // });

    // $(".show-more-car-image-btn").each(function(){
    //   $(this).click(function(){
      
    //     $("#car-image-show-modal").modal("show");
    //   });
    // });

    // $(".cut-car-show-image-btn").click(function(){
       
    //     $("#car-image-show-modal").modal("hide");
    //   });


    // $(".small-car-image-box").each(function(){
    //   $(this).click(function(){
       
    //     var src=$(this).find("img").attr("src");
    //     $(".big-car-image").find("img").attr("src",src);
    //     $(".big-car-image").find("img").fadeIn();
    //   });

    // });
  

   //next step move to activity
  
    var data=JSON.parse(sessionStorage.getItem("tour"));

       $(".accomodation-box").each(function(){
        $(this).click(function(){
           

          if($(this).hasClass("prevSelected")){

            var index=data.accomodation.indexOf($(this).attr("data"));
             var index=data.accomodation.indexOf($(this).attr("data"));
             data.accomodation.splice(index,1);
             sessionStorage.setItem("tour",JSON.stringify(data));
             

                setTimeout(()=>{
                   $(this).removeClass("active");
                   $(this).removeClass("prevSelected");
                },100)
           
          }
          else{
               data.accomodation.push($(this).attr("data"));
               sessionStorage.setItem("tour",JSON.stringify(data));
          }
        });
       });   


    
    


     
   $("#accomodation-form").submit(function(e){
    e.preventDefault();
   var data=JSON.parse(sessionStorage.getItem("tour"));
  
       if(data.accomodation.length>0){
        // var input=$(this).find("input");
       // $(input).each(function(){
       //  if($(this).attr("select_accomodation")=="yes"){
       //        if(accomodation.indexOf($(this).val())==-1){
       //          accomodation.push($(this).val());
       //        }
       //  }
       // });

          
                 
           
            // for(accomodation_data of accomodation){
            //  if(data.accomodation.indexOf(accomodation_data)==-1){
            //    data.accomodation.push(btoa(accomodation_data));
            //  }
            // }


            //accomodation budget value update or setup
            data.accomodation_budget=$(".accomodation-budget-range-input").val();

            $.ajax({
              type:"POST",
              url:"/user/accomodation",
              data:{
                _token:$("body").attr("data"),
                 accomodation:data.accomodation,
                 accomodation_min_price:$(".accomodation-min").val(),
                 accomodation_max_price:$(".accomodation-budget-range-input").val(),

              },
              success:function(response){
                if(response=="success"){
                  sessionStorage.setItem("tour",JSON.stringify(data));
    
    window.location.href="/preferable-activity";
                }
              }
            });
       }
       else{
        swal({
           title: "Kindly Select At least One Accomodation",
  
         icon: "warning",
         dangerMode:true,
         button:"Close",
        });
       }
   });
   
   //end next step move to preferable activity

  });

 
</script>
@endsection


