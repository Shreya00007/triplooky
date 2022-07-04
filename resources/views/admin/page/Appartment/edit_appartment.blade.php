@extends("admin.layout.header")
@section("title","Update Appartment")
@section("content")
<div class="row align-items-center" >
                    <div class="col-lg-6">
                        <div class="breadcrumb-content">
                            <div class="section-heading">
                                <h2 class="sec__title font-size-30 text-white p-font">Update Appartment Setting</h2>
                            </div>
                        </div><!-- end breadcrumb-content -->
                    </div><!-- end col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="breadcrumb-list text-right">
                            <ul class="list-items">
                                <li><a href="index.html" class="text-white p-font">Home</a></li>
                                <li class="p-font">Update Appartment</li>
                                
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
                                    <div> <h4 class="text-white p-font"><b>Update  Appartment</b></h4></div>
                                    <div><span></span></div>
                                </div>
                                <div class="card-body">
                                   
                                     <form class="update-appartment-form">
                                        <div class="form-group">
                                            <label class="p-font">Appartment Name</label>
                                            <input type="text" name="appartment_name" class="form-control shadow-none rounded-0 require" placeholder="Appartment Name" value="{{$data->appartment_name}}">
                                        </div>
                                       <input type="hidden" name="id" value="{{$data->id}}">
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
                                              <input type="number" name="no_bed" placeholder="No of Bed each room" class="form-control shadow-none require" value="{{$data->no_of_bed}}">
                                          </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="p-font">Appartment Thumbnail Photo</label>
                                            <input type="file" name="thumb_image" class="form-control shadow-none" placeholder="Thumbnail Photo">
                                            <img src="{{url('')}}/Appartment/images/thumb_image/{{$data->thumb_image}}" width="100">
                                        </div>
                                    </div>
                                        
                                        </div>
                                       
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label class="p-font">
                                                        Furnished facility
                                                    </label>
                                                    <select class="form-control shadow-none p-font require" id="select-region" name="furnished_facility">
                                                        <option>Select Furnished facility</option>
                                                        <option value="1" {{$data->furnished_facility==1?'selected':''}}>Yes</option>
                                                        <option value="0" {{$data->furnished_facility==0?'selected':''}}>No</option>
                                                      
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label class="p-font">Region</label>
                                                    <select class="form-control shadow-none p-font select-region-of-appartment require" name="region">
                                                        <option>Select Region</option>
                                                        @foreach($region as $list)
                                                        <option value="{{$list->id}}" {{$data->region_id==$list->id?'selected':''}}>{{$list->region}}</option>
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
                                                        <option value="{{$city->id}}" {{$data->city_id==$city->id?'selected':''}}>{{$city->ville}}</option>
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
                                              <label class="p-font">Price</label>
                                              <input type="number" name="price"  class="form-control shadow-none require" placeholder="Price" value="{{$data->price}}">
                                          </div>
                                      </div>
                                  </div>
                                   <div class="row">
                                      <div class="col">
                                          <div class="form-group">
                                              <label class="p-font">Bathroom</label>
                                              <input type="number" name="bathroom" placeholder="Bathroom" class="form-control shadow-none require" value="{{$data->bathroom}}">
                                          </div>
                                      </div>
                                      <div class="col">
                                          <div class="form-group">
                                              <label class="p-font">Is Available</label>
                                             <select class="form-control shadow-none require" name="is_available">
                                                 <option>Select Is Available</option>
                                                 <option value="1" {{$data->is_available==1?'selected':""}}>
                                                     Yes
                                                 </option>
                                                 <option value="0" {{$data->is_available==0?'selected':""}}>No</option>
                                             </select>
                                          </div>
                                      </div>
                                  </div>
                                   <div class="row">
                                      <div class="col">
                                          <div class="form-group">
                                              <label class="p-font">Parking</label>
                                              <input type="text" name="parking" placeholder="Parking" class="form-control shadow-none require" value="{{$data->parking}}">
                                          </div>
                                      </div>
                                      <div class="col">
                                          <div class="form-group">
                                              <label class="p-font">Balcony</label>
                                              <input type="number" name="balcony"  class="form-control shadow-none require" placeholder="Balcony" value="{{$data->balcony}}">
                                          </div>
                                      </div>
                                  </div>
                                   <div class="row">
                                      <div class="col">
                                          <div class="form-group">
                                              <label class="p-font">Age of property</label>
                                              <input type="text" name="age_of_property" placeholder="Age of property" class="form-control shadow-none require" value="{{$data->age_of_property}}">
                                          </div>
                                      </div>
                                      <div class="col">
                                          <div class="form-group">
                                              <label class="p-font">Build up area</label>
                                              <input type="text" name="build_area"  class="form-control shadow-none require" placeholder="Build Up Area" value="{{$data->build_area}}">
                                          </div>
                                      </div>
                                       <div class="col">
                                          <div class="form-group">
                                              <label class="p-font">Carpet Area</label>
                                              <input type="text" name="carpet_area"  class="form-control shadow-none require" placeholder="Carpet Area" value="{{$data->carpet_area}}">
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
                                              <input type="number" name="contact_no" class="form-control shadow-none require" placeholder="Owner Contact No" value="{{$data->owner_contact_no}}">
                                          </div>
                                      </div>
                                      <div class="col">
                                          <div class="form-group">
                                              <label class="p-font">Owner Email</label>
                                               <input type="email" name="email" class="form-control shadow-none require" placeholder="Owner Email" value="{{$data->owner_email}}">
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="p-font">Security Charge</label>
                                            <input type="number" name="security_charge" class="form-control shadow-none require" placeholder="Security Charge" value="{{$data->security_charge}}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="p-font">Broker Charge</label>
                                            <input type="number" name="broker_charge" class="form-control shadow-none require" placeholder="Broker Charge" value="{{$data->broker_charge}}">
                                        </div>
                                    </div>
                                      
                                  </div>
                                  <div  class="row">
                                      <div class="col">
                                          <div class="form-group">
                                              <label class="p-font">Address</label>
                                               <textarea class="form-control shadow-none require" name="address" placeholder="Address">
                                                   {{$data->address}}
                                               </textarea>
                                          </div>
                                      </div>
                                     
                                     
                                  </div>

                                  <div class="form-group">
                                      <label class="p-font">Appartment About Description and facility</label>
                                      <div class="editor require desc" data="Hotel Abou Description">
                                          {!! $data->description !!}
                                      </div>
                                  </div>
                                   
                                   
                                  
                               
                               

                                        <div class="form-group mb-0 d-flex justify-content-between align-items-center">
                                            <button class="btn-custom p-font">Update Appartment</button>
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
<script type="text/javascript" src="{{url('')}}/admin-asstes/js/appartment-js/appartment.js"></script>

@endsection