@extends("front.layout.header")
@section("title","Hotel List")
@section("content")
<style>
   .fb-desn i{
   font-size: 44px;
    color: #4566a9;
    margin-top: 19px;
   }
   .fb-desn a i{
      color: #0E76A8;
   }

   .fb-desn h4 {
    margin-top: 17px;
    font-size: 23px;
}
.fb-share {
    background: #4566a9;
    border: none;
    border-radius: 18px;
    padding: 4px 12px;
    color: #ffffff;
    font-weight: 500;
}
.ln-share {
    background: #0E76A8;
    border: none;
    border-radius: 100px;
    padding: 4px 12px;
    color: #ffffff;
    font-weight: 500;
}
.pi-share{
   background:#E60023;
    border: none;
    border-radius: 18px;
    padding: 4px 12px;
    color: #ffffff;
    font-weight: 500;;
    border: none;
    border-radius: 18px;
    padding: 4px 12px;
    color: #ffffff;
    font-weight: 500;
}
.wp-share{
   background:#128C7E;
    border: none;
    border-radius: 18px;
    padding: 4px 12px;
    color: #ffffff;
    font-weight: 500;;
    border: none;
    border-radius: 18px;
    padding: 4px 12px;
    color: #ffffff;
    font-weight: 500;
}
.rto i{
   font-size: 1.2em;
    margin-right: 10px;
    color: #ffffff;
}
.cross button{
   float:right;
    font-size: 20px;
    margin-top: 3px;
}
</style>
<style>input#number, input#number1, input#number2{padding-left:0;}</style>
<main>
   <div class="tripHeaderTop">
      <div class="container">
         <div class="rt">
            <ul>
               <li>
                  <a class="rtLink" href="route.php">Route</a>
               </li>
               <li>
                  <a class="rtLink" href="javascript:void(0);">Day by day</a>
                  <ul class="dropdown">
                     <li><a href="timeline-route.php"><b>Timeline</b></a></li>
                     <li><a href="calender.php"><b>Calender</b></a></li>
                  </ul>
               </li>
               <li class="active">
                  <a class="rtLink" href="hotels.php">Where to Stay</a>
               </li>
               <li>
                  <a class="rtLink" href="checklist.php">Check list</a>
               </li>
               <li>
                  <a href="javascript:void(0);" class="addD dd">+ Add</a>
                  <ul class="dropdown">
                     <li><a href="add-destination.php"><b>Add Destination</b></a></li>
                     <li><a href="hotels.php"><b>Add Reservation</b></a></li>
                  </ul>
               </li>
               <li>
                  <a href="javascript:void(0);" class="sett dd"><i class="fa fa-cog"></i></a>
                  <ul class="dropdown">
                     <li><a href="checklist.php"><b>Plan Settings</b></a></li>
                     <li><a data-toggle="modal" href="#shareTrip"><b>Share Trip</b></a></li>
                     <li><a data-toggle="modal" href="#printTrip"><b>Print Trip</b></a></li>
                  </ul>
               </li>
            </ul>
         </div>
      </div>
   </div>
   	<!-- filter search form start -->
   	<div class="container">
	   	<form>
		   	<div class="filterForm">
		   		<div class="input-inline">
		   			<select class="form-control">
		   				<option value="Fes">Fes</option>
		   				<option value="New Delhi">New Delhi</option>
		   				<option value="Noida">Noida</option>
		   			</select>
		   			<div class="input-daterange">
		   				<i class="fas fa-calendar-alt"></i>
					    <input type="text" class="start-date form-control" value="" placeholder="Start Date">
					</div>
					<div class="travL">
                        <p class="txtL"><span>0</span> Travelers</p>
                        <div class="travlNo">
                            <div>
                              <span class="tb">Adult</span>
                              <span class="bt">
                                <div class="value-button" id="decrease" onclick="decreaseValue3()" value="Decrease Value">-</div>
                                  <input type="number" id="number" value="0"/>
                                <div class="value-button" id="increase" onclick="increaseValue3()" value="Increase Value">+</div>
                              </span>
                            </div>
                            <div>
                              <span class="tb">Teens</span>
                              <span class="bt">
                                <div class="value-button" id="decrease1" onclick="decreaseValue4()" value="Decrease Value">-</div>
                                  <input type="number" id="number1" value="0" />
                                <div class="value-button" id="increase1" onclick="increaseValue4()" value="Increase Value">+</div>
                              </span>
                            </div>
                            <div>
                              <span class="tb">Kids</span>
                              <span class="bt">
                                <div class="value-button" id="decrease2" onclick="decreaseValue5()" value="Decrease Value">-</div>
                                  <input type="number" id="number2" value="0" />
                                <div class="value-button" id="increase2" onclick="increaseValue5()" value="Increase Value">+</div>
                              </span>
                            </div>
                          <a href="javascript:void(0);" class="addPass">Save</a>
                        </div>
                      </div>
		   		</div>
		   		<button class="btn btn-success">Search</button>
		   	</div>
	   	</form>
   	</div>
   	<!-- End -->
   <div class="outexpert">
      <div class="container">
         <div class="dropdown dv">
            <button class="btn  dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
            </button>
            <div class="dropdown-menu sss" aria-labelledby="dropdownMenuButton">
               <a class="dropdown-item" href="#">Price low to high</a>
               <a class="dropdown-item" href="#">Price high to low</a>
               <a class="dropdown-item" href="#">Latest</a>
            </div>
         </div>
         <div class="ourexpt1">
            <div class="row">
               <div class="col-md-8 col-sm-12">
                  <div class="ourexpt-text">
                     <h4>Our expert advice on where to stay in Marrakech</h4>
                     <p>Marrakech boasts a huge number of lodgings, concentrated mostly near the medina or in the</p>
                  </div>
               </div>
               <div class="col-md-4 col-sm-12">
                  <div class="ourexpt-img">
                     <img src="{{url('')}}/assets/img/1.png">
                  </div>
                  <div class="imggtxt">
                     Personalized hotel reccomendation for first time tourist for Fes
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <section class="service-categories text-xs-center">
      <div class="container">
         <div class="row">
            <div class="col-md-3">
               <a data-toggle="modal" href="#myModal">
                  <div class="card service-card card-inverse hotel">
                     <div class="card-block">
                        <img src="{{url('')}}/assets/img/hotel_icon.png">
                     </div>
                  </div>
                  <div class="text-center">
                     <button type="button" class="btn btn-default btn-sm">Hotels</button>
                  </div>
               </a>
            </div>
            <div class="col-md-3">
               <a data-toggle="modal" href="#myModal">
                  <div class="card service-card card-inverse apt">
                     <div class="card-block">
                        <img src="{{url('')}}/assets/img/Apartment_ic.png">
                     </div>
                  </div>
                  <div class="text-center">
                     <button type="button" class="btn btn-default btn-sm">Apartment</button>
                  </div>
               </a>
            </div>
            <div class="col-md-3">
               <a data-toggle="modal" href="#myModal">
                  <div class="card service-card card-inverse ride">
                     <div class="card-block">
                        <img src="{{url('')}}/assets/img/Ride_ic.png">
                        <!--  <span class="fas fa-biking fa-3x"></span> -->
                     </div>
                  </div>
                  <div class="text-center">
                     <button type="button" class="btn btn-default btn-sm">Rides</button>
                  </div>
               </a>
            </div>
            <div class="col-md-3">
               <a data-toggle="modal" href="#myModal">
                  <div class="card service-card card-inverse guide">
                     <div class="card-block">
                        <img src="{{url('')}}/assets/img/Guide_map_ic.png">
                     </div>
                  </div>
                  <div class="text-center">
                     <button type="button" class="btn btn-default btn-sm">Guide</button>
                  </div>
               </a>
            </div>
         </div>
         <!--End Row-->
      </div>
   </section>
   <section class="mapsection">
      <div class="container">
         <div class="mapsection1">
            <div class="row">
               <div class="col-md-7">
                  <div class="textboxww">
                     <p class="alignleft bbn">Add desination to your trip</p>
                     <p class="alignright cbn ">
                     <div class="dropdown">
                        <button class="btn  dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                        Sort by
                        </button>
                        <div class="dropdown-menu svsv" aria-labelledby="dropdownMenuButton">
                           <a class="dropdown-item" href="/hotel/city/sort-by?method=price-low-to-high">Price low to high</a>
                           <a class="dropdown-item"  href="/hotel/city/sort-by?method=price-high-to-low">Price high to low</a>
                           <a class="dropdown-item"  href="/hotel/city/sort-by?method=latest">Latest</a>
                        </div>
                     </div>
                     </p>
                  </div>
                  <hr>

               @for($i=0;$i<count($data);$i++)
                 @for($j=0;$j<count($data[$i]);$j++)
                
                   <div class="mapimgsection form-group">
                     <div class="row">
                        <div class="col-md-5">
                           <div class="containerr">
                              <img src="{{url('')}}/hotels_image/images/thumb_image/{{$data[$i][$j]['thumb_image']}}">
                              <div class="contentt">
                                 <p>Deal 38% cheaper</p>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-7">
                           <div class="maptextt">
                              <div class="textboxww">
                                 <p class="alignleft">{{$data[$i][$j]['hotels_name']}}</p>
                                 <p class="alignright"><span id = "heart" href="javascript:void(0)"><i class="far fa-heart" aria-hidden="true" ></i> </span></p>
                              </div>
                              <div class="rp1">
                                 <p>{{$data[$i][$j]['hotels_name']}}</p>
                              </div>
                              <div class="ratingg d-flex">
                                 <p class="box9">9.1</p>
                                 <p class="box8">Guest rating (129 rewies)</p>
                              </div>
                              <p class="box7">Location: {{$data[$i][$j]['location']}}</p>
                              <div class="textboxww">
                                 <p class="alignleft text-danger">Only 1 room left</p>
                                 <p class="alignright hnh">Booking</p>
                              </div>
                              <div class="textboxww">
                                 <p class="alignleft">proximity 9.8</p>
                                 <a href="{{$data[$i][$j]['hotel_link']}}"><p class="alignright bbvb">₹{{$data[$i][$j]['price']}}/Night</p></a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>

                   @endfor
                   @endfor
   
  
                  
               
                  
             
               </div>
               <div class="col-md-5">
                  <div class="responsive-map">
                     <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2822.7806761080233!2d-93.29138368446431!3d44.96844997909819!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x52b32b6ee2c87c91%3A0xc20dff2748d2bd92!2sWalker+Art+Center!5e0!3m2!1sen!2sus!4v1514524647889"  allowfullscreen></iframe>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- modal -->
   <!-- Modal Open Button -->
   <!--   <a href="javascript:void(0)" id="open-btn1">
      OPEN THE MODAL
      </a>
      -->
   <!-- Modal Background and Modal -->
   
   <!-- modal section -->
   <div class="modal" id="myModal">
	<div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Filters</h4>    
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <div class="modal-body">
         <div class="modal-textt">
         <div class="row">
            <div class="col-md-4">
               <div class="textboxww">
                  <p class="alignleft text-danger">Proximity</p>
                  <p class="alignright"><i class="fas fa-question-circle"></i></p>
               </div>
               <div class="price-rrng">
                  <div class="filterContent">
                     <h3>Price</h3>
                     <div class="price-range-slider">
                        <p class="range-value">
                           <input type="text" id="amount" readonly="">
                        </p>
                        <div id="slider-range" class="range-bar ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">
                           <div class="ui-slider-range ui-corner-all ui-widget-header" style="left: 0%; width: 100%;"></div>
                           <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 0%;"></span><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 100%;"></span>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="starsss">
                  <h5>star Class</h5>
                  <i class="fas fa-star yellow"></i>
                  <i class="fas fa-star yellow"></i>
                  <i class="fas fa-star yellow"></i>
                  <i class="fas fa-star yellow"></i>
                  <i class="fas fa-star"></i>
               </div>
               <div class="starss2 mt-1">
                  <h5>Guest Rating</h5>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
               </div>
            </div>
            <div class="col-md-8">
               <h4 class="mt-1">More filter</h4>
               <div class="formm-radio">
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-check">
                        	<span>
	                           <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault1">
	                           <label class="form-check-label" for="flexCheckDefault1">
	                           24-hour front desk
	                           </label>
	                       </span>
                           <p class="ml-auto">229</p>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-check">
                        	<span>
	                           <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault2">
	                           <label class="form-check-label" for="flexCheckDefault2">
	                           business Center
	                           </label>
	                       	</span>
                           <p class="ml-auto">36</p>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-check">
                        	<span>
	                           <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault3">
	                           <label class="form-check-label" for="flexCheckDefault3">
	                           Facilities for disabled Guest
	                           </label>
	                       </span>
                           <p class="ml-auto"> 43</p>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-check">
                        	<span>
	                           <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault4">
	                           <label class="form-check-label" for="flexCheckDefault4">
	                           Fitness center
	                           </label>
	                       </span>
                           <p class="ml-auto"> 14</p>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-check">
                        	<span>
	                           <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault5">
	                           <label class="form-check-label" for="flexCheckDefault5">
	                           kitchen
	                           </label>
	                       </span>
                           <p class="ml-auto"> 69</p>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-check">
                        	<span>
	                           <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault6">
	                           <label class="form-check-label" for="flexCheckDefault6">
	                           no smoking room
	                           </label>
	                       </span>
                           <p class="ml-auto"> 272</p>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-check">
                        	<span>
	                           <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault7">
	                           <label class="form-check-label" for="flexCheckDefault7">
	                           parking
	                           </label>
	                       </span>
                           <p class="ml-auto"> 261</p>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-check">
                        	<span>
	                           <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault8">
	                           <label class="form-check-label" for="flexCheckDefault8">
	                           pet Friendly
	                           </label>
	                       </span>
                           <p class="ml-auto"> 84</p>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-check">
                        	<span>
	                           <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault9">
	                           <label class="form-check-label" for="flexCheckDefault9">
	                           restaurent
	                           </label>
	                       </span>
                           <p class="ml-auto"> 216</p>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-check">
                        	<span>
	                           <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault10">
	                           <label class="form-check-label" for="flexCheckDefault10">
	                           Swimming pool
	                           </label>
	                       </span>
                           <p class="ml-auto"> 53</p>
                        </div>
                     </div>
                  </div>
                  <hr>
                  <div class="row">
                     <h4 class="mt-1">Room Amenties</h4>
                     <div class="col-md-6">
                        <div class="form-check>
                        	<span>
	                           <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault11">
	                           <label class="form-check-label" for="flexCheckDefault11">
	                           Air conditioner
	                           </label>
	                       </span>
                           <!--   <p class="ml-auto"> 124</p> -->
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-check">
                        	<span>
	                           <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault12">
	                           <label class="form-check-label" for="flexCheckDefault12">
	                           Balcony
	                           </label>
	                       </span>
                           <!-- <p class="ml-auto"> 124</p> -->
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-check">
                        	<span>
	                           <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault13">
	                           <label class="form-check-label" for="flexCheckDefault13">
	                           coffee machine
	                           </label>
	                       </span>
                           <!-- <p class="ml-auto"> 124</p> -->
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-check">
                        	<span>
	                           <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault14">
	                           <label class="form-check-label" for="flexCheckDefault14">
	                           desk/workspace
	                           </label>
	                       </span>
                           <!--    <p class="ml-auto"> 124</p> -->
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-check">
                        	<span>
	                           <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault15">
	                           <label class="form-check-label" for="flexCheckDefault15">
	                           electric ketlle
	                           </label>
	                       </span>
                           <!--  <p class="ml-auto"> 124</p> -->
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-check">
                        	<span>
	                           <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault16">
	                           <label class="form-check-label" for="flexCheckDefault16">
	                           kitchenette
	                           </label>
	                       </span>
                           <!--  <p class="ml-auto"> 124</p> -->
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-check">
                        	<span>
	                           <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault17">
	                           <label class="form-check-label" for="flexCheckDefault17">
	                           private bathroom
	                           </label>
	                       </span>
                           <!-- <p class="ml-auto"> 124</p> -->
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-check">
                        	<span>
	                           <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault18">
	                           <label class="form-check-label" for="flexCheckDefault18">
	                           ocean view
	                           </label>
	                       </span>
                           <!--   <p class="ml-auto"> 124</p> -->
                        </div>
                     </div>
                  </div>
                  <hr>
                  <div class="row">
                     <h4 class="mt-1">Property Type</h4>
                     <div class="col-md-6">
                        <div class="form-check">
                        	<span>
	                           <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault19">
	                           <label class="form-check-label" for="flexCheckDefault19">
	                           Riads
	                           </label>
	                       </span>
                           <p class="ml-auto"> 123</p>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-check">
                        	<span>
	                           <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault20">
	                           <label class="form-check-label" for="flexCheckDefault20">
	                           hotels
	                           </label>
	                       </span>
                           <p class="ml-auto"> 31</p>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-check">
                        	<span>
	                           <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault21">
	                           <label class="form-check-label" for="flexCheckDefault21">
	                           guest house     
	                           </label>
	                       </span>
                           <p class="ml-auto"> 61</p>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-check">
                        	<span>
	                           <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault22">
	                           <label class="form-check-label" for="flexCheckDefault22">
	                           bed and breakfast
	                           </label>
	                       </span>
                           <p class="ml-auto"> 41</p>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-check">
                        	<span>
	                           <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault23">
	                           <label class="form-check-label" for="flexCheckDefault23">
	                           homestays
	                           </label>
	                       </span>
                           <p class="ml-auto"> 10</p>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-check">
                        	<span>
	                           <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault24">
	                           <label class="form-check-label" for="flexCheckDefault24">
	                           hostels
	                           </label>
	                       </span>
                           <p class="ml-auto"> 7</p>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-check">
                        	<span>
	                           <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault25">
	                           <label class="form-check-label" for="flexCheckDefault25">
	                           Apartment
	                           </label>
	                       </span>
                           <p class="ml-auto"> 55</p>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-check">
                        	<span>
	                           <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault26">
	                           <label class="form-check-label" for="flexCheckDefault26">
	                           holiday homes
	                           </label>
	                       </span>
                           <p class="ml-auto"> 10</p>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-check">
                        	<span>
	                           <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault27">
	                           <label class="form-check-label" for="flexCheckDefault27">
	                           farm stays
	                           </label>
	                       </span>
                           <p class="ml-auto"> 1</p>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-check">
                        	<span>
	                           <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault28">
	                           <label class="form-check-label" for="flexCheckDefault28">
	                           villas
	                           </label>
	                       </span>
                           <p class="ml-auto"> 2</p>
                        </div>
                     </div>
                  </div>
                  <hr>
                  <div class="row">
                     <h4 class="mt-1">Neighbours</h4>
                     <div class="col-md-6">
                        <div class="form-check">
                        	<span>
	                           <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault29">
	                           <label class="form-check-label" for="flexCheckDefault29">
	                           Fes al Bali
	                           </label>
	                       </span>
                           <p class="ml-auto"> 256</p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
        </div>
        <div class="modal-footer">
          <a href="#" data-dismiss="modal" class="btn">Close</a>
          <a href="#" class="btn btn-primary">Search</a>
        </div>
      </div>
    </div>
