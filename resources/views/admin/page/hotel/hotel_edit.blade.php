@extends("admin.layout.header")
@section("title","Update Hotels")
@section("content")
<div class="row align-items-center" >
                    <div class="col-lg-6">
                        <div class="breadcrumb-content">
                            <div class="section-heading">
                                <h2 class="sec__title font-size-30 text-white p-font">Update Hotel Setting</h2>
                            </div>
                        </div><!-- end breadcrumb-content -->
                    </div><!-- end col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="breadcrumb-list text-right">
                            <ul class="list-items">
                                <li><a href="index.html" class="text-white p-font">Home</a></li>
                                <li class="p-font">Update Hotel</li>
                                
                            </ul>
                        </div><!-- end breadcrumb-list -->
                    </div><!-- end col-lg-6 -->
                </div><!-- end row -->
               
            </div>
        </div><!-- end dashboard-bread -->
        <div class="dashboard-main-content mt-5">
            <div class="container-fluid">
                <div class="row">
                    
                 
                    <div class="col-lg-12">
                        <div class="message"></div>
                        <div class="form-box">
                            <div class="card" style="border:none;box-shadow: 0px 0px 5px black;border-radius: 2px;">
                                <div class="card-header d-flex justify-content-between align-items-center py-3" style="background: #28e5f3;border-radius: 2px;">
                                    <div> <h4 class="text-white p-font"><b>Update Hotels</b></h4></div>
                                    <div><span></span></div>
                                </div>
                                <div class="card-body">
                                   
                                     <form class="update-hotel-form">
                                        <input type="hidden" name="id" value="{{$data->id}}">
                                        <div class="form-group">
                                            <label class="p-font">Hotel Name</label>
                                            <input type="text" name="hotel_name" class="form-control shadow-none rounded-0 require" placeholder="Hotel Name" value="{{$data->hotels_name}}">
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                        <div class="form-group">
                                              <label class="p-font">No of Room</label>
                                              <input type="number" placeholder="No of room" class="form-control shadow-none require" name="no_room" value="{{$data->no_room}}">
                                          </div>
                                    </div>
                                    <div class="col ">
                                        <div class="form-group">
                                              <label class="p-font">No of Bed each room</label>
                                              <input type="number" name="no-of-bed" placeholder="No of Bed each room" class="form-control shadow-none require" value="{{$data->no_of_bed}}">
                                          </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="p-font">Hotel Thumbnail Photo</label>
                                            <input type="file" name="thumb_image" class="form-control shadow-none" placeholder="Thumbnail Photo">
                                            <img src="{{url('')}}/hotels_image/images/thumb_image/{{$data->thumb_image}}" width="100">
                                        </div>
                                    </div>
                                        
                                        </div>
                                       
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label class="p-font">
                                                        Television facility
                                                    </label>
                                                    <select class="form-control shadow-none p-font require" id="select-region" name="tv">
                                                        <option>Select Television facility</option>
                                                        <option value="1" {{$data->tv==1?'selected':''}}>Yes</option>
                                                        <option value="0" {{$data->tv==0?'selected':''}}>No</option>
                                                      
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label class="p-font">Region</label>
                                                    <select class="form-control shadow-none p-font select-region-of-hotel require" name="region">
                                                        <option>Select Region</option>
                                                        @foreach($region as $list)
                                                        <option value="{{$list->id}}" {{$data->region_name==$list->region?'selected':''}}>{{$list->region}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                             <div class="col">
                                          <div class="form-group">
                                              <label class="p-font">City</label>
                                              <select class="form-control shadow-none p-font require select-city" name="city">
                                                  <option>Select City</option>

                                                        @foreach($city as $city)
                                                        <option value="{{$list->id}}" {{$data->city_name==$city->ville?'selected':''}}>{{$city->ville}}</option>
                                                        @endforeach
                                                
                                              </select>
                                          </div>
                                      </div>

                                        </div>
                                         <div class="row">
                                      <div class="col">
                                          <div class="form-group">
                                              <label class="p-font">Room Size</label>
                                              <input type="text" name="room_size" placeholder="Room Size" class="form-control shadow-none require" value="{{$data->room_size}}">
                                          </div>
                                      </div>
                                      <div class="col">
                                          <div class="form-group">
                                              <label class="p-font">Price per person per Day</label>
                                              <input type="number" name="price"  class="form-control shadow-none require" placeholder="Price per person per Day" value="{{$data->price}}">
                                          </div>
                                      </div>
                                  </div>
                                  <div  class="row">
                                      <div class="col">
                                          <div class="form-group">
                                              <label class="p-font">Location</label>
                                               <textarea class="form-control shadow-none require" name="location" placeholder="Location">
                                                   {{$data->location}}
                                               </textarea>
                                          </div>
                                      </div>
                                     
                                     
                                  </div>
                                  <div class="form-group">
                                      <label class="p-font">Hotel About Description and facility</label>
                                      <div class="editor require desc" data="Hotel Abou Description">
                                          {!! $data->desc !!}
                                      </div>
                                  </div>
                                   
                                   
                                  
                               
                               

                                        <div class="form-group mb-0 d-flex justify-content-between align-items-center">
                                            <button class="btn-custom p-font">Update Hotel</button>
                                            <div class="d-none alert d-flex justify-content-between align-items-center activity-message"><div class="mr-5"><span></span></div>
                                            </div>
                                        </div>
                               
                               </form>
                                </div>
                            </div>
                           
                        </div><!-- end form-box -->
                    </div><!-- end col-lg-12 -->
                   
                     
                
                    
                     <div class="col-lg-3 responsive-column--m">
                        <div class="form-box dashboard-card">




               
                            
                            
@endsection

@section("script")
<script type="text/javascript" src="{{url('')}}/admin-asstes/js/hotel-js/hotel.js"></script>

@endsection