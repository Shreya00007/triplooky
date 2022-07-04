@extends("admin.layout.header")
@section("title","Update Tour")
@section("content")
<div class="row align-items-center" >
                    <div class="col-lg-6">
                        <div class="breadcrumb-content">
                            <div class="section-heading">
                                <h2 class="sec__title font-size-30 text-white p-font">Tour Update Setting</h2>
                            </div>
                        </div><!-- end breadcrumb-content -->
                    </div><!-- end col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="breadcrumb-list text-right">
                            <ul class="list-items">
                                <li><a href="index.html" class="text-white p-font">Home</a></li>
                                <li class="p-font">Update Tour</li>
                                
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
                                    <div> <h4 class="text-white p-font"><b>Updated Tour</b></h4></div>
                                    <div><span></span></div>
                                </div>
                                <div class="card-body">
                                     <form class="update-tour-form">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$data->id}}">
                                        <div class="form-group">
                                            <label class="p-font">Tour Name</label>
                                            <input type="text" name="tour_name" class="form-control shadow-none rounded-0 require" placeholder="Tour Name" value="{{$data->heading}}">
                                        </div>
                                        <div class="row">
                                              <div class="col col-sm-12"><div class="form-group">
                                            <label class="p-font">Tour Photo</label>
                                            <input type="file" name="tour_image" class="form-control shadow-none rounded-0" placeholder="Tour Photo">
                                            <img src="{{url('')}}/tour/images/{{$data->image}}" width="100">
                                        </div></div>
                                        </div>
                                        <div class="row">
                                            <div class="col ">
                                        <div class="form-group">
                                              <label class="p-font">Select Category</label>
                                              <select class="form-control shadow-none p-font require category" name="category">
                                                  <option>Select Sub  Category</option>
                                                    @foreach($category as $category)
                                                       <option value="{{$category->id}}" {{$category->id==$data->category_id?'selected':''}}>{{$category->category_name}}</option>
                                                  @endforeach
                                              </select>
                                          </div>
                                    </div>
                                    <div class="col ">
                                        <div class="form-group">
                                              <label class="p-font">Select Category</label>
                                              <select class="form-control shadow-none p-font require sub-category" name="sub-category">
                                                  <option>Select Sub Category</option>

                                                  @foreach($subcategory as $subcat)
                                                  <option value="{{$subcat->id}}"  {{$subcat->id==$data->sub_category_id?'selected':''}}>{{$subcat->sub_category_name}}</option>
                                                  @endforeach
                                                   
                                              </select>
                                          </div>
                                    </div>
                                        
                                        </div>
                                       
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label class="p-font">
                                                        Region
                                                    </label>
                                                    <select class="form-control shadow-none p-font require" id="select-region" name="region">
                                                        <option>Select Region</option>
                                                        @foreach($region as $list)
                                                        <option value="{{$list->id}}" {{$list->id==$data->region_id?'selected':''}}>{{$list->region}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label class="p-font">City</label>
                                                    <select class="form-control shadow-none p-font select-activity-city require" name="city">
                                                        <option>Select City</option>
                                                        @foreach($city as $city)
                                                        <option value="{{$city->id}}" {{$city->ville==$data->city_name?'selected':''}}>{{$city->ville}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                             <div class="col">
                                          <div class="form-group">
                                              <label class="p-font">Select Language</label>
                                              <select class="form-control shadow-none p-font require" name="lang_id">
                                                  <option>Select Language</option>
                                                  @foreach($lang as $lang)
                                                   <option value="{{$lang->id}}" {{$lang->lang_name==$data->language?'selected':''}}>{{$lang->lang_name}}</option>
                                                  @endforeach
                                              </select>
                                          </div>
                                      </div>

                                        </div>
                                         <div class="row">
                                      <div class="col">
                                          <div class="form-group">
                                              <label class="p-font">Duration</label>
                                              <input type="text" name="duration" placeholder="Duration" class="form-control shadow-none require" value="{{$data->duration}}">
                                          </div>
                                      </div>
                                      <div class="col">
                                          <div class="form-group">
                                              <label class="p-font">Departure Time</label>
                                              <input type="text" name="departure_time"  class="form-control shadow-none require" placeholder="Departure Time" value="{{$data->departure_time}}">
                                          </div>
                                      </div>
                                  </div>
                                  <div  class="row">
                                      <div class="col">
                                          <div class="form-group">
                                              <label class="p-font">Mobile Voucher Accepted</label>
                                              <select name="phone_facility" class="form-control shadow-none p-font require">
                                                  <option>Mobile Voucher</option>
                                                   <option value="1" {{$data->phone_facility==1?'selected':''}}>Yes</option>
                                                  <option value="0" {{$data->phone_facility==0 ?'selected':''}}>No</option>
                                              </select>
                                          </div>
                                      </div>
                                      <div class="col">
                                           <div class="form-group">
                                              <label class="p-font">Hotels Pickup</label>
                                              <select name="hotal_pickup" class="form-control shadow-none p-font require">
                                                  <option>Hotel Pickup</option>

                                                   <option value="1" {{$data->hotel_pickup==1?'selected':''}}>Yes</option>
                                                  <option value="0" {{$data->hotel_pickup== 0 ?'selected':''}}>No</option>
                                              </select>
                                          </div>
                                      </div>
                                      <div class="col">
                                           <div class="form-group">
                                              <label class="p-font">Fare Cancellation</label>
                                              <select name="fare" class="form-control shadow-none p-font require" name="fare_cancel">
                                                  <option>Fare Cancellation</option>
                                                  <option value="1" {{$data->fare==1 ?'selected':''}}>Yes</option>
                                                  <option value="0" {{$data->fare==0 ?'selected':''}}>No</option>
                                              </select>
                                          </div>
                                      </div>
                                  </div>
                                   <div class="row">
                                      <div class="col">
                                          <div class="form-group">
                                              <label class="p-font">Price per person</label>
                                              <input type="number" name="price" class="form-control shadow-none require" placeholder="Price " value="{{$data->price}}">
                                          </div>
                                      </div>
                                      <div class="col">
                                          <div class="form-group">
                                              <label class="p-font">MRP Price per person</label>
                                              <input type="number" name="mrp" class="form-control shadow-none require" placeholder="MRP " value="{{$data->mrp}}">
                                          </div>
                                      </div>


                                      <div class="col">
                                        <label class="p-font">Is New </label>
                                         <select  class="form-control shadow-none p-font require" name="is_new">
                                                  <option>Select is new</option>
                                                  <option value="1" {{$data->is_new==1 ?'selected':''}}>Yes</option>
                                                  <option value="0" {{$data->is_new==0 ?'selected':''}}>No</option>
                                              </select>
                                      </div>

                                  </div>
                                   <div class="row">
                                      <div class="col">
                                          <div class="form-group">
                                              <label class="p-font">Departure Details</label>
                                               <div id="editor7" class="departure_details editor" data="Departure Details">
                                                   {!! $data->departure_details!!}
                                               </div>
                                          </div>
                                      </div>
                                  </div>
                                   <div class="row">
                                      <div class="col">
                                          <div class="form-group">
                                              <label class="p-font">Return Details</label>
                                             <div id="editor8" class="return_detail editor" data="Return Details">
                                                  {!! $data->return_details!!}
                                             </div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col">
                                          <div class="form-group">
                                              <label class="p-font">Cancellation Policy</label>
                                             <div id="editor9" class="cancel_policy editor" data="Cancellation Pickup">
                                                  {!! $data->cancel_policy !!}
                                             </div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="p-font">Overview</label>
                                  <div id="editor1" class="desc editor" data="Overview">
                                       {!! $data->overview!!}
                                  </div>
                                </div>
                                <div class="form-group">
                                    <label class="p-font">Highlight</label>
                                  <div id="editor2" class="highlight editor" data="Highlight">
                                       {!! $data->higlight !!}
                                  </div>
                                </div>
                                 <div class="form-group">
                                    <label class="p-font">Know More about this tour</label>
                                  <div id="editor3" class="know-more editor" data="Know More This Tour">
                                       {!! $data->know_more!!}
                                  </div>
                                </div>
                               <div class="form-group">
                                    <label class="p-font">Inclusions</label>
                                  <div id="editor4" class="inclusion editor" data="Inclusions">
                                       {!! $data->inclusion!!}
                                  </div>
                                </div>
                                          <div class="form-group">
                                    <label class="p-font">Exclusions</label>
                                  <div id="editor5" class="exclusion editor" data="Exclusions">
                                       {!! $data->exclusion !!}
                                  </div>
                                </div>
                                <div class="form-group">
                                    <label class="p-font">Additional Information</label>
                                  <div id="editor6" class="add-info editor" data="Additional Inclusions">
                                       {!! $data->additional_info !!}
                                  </div>
                                </div>

                                        <div class="form-group mb-0 d-flex justify-content-between align-items-center">
                                            <button class="btn-custom p-font">Update Tour</button>
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
<script type="text/javascript" src="{{url('')}}/admin-asstes/js/tour-js/tour.js"></script>

@endsection