</div>

  <input type="hidden" value="0" id="firstV" class="add">
  <input type="hidden" value="0" id="secondV" class="add">
  <input type="hidden" value="0" id="thirdV" class="add">

   <!-- Button trigger modal -->

<!-- end modakl -->

   <!-- <p id="alertt">Thanks:please check your favourte places</p> -->
   <!-- end modalsectio -->
</main>


<!-- Modal Start Share Trip -->
<div class="modal sh" id="shareTrip" aria-modal="true" role="dialog">
   <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Share Trip</h4>    
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <div class="modal-body">
         <div class="modal-textt text-center">
            <p class="text-center">Anyone with the link can see your trip but will not see your custom events, notes, attachments and reservations</p>
            <a data-toggle="modal" href="#fbModal" class="shareIcon fb"  data-dismiss="modal">
               <i class="fab fa-facebook-square"></i>
            </a>
            <a data-toggle="modal" href="#linkedin" class="shareIcon linked" data-dismiss="modal"><i class="fab fa-linkedin"></i></a>
            <a data-toggle="modal" href="#pinterest" class="shareIcon pint" data-dismiss="modal"><i class="fab fa-pinterest-square"></i></a>
            <a data-toggle="modal" href="#whatsapp" class="shareIcon whatsapp" data-dismiss="modal"><i class="fab fa-whatsapp-square"></i></a>
         </div>
        </div>
      </div>
    </div>
