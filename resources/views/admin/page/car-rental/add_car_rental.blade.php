@extends("admin.layout.header")
@section("title","Add Car Rental")
@section("content")
<div class="row align-items-center" >
                    <div class="col-lg-6">
                        <div class="breadcrumb-content">
                            <div class="section-heading">
                                <h2 class="sec__title font-size-30 text-white p-font">Car Rental Setting</h2>
                            </div>
                        </div><!-- end breadcrumb-content -->
                    </div><!-- end col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="breadcrumb-list text-right">
                            <ul class="list-items">
                                <li><a href="index.html" class="text-white p-font">Home</a></li>
                                <li class="p-font">Add Car Rental</li>
                                
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
                                    <div> <h4 class="text-white p-font"><b>Add New Car Rental</b></h4></div>
                                    <div><span></span></div>
                                </div>
                                <div class="card-body">
                                   
                                     <form class="car-rental-form">
                                        <div class="form-group">
                                            <label class="p-font">Car No</label>
                                            <input type="text" name="car_no" class="form-control shadow-none rounded-0 require" placeholder="Car No">
                                        </div>
                                        <div class="row">
                                              <div class="col col-sm-12"><div class="form-group">
                                            <label class="p-font">Car Photo (Mulitple can select)</label>
                                            <input type="file" name="multi_image[]" class="form-control shadow-none rounded-0 require" placeholder="Appartment Photo" multiple="">
                                        </div></div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                        <div class="form-group">
                                              <label class="p-font">Car Brand</label>
                                              <input type="text" placeholder="Car Brand" class="form-control shadow-none require" name="brand">
                                          </div>
                                    </div>
                                    <div class="col ">
                                        <div class="form-group">
                                              <label class="p-font">Car Type</label>
                                             <select class="form-control shadow-none require" name="car_type">
                                                 <option>Select Car Type</option>
                                                 <option value="diesel">Diesel</option>
                                                 <option value="petrol">Petrol</option>
                                                 <option value="CNG">CNG</option>
                                             </select>
                                          </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="p-font">Car Thumbnail Photo</label>
                                            <input type="file" name="thumb_image" class="form-control shadow-none require" placeholder="Thumbnail Photo">
                                        </div>
                                    </div>
                                        
                                        </div>
                                       
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label class="p-font">
                                                        Max No People
                                                    </label>
                                                   <input type="text" name="no_of_people" class="form-control shadow-none require" placeholder="No of People">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label class="p-font">Region</label>
                                                    <select class="form-control shadow-none p-font select-region-of-car-rental require" name="region">
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
                                              <label class="p-font">Car Model</label>
                                              <input type="text" name="car_model" placeholder="Car Model" class="form-control shadow-none require">
                                          </div>
                                      </div>
                                      <div class="col">
                                          <div class="form-group">
                                              <label class="p-font">Charge one day</label>
                                              <input type="number" name="charge"  class="form-control shadow-none require" placeholder="Charge one day">
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
                                 
                                  

                                  <div class="form-group">
                                      <label class="p-font">Car Rental About Description and facility</label>
                                      <div class="editor require desc" data="Hotel Abou Description"></div>
                                  </div>
                                   
                                   
                                  
                               
                               

                                        <div class="form-group mb-0 d-flex justify-content-between align-items-center">
                                            <button class="btn-custom p-font">Create New Car</button>
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
<script type="text/javascript" src="{{url('')}}/admin-asstes/js/car-rental-js/car_rental.js"></script>

@endsection