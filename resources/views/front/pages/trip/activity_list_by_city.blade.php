@extends("front.layout.header")
@section("title","Activity List")
@section("content")
<main id="main">
   <div id="banner">
      <div class="container">
         <h2> Actvities</h2>
         <ul>
            <li>
               <a href="index.php" class="brdtitle">Home</a>
            </li>
            <li class="list">
           Actvities
            </li>
         </ul>
      </div>
   </div>
   <div class="container mt-5 mb-5">
      <div class="row">
         <div class="col-md-3 col-xs-12">
            <div class="dateSection">
               <h5>When are you travelling?</h5>
               <input type="text" id="datepicker" class="form-control datepicker-activity" autocomplete="off" placeholder="Select a Date">
               <!-- <input type="date" class="form-control" name="dateofbirth" id="dateofbirth"> -->
            </div>
            <div class="filterSection">
           <!--     <div class="filterContent">
                  <h3>Popular</h3>
                  <form class="popular">
                     <input type="checkbox" id="check1" name="check-1" value="Good for avoiding crowds">
                     <label for="check1">Good for avoiding crowds</label>
                     <input type="checkbox" id="check2" name="check-2" value="Taking safety measures">
                     <label for="check2">Taking safety measures</label>
                     <input type="checkbox" id="check3" name="check-3" value="Virtual experiences">
                     <label for="check3">Virtual experiences</label>
                     <input type="checkbox" id="check4" name="check-4" value="Kid friendly">
                     <label for="check4">Kid friendly</label>
                  </form>
               </div> -->
               <div class="filterContent mt-3">
                  <h3>All Morocco Sahara Tours</h3>
                  <form class="allm">
                     <ul class="accordion">
                       
                       
                      @foreach($category as $category)
                <li><a href="javascript:void(0)" style="color:black !important;font-size: 12px !important;font-weight: 600" class="trip-activity-filter-by-category p-font"  data="{{$category->id}}">
           <div class="d-flex align-items-center flex-row">
                    <div class="mr-4"><input type="checkbox" name="category-check-box" style="width:15px;height: 15px;margin-right: 5px;"></div>
                    <div><p class="p-0 m-0 mb-2">{{$category->category_name}}</p>
                     


                    </div>
                    
                </div>         
                </a>
             </li>
            
                @endforeach
                        
                           
                     </ul>
                  </form>
               </div>
               <hr />
              <div class="filterContent mt-3">
                  <form class="radio">
                     <input id="radio-1" name="radio" type="radio" checked>
                     <label for="radio-1" class="radio-label"><i class="fas fa-star yellow"></i><i class="fas fa-star yellow"></i><i class="fas fa-star yellow"></i><i class="fas fa-star yellow"></i><i class="fas fa-star yellow"></i></label>
                     <input id="radio-2" name="radio" type="radio">
                     <label for="radio-2" class="radio-label"><i class="fas fa-star yellow"></i><i class="fas fa-star yellow"></i><i class="fas fa-star yellow"></i><i class="fas fa-star yellow"></i><i class="fas fa-star yellow"></i></label>
                     <input id="radio-3" name="radio" type="radio">
                     <label for="radio-3" class="radio-label"><i class="fas fa-star yellow"></i><i class="fas fa-star yellow"></i><i class="fas fa-star yellow"></i><i class="fas fa-star yellow"></i><i class="fas fa-star yellow"></i></label>
                     <input id="radio-4" name="radio" type="radio">
                     <label for="radio-4" class="radio-label"><i class="fas fa-star yellow"></i><i class="fas fa-star yellow"></i><i class="fas fa-star yellow"></i><i class="fas fa-star yellow"></i><i class="fas fa-star yellow"></i></label>         
                     <input id="radio-5" name="radio" type="radio">
                     <label for="radio-5" class="radio-label"><i class="fas fa-star yellow"></i><i class="fas fa-star yellow"></i><i class="fas fa-star yellow"></i><i class="fas fa-star yellow"></i><i class="fas fa-star yellow"></i></label>
                  </form>
               </div>
               <hr/>
               <div class="filterContent">
                  <h3>Price</h3>
                  <div class="price-range-slider">
                     <p class="range-value">
                        <input type="text" id="amount" readonly>
                     </p>
                    <div id="slider-range" class="range-bar"></div>
                  </div>
               </div>
               <hr/>
               <div class="filterContent">
                  <h3>Duration</h3>
                  <form class="duration">
                     <input type="checkbox" id="check5" name="check-5" value="Up to 1 hour">
                     <label for="check5">Up to 1 hour</label>
                     <input type="checkbox" id="check6" name="check-6" value="1 to 4 hours">
                     <label for="check6">1 to 4 hours</label>
                     <input type="checkbox" id="check7" name="check-7" value="4 hours to 1 day">
                     <label for="check7">4 hours to 1 day</label>
                     <input type="checkbox" id="check8" name="check-8" value="1 to 3 days">
                     <label for="check8">1 to 3 days</label>
                     <input type="checkbox" id="check9" name="check-9" value="1 to 3 days">
                     <label for="check9">3+ days</label>
                  </form>
               </div>
               <hr/>
               <div class="filterContent">
                  <h3>Time of Day</h3>
                  <form class="duration">
                     <input type="checkbox" id="check10" name="check-10" value="Up to 1 hour">
                     <label for="check10">6am-12pm</label>
                     <input type="checkbox" id="check11" name="check-11" value="1 to 4 hours">
                     <label for="check11">12pm-5pm</label>
                     <input type="checkbox" id="check12" name="check-12" value="4 hours to 1 day">
                     <label for="check12">5pm-12am</label>
                  </form>
               </div>
               <hr/>
               <div class="filterContent mt-3">
                  <h3>Rating Clear</h3>
                  <form class="radio">
                     <input id="radio-6" name="radio" type="radio" checked>
                     <label for="radio-6" class="radio-label"><i class="fas fa-star yellow"></i><i class="fas fa-star yellow"></i><i class="fas fa-star yellow"></i><i class="fas fa-star yellow"></i><i class="fas fa-star yellow"></i></label><br/>
                     <input id="radio-7" name="radio" type="radio" checked>
                     <label for="radio-7" class="radio-label"><i class="fas fa-star yellow"></i><i class="fas fa-star yellow"></i><i class="fas fa-star yellow"></i><i class="fas fa-star yellow"></i><i class="fas fa-star"></i> & up</label><br/>
                     <input id="radio-8" name="radio" type="radio" checked>
                     <label for="radio-8" class="radio-label"><i class="fas fa-star yellow"></i><i class="fas fa-star yellow"></i><i class="fas fa-star yellow"></i><i class="fas fa-star"></i><i class="fas fa-star"></i> & up</label><br/>
                     <input id="radio-9" name="radio" type="radio" checked>
                     <label for="radio-9" class="radio-label"><i class="fas fa-star yellow"></i><i class="fas fa-star yellow"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i> & up</label><br/>           
                     <input id="radio-10" name="radio" type="radio" checked>
                     <label for="radio-10" class="radio-label"><i class="fas fa-star yellow"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i> & up</label>
                  </form>
               </div>
               <hr/>
               <div class="filterContent">
                  <h3>Specials</h3>
                  <form class="duration">
                     <input type="checkbox" id="check13" name="check-13" value="Deals & Discounts">
                     <label for="check13">Deals & Discounts</label>
                     <input type="checkbox" id="check14" name="check-14" value="Free Cancellation">
                     <label for="check14">Free Cancellation</label>
                     <input type="checkbox" id="check15" name="check-15" value="Deals & Discounts">
                     <label for="check15">Deals & Discounts</label>
                     <input type="checkbox" id="check16" name="check-16" value="Free Cancellatio">
                     <label for="check16">Free Cancellation</label>
                     <input type="checkbox" id="check17" name="check-17" value="Deals & Discounts">
                     <label for="check17">Deals & Discounts</label>
                     <input type="checkbox" id="check18" name="check-18" value="Free Cancellation">
                     <label for="check18">Free Cancellation</label>
                  </form>
               </div>
            </div>
         </div>
         <!-- column 9 start -->
         <div class="col-md-9 col-xs-12">
            <div class="topS d-flex just">
               <div class="totalresult">
                  4 Results
               </div>
               <div class="gridV">
                  Grid View <a href="javascript:void(0);"><i class="fas fa-th-large"></i></a>
               </div>
               <div class="listV">
                  List View <a href="javascript:void(0);"><i class="fas fa-th-list"></i></a>
               </div>
            </div>
            <hr/>
            <div class="activity-box-btn"></div>
            <div id="viewListing" class="activity-box">
               
               @for($i=0;$i<count($data);$i++)
                 @for($j=0;$j<count($data[$i]);$j++)
                 <div class="listView mb-3 ">
                  <div class="row">
                     <div class="col-md-4 col-xs-5">
                        <div class="imgGrid">
                           <img src="{{url('')}}/admin-asstes/images/activity_image/{{$data[$i][$j]['activity_image']}}">
                        </div>
                     </div>
                     <div class="col-md-8 col-xs-7">
                        <div class="contentGrid">
                           <div class="d-flex just">
                              <div class="gridT">
                                 <h5>{{$data[$i][$j]['activity_name']}}</h5>
                                 <label><i class="fas fa-star yellow"></i><i class="fas fa-star yellow"></i><i class="fas fa-star yellow"></i><i class="fas fa-star yellow"></i><i class="fas fa-star yellow"></i>2</label>
                              </div>
                              <div class="deGrid text-right">
                                 <p class="small">From</p>
                                 <h6>mad {{$data[$i][$j]['price']}}</h6>
                                 <p class="small">Price varies by</p>
                                 <p class="small">group size</p>
                              </div>
                           </div>
                           <div class="abc">
                              <p>{{Str::limit($data[$i][$j]['overview'],150,'...')}}<a href="activity?name={{$data[$i][$j]['activity_name']}}">Read More</a></p>
                              <span>2 hours</span> <span class="mdi">English</span> <span>Free Cancellation</span>

                           </div>
                           <div class="book-btn" style="float:right;">
                              <button class="shadow-none" style="border-radius:3rem;width: fit-content;height: fit-content;padding: 8px 18px; background: darkblue;color: white;border:none;outline: none;">Booking Now !</button>
                           </div>
                          <input type="hidden" value="" id="fval" />
                        </div>
                     </div>
                  </div>
                   </div>
                 @endfor
                 @endfor
                 <div class="pagination">
                  
                  
                 </div>
              
              
              
              
            </div>
            <div id="viewGrid">
               <div class="row">
                  <div class="col-md-6 col-xs-6">
                     <div class="form-group">
                        <div class="gridCard">
                           <div class="gridcardImg">
                              <img src="assets/img/1.jpg">
                           </div>
                           <div class="gridContent">
                              <h5>Private Transfer from Ouarzazate to Marrakech</h5>
                              <label><i class="fas fa-star yellow"></i><i class="fas fa-star yellow"></i><i class="fas fa-star yellow"></i><i class="fas fa-star yellow"></i><i class="fas fa-star yellow"></i>2</label>
                              <div class="deGrid text-right">
                                 <p class="small">From</p>
                                 <h6>mad 6,999.55</h6>
                                 <p class="small">Price varies by</p>
                                 <p class="small">group size</p>
                              </div>
                              <div class="abc">
                                 <p>book in advance your private transport and Enjoy a comfortable pick up transfer from your hotel in  Ouarzazate to Marrakech City or Marrakech Airport. we search all our customers in their address(Airport,Hotel,Riad...etc)...Read More</p>
                                 <span>2 hours</span> <span class="mdi">English</span> <span>Free Cancellation</span>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6 col-xs-6">
                     <div class="form-group">
                        <div class="gridCard">
                           <div class="gridcardImg">
                              <img src="assets/img/trip.jpg">
                           </div>
                           <div class="gridContent">
                              <h5>Private Transfer from Ouarzazate to Marrakech</h5>
                              <label><i class="fas fa-star yellow"></i><i class="fas fa-star yellow"></i><i class="fas fa-star yellow"></i><i class="fas fa-star yellow"></i><i class="fas fa-star yellow"></i>2</label>
                              <div class="deGrid text-right">
                                 <p class="small">From</p>
                                 <h6>mad 6,999.55</h6>
                                 <p class="small">Price varies by</p>
                                 <p class="small">group size</p>
                              </div>
                              <div class="abc">
                                 <p>book in advance your private transport and Enjoy a comfortable pick up transfer from your hotel in  Ouarzazate to Marrakech City or Marrakech Airport. we search all our customers in their address(Airport,Hotel,Riad...etc)...Read More</p>
                                 <span>2 hours</span> <span class="mdi">English</span> <span>Free Cancellation</span>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6 col-xs-6">
                     <div class="form-group">
                        <div class="gridCard">
                           <div class="gridcardImg">
                              <img src="assets/img/trip2.jpg">
                           </div>
                           <div class="gridContent">
                              <h5>Private Transfer from Ouarzazate to Marrakech</h5>
                              <label><i class="fas fa-star yellow"></i><i class="fas fa-star yellow"></i><i class="fas fa-star yellow"></i><i class="fas fa-star yellow"></i><i class="fas fa-star yellow"></i>2</label>
                              <div class="deGrid text-right">
                                 <p class="small">From</p>
                                 <h6>mad 6,999.55</h6>
                                 <p class="small">Price varies by</p>
                                 <p class="small">group size</p>
                              </div>
                              <div class="abc">
                                 <p>book in advance your private transport and Enjoy a comfortable pick up transfer from your hotel in  Ouarzazate to Marrakech City or Marrakech Airport. we search all our customers in their address(Airport,Hotel,Riad...etc)...Read More</p>
                                 <span>2 hours</span> <span class="mdi">English</span> <span>Free Cancellation</span>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6 col-xs-6">
                     <div class="form-group">
                        <div class="gridCard">
                           <div class="gridcardImg">
                              <img src="assets/img/trip4.jpg">
                           </div>
                           <div class="gridContent">
                              <h5>Private Transfer from Ouarzazate to Marrakech</h5>
                              <label><i class="fas fa-star yellow"></i><i class="fas fa-star yellow"></i><i class="fas fa-star yellow"></i><i class="fas fa-star yellow"></i><i class="fas fa-star yellow"></i>2</label>
                              <div class="deGrid text-right">
                                 <p class="small">From</p>
                                 <h6>mad 6,999.55</h6>
                                 <p class="small">Price varies by</p>
                                 <p class="small">group size</p>
                              </div>
                              <div class="abc">
                                 <p>book in advance your private transport and Enjoy a comfortable pick up transfer from your hotel in  Ouarzazate to Marrakech City or Marrakech Airport. we search all our customers in their address(Airport,Hotel,Riad...etc)...Read More</p>
                                 <span>2 hours</span> <span class="mdi">English</span> <span>Free Cancellation</span>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- column 9 close -->
      </div>
   </div>
