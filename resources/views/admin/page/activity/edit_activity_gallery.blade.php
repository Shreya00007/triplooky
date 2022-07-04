@extends("admin.layout.header")
@section("title","Edit Activity Gallery")
@section("content")
<div class="row align-items-center" >
                    <div class="col-lg-6">
                        <div class="breadcrumb-content">
                            <div class="section-heading">
                                <h2 class="sec__title font-size-30 text-white p-font">Activity Gallery Setting</h2>
                            </div>
                        </div><!-- end breadcrumb-content -->
                    </div><!-- end col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="breadcrumb-list text-right">
                            <ul class="list-items">
                                <li><a href="index.html" class="text-white p-font">Home</a></li>
                                <li class="p-font">Activity Gallery</li>
                                
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
                                <div class="card-header d-flex justify-content-between align-items-center py-3" style="background: deeppink;border-radius: 2px;">
                                    <div> <h6 class="text-white p-font"><b>Add Update  Activity Gallery Photo</b></h6></div>
                                    <div><span></span></div>
                                </div>
                                <div class="card-body">
                                     <form class="update-thing-gallery-form">
                                        <div class="form-group">
                                            @csrf
                                            <label class="p-font">Select Activity Name</label>
                                            <input type="hidden" name="id" value="{{$data->id}}">
                                            <select class="form-control shadow-none" name="activity_name" disabled>
                                                <option value="{{$activity_name->id}}">{{$activity_name->heading}}</option>
                                               
                                              
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="p-font">Thing to do Image</label>
                                            <input type="file" name="thing_image" class="form-control shadow-none" >
                                            <img src="{{url('')}}/Thing-to-do-gallery/{{$activity_name->heading}}/{{$data->image}}" width="100">
                                        </div>
                                       
                                         
                                        <div class="form-group mb-0 d-flex justify-content-between align-items-center">
                                            <button class="btn-custom p-font">Update Activity Gallery Image</button>
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