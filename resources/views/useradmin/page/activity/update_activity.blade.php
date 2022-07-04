@extends("admin.layout.header")
@section("content")
<div class="row align-items-center" >
                    <div class="col-lg-6">
                        <div class="breadcrumb-content">
                            <div class="section-heading">
                                <h2 class="sec__title font-size-30 text-white p-font">Update Activity Setting</h2>
                            </div>
                        </div><!-- end breadcrumb-content -->
                    </div><!-- end col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="breadcrumb-list text-right">
                            <ul class="list-items">
                                <li><a href="index.html" class="text-white p-font">Home</a></li>
                                <li class="p-font">Update Activity</li>
                                
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
                                    <div> <h4 class="text-white p-font"><b>Update Activity</b></h4></div>
                                    <div><a href="/admin/view-activity">
                                        <button class="btn btn-danger shadow-none"><i class="la la-arrow-left"></i></button>
                                    </a></div>
                                </div>
                                <div class="card-body">
                                     <form class="activity-update-form" enctype="mutipart/form-data">
                                      
                                        <input type="hidden" name="id" value="{{$data->id}}">
                                        <div class="form-group">
                                            <label class="p-font">Activity Name</label>
                                            <input type="text" name="activity_name" class="form-control shadow-none rounded-0" placeholder="Culture Activity Name " value="{{$data->activity_name}}" required="">
                                        </div>
                                        <div class="form-group">
                                            <label class="p-font">Activity  Photo</label>
                                            <input type="file" name="activity_image" class="form-control shadow-none rounded-0" placeholder="Culture Activity Photo">
                                           
                                            <input type="hidden" name="old_image_path" value="{{$data->activity_image}}">
                                        </div>
                                         <img src="{{url('')}}/admin-asstes/images/activity_image/{{$data->activity_image}}" width="100">
                                        <div class="form-group">
                                            <label class="p-font">Activity  Date</label>
                                            <input type="date" name="activity_date" class="form-control shadow-none rounded-0" placeholder="Culture Activity Date" value="{{$data->activity_date}}" required="">
                                        </div>
                                         <div class="form-group">
                                            <label class="p-font">Activity Description</label>
                                           <div id="editor" class="activity" name="editor">
                                               {{$data->activity_desc}}
                                           </div>
                                        </div>

                                        <div class="form-group mb-0 d-flex justify-content-between align-items-center">
                                            <button class="btn-custom p-font">Update  Activity</button>
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