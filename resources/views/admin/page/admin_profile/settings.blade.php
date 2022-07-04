@extends("admin.layout.header")
@section("title","Admin Profile")
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

            {!! Session::has('msg') ? Session::get("msg") : '' !!} 

            <div class="container-fluid">

                <div class="row">

                    <div class="col-lg-6">

                        <div class="form-box">

                            <div class="form-title-wrap bg-primary">

                                <h3 class="title text-white">Profile Setting</h3>

                            </div>

                            <div class="form-content">

                                

                                

                            <form action="{{ url('admin/edit_admin_profile').'/'.Session::get('admin_id') }}" method="post" enctype="multipart/form-data">

                                @csrf

                                <div class="user-profile-action d-flex align-items-center pb-4">

                                    <div class="user-pro-img">

                                        <img src="{{url('admin-assets/images/admin_image').'/'.$checkadmin->admin_image}}" alt="">

                                    </div>

                                   

                                    

                                </div>

                                <div class="contact-form-action">

                                        <div class="row">

                                            <div class="col-lg-6 responsive-column">

                                                <div class="input-box">

                                                    <label class="label-text">Name</label>

                                                    <div class="form-group">

                                                        <span class="la la-user form-icon"></span>

                                                        <input name="name" class="form-control" type="text" value="{{$checkadmin->admin_name}}">

                                                    </div>

                                                </div>

                                            </div><!-- end col-lg-6 -->

                                            <div class="col-lg-6 responsive-column">

                                                <div class="input-box">

                                                    <label class="label-text">Email Address</label>

                                                    <div class="form-group">

                                                        <span class="la la-envelope form-icon"></span>

                                                        <input name="email" class="form-control" type="email" value="{{$checkadmin->admin_email}}">

                                                    </div>

                                                </div>

                                            </div><!-- end col-lg-6 -->

                                             <div class="col-lg-6 responsive-column">

                                                <div class="input-box">

                                                    <label class="label-text">Phone</label>

                                                    <div class="form-group">

                                                        <span class="la la-phone form-icon"></span>

                                                        <input name="mobile" class="form-control" type="text" value="{{$checkadmin->admin_mobile}}">

                                                    </div>

                                                </div>

                                            </div><!-- end col-lg-6 -->

                                            <div class="col-lg-6 responsive-column">

                                                <div class="input-box">

                                                    <label class="label-text">Address</label>

                                                    <div class="form-group">

                                                        <span class="la la-map form-icon"></span>

                                                        <input name="address" class="form-control" type="text" value="{{$checkadmin->admin_address}}">

                                                    </div>

                                                </div>

                                            </div><!-- end col-lg-6 -->

                                            <div class="col-lg-12">

                                                <div class="upload-btn-box">

                                        <div class="file-upload-wrap file-upload-wrap-2">

                                            <input type="file" name="image" class="multi file-upload-input with-preview">

                                            <span class="file-upload-text"><i class="la la-upload mr-2"></i>Upload Logo</span>

                                        </div>

                                    </div>

                                            </div><!-- end col-lg-12 -->

                                            <div class="col-lg-12">

                                                <div class="btn-box">

                                                    <button name="submit" class="theme-btn" type="submit">Save Changes</button>

                                                </div>

                                            </div><!-- end col-lg-12 -->

                                        </div><!-- end row -->

                                </div><!-- uuuuuu -->

                            </form>

                            </div>

                        </div><!-- end form-box -->

                    </div><!-- end col-lg-6 -->

                    <div class="col-lg-6">

                        <div class="form-box">

                            <div class="form-title-wrap bg-primary">

                                <h3 class="title text-white">Change Email</h3>

                            </div>

                            <div class="form-content">

                                <div class="contact-form-action">

                                    <form action="{{ url('/admin/edit_admin_email').'/'.Session::get('admin_id') }}" method="post" enctype="multipart/form-data">

                                        @csrf

                                        <div class="row">

                                            <div class="col-lg-12 responsive-column">

                                                <div class="input-box">

                                                    <label class="label-text">Current Email</label>

                                                    <div class="form-group">

                                                        <span class="la la-envelope form-icon"></span>

                                                        <input class="form-control" type="email" name="old_email" placeholder="Current email" required="">

                                                    </div>

                                                </div>

                                            </div><!-- end col-lg-12 -->

                                            <div class="col-lg-12 responsive-column">

                                                <div class="input-box">

                                                    <label class="label-text">New Email</label>

                                                    <div class="form-group">

                                                        <span class="la la-envelope form-icon"></span>

                                                        <input class="form-control" type="email" name="new_email" placeholder="New email" required="">

                                                    </div>

                                                </div>

                                            </div><!-- end col-lg-12 -->

                                            <div class="col-lg-12 responsive-column">

                                                <div class="input-box">

                                                    <label class="label-text">New Email Again</label>

                                                    <div class="form-group">

                                                        <span class="la la-envelope form-icon"></span>

                                                        <input class="form-control" type="email" name="confirm_new_email" placeholder="New email again" required="">

                                                    </div>

                                                </div>

                                            </div><!-- end col-lg-12 -->

                                             <div class="col-lg-12">

                                                 <div class="btn-box">

                                                     <button class="theme-btn" type="submit" name="submit">Change Email</button>

                                                 </div>

                                            </div><!-- end col-lg-12 -->

                                        </div><!-- end row -->

                                    </form>

                                </div>

                            </div>

                        </div><!-- end form-box -->

                    </div><!-- end col-lg-6 -->

                    <div class="col-lg-6">

                        <div class="form-box">

                            <div class="form-title-wrap bg-primary">

                                <h3 class="title text-white">Change Password</h3>

                            </div>

                            <div class="form-content">

                                <div class="contact-form-action">

                                    <form action="{{url('admin/change_admin_password/'.Session::get('admin_id'))}}" method="post">

                                        @csrf

                                        <div class="row">

                                            <div class="col-lg-6 responsive-column">

                                                <div class="input-box">

                                                    <label class="label-text">Current Password</label>

                                                    <div class="form-group">

                                                        <span class="la la-lock form-icon"></span>

                                                        <input class="form-control" type="password" name="current_password" placeholder="Current password" required="">

                                                    </div>

                                                </div>

                                            </div><!-- end col-lg-6 -->

                                            <div class="col-lg-6 responsive-column">

                                                <div class="input-box">

                                                    <label class="label-text">New Password</label>

                                                    <div class="form-group">

                                                        <span class="la la-lock form-icon"></span>

                                                        <input class="form-control" type="password" name="new_password" placeholder="New password" required="">

                                                    </div>

                                                </div>

                                            </div><!-- end col-lg-6 -->

                                            <div class="col-lg-6 responsive-column">

                                                <div class="input-box">

                                                    <label class="label-text">New Password Again</label>

                                                    <div class="form-group">

                                                        <span class="la la-lock form-icon"></span>

                                                        <input class="form-control" type="password" name="confirm_new_password" placeholder="New password again" required="">

                                                    </div>

                                                </div>

                                            </div><!-- end col-lg-6 -->

                                            <div class="col-lg-12">

                                                <div class="btn-box">

                                                    <button class="theme-btn" type="submit" name="submit">Change Password</button>

                                                </div>

                                            </div><!-- end col-lg-12 -->

                                        </div><!-- end row -->

                                    </form>

                                </div>

                            </div>

                        </div><!-- end form-box -->

                    </div><!-- end col-lg-6 -->

                    <div class="col-lg-6">

                        <div class="form-box">

                            <div class="form-title-wrap bg-primary">

                                <h3 class="title text-white">Payment Account Settings</h3>

                            </div>

                            <div class="form-content">

                                <div class="contact-form-action">

                                    <form >

                                        <div class="row">

                                            <div class="col-lg-4 col-sm-4">

                                                <div class="input-box">

                                                    <label class="label-text">Name on Card</label>

                                                    <div class="form-group">

                                                        <span class="la la-pencil form-icon"></span>

                                                        <input class="form-control" type="text" name="text" value="Amex" required="">

                                                    </div>

                                                </div>

                                            </div><!-- end col-lg-4 -->

                                            <div class="col-lg-4 col-sm-4">

                                                <div class="input-box">

                                                    <label class="label-text">Card Number</label>

                                                    <div class="form-group">

                                                        <span class="la la-pencil form-icon"></span>

                                                        <input class="form-control" type="text" name="text" value="3275476222500" required="">

                                                    </div>

                                                </div>

                                            </div><!-- end col-lg-4 -->

                                            <div class="col-lg-4 col-sm-4">

                                                <div class="input-box">

                                                    <label class="label-text">Expiry Month</label>

                                                    <div class="form-group">

                                                        <span class="la la-pencil form-icon"></span>

                                                        <input class="form-control" type="text" name="text" value="MM" required="">

                                                    </div>

                                                </div>

                                            </div><!-- end col-lg-4 -->

                                            <div class="col-lg-6 col-sm-6">

                                                <div class="input-box">

                                                    <label class="label-text">Expiry Year</label>

                                                    <div class="form-group">

                                                        <span class="la la-pencil form-icon"></span>

                                                        <input class="form-control" type="text" name="text" value="YY" required="">

                                                    </div>

                                                </div>

                                            </div><!-- end col-lg-6 -->

                                            <div class="col-lg-6 col-sm-6">

                                                <div class="input-box">

                                                    <label class="label-text">CVV</label>

                                                    <div class="form-group">

                                                        <span class="la la-pencil form-icon"></span>

                                                        <input class="form-control" type="text" name="text" value="CVV" required="">

                                                    </div>

                                                </div>

                                            </div><!-- end col-lg-6 -->

                                            <div class="col-lg-12">

                                                <div class="btn-box">

                                                    <button class="theme-btn" type="submit">Save Changes</button>

                                                </div>

                                            </div><!-- end col-lg-12 -->

                                        </div><!-- end row -->

                                    </form>

                                </div>

                            </div>

                        </div><!-- end form-box -->

                    </div><!-- end col-lg-6 -->

                </div><!-- end row -->

                

@endsection