</div>
<!-- Modal Close Share Trip -->
<!-- Modal Start Print Trip -->
<div class="modal" id="printTrip" aria-modal="true" role="dialog">
   <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Print Trip</h4>    
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <div class="modal-body">
         <div class="modal-textt text-center">
            <form>
               <div class="row">
                  <div class="col-md-6">
                        <div class="form-check">
                           <span>
                              <input class="form-check-input" type="checkbox" value="" checked id="flexCheckDefault1">
                              <label class="form-check-label" for="flexCheckDefault1">
                              Route
                              </label>
                          </span>
                        </div>
                  </div>
                  <div class="col-md-6">
                        <div class="form-check">
                           <span>
                              <input class="form-check-input" type="checkbox" value="" checked id="flexCheckDefault2">
                              <label class="form-check-label" for="flexCheckDefault2">
                              Timeline
                              </label>
                           </span>
                        </div>
                  </div>
                  <div class="col-md-6">
                        <div class="form-check">
                           <span>
                              <input class="form-check-input" type="checkbox" value="" checked id="flexCheckDefault3">
                              <label class="form-check-label" for="flexCheckDefault3">
                              Calendar
                              </label>
                          </span>
                        </div>
                  </div>
                  <div class="col-md-6">
                        <div class="form-check">
                           <span>
                              <input class="form-check-input" type="checkbox" value="" checked id="flexCheckDefault4">
                              <label class="form-check-label" for="flexCheckDefault4">
                              Images
                              </label>
                          </span>
                        </div>
                  </div>
                  <div class="col-md-6">
                        <div class="form-check">
                           <span>
                              <input class="form-check-input" type="checkbox" value="" checked id="flexCheckDefault5">
                              <label class="form-check-label" for="flexCheckDefault5">
                              Reservations
                              </label>
                          </span>
                        </div>
                  </div>
                  <div class="col-md-6">
                        <div class="form-check">
                           <span>
                              <input class="form-check-input" type="checkbox" value="" checked id="flexCheckDefault6">
                              <label class="form-check-label" for="flexCheckDefault6">
                              Description
                              </label>
                          </span>
                        </div>
                  </div>
                  <div class="col-md-6">
                        <div class="form-check">
                           <span>
                              <input class="form-check-input" type="checkbox" value="" checked id="flexCheckDefault7">
                              <label class="form-check-label" for="flexCheckDefault7">
                              Maps
                              </label>
                          </span>
                        </div>
                  </div>
                  <div class="col-md-6">
                        <div class="form-check">
                           <span>
                              <input class="form-check-input" type="checkbox" value="" checked id="flexCheckDefault8">
                              <label class="form-check-label" for="flexCheckDefault8">
                              Checklist
                              </label>
                          </span>
                        </div>
                  </div>
                  <div class="col-md-12 text-center mt-5">                     
                     <button type="submit" class="btn btn-success btn-circle">Print</button>
                  </div>
               </div>
            </form>
         </div>
        </div>
      </div>
    </div>
