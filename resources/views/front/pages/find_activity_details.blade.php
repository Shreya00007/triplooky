@extends("front.layout.header")
@section("title","Activity Details")
@section("content")
<div class="container-fluid bodyPad mb-5 mt-4">
   <div class="mb-3 d-flex justify-content-between align-items-center">
      <div class="d-flex" style="font-size:12px;"><a href="/">Home</a>><a href="">Tour</a>><a href="">{{$data->category_name}}</a><span>></span><a href="">{{$data->city_name}}</a><span>></span><a href="">{{$data->activity_name}}</a></div>
      <div style="font-size:10px;"><p class="p-font p-0 m-0">{{$data->activity_name}}-with Reviews & Ratings</p></div>
   </div>
   <div class="d-flex justify-content-between align-items-center">
      <div>
         <h4 class="p-font">{{$data->activity_name}}</h4>
      </div>
      <div>
         <div class="input-group">
            <input type="text" name="search-tour" class="form-control shadow-none rounded-0" placeholder="Search City,Thing to do & Activity">
            <div class="input-group-append">
               <button class="btn btn-info shadow-none rounded-0"><i class="fa fa-search text-white"></i></button>
            </div>
         </div>
      </div>
   </div>

   <div class="row mt-4">
      <div class="col">
         <span style="color:orange;">4.5</span>
         <i class="fa fa-star" style="color:orange"></i>
          <i class="fa fa-star" style="color:orange"></i>
           <i class="fa fa-star" style="color:orange"></i>
            <i class="fa fa-star" style="color:orange"></i>
             <i class="fa fa-star" style="color:orange"></i>
             <span class="p-font ml-3" style="margin-left:15px;color: darkblue;font-weight: 600;">5 Reviews</span>
      </div>
   </div>

   <div class="row mt-4">
      <div class="col-sm-8">
         <div class="img">
            <img src="{{url('')}}/admin-asstes/images/activity_image/{{$data->activity_image}}" width="100%">
         </div>
      </div>
      <div class="col-sm-4 pt-5" style="height: fit-content;box-shadow: 0px 0px 10px #ccc;background: white;border-top: 3px groove darkgreen;">
        <div  style="border-bottom: 1px dotted black;">
            <center>
            <p class="p-font">From</p>
            <h2 class="text-danger p-font">USD <b>{{$data->price}}</b></h2>
            <p class="p-font">Per Person</p>
         </center>
        </div>
        <br>
        <div class="pt-4 pb-5">
           <center><p class="p-font">Book this tour with</p></center>
             <br>
               <br>

           <button class="btn btn-success px-5 py-3 shadow-none w-100 mt-3"><h4 class="text-white p-0 m-0 p-font">BOOK NOW</h4></button>
        </div>

        <div class="d-flex justify-content-between align-items-center pb-2 mt-4" style="font-size:12px;">
           <div><i class="fa fa-phone"></i> +1 85511111885,8574895894</div>
         
           <div><i class="fa fa-envelope"></i> tourtriplooky@gmail.com</div>
           
        </div>
         
      </div>
   </div>
   <div class="row">
      <div class="col-sm-8">
         <br>
         <h4>Key Details</h4>
         <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="">
               <i class="fa fa-mobile text-warning"></i>
               <span class="p-font">@if($data->phone_facility==1)
                  Mobile Voucher Accepted
                  @else
                   Mobile Voucher Not Accepted
                  @endif


               </span>
            </div>
            <div>
               <i class="fa fa-car text-warning"></i>
               <span class="p-font">@if($data->phone_facility==1)
                  Hotel pickup Available
                  @else
                 Hotel pickup Not Available
                  @endif


               </span>
            </div>
            <div>
               <i class="fa fa-check-circle text-warning"></i>
               <span class="p-font">@if($data->phone_facility==1)
                  Free Cancellation
                  @else
                Not Free Cancellation
                  @endif


               </span>
            </div>
         </div>
         <div class="d-flex justify-content-between align-items-center pb-2 mb-3" style="border-bottom:1px dotted #ccc;">
                                        <div class="d-flex align-items-center">
                                            
                                            <i class="la la-clock mr-2" style="color:orange;font-size: 20px;"></i><span class="p-font"><b>Duration: </b> {{$data->duration}} Hrs</span>
                                           
                                            
                                            
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <i class="la la-cog mr-2" style="color:orange;font-size: 20px;"></i><span class="p-font"><b>Language:</b> {{$data->language}} </span> </div>
                                            <div></div>
                                       
                                    </div>
                                    <div class="mb-3 pb-2" style="border-bottom:1px dotted #ccc;">
                                        <span><b>Departure Time : </b>{{$data->  departure_time}}</span>
                                    </div>

                                     <div class="mb-3 pb-2" style="border-bottom:1px dotted #ccc;">
                                        <span><b>Departure Details : </b>{!! $data->  departure_details !!}</span>
                                    </div>
                                    <div class="mb-3 pb-2" style="border-bottom:1px dotted #ccc;">
                                        <span><b>Return Details : </b>{!! $data->  return_details !!}</span>
                                    </div>
                                     <div class="mb-3 pb-2" style="border-bottom:1px dotted #ccc;">
                                        <span><b>Cancellation Policy : </b>{!! $data->  cancel_policy !!}</span>
                                    </div>
                                  
                                    <div class="py-5 px-1 mb-4">
                                       <h4 class="p-font">Overview</h4>
                                        {!! $data->overview!!}
                                    </div>
                                       <div class="py-5 px-1 mb-4 higlight">
                                        <h4>Highlights</h4>
                                        <br>
                                        {!! $data->higlight!!}
                                    </div>
                                        <div class="py-5 px-1 mb-4">
                                      
                                      
                                        {!! $data->know_more!!}
                                    </div>

                                  <div class="py-5 px-1 mb-4 inclusion">
                                        <h4>Inclusions
</h4>
                                        <br>
                                        {!! $data->inclusion
!!}
                                    </div>

                                     <div class="py-5 px-1 mb-4 exclusion">
                                        <h4> Exclusions
</h4>
                                        <br>
                                        {!! $data->exclusion
!!}
                                    </div>

                                     <div class="py-5 px-1 mb-4 additional_info">
                                       
                                        <br>
                                        {!! $data->additional_info
!!}
                                    </div>
                             
      </div>
   </div>
</div>
<style type="text/css">
   input::placeholder{
      font-size: 11px;
      font-weight: 550;
   }
</style>


   
@endsection