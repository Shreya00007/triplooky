@extends("admin.layout.header")
@section("content")
<div class="row align-items-center" >
                    <div class="col-lg-6">
                        <div class="breadcrumb-content">
                            <div class="section-heading">
                                <h2 class="sec__title font-size-30 text-white p-font">Admin profile</h2>
                            </div>
                        </div><!-- end breadcrumb-content -->
                    </div><!-- end col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="breadcrumb-list text-right">
                            <ul class="list-items">
                                <li><a href="index.html" class="text-white p-font">Home</a></li>
                                <li class="p-font">Admin profile</li>
                                
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
                                    <div> <h4 class="text-white p-font">Admin Profile</h4></div>
                                   
                                </div>
                                <div class="card-body">
                                     <form action="/admin/profile-data" method="post" enctype="mutipart/form-data">
                                        
                                    {{ csrf_field() }}
                                         <div class="row">
                                             <div class="col-3">
                                                 <div class="" style="background-image:url({{url('')}}/dumy.png);width: 100px;height: 100px;border-radius: 50%;background-size: cover;position: relative;">
                                                     <div><input type="file" name="admin_image" style="position:absolute;top: 0;left: 0;width: 100%;height: 100%;z-index: 9999;opacity: 0;" title="Upload Admin Photo" required=""></div>
                                             </div>
                                         </div>
                                             <div class="col-9">
                                                
                                                    
                                                     <input type="text" name="name" class="form-control shadow-none" placeholder="Name" required="" >
                                                       <input type="text" name="email" class="form-control shadow-none" placeholder="Email"  required="">
                                                
                                             </div>
                                         </div>
                                         <div class="row mt-3">
                                            
                                            <div class="col">
                                                  <div class="form-group">
                                                     <label class="p-font">Password</label>
                                                     <input type="text" name="pass" class="form-control shadow-none" placeholder="Password"  required="">
                                                 </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col"><div class="form-group">
                                                <label>Company Logo</label>
                                                <input type="file" name="logo" class="form-control shadow-none" required="" >
                                            </div></div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Address</label>
                                                    <textarea class="form-control shadow-none" required="" name="address"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn-custom">Create Profile</button>
                                     </form>
                                </div>
                            </div>
                           
                        </div><!-- end form-box -->
                    </div><!-- end col-lg-12 -->
                   
                     
                
                    
                     <div class="col-lg-3 responsive-column--m">
                        <div class="form-box dashboard-card">




               
                            
                            
@endsection