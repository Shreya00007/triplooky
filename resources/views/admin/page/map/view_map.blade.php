@extends("admin.layout.header")
@section("title","View Map")
@section("content")
<div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="breadcrumb-content">
                            <div class="section-heading">
                                <h2 class="sec__title font-size-30 text-white p-font"> Map Setting</h2>
                            </div>
                        </div><!-- end breadcrumb-content -->
                    </div><!-- end col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="breadcrumb-list text-right">
                            <ul class="list-items">
                                <li><a href="index.html" class="text-white">Home</a></li>
                                <li class="p-font">Map Details</li>
                                
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
                        {!! Session::get("message")!!}
                        <div class="form-box dashboard-card" style="border:none;box-shadow: 0px 0px 5px black;border-radius: 2px;">
                            <div class="form-title-wrap d-flex justify-content-between align-items-center"  style="background: #28e5f3;border-radius: 2px;">
                               
                               <div><h3 class="title text-white p-font">Map</h3></div> 
                               @if(count($data)>0)
                               <div style="float:right !important;"><div class="">
                                @if($data[0]->status==0)
                                <a href="/admin/map-status/{{$data[0]->id}}"><button class="status-map-btn btn btn-danger p-font mr-2 shadow-none" data="{{$data[0]->id}}" status="0">Inactive</button></a>
                                @else
                                <a href="/admin/map-status/{{$data[0]->id}}"><button class="status-map-btn btn btn-success p-font mr-2 shadow-none" data="{{$data[0]->id}}" status="1">Active</button></a>
                                @endif


                                <a href="/admin/map-delete/{{$data[0]->id}}"><button class="btn btn-danger p-font shadow-none" data="{{$data[0]->id}}">Delete</button></div></div></a>
                               @endif
   
                               
                            </div>
                            <div class="form-content">
                                <div class="row">
                                    <div class="col">
                                    	 <div class="form-content">


                                 @if(count($data)>0)
                                   {!! $data[0]->map !!}
                                 @else
                                 <h1 class="p-font text-danger">Map Not Created yet</h1>

                                 @endif

                               
                           </div>
                                    </div>
                                  
                                   
                                </div><!-- end row -->
                            </div>
                        </div><!-- end form-box -->
                    </div><!-- end col-lg-12 -->
                   
                     
                
                    
                     <div class="col-lg-3 responsive-column--m">
                        <div class="form-box dashboard-card">




               
                            
                            
@endsection