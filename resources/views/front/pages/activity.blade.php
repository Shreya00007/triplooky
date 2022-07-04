@extends("front.layout.header")
@section("title","Activity")
@section("content")
<main id="main">
   <div id="banner">
      <div class="container-fluid bodyPad">
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
               <input type="text" id="datepicker" class="form-control" autocomplete="off" placeholder="Select a Date">
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
                       <li><a href="javascript:void(0)" style="color:black !important;font-size: 12px !important;font-weight: 600" class="activity-filter-by-category p-font"  data="{{$category->id}}">
           <div class="d-flex align-items-center">
                    <div class="mr-4"><input type="checkbox" name="category-check-box" style="width:15px;height: 15px;margin-right: 5px;"></div>
                    <div><p class="p-0 m-0 mb-2">{{$category->category_name}}</p></div>
                    
                </div>         
                </a></li>
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
            <div id="viewListing activity-box">
                 @foreach($data as $data)
               <div class="listView mb-3">
               
                  <div class="row mb-3">
                     <div class="col-md-4 col-xs-5 ">
                        <div class="imgGrid">
                           <img src="{{url('')}}/admin-asstes/images/activity_image/{{$data->activity_image}}">
                        </div>
                     </div>
                     <div class="col-md-8 col-xs-7">
                        <div class="contentGrid">
                           <div class="d-flex just">
                              <div class="gridT">
                                 <h5>{{$data->activity_name}}</h5>
                                 <label><i class="fas fa-star yellow"></i><i class="fas fa-star yellow"></i><i class="fas fa-star yellow"></i><i class="fas fa-star yellow"></i><i class="fas fa-star yellow"></i>2</label>
                              </div>
                              <div class="deGrid text-right">
                                 <p class="small">From</p>
                                 <h6>mad {{$data->price}}</h6>
                                 <p class="small">Price varies by</p>
                                 <p class="small">group size</p>
                              </div>
                           </div>
                           <div class="abc">
                              <p>{!! $data->overview !!}Read More</p>
                              <span>2 hours</span> <span class="mdi">English</span> <span>Free Cancellation</span>
                           </div>
                        </div>
                     </div>
                  </div>
               
               </div>
                 @endforeach
              
               
               
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