</div>
<!-- Modal Close Print Trip -->
<!-- modal for facebook -->
<div class="modal" id="fbModal" aria-modal="true" role="dialog">
   <div class="modal-dialog modal-md">
      <div class="modal-content">
         <div class="cross">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>
        <div class="modal-body">
         <div class="modal-textt text-center">
            <div class="fb-desn">
            <i class="fab fa-facebook-f"></i>
            <h4 style="text-transform: capitalize;">Share your trip</h4>
            <p>Anybody with access to the link can see the trip.</p>
         </div>
         <div class="rto">
           <button class="fb-share"><i class="fab fa-facebook-f"></i>Share</button>
       </div>
         </div>
        </div>
      </div>
    </div>
</div>
<!-- modal for facebook end -->
<!-- modal for linkedin -->
<div class="modal" id="linkedin" aria-modal="true" role="dialog">
   <div class="modal-dialog modal-md">
      <div class="modal-content">
          <div class="cross">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>
        <div class="modal-body">
         <div class="modal-textt text-center">
            <div class="fb-desn">
               <a href="javascript:void(0);" class="linked"><i class="fab fa-linkedin-in"></i></a>
               <h4>Share your trip</h4>
               <p>Anybody with access to the link can see the trip.</p>
            </div>
            <div class="rto">
           <button class="ln-share"><i class="fab fa-linkedin-in"></i>Share</button>
       </div>
         </div>
        </div>
      </div>
    </div>
