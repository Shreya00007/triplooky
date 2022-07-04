@extends("admin.layout.header")
@section("title","Update Rides")
@section("content")
<div class="row align-items-center" >
                    <div class="col-lg-6">
                        <div class="breadcrumb-content">
                            <div class="section-heading">
                                <h2 class="sec__title font-size-30 text-white p-font">Update Rides Setting</h2>
                            </div>
                        </div><!-- end breadcrumb-content -->
                    </div><!-- end col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="breadcrumb-list text-right">
                            <ul class="list-items">
                                <li><a href="index.html" class="text-white p-font">Home</a></li>
                                <li class="p-font">Update Rides</li>
                                
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
                                <div class="card-header d-flex justify-content-between align-items-center py-3" style="background: dodgerblue;border-radius: 2px;">
                                    <div> <h4 class="text-white p-font"><b>Update Rides</b></h4></div>
                                    <div><span></span></div>
                                </div>
                                <div class="card-body">
                                   
                                     <form class="update-ride-form">
                                       <input type="hidden" name="id" value="{{$data->id}}">
                                        <div class="row">
                                            <div class="col">
                                                 <div class="form-group">
                                            <label class="p-font">Rider Name</label>
                                            <input type="text" name="rider_name" class="form-control shadow-none rounded-0 require" placeholder="Rider Name" value="{{$data->rider_name}}">
                                        </div>
                                            </div>
                                              <div class="col "><div class="form-group">
                                            <label class="p-font">Rider Photo</label>
                                            <input type="file" name="image" class="form-control shadow-none rounded-0" placeholder="Rider Photo" >
                                            <img src="{{url('')}}/Rides/image/{{$data->rider_image}}" width="100">
                                        </div></div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                        <div class="form-group">
                                              <label class="p-font">Rider Email</label>
                                              <input type="text" placeholder="Rider Email" class="form-control shadow-none require" name="rider_email" value="{{$data->rider_email}}">
                                          </div>
                                    </div>
                                    <div class="col ">
                                        <div class="form-group">
                                              <label class="p-font">Rider Contact No</label>
                                             <input type="text" name="contact_no" class="form-control shadow-none require" placeholder="Contact no" value="{{$data->rider_phone}}">
                                          </div>
                                    </div>
                                    <div class="col ">
                                        <div class="form-group">
                                              <label class="p-font">Rider Charge</label>
                                             <input type="number" name="charge" class="form-control shadow-none require" placeholder="Rider Charge" value="{{$data->charge}}">
                                          </div>
                                    </div>
                                  
                                        </div>
                                       
                                        <div class="row">
                                           
                                            <div class="col">
                                                <div class="form-group">
                                                    <label class="p-font">Region</label>
                                                    <select class="form-control shadow-none p-font select-region-of-ride require" name="region">
                                                        <option>Select Region</option>
                                                        @foreach($region as $list)
                                                        <option value="{{$list->id}}" {{$list->id==$data->region_id?"selected":""}}>{{$list->region}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                             <div class="col">
                                          <div class="form-group">
                                              <label class="p-font">City</label>
                                              <select class="form-control shadow-none p-font require select-city" name="city">
                                                  <option>Select City</option>
                                                  @foreach($city as $list1)
                                                        <option value="{{$list->id}}" {{$list1->id==$data->city_id?"selected":""}}>{{$list1->ville}}</option>
                                                        @endforeach
                                                
                                              </select>
                                          </div>
                                      </div>

                                        </div>
                                         <div class="row">
                                      <div class="col">
                                          <div class="form-group">
                                              <label class="p-font">Vehical Name</label>
                                              <input type="text" name="vehical_name" placeholder="Vehical Name" class="form-control shadow-none require" value="{{$data->vehicle_name}}">
                                          </div>
                                      </div>
                                      <div class="col">
                                          <div class="form-group">
                                              <label class="p-font">Vehical Brand</label>
                                              <input type="text" name="brand"  class="form-control shadow-none require" placeholder="Vehical Brand"  value="{{$data->vehicle_brand}}">
                                          </div>
                                      </div>
                                        
                                  </div>
                                  <div class="row"> 
                                  <div class="col">
                                          <div class="form-group">
                                              <label class="p-font">Vehical Type</label>
                                              <input type="text" name="vehical_type"  class="form-control shadow-none require" placeholder="Vehical Type"  value="{{$data->vehicle_type}}">
                                          </div>
                                      </div>
                                      <div class="col">
                                          <div class="form-group">
                                              <label class="p-font">Vehical No</label>
                                              <input type="text" name="vehile_no"  class="form-control shadow-none require" placeholder="Vehical No"  value="{{$data->vehicle_no}}"> 
                                          </div>
                                      </div>
                                  </div>

                                  <div class="row">
                                      <div class="col">
                                          <div class="form-group">
                                              <label class="p-font">Start Location</label>
                                              <input type="text" name="start_location"  class="form-control shadow-none require" placeholder="Start Location"  value="{{$data->start_location}}">
                                          </div>
                                      </div>
                                      <div class="col">
                                          <div class="form-group">
                                              <label class="p-font">End Location</label>
                                              <input type="text" name="end_location"  class="form-control shadow-none require" placeholder="End Location"  value="{{$data->end_location}}">
                                          </div>
                                      </div>
                                  </div>
                                 
                                 <div class="row">
                                      <div class="col">
                                          <div class="form-group">
                                              <label class="p-font">Start Time</label>
                                              <input type="date" name="start_time"  class="form-control shadow-none require" placeholder="Start Time"  value="{{$data->start_time}}">
                                          </div>
                                      </div>
                                      <div class="col">
                                          <div class="form-group">
                                              <label class="p-font">End Time</label>
                                              <input type="date" name="end_time"  class="form-control shadow-none require" placeholder="End Time" value="{{$data->end_time}}">
                                          </div>
                                      </div>
                                  </div>
                                 
                                   
                                   
                                  <div class="row">
                                      <div class="col">
                                          <div class="form-group">
                                              <label class="p-font">Owner Name</label>
                                              <input type="text" name="owner_name" class="form-control shadow-none require" placeholder=" Owner Name" value="{{$data->owner_name}}">
                                          </div>
                                      </div>
                                      <div class="col">
                                          <div class="form-group">
                                              <label class="p-font">Owner Contact No</label>
                                              <input type="number" name="owner_contact_no" class="form-control shadow-none require" placeholder="Owner Contact No" value="{{$data->owner_contact_no}}">
                                          </div>
                                      </div>
                                      <div class="col">
                                          <div class="form-group">
                                              <label class="p-font">Owner Email</label>
                                               <input type="email" name="owner_email" class="form-control shadow-none require" placeholder="Owner Email" value="{{$data->owner_email}}">
                                          </div>
                                      </div>
                                  </div>
                                 
                                  

                                  <div class="form-group">
                                      <label class="p-font">Rides About Description </label>
                                      <div class="editor require desc" data="Rides About Description">
                                          {!! $data->description !!}
                                      </div>
                                  </div>
                                   
                                   
                                  
                               
                               

                                        <div class="form-group mb-0 d-flex justify-content-between align-items-center">
                                            <button class="btn-custom p-font">Create New Rides</button>
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
<script type="text/javascript" src="{{url('')}}/admin-asstes/js/rides-js/ride.js"></script>

@endsection