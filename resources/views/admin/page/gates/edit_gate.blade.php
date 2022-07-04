@extends("admin.layout.header")
@section("title","Update Gates")
@section("content")
<div class="row align-items-center" >
                    <div class="col-lg-6">
                        <div class="breadcrumb-content">
                            <div class="section-heading">
                                <h2 class="sec__title font-size-30 text-white p-font">Gates Setting</h2>
                            </div>
                        </div><!-- end breadcrumb-content -->
                    </div><!-- end col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="breadcrumb-list text-right">
                            <ul class="list-items">
                                <li><a href="index.html" class="text-white p-font">Home</a></li>
                                <li class="p-font">Gates</li>
                                
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
                                    <div> <h5 class="text-white p-font"><b>Update Gates</b></h5></div>
                                    <div><span></span></div>
                                </div>
                                <div class="card-body">
                                     <form  class="update-gate-form">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$data->id}}">
                                        <div class="row">

                                            
                                           <div class="col">
                                                <div class="form-group">
                                            <label class="p-font">Type</label>
                                            <input type="text" name="type" class="form-control shadow-none rounded-0 require" placeholder="Type" value="{{$data->type}}">
                                        </div>
                                           </div>
                                           <div class="col">
                                               <div class="form-group">
                                            <label class="p-font">Room Type</label>
                                            <input type="text" name="room_type" class="form-control shadow-none rounded-0 require" placeholder="Room Type" value="{{$data->room_type}}" >
                                        </div>
                                           </div>
                                          
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                            <label class="p-font">Budget</label>
                                            <input type="number" name="budget" class="form-control shadow-none rounded-0 require" placeholder="Budget" value="{{$data->budget}}">
                                        </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                            <label class="p-font">Status</label>
                                           <select class="form-control shadow-none require" name="status">
                                               <option>Select Status</option>
                                               <option value="1" {{$data->status==1?"selected":""}}>Active</option>
                                               <option value="0" {{$data->status==0?"selected":""}}>Inactive</option>
                                           </select>
                                        </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                            <label class="p-font">Rating</label>
                                            <input type="number" name="rating" class="form-control shadow-none rounded-0 require" placeholder="Rating" value="{{$data->rating}}">
                                        </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                            <label class="p-font">Location</label>
                                            <input type="text" name="location" class="form-control shadow-none rounded-0 require" placeholder="Location" value="{{$data->location}}">
                                        </div>
                                            </div>
                                           
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Facility</label>
                                                    <div class="editor desc" data="Facility">
                                                        {!! $data->facility !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                       
                                        
                                        

                                        <div class="form-group mb-0 d-flex justify-content-between align-items-center">
                                            <button class="btn-custom p-font">Update Gates</button>
                                            <div class="alert d-flex justify-content-between align-items-center category-message"><div class="mr-5"><span></span></div>
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
<script type="text/javascript" src="{{url('')}}/admin-asstes/js/gate-js/gate.js"></script>

@endsection