</div>
<!-- modal for linkedin end -->
<!-- modal for pinterest -->
<div class="modal" id="pinterest" aria-modal="true" role="dialog">
   <div class="modal-dialog modal-md">
      <div class="modal-content">
         <div class="cross">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>
        <div class="modal-body">
         <div class="modal-textt text-center">
            <div class="fb-desn">
            <i class="fab fa-pinterest-p" style="color: #E60023"></i>
            <h4 style="text-transform: capitalize;">Share your trip</h4>
            <p>Anybody with access to the link can see the trip.</p>
         </div>
         <div class="rto">
           <button class="pi-share"><i class="fab fa-pinterest-p"></i>Share</button>
       </div>
         </div>
        </div>
      </div>
    </div>
</div>
<!-- modal for pinterest end -->
<!-- modal for whatsapp -->
<div class="modal" id="whatsapp" aria-modal="true" role="dialog">
   <div class="modal-dialog modal-md">
      <div class="modal-content">
         <div class="cross">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>
        <div class="modal-body">
         <div class="modal-textt text-center">
            <div class="fb-desn">
            <i class="fab fa-whatsapp" style="color:#128C7E "></i>
            <h4 style="text-transform: capitalize;">Share your trip</h4>
            <p>Anybody with access to the link can see the trip.</p>
         </div>
         <div class="rto">
           <button class="wp-share"><i class="fab fa-whatsapp"></i></i>Share</button>
       </div>
         </div>
        </div>
      </div>
    </div>
