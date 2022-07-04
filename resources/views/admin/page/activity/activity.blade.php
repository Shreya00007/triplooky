@extends("admin.layout.header")
@section("title","Activity")
@section("content")
<div class="row align-items-center" >
                    <div class="col-lg-6">
                        <div class="breadcrumb-content">
                            <div class="section-heading">
                                <h2 class="sec__title font-size-30 text-white p-font">Activity Setting</h2>
                            </div>
                        </div><!-- end breadcrumb-content -->
                    </div><!-- end col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="breadcrumb-list text-right">
                            <ul class="list-items">
                                <li><a href="index.html" class="text-white p-font">Home</a></li>
                                <li class="p-font">Activity</li>
                                
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
                        <div class="form-box">
                            <div class="card" style="border:none;box-shadow: 0px 0px 5px black;border-radius: 2px;">
                                <div class="card-header d-flex justify-content-between align-items-center py-3" style="background: #28e5f3;border-radius: 2px;">
                                    <div> <h4 class="text-white p-font"><b>Add New Activity</b></h4></div>
                                    <div><span></span></div>
                                </div>
                                <div class="card-body">
                                     <form class="activity-form">
                                        <div class="form-group">
                                            <label class="p-font">Culture Activity Name</label>
                                            <input type="text" name="activity_name" class="form-control shadow-none rounded-0 require" placeholder="Culture Activity Name">
                                        </div>
                                        <div class="row">
                                              <div class="col col-sm-12"><div class="form-group">
                                            <label class="p-font">Culture Activity  Photo</label>
                                            <input type="file" name="activity_image" class="form-control shadow-none rounded-0 require" placeholder="Culture Activity Photo">
                                        </div></div>
                                        <div class="col col-sm-12">
                                        <div class="form-group">
                                              <label class="p-font">Select Category</label>
                                              <select class="form-control shadow-none p-font require" name="category">
                                                  <option>Select Category</option>
                                                    @foreach($category as $category)
                                                       <option>{{$category->category_name}}</option>
                                                  @endforeach
                                              </select>
                                          </div>
                                    </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="p-font">Culture Activity  Date</label>
                                            <input type="date" name="activity_date" class="form-control shadow-none rounded-0 require" placeholder="Culture Activity Date">
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label class="p-font">
                                                        Region
                                                    </label>
                                                    <select class="form-control shadow-none p-font " id="select-region" name="region">
                                                        <option>Select Region</option>
                                                        @foreach($data as $list)
                                                        <option value="{{$list->id}}">{{$list->region}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label class="p-font">City</label>
                                                    <select class="form-control shadow-none p-font select-activity-city " name="city">
                                                        <option>Select City</option>
                                                    </select>
                                                </div>
                                            </div>

                                             <div class="col">
                                          <div class="form-group">
                                              <label class="p-font">Select Language</label>
                                              <select class="form-control shadow-none p-font " name="lang_id">
                                                  <option>Select Language</option>
                                                  @foreach($lang as $lang)
                                                   <option value="{{$lang->id}}">{{$lang->lang_name}}</option>
                                                  @endforeach
                                              </select>
                                          </div>
                                      </div>

                                        </div>
                                         <div class="row">
                                      <div class="col">
                                          <div class="form-group">
                                              <label class="p-font">Duration</label>
                                              <input type="text" name="duration" placeholder="Duration" class="form-control shadow-none ">
                                          </div>
                                      </div>
                                      <div class="col">
                                          <div class="form-group">
                                              <label class="p-font">Departure Time</label>
                                              <input type="text" name="departure_time"  class="form-control shadow-none " placeholder="Departure Time">
                                          </div>
                                      </div>
                                  </div>
                                  <div  class="row">
                                      <div class="col">
                                          <div class="form-group">
                                              <label class="p-font">Mobile Voucher Accepted</label>
                                              <select name="phone_facility" class="form-control shadow-none p-font require">
                                                  <option>Mobile Voucher</option>
                                                   <option value="1">Yes</option>
                                                  <option value="0">No</option>
                                              </select>
                                          </div>
                                      </div>
                                      <div class="col">
                                           <div class="form-group">
                                              <label class="p-font">Hotels Pickup</label>
                                              <select name="hotal_pickup" class="form-control shadow-none p-font ">
                                                  <option>Hotel Pickup</option>
                                                   <option value="1">Yes</option>
                                                  <option value="0">No</option>
                                              </select>
                                          </div>
                                      </div>
                                      <div class="col">
                                           <div class="form-group">
                                              <label class="p-font">Fare Cancellation</label>
                                              <select name="fare" class="form-control shadow-none p-font " name="fare_cancel">
                                                 
                                                  <option value="1">Yes</option>
                                                  <option value="0">No</option>
                                              </select>
                                          </div>
                                      </div>
                                  </div>
                                   <div class="row">
                                      <div class="col">
                                          <div class="form-group">
                                              <label class="p-font">Price per person</label>
                                              <input type="number" name="price" class="form-control shadow-none require" placeholder="Price per person">
                                          </div>
                                      </div>
                                      <div class="col">
                                          <div class="form-group">
                                              <label class="p-font">MRP Price per person</label>
                                              <input type="number" name="mrp" class="form-control shadow-none require" placeholder="MRP ">
                                          </div>
                                      </div>


                                      <div class="col">
                                        <label class="p-font">Is New </label>
                                         <select  class="form-control shadow-none p-font " name="is_new">
                                                  <option>Select is new</option>
                                                  <option value="1">Yes</option>
                                                  <option value="0">No</option>
                                              </select>
                                      </div>

                                  </div>
                                   <div class="row">
                                      <div class="col">
                                          <div class="form-group">
                                              <label class="p-font">Departure Details</label>
                                               <div id="editor7" class="departure_details editor" data="Departure Details"></div>
                                          </div>
                                      </div>
                                  </div>
                                   <div class="row">
                                      <div class="col">
                                          <div class="form-group">
                                              <label class="p-font">Return Details</label>
                                             <div id="editor8" class="return_detail editor" data="Return Details"></div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col">
                                          <div class="form-group">
                                              <label class="p-font">Cancellation Policy</label>
                                             <div id="editor9" class="cancel_policy editor" data="Cancellation Pickup"></div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="p-font">Overview</label>
                                  <div id="editor1" class="desc editor" data="Overview"></div>
                                </div>
                                <div class="form-group">
                                    <label class="p-font">Highlight</label>
                                  <div id="editor2" class="highlight editor" data="Highlight"></div>
                                </div>
                                 <div class="form-group">
                                    <label class="p-font">Know More about this tour</label>
                                  <div id="editor3" class="know-more editor" data="Know More This Tour"></div>
                                </div>
                               <div class="form-group">
                                    <label class="p-font">Inclusions</label>
                                  <div id="editor4" class="inclusion editor" data="Inclusions"></div>
                                </div>
                                          <div class="form-group">
                                    <label class="p-font">Exclusions</label>
                                  <div id="editor5" class="exclusion editor" data="Exclusions"></div>
                                </div>
                                <div class="form-group">
                                    <label class="p-font">Additional Information</label>
                                  <div id="editor6" class="add-info editor" data="Additional Inclusions"></div>
                                </div>

                                        <div class="form-group mb-0 d-flex justify-content-between align-items-center">
                                            <button class="btn-custom p-font">Create Culture Activity</button>
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