</main>

@endsection


@section("script")
<script>
   //activity filter page coding start by category
$(document).ready(function(){

   $(".trip-activity-filter-by-category").each(function(){
      $(this).click(function(){
         
         var id=($(this).attr("data"));
         var link=$(this);
         $(".trip-activity-filter-by-category input[name=category-check-box]").each(function(){
            $(this).prop("checked",false);
         });

         $(link).find("input[type=checkbox]").prop("checked",true);
         $.ajax({
             type:"GET",
             url:"/trip/activity-filter-by-category?category="+id+"&method=category",
             beforeSend:function(){
               $("#loader-modal").modal("show");
             },
             success:function(response){
            console.log(response);


               $("#loader-modal").modal("hide");
           
             if(response.message=="success"){
               if(response.data.length>0){
                  $(".activity-box").html("");
                  var button=`<button class='shadow-none btn btn-warning mb-3 text-white trip-activity-filter-by-category-btn'>`+$(link).text()+`<i class='fa fa-close close' style='margin-left:10px'></i></button>`;
                  $(".activity-box").append(button);
                     for(i=0;i<response.data.length;i++){
                        for(j=0;j<response.data[i].length;j++){
                                 var box=`<div class="listView mb-3 ">
                  <div class="row">
                     <div class="col-md-4 col-xs-5">
                        <div class="imgGrid">
                           <img src="{{url('')}}/admin-asstes/images/activity_image/`+response.data[i][j].activity_image+`">
                        </div>
                     </div>
                     <div class="col-md-8 col-xs-7">
                        <div class="contentGrid">
                           <div class="d-flex just">
                              <div class="gridT">
                                 <h5>`+response.data[i][j].activity_name+`</h5>
                                 <label><i class="fas fa-star yellow"></i><i class="fas fa-star yellow"></i><i class="fas fa-star yellow"></i><i class="fas fa-star yellow"></i><i class="fas fa-star yellow"></i>2</label>
                              </div>
                              <div class="deGrid text-right">
                                 <p class="small">From</p>
                                 <h6>USD `+response.data[i][j].price+`</h6>
                                 <p class="small">Price varies by</p>
                                 <p class="small">group size</p>
                              </div>
                           </div>
                           <div class="abc">
                              <p>`+response.data[i][j].overview.substring(1,150)+`... <a href="">Read More</a></p>
                              <span>2 hours</span> <span class="mdi">English</span> <span>Free Cancellation</span>
                           </div>
                        </div>
                     </div>
                  </div>
                   </div>`;

                   $(".activity-box").append(box);
                        
                     }
                     }


                  $(".trip-activity-filter-by-category-btn").click(function(){
                     const urlParams = new URLSearchParams(window.location.search);
                      var activity_name = urlParams.get('activity');
                      

                     $.ajax({
                        type:"GET",
                        url:"/trip/all-activity-by-city?activity="+activity_name,
                        beforeSend:function(){
                           $("#loader-modal").modal("show");
                        },
                        success:function(response){
                           console.log(response);
                        $(link).find("input[type=checkbox]").prop("checked",false);
                           $("#loader-modal").modal("hide");
                           $(".activity-box").html("");
                           
                       for(i=0;i<response.data.length;i++){
                        for(j=0;j<response.data[i].length;j++){
                                 var box=`<div class="listView mb-3 ">
                  <div class="row">
                     <div class="col-md-4 col-xs-5">
                        <div class="imgGrid">
                           <img src="{{url('')}}/admin-asstes/images/activity_image/`+response.data[i][j].activity_image+`">
                        </div>
                     </div>
                     <div class="col-md-8 col-xs-7">
                        <div class="contentGrid">
                           <div class="d-flex just">
                              <div class="gridT">
                                 <h5>`+response.data[i][j].activity_name+`</h5>
                                 <label><i class="fas fa-star yellow"></i><i class="fas fa-star yellow"></i><i class="fas fa-star yellow"></i><i class="fas fa-star yellow"></i><i class="fas fa-star yellow"></i>2</label>
                              </div>
                              <div class="deGrid text-right">
                                 <p class="small">From</p>
                                 <h6>USD `+response.data[i][j].price+`</h6>
                                 <p class="small">Price varies by</p>
                                 <p class="small">group size</p>
                              </div>
                           </div>
                           <div class="abc">
                              <p>`+response.data[i][j].overview.substring(1,150)+`... <a href="">Read More</a></p>
                              <span>2 hours</span> <span class="mdi">English</span> <span>Free Cancellation</span>
                           </div>
                        </div>
                     </div>
                  </div>
                   </div>`;

                   $(".activity-box").append(box);
                        
                     }
                     }
                        }
                     })
                     
                  });
               }
               else{
                  $(".activity-box").html("");
                  var box=`<button class='btn btn-danger shadow-none activity-filter-by-category-btn'>`+$(link).text()+`<i class='fa fa-close close ml-2' style='margin-left:10px;'></i></button><div>

                    <br>
                   <center><h3 class='text-danger p-font'>No Any Activity in this category</h3>
       </center>
                  </div>`;

                  $(".activity-box").append(box);

                  $(".activity-filter-by-category-btn").click(function(){
                     const urlParams = new URLSearchParams(window.location.search);
                      var activity_name = urlParams.get('activity');
                     $.ajax({
                        type:"GET",
                        url:"/trip/all-activity-by-city?activity="+activity_name,
                        beforeSend:function(){
                           $("#loader-modal").modal("show");
                        },
                        success:function(response){
                           console.log(response);
                        $(link).find("input[type=checkbox]").prop("checked",false);
                           $("#loader-modal").modal("hide");
                           $(".activity-box").html("");
                           
                       for(i=0;i<response.data.length;i++){
                        for(j=0;j<response.data[i].length;j++){
                                 var box=`<div class="listView mb-3 ">
                  <div class="row">
                     <div class="col-md-4 col-xs-5">
                        <div class="imgGrid">
                           <img src="{{url('')}}/admin-asstes/images/activity_image/`+response.data[i][j].activity_image+`">
                        </div>
                     </div>
                     <div class="col-md-8 col-xs-7">
                        <div class="contentGrid">
                           <div class="d-flex just">
                              <div class="gridT">
                                 <h5>`+response.data[i][j].activity_name+`</h5>
                                 <label><i class="fas fa-star yellow"></i><i class="fas fa-star yellow"></i><i class="fas fa-star yellow"></i><i class="fas fa-star yellow"></i><i class="fas fa-star yellow"></i>2</label>
                              </div>
                              <div class="deGrid text-right">
                                 <p class="small">From</p>
                                 <h6>USD `+response.data[i][j].price+`</h6>
                                 <p class="small">Price varies by</p>
                                 <p class="small">group size</p>
                              </div>
                           </div>
                           <div class="abc">
                              <p>`+response.data[i][j].overview.substring(1,150)+`... <a href="">Read More</a></p>
                              <span>2 hours</span> <span class="mdi">English</span> <span>Free Cancellation</span>
                           </div>
                        </div>
                     </div>
                  </div>
                   </div>`;

                   $(".activity-box").append(box);
                        
                     }
                     }
                        }
                     })
                     
                  });
               }
             }
             }
         });

      });


      });
      });
         

            
                     
                
                     
         

      

      
   