</div>
<script>
   // select the open-btn button
   let openBtn1 = document.getElementById('open-btn1');
   // select the modal-background
   let modalBackground1 = document.getElementById('modal-background1');
   // select the close-btn 
   let closeBtn1 = document.getElementById('close-btn1');
   
   // shows the modal when the user clicks open-btn
   openBtn1.addEventListener('click', function() {
    modalBackground1.style.display = 'block';
   });
   
   // hides the modal when the user clicks close-btn
   closeBtn1.addEventListener('click', function() {
    modalBackground1.style.display = 'none';
   });
   
   // hides the modal when the user clicks outside the modal
   window.addEventListener('click', function(event) {
    // check if the event happened on the modal-background
    if (event.target === modalBackground1) {
      // hides the modal
      modalBackground1.style.display = 'none';
    }
   });
</script>
<script>
   $(document).ready(function(){
   $("#heart")
   .click(function(){
    if($("#heart").hasClass("liked")){
      $("#heart").html('<i class="far fa-heart" aria-hidden="true"></i>');
      $("#heart").removeClass("liked");
    }else{
      $("#heart").html('<i class="fa fa-heart" aria-hidden="true"></i>');
      $("#heart").addClass("liked");
       // alert($("#alertt").html());
    }
   });
   });
   
</script>
<script>
   $(document).ready(function(){
   $("#heart3")
   .click(function(){
    if($("#heart3").hasClass("liked")){
      $("#heart3").html('<i class="far fa-heart" aria-hidden="true"></i>');
      $("#heart3").removeClass("liked");
    }else{
      $("#heart3").html('<i class="fa fa-heart" aria-hidden="true"></i>');
      $("#heart3").addClass("liked");
    }
   });
   });
   
