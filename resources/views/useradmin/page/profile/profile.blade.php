@extends("useradmin.layout.header")
@section("title","My Profile")
@section("content")
<div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="breadcrumb-content">
                            <div class="section-heading">
                                <h2 class="sec__title font-size-30 text-white">{{session()->get("user_name")}}</h2>
                            </div>
                        </div><!-- end breadcrumb-content -->
                    </div><!-- end col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="breadcrumb-list text-right">
                            <ul class="list-items">
                                <li><a href="index.html" class="text-white">Home</a></li>
                                <li>Profile</li>
                                
                            </ul>
                        </div><!-- end breadcrumb-list -->
                    </div><!-- end col-lg-6 -->
                </div><!-- end row -->
               
            </div>
        </div><!-- end dashboard-bread -->
        <div class="dashboard-main-content mt-5">
            <div class="container-fluid">
                <div class="row">
                   
                 
                    <div class="col-lg-6 mb-4">
                        <div class="card" style="border:none; box-shadow: 0px 0px 8px black;border-radius: 2px;">
                            <div class="card-header" style="background:darkblue;border-radius: 2px;">
                                <p class="p-font text-white">Personal Information</p>
                            </div>
                            <div class="card-body">
                                <form class="user-profile-update-form">
                                    
                                <div class="row mb-3">
                                    <div class="col-sm-4">
                                        <div class="profile-picture-view" style="position:relative;">
                                           @if($data->image)
                                            <img src="{{url('')}}/user/{{$data->image}}" width="100">
                                           @else
                                            <img src="{{url('')}}/dumy.png" width="100">
                                           @endif
                                                     <div><input type="file" name="user_image" style="position:absolute;top: 0;left: 0;width: 100%;height: 100%;z-index: 9999;opacity: 0;" title="Upload Profile Photo" id="user-image"></div>
                                             </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="mt-4"><label class="p-font">Name</label>
                                        <input type="text" value="{{$data->name}}" class="form-control shadow-none require" placeholder="Name" name="name"></div>
                                    </div>
                                    
                                </div>
                                <div class="row mb-2">
                                   
                                    <div class="col">
                                        <label class="p-font">Username</label>
                                        <input type="text" name="username" value="{{$data->email}}" class="form-control shadow-none require" placeholder="Username">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                   
                                    <div class="col">
                                        <label class="p-font">Email</label>
                                        <input type="text" name="email" value="{{$data->email}}" class="form-control shadow-none require" placeholder="Email">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                   
                                    <div class="col">
                                        <label class="p-font">Phone no</label>
                                        <input type="text" name="phone" value="{{$data->phone}}" class="form-control shadow-none">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                   
                                    <div class="col">
                                        <label class="p-font">Date of Birth</label>
                                        <input type="date" name="dob" value="{{$data->dob}}" class="form-control shadow-none">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                   
                                    <div class="col">
                                        <label class="p-font">Address</label>
                                       <textarea class="form-control shadow-none" name="address" >{{$data->address}}</textarea>
                                    </div>
                                </div>
                                <button class="theme-btn theme-btn1" type="submit">Save Change</button>
                                </form>
                            </div>
                        </div>
                        
                    </div><!-- end col-lg-12 -->
                    <div class="col-sm-6">
                        <div class="card" style="border:none; box-shadow: 0px 0px 8px black;border-radius: 2px !important;">
                            <div class="card-header" style="background:darkblue;border-radius: 2px !important;">
                                <p class="p-font text-white">Password Change</p>
                            </div>
                            <div class="card-body">
                                
                               <form class="password-change-form">
                                    <div class="row mb-2">
                                   
                                    <div class="col">
                                        <label class="p-font">Old password</label>
                                        <input type="text" name="oldpassword"  class="form-control shadow-none require" placeholder="Old Password">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                   
                                    <div class="col">
                                        <label class="p-font">New Password</label>
                                        <input type="text" name="newpassword"  class="form-control shadow-none require" placeholder="New Password">
                                    </div>
                                </div>
                                 <div class="row mb-4">
                                   
                                    <div class="col">
                                        <label class="p-font">Confirm New Password</label>
                                        <input type="text" name="confirm-password"  class="form-control shadow-none require" placeholder="Confirm New Password">
                                    </div>
                                </div>
                                <button class="theme-btn" type="submit">Save Change</button>
                               </form>
                              
                         
                            </div>
                        </div>
                    </div>
                   
                     
                
                    
                     <div class="col-lg-3 responsive-column--m">
                        <div class="form-box dashboard-card">




               
                            
                            
@endsection