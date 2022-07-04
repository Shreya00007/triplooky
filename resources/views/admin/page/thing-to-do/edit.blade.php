@extends("admin.layout.header")
@section("title","Edit Thing To do")
@section("content")
<div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="breadcrumb-content">
                            <div class="section-heading">
                                <h2 class="sec__title font-size-30 text-white">Terms of uses</h2>
                            </div>
                        </div><!-- end breadcrumb-content -->
                    </div><!-- end col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="breadcrumb-list text-right">
                            <ul class="list-items">
                                <li><a href="index.html" class="text-white">Home</a></li>
                                <li>Terms of use</li>
                                
                            </ul>
                        </div><!-- end breadcrumb-list -->
                    </div><!-- end col-lg-6 -->
                </div><!-- end row -->
               
            </div>
        </div><!-- end dashboard-bread -->
        <div class="dashboard-main-content mt-5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 message"></div>
                
                    <div class="col-lg-12">
                        <div class="form-box dashboard-card" style="box-shadow: 0px 0px 5px black;border-radius: 2px;">
                            <div class="form-title-wrap d-flex justify-content-between align-items-center bg-info">
                               <div> <h3 class="title p-font text-white">Thing To Do</h3></div>
                               
                            </div>
                            <div class="form-content">
                                <div class="row">
                                    <div class="col">
                                         <div class="form-content">
                               <form class="update-thing-to-do-form">
                                <input type="hidden" name="id" value="{{$data->id}}">
                                <div class="form-group">
                                    <label class="p-font">Thing To Do Heading</label>
                                    <input type="text" name="heading" class="form-control shadow-none require" placeholder="Heading" value=" {{$data->heading}}">
                                </div>
                                <div class="row">
                                    <div class="col"><div class="form-group">
                                    <label class="p-font">Thing To Do Image</label>
                                    <input type="file" name="image" class="form-control shadow-none" placeholder="Thing To do Image">
                                    <img src="{{url('')}}/thing-to-do/{{$data->image}}" width="100">
                                </div></div>
                                    
                                </div>
                                
                                  <div class="row">
                                      
                                      <div class="col">
                                          <div class="form-group">
                                              <label class="p-font">City</label>
                                              <select class="form-control  shadow-none p-font select-city-thing-to-do" name="city">
                                                  <option value="0">Select City</option>
                                                   <option value="0">Select City</option>
                                                  @for($i=0;$i<count($city);$i++)
                                                  
                                                  <option value="{{$city[$i]['id']}}" {{$data->city_id==$city[$i]['id']?"selected":""}}>{{$city[$i]['city_name']}}</option>
                                                 

                                                  @endfor
                                              </select>
                                          </div>
                                      </div>
                                      <div class="col">
                                          <div class="form-group">
                                              <label class="p-font">Select Language</label>
                                              <select class="form-control shadow-none p-font" name="lang_id">
                                                  <option value="0">Select Language</option>
                                                  @foreach($lang as $lang)
                                                  @if($lang->lang_name==$data->language)
                                                  <option value="{{$lang->id}}" selected="">{{$lang->lang_name}}</option>
                                                  @else
                                                  <option value="{{$lang->id}}" >{{$lang->lang_name}}</option>
                                                  @endif
                                                  @endforeach
                                              </select>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col">
                                          <div class="form-group">
                                              <label class="p-font">Duration</label>
                                              <input type="text" name="duration" placeholder="Duration" class="form-control shadow-none" value="{{$data->duration}}">
                                          </div>
                                      </div>
                                      <div class="col">
                                          <div class="form-group">
                                              <label class="p-font">Departure Time</label>
                                              <input type="text" name="departure_time"  class="form-control shadow-none" placeholder="Departure Time" value="{{$data->departure_time}}">
                                          </div>
                                      </div>
                                  </div>
                                  <div  class="row">
                                      <div class="col">
                                          <div class="form-group">
                                              <label class="p-font">Mobile Voucher Accepted</label>
                                              <select name="phone_facility" class="form-control shadow-none p-font require">
                                                 
                                                 <option>Select Mobile Voucher</option>

                                                   <option value="1" {{$data->phone_facility==1  ? 'selected':''}}>Yes</option>
                                                
                                                  
                                                   <option value="0" {{$data->phone_facility==0  ? 'selected':''}}">No</option>

                                                

                                                
                                                  

                                              
                                                  
                                              </select>
                                          </div>
                                      </div>
                                      <div class="col">
                                           <div class="form-group">
                                              <label class="p-font">Hotels Pickup</label>
                                              <select name="hotal_pickup" class="form-control shadow-none p-font ">
                                                  <option>Hotel Pickup</option>
                                                   <option value="1" {{$data->hotel_pickup==1  ? 'selected':''}}>Yes</option>
                                                  <option value="0" {{$data->hotel_pickup==0  ? 'selected':''}}>No</option>
                                              </select>
                                          </div>
                                      </div>
                                      <div class="col">
                                           <div class="form-group">
                                              <label class="p-font">Fare Cancellation</label>
                                              <select name="fare" class="form-control shadow-none p-font" name="fare_cancel">
                                                  <option>Fare Cancellation</option>
                                                  <option value="1"  {{$data->fare_cancel==1  ? 'selected':''}}>Yes</option>
                                                  <option value="0" {{$data->fare_cancel==0  ? 'selected':''}}>No</option>
                                              </select>
                                          </div>
                                      </div>
                                  </div>

                                  <div class="row">
                                      <div class="col">
                                          <div class="form-group">
                                              <label class="p-font">Price per person</label>
                                              <input type="number" name="price" class="form-control shadow-none require" placeholder="Price per person" value="{{$data->price}}">
                                          </div>
                                      </div>
                                      <div class="col">
                                          <div class="form-group">
                                              <label class="p-font">MRP Price per person</label>
                                              <input type="number" name="mrp" class="form-control shadow-none require" placeholder="MRP Price per person" value="{{$data->mrp}}">
                                          </div>
                                      </div>


                                      <div class="col">
                                        <label class="p-font">Is New </label>
                                         <select  class="form-control shadow-none p-font" name="is_new">
                                                  <option>Select is new</option>
                                                   <option value="1"  {{$data->is_new==1  ? 'selected':''}}>Yes</option>
                                                  <option value="0" {{$data->is_new==0  ? 'selected':''}}>No</option>
                                              </select>
                                      </div>

                                  </div>
                                  <div class="row">
                                      <div class="col">
                                          <div class="form-group">
                                              <label class="p-font">Departure Details</label>
                                               <div id="editor7" class="departure_details editor" data="Departure Details">
                                                   {!! $data->departure_details !!}
                                               </div>
                                          </div>
                                      </div>
                                  </div>
                                   <div class="row">
                                      <div class="col">
                                          <div class="form-group">
                                              <label class="p-font">Return Details</label>
                                             <div id="editor8" class="return_detail editor" data="Return Details">
                                                 {!! $data->return_details !!}
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
                                      {!! $data->overview !!}
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
                                      {!! $data->know_more !!}
                                  </div>
                                </div>
                               <div class="form-group">
                                    <label class="p-font">Inclusions</label>
                                  <div id="editor4" class="inclusion editor" data="Inclusions">
                                      {!! $data->inclusion !!}
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
                             
                             
                               
                              
                                <div class="form-group">
                                  <Button class="btn-custom p-font">Update Things to do</Button>
                                </div>
                               </form>
                           </div>
                                    </div>
                                  
                                   
                                </div><!-- end row -->
                            </div>
                        </div><!-- end form-box -->
                    </div><!-- end col-lg-12 -->
                   
                     
                
                    
                     <div class="col-lg-3 responsive-column--m">
                        <div class="form-box dashboard-card">




            <script type="text/javascript">
        

            </script>   
                            
                            
@endsection