@extends("admin.layout.header")
@section("title","Add Private Driver")
@section("content")
<div class="row align-items-center" >
                    <div class="col-lg-6">
                        <div class="breadcrumb-content">
                            <div class="section-heading">
                                <h2 class="sec__title font-size-30 text-white p-font">Private Driver Setting</h2>
                            </div>
                        </div><!-- end breadcrumb-content -->
                    </div><!-- end col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="breadcrumb-list text-right">
                            <ul class="list-items">
                                <li><a href="index.html" class="text-white p-font">Home</a></li>
                                <li class="p-font">Add Private Driver</li>
                                
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
                                    <div> <h4 class="text-white p-font"><b>Add New Private Driver</b></h4></div>
                                    <div><span></span></div>
                                </div>
                                <div class="card-body">
                                   
                                     <form class="private-driver-form">
                                        <div class="form-group">
                                            <label class="p-font">Driver Name</label>
                                            <input type="text" name="driver_name" class="form-control shadow-none rounded-0 require" placeholder="Driver Name">
                                        </div>
                                        <div class="row">
                                              <div class="col col-sm-12"><div class="form-group">
                                            <label class="p-font">Driver Photo</label>
                                            <input type="file" name="driver_image" class="form-control shadow-none rounded-0 require" placeholder="Driver Photo">
                                        </div></div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                        <div class="form-group">
                                              <label class="p-font">Driver Contact No</label>
                                              <input type="number" placeholder="Driver Contact No" class="form-control shadow-none require" name="contact_no">
                                          </div>
                                    </div>
                                    <div class="col ">
                                        <div class="form-group">
                                              <label class="p-font">Driver Email</label>
                                              <input type="email" name="email" placeholder="Driver Email" class="form-control shadow-none require">
                                          </div>
                                    </div>
                                   
                                        
                                        </div>
                                       
                                        <div class="row">
                                            
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label class="p-font">Region</label>
                                                    <select class="form-control shadow-none p-font select-region-of-private-driver require" name="region">
                                                        <option>Select Region</option>
                                                        @foreach($region as $list)
                                                        <option value="{{$list->id}}">{{$list->region}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                             <div class="col-3">
                                          <div class="form-group">
                                              <label class="p-font">City</label>
                                              <select class="form-control shadow-none p-font require select-city" name="city">
                                                  <option>Select City</option>
                                                
                                              </select>
                                          </div>
                                      </div>
                                       <div class="col-6">
                                        <div class="form-group">
                                            <label class="p-font">Alternate Contact no (optional)</label>
                                            <input type="text" name="alternate_no" class="form-control shadow-none " placeholder="Alternate Contact no (optional)">
                                        </div>
                                    </div>

                                        </div>
                                         <div class="row">
                                     
                                      <div class="col">
                                          <div class="form-group">
                                              <label class="p-font">Price one day</label>
                                              <input type="number" name="price"  class="form-control shadow-none require" placeholder="Price one day">
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
                                      <label class="p-font">Description About Driver</label>
                                      <div class="editor require desc" data="Description About Driver"></div>
                                  </div>
                                   
                                   
                                  
                               
                               

                                        <div class="form-group mb-0 d-flex justify-content-between align-items-center">
                                            <button class="btn-custom p-font">Create New Private Driver</button>
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
<script type="text/javascript" src="{{url('')}}/admin-asstes/js/private-driver/private_driver.js"></script>

@endsection