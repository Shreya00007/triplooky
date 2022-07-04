@extends("admin.layout.header")
@section("title","Thing to Details")
@section("content")
<div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="breadcrumb-content">
                            <div class="section-heading">
                                <h2 class="sec__title font-size-30 text-white"> Things to do Setting</h2>
                            </div>
                        </div><!-- end breadcrumb-content -->
                    </div><!-- end col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="breadcrumb-list text-right">
                            <ul class="list-items">
                                <li><a href="index.html" class="text-white">Home</a></li>
                                <li>Thing to do</li>
                                
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
                         

                          
                           
                            <div class="card" style="border:none;box-shadow: 0px 0px 5px black;">
                                <div class="card-header d-flex justify-content-between align-items-center" style="background: #28e5f3;border-radius: 2px;" >
                                    <div> <h5 class="p-font text-white">Things to do</h5></div>
                                   <a href="/admin/view-thing-to-do"> <button class="btn btn-danger">Back</button></a>
                                    
                                </div>
                                <div class="card-body p-font">
                                    <h6 class="p-font">{{$data[0]->heading}}</h6>
                                    <hr>
                                    <img src="{{url('')}}/thing-to-do/{{$data[0]->image}}" width="100%" class="mb-3">
                                    
                                    <div>
                                        <h5 class="p-font">Key Details</h5>
                                        <hr>
                                    </div>
                                    
                                    <div class="d-flex justify-content-between align-items-center pb-2 mb-3" style="border-bottom:1px dotted #ccc;">
                                        <div class="d-flex align-items-center">
                                            @if($data[0]->phone_facility==1)
                                            <i class="la la-mobile mr-2" style="color:orange;font-size: 20px;"></i><span class="p-font">Mobile Voucher Accepted</span>
                                            @else
                                            <i class="la la-mobile mr-2" style="color:orange;font-size: 20px;"></i><span class="p-font">Mobile Voucher Not Accepted</span>
                                            @endif
                                        </div>
                                        <div class="d-flex align-items-center">@if($data[0]->hotel_pickup==1)
                                            <i class="la la-car mr-2" style="color:orange;font-size: 20px;"></i><span class="p-font"> Hotel pickup Available</span>
                                            @else
                                            <i class="la la-car mr-2" style="color:orange;font-size: 20px;"></i><span class="p-font"> Hotel pickup Not Available</span>
                                            @endif</div>
                                        <div class="d-flex align-items-center">@if($data[0]->fare_cancel==1)
                                            <i class="la la-check-square mr-2" style="color:orange;font-size: 20px;"></i><span class="p-font"> Free Cancellation</span>
                                            @else
                                            <i class="la la-check-square mr-2" style="color:orange;font-size: 20px;"></i><span class="p-font">Not  Free Cancellation</span>
                                            @endif</div>
                                    </div>
                                      <div class="d-flex justify-content-between align-items-center pb-2 mb-3" style="border-bottom:1px dotted #ccc;">
                                        <div class="d-flex align-items-center">
                                            
                                            <i class="la la-clock mr-2" style="color:orange;font-size: 20px;"></i><span class="p-font"><b>Duration: </b> {{$data[0]->duration}} Hrs</span>
                                           
                                            
                                            
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <i class="la la-cog mr-2" style="color:orange;font-size: 20px;"></i><span class="p-font"><b>Language:</b> {{$data[0]->language}} </span> </div>
                                            <div></div>
                                       
                                    </div>

                                    <div class="mb-3 pb-2" style="border-bottom:1px dotted #ccc;">
                                        <span><b>Departure Time : </b>{{$data[0]->  departure_time}}</span>
                                    </div>

                                     <div class="mb-3 pb-2" style="border-bottom:1px dotted #ccc;">
                                        <span><b>Departure Details : </b>{!! $data[0]->  departure_details !!}</span>
                                    </div>
                                    <div class="mb-3 pb-2" style="border-bottom:1px dotted #ccc;">
                                        <span><b>Return Details : </b>{!! $data[0]->  return_details !!}</span>
                                    </div>
                                     <div class="mb-3 pb-2" style="border-bottom:1px dotted #ccc;">
                                        <span><b>Cancellation Policy : </b>{!! $data[0]->  cancel_policy !!}</span>
                                    </div>
                                  
                                    <div class="py-5 px-1 mb-4">
                                        {!! $data[0]->overview!!}
                                    </div>
                                       <div class="py-5 px-1 mb-4">
                                        <h4>Highlights</h4>
                                        <br>
                                        {!! $data[0]->higlight!!}
                                    </div>
                                        <div class="py-5 px-1 mb-4">
                                      
                                      
                                        {!! $data[0]->know_more!!}
                                    </div>

                                  <div class="py-5 px-1 mb-4">
                                        <h4>Inclusions
</h4>
                                        <br>
                                        {!! $data[0]->inclusion
!!}
                                    </div>

                                     <div class="py-5 px-1 mb-4">
                                        <h4> Exclusions
</h4>
                                        <br>
                                        {!! $data[0]->exclusion
!!}
                                    </div>

                                     <div class="py-5 px-1 mb-4">
                                       
                                        <br>
                                        {!! $data[0]->additional_info
!!}
                                    </div>
                             
                                   
                                  
                                  
                                </div>
                            </div>
                           
                        </div><!-- end form-box -->
                    </div><!-- end col-lg-12 -->
                   
                     
                
                    
                     <div class="col-lg-3 responsive-column--m">
                        <div class="form-box dashboard-card">




               
                            
                            
@endsection