</script>
<script>
   $(document).ready(function(){
   $("#heart2")
   .click(function(){
    if($("#heart2").hasClass("liked")){
      $("#heart2").html('<i class="far fa-heart" aria-hidden="true"></i>');
      $("#heart2").removeClass("liked");
    }else{
      $("#heart2").html('<i class="fa fa-heart" aria-hidden="true"></i>');
      $("#heart2").addClass("liked");
   
    }
   });
   });



   $('.start-date').datepicker({
  templates: {
    leftArrow: '<i class="fa fa-chevron-left"></i>',
    rightArrow: '<i class="fa fa-chevron-right"></i>'
  },
  format: "dd/mm/yyyy",
  startDate: new Date(),
  keyboardNavigation: false,
  autoclose: true,
  todayHighlight: true,
  disableTouchKeyboard: true,
  orientation: "bottom auto"
});




$('.start-date').datepicker().on("changeDate", function () {
  var startDate = $('.start-date').datepicker('getDate');
  var oneDayFromStartDate = moment(startDate).add(1, 'days').toDate();
  $('.end-date').datepicker('setStartDate', oneDayFromStartDate);
});

</script>
<script>
  function increaseValue3() {
    var value = parseInt(document.getElementById('number').value, 10);
    var hidValue = parseInt(document.getElementById('firstV').value, 10);
    value = isNaN(value) ? 0 : value;
    value++;
    hidValue = isNaN(hidValue) ? 0 : hidValue;
    hidValue++;
    document.getElementById('number').value = value;
    document.getElementById('firstV').value = hidValue;
  }

  function decreaseValue3() {
    var value = parseInt(document.getElementById('number').value, 10);
    value = isNaN(value) ? 0 : value;
    var hidValue = parseInt(document.getElementById('firstV').value, 10);
    value < 1 ? value = 1 : '';
    value--;

    hidValue = isNaN(hidValue) ? 0 : hidValue;
    hidValue--;
    document.getElementById('number').value = value;
    document.getElementById('firstV').value = value;
  }
  // 
  function increaseValue4() {
    var value = parseInt(document.getElementById('number1').value, 10);
    var hidValue = parseInt(document.getElementById('secondV').value, 10);
    value = isNaN(value) ? 0 : value;
    value++;

    hidValue = isNaN(hidValue) ? 0 : hidValue;
    hidValue++;
    document.getElementById('number1').value = value;
    document.getElementById('secondV').value = value;
  }

  function decreaseValue4() {
    var value = parseInt(document.getElementById('number1').value, 10);
    var hidValue = parseInt(document.getElementById('secondV').value, 10);
    value = isNaN(value) ? 0 : value;
    value < 1 ? value = 1 : '';
    value--;

    hidValue = isNaN(hidValue) ? 0 : hidValue;
    hidValue--;
    document.getElementById('number1').value = value;
    document.getElementById('secondV').value = value;
  }
  // 
  function increaseValue5() {
    var value = parseInt(document.getElementById('number2').value, 10);
    var hidValue = parseInt(document.getElementById('thirdV').value, 10);
    value = isNaN(value) ? 0 : value;
    value++;

    hidValue = isNaN(hidValue) ? 0 : hidValue;
    hidValue++;
    document.getElementById('number2').value = value;
    document.getElementById('thirdV').value = value;
  }

  function decreaseValue5() {
    var value = parseInt(document.getElementById('number2').value, 10);
    var hidValue = parseInt(document.getElementById('thirdV').value, 10);
    value = isNaN(value) ? 0 : value;
    value < 1 ? value = 1 : '';
    value--;


    hidValue = isNaN(hidValue) ? 0 : hidValue;
    hidValue--;
    document.getElementById('number2').value = value;
    document.getElementById('thirdV').value = value;
  }

</script>
<script>
  $('.txtL').click(function(){
    $('.travlNo').toggleClass('show');
  });
  // 


$('.addPass').click( function(){
  
  var a_value = $('#firstV').val();
  var b_value = $('#secondV').val();
  var c_value = $('#thirdV').val();
  
  $('.txtL span').text(parseInt(a_value) + parseInt(b_value)+ parseInt(c_value));
  $('.travlNo').removeClass('show');
});

  
</script>
@endsection