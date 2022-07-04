@extends("admin.layout.header")
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
                                            <input type="text" name="activity_name" class="form-control shadow-none rounded-0" placeholder="Culture Activity Name">
                                        </div>
                                        <div class="form-group">
                                            <label class="p-font">Culture Activity  Photo</label>
                                            <input type="file" name="activity_image" class="form-control shadow-none rounded-0" placeholder="Culture Activity Photo">
                                        </div>
                                        <div class="form-group">
                                            <label class="p-font">Culture Activity  Date</label>
                                            <input type="date" name="activity_date" class="form-control shadow-none rounded-0" placeholder="Culture Activity Date">
                                        </div>
                                         <div class="form-group">
                                            <label class="p-font">Culture Activity Description</label>
                                           <div id="editor" class="activity"></div>
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