//end coding of activity page category filter



//activity filter by date coding start
$(document).ready(function(){
   $(".datepicker-activity").on("change",function(){
    
    
      var date=$(this).val();
        $.ajax({
         type:"GET",
         url:"/trip/activity-filter-by-date?date="+date,
         beforeSend:function(){
            $("#loader-modal").modal("show");

         },
         success:function(response){
               $("#loader-modal").modal("hide");
                 console.log(response);
              
               if(response.data.length>0){
                  $(".activity-box").html("");
                  var button=`<button class='shadow-none btn btn-warning mb-3 text-white activity-filter-by-date-btn'>`+date+`<i class='fa fa-close close' style='margin-left:10px'></i></button>`;
                  $(".activity-box").append(button);
                         
                       for(i=0;i<response.data.length;i++){
                        for(j=0;j<response.data[i].length;j++){
                                 var box=`<div class="listView mb-3 ">
                  <div class="row">
                     <div class="col-md-4 col-xs-5">
                        <div class="imgGrid">
                           <img src="{{url('')}}/admin-asstes/images/activity_image/`+response.data[i][j].activity_image+`">
                        </div>
                     </div>
                     <div class="col-md-8 col-xs-7">
                        <div class="contentGrid">
                           <div class="d-flex just">
                              <div class="gridT">
                                 <h5>`+response.data[i][j].activity_name+`</h5>
                                 <label><i class="fas fa-star yellow"></i><i class="fas fa-star yellow"></i><i class="fas fa-star yellow"></i><i class="fas fa-star yellow"></i><i class="fas fa-star yellow"></i>2</label>
                              </div>
                              <div class="deGrid text-right">
                                 <p class="small">From</p>
                                 <h6>USD `+response.data[i][j].price+`</h6>
                                 <p class="small">Price varies by</p>
                                 <p class="small">group size</p>
                              </div>
                           </div>
                           <div class="abc">
                              <p>`+response.data[i][j].overview.substring(1,150)+`... <a href="">Read More</a></p>
                              <span>2 hours</span> <span class="mdi">English</span> <span>Free Cancellation</span>
                           </div>
                        </div>
                     </div>
                  </div>
                   </div>`;

                   $(".activity-box").append(box);
                        
                     }
                     }

                  $(".activity-filter-by-date-btn").click(function(){
                     alert();
                     $.ajax({
                        type:"GET",
                          url:"/trip/all-activity-by-city?activity="+activity_name,
                        beforeSend:function(){
                           $("#loader-modal").modal("show");
                        },
                        success:function(response){
                           $("#loader-modal").modal("hide");
                           $(".activity-box").html("");
                        
                              $(response.data).each(function(i,data){
                                 console.log(data);
                     var box=`<div class="listView mb-3 ">
                  <div class="row">
                     <div class="col-md-4 col-xs-5">
                        <div class="imgGrid">
                           <img src="admin-asstes/images/activity_image/`+data.activity_image+`">
                        </div>
                     </div>
                     <div class="col-md-8 col-xs-7">
                        <div class="contentGrid">
                           <div class="d-flex just">
                              <div class="gridT">
                                 <h5>`+data.activity_name+`</h5>
                                 <label><i class="fas fa-star yellow"></i><i class="fas fa-star yellow"></i><i class="fas fa-star yellow"></i><i class="fas fa-star yellow"></i><i class="fas fa-star yellow"></i>2</label>
                              </div>
                              <div class="deGrid text-right">
                                 <p class="small">From</p>
                                 <h6>USD `+data.price+`</h6>
                                 <p class="small">Price varies by</p>
                                 <p class="small">group size</p>
                              </div>
                           </div>
                           <div class="abc">
                              <p>`+data.overview+`Read More</p>
                              <span>2 hours</span> <span class="mdi">English</span> <span>Free Cancellation</span>
                           </div>
                        </div>
                     </div>
                  </div>
                   </div>`;

                   $(".activity-box").append(box);

                  });
                        }
                     });
                  });
               }
               else{

                  $(".activity-box").html("");
                  var box=`<button class='btn btn-danger shadow-none activity-filter-by-date-btn'>`+date+`<i class='fa fa-close close ml-2' style='margin-left:10px;'></i></button><div>

                    <br>
                   <center><h3 class='text-danger p-font'>No Any Activity Have On This Date</h3>
       </center>
                  </div>`;

                  $(".activity-box").append(box);

                  $(".activity-filter-by-date-btn").click(function(){
                     location.reload();
                     
                     
                  });
               }

         }


        });
   });
});
//end activity filter by date age codings start


