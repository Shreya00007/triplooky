@extends("admin.layout.header")
@section("title","Add Appartment")
@section("content")
<div class="row align-items-center" >
                    <div class="col-lg-6">
                        <div class="breadcrumb-content">
                            <div class="section-heading">
                                <h2 class="sec__title font-size-30 text-white p-font">Appartment Setting</h2>
                            </div>
                        </div><!-- end breadcrumb-content -->
                    </div><!-- end col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="breadcrumb-list text-right">
                            <ul class="list-items">
                                <li><a href="index.html" class="text-white p-font">Home</a></li>
                                <li class="p-font">Add Appartment</li>
                                
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
                                    <div> <h4 class="text-white p-font"><b>Add New Appartment</b></h4></div>
                                    <div><span></span></div>
                                </div>
                                <div class="card-body">
                                   
                                     <form class="appartment-form">
                                        <div class="form-group">
                                            <label class="p-font">Appartment Name</label>
                                            <input type="text" name="appartment_name" class="form-control shadow-none rounded-0 require" placeholder="Appartment Name">
                                        </div>
                                        <div class="row">
                                              <div class="col col-sm-12"><div class="form-group">
                                            <label class="p-font">Appartment Photo (Mulitple can select)</label>
                                            <input type="file" name="multi_image[]" class="form-control shadow-none rounded-0 require" placeholder="Appartment Photo" multiple="">
                                        </div></div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                        <div class="form-group">
                                              <label class="p-font">No of Room</label>
                                              <input type="number" placeholder="No of room" class="form-control shadow-none require" name="no_room">
                                          </div>
                                    </div>
                                    <div class="col ">
                                        <div class="form-group">
                                              <label class="p-font">No of Bed each room</label>
                                              <input type="number" name="no_bed" placeholder="No of Bed each room" class="form-control shadow-none require">
                                          </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="p-font">Appartment Thumbnail Photo</label>
                                            <input type="file" name="thumb_image" class="form-control shadow-none require" placeholder="Thumbnail Photo">
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
                                                        <option value="1">Yes</option>
                                                        <option value="0">No</option>
                                                      
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label class="p-font">Region</label>
                                                    <select class="form-control shadow-none p-font select-region-of-appartment require" name="region">
                                                        <option>Select Region</option>
                                                        @foreach($region as $list)
                                                        <option value="{{$list->id}}">{{$list->region}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                             <div class="col">
                                          <div class="form-group">
                                              <label class="p-font">City</label>
                                              <select class="form-control shadow-none p-font require select-city" name="city">
                                                  <option>Select City</option>
                                                
                                              </select>
                                          </div>
                                      </div>

                                        </div>
                                         <div class="row">
                                      <div class="col">
                                          <div class="form-group">
                                              <label class="p-font">Room Size</label>
                                              <input type="text" name="room_size" placeholder="Room Size" class="form-control shadow-none require">
                                          </div>
                                      </div>
                                      <div class="col">
                                          <div class="form-group">
                                              <label class="p-font">Price</label>
                                              <input type="number" name="price"  class="form-control shadow-none require" placeholder="Price">
                                          </div>
                                      </div>
                                  </div>
                                   <div class="row">
                                      <div class="col">
                                          <div class="form-group">
                                              <label class="p-font">Bathroom</label>
                                              <input type="number" name="bathroom" placeholder="Bathroom" class="form-control shadow-none require">
                                          </div>
                                      </div>
                                      <div class="col">
                                          <div class="form-group">
                                              <label class="p-font">Is Available</label>
                                             <select class="form-control shadow-none require" name="is_available">
                                                 <option>Select Is Available</option>
                                                 <option value="1">
                                                     Yes
                                                 </option>
                                                 <option value="0">No</option>
                                             </select>
                                          </div>
                                      </div>
                                  </div>
                                   <div class="row">
                                      <div class="col">
                                          <div class="form-group">
                                              <label class="p-font">Parking</label>
                                              <input type="text" name="parking" placeholder="Parking" class="form-control shadow-none require">
                                          </div>
                                      </div>
                                      <div class="col">
                                          <div class="form-group">
                                              <label class="p-font">Balcony</label>
                                              <input type="number" name="balcony"  class="form-control shadow-none require" placeholder="Balcony">
                                          </div>
                                      </div>
                                  </div>
                                   <div class="row">
                                      <div class="col">
                                          <div class="form-group">
                                              <label class="p-font">Age of property</label>
                                              <input type="text" name="age_of_property" placeholder="Age of property" class="form-control shadow-none require">
                                          </div>
                                      </div>
                                      <div class="col">
                                          <div class="form-group">
                                              <label class="p-font">Build up area</label>
                                              <input type="text" name="build_area"  class="form-control shadow-none require" placeholder="Build Up Area">
                                          </div>
                                      </div>
                                       <div class="col">
                                          <div class="form-group">
                                              <label class="p-font">Carpet Area</label>
                                              <input type="text" name="carpet_area"  class="form-control shadow-none require" placeholder="Carpet Area">
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col">
                                          <div class="form-group">
                                              <label class="p-font">Owner Name</label>
                                              <input type="text" name="owner_name" class="form-control shadow-none require" placeholder=" Owner Name">
                                          </div>
                                      </div>
                                      <div class="col">
                                          <div class="form-group">
                                              <label class="p-font">Owner Contact No</label>
                                              <input type="number" name="contact_no" class="form-control shadow-none require" placeholder="Owner Contact No">
                                          </div>
                                      </div>
                                      <div class="col">
                                          <div class="form-group">
                                              <label class="p-font">Owner Email</label>
                                               <input type="email" name="email" class="form-control shadow-none require" placeholder="Owner Email">
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="p-font">Security Charge</label>
                                            <input type="number" name="security_charge" class="form-control shadow-none require" placeholder="Security Charge">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="p-font">Broker Charge</label>
                                            <input type="number" name="broker_charge" class="form-control shadow-none require" placeholder="Broker Charge">
                                        </div>
                                    </div>
                                      
                                  </div>
                                  <div  class="row">
                                      <div class="col">
                                          <div class="form-group">
                                              <label class="p-font">Address</label>
                                               <textarea class="form-control shadow-none require" name="address" placeholder="Address"></textarea>
                                          </div>
                                      </div>
                                     
                                     
                                  </div>

                                  <div class="form-group">
                                      <label class="p-font">Appartment About Description and facility</label>
                                      <div class="editor require desc" data="Hotel Abou Description"></div>
                                  </div>
                                   
                                   
                                  
                               
                               

                                        <div class="form-group mb-0 d-flex justify-content-between align-items-center">
                                            <button class="btn-custom p-font">Create New Appartment</button>
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