//activity filter by price 

//end activity filter by price


function activity_show(link){
   $.ajax({
                        type:"GET",
                        url:"/tour/get-activity-all",
                        beforeSend:function(){
                           $("#loader-modal").modal("show");
                        },
                        success:function(response){
                           $("#loader-modal").modal("hide");
                           $(".activity-box").html("");
                        
                           $(link).find("input[type=checkbox]").prop("checked",false);
                              $(response.data).each(function(i,data){
                                 console.log(data);
                     var box=`<div class="listView mb-3 ">
                  <div class="row">
                     <div class="col-md-4 col-xs-5">
                        <div class="imgGrid">
                           <img src="admin-asstes/images/activity_image/`+data.activity_image+`">
                        </div>
                     </div>
                     <div class="col-md-8 col-xs-7">
                        <div class="contentGrid">
                           <div class="d-flex just">
                              <div class="gridT">
                                 <h5>`+data.activity_name+`</h5>
                                 <label><i class="fas fa-star yellow"></i><i class="fas fa-star yellow"></i><i class="fas fa-star yellow"></i><i class="fas fa-star yellow"></i><i class="fas fa-star yellow"></i>2</label>
                              </div>
                              <div class="deGrid text-right">
                                 <p class="small">From</p>
                                 <h6>USD `+data.price+`</h6>
                                 <p class="small">Price varies by</p>
                                 <p class="small">group size</p>
                              </div>
                           </div>
                           <div class="abc">
                              <p>`+data.overview+`Read More</p>
                              <span>2 hours</span> <span class="mdi">English</span> <span>Free Cancellation</span>
                           </div>
                        </div>
                     </div>
                  </div>
                   </div>`;

                   $(".activity-box").append(box);

                  });
                        }
                     });
}
</script>
@endsection