@extends("admin.layout.header")
@section("title","Contact us")
@section("content")

<div class="row align-items-center">

                    <div class="col-lg-6">

                        <div class="breadcrumb-content">

                            <div class="section-heading">

                                <h2 class="sec__title font-size-30 text-white p-font">Contact us Setting</h2>

                            </div>

                        </div><!-- end breadcrumb-content -->

                    </div><!-- end col-lg-6 -->

                    <div class="col-lg-6">

                        <div class="breadcrumb-list text-right">

                            <ul class="list-items">

                                <li><a href="index.html" class="text-white p-font">Home</a></li>

                                <li class="p-font"> Contact us</li>

                                

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

                                    <div> <h4 class="p-font text-white"><b>Contact Us</b></h4></div>

                                    <div><a href="/admin/view-contact-us"><button class="btn btn-danger shadow-none ">Show contact us</button></a></div>

                                </div>

                                <div class="card-body">

                                     <form class="contact-us-form">

                                        <div class="form-group">

                                            <label class="p-font">Email</label>

                                            <input type="email" name="email" class="form-control shadow-none " placeholder="Email">

                                        </div>

                                         <div class="form-group">

                                            <label class="p-font">Phone</label>

                                            <input type="number" name="phone" class="form-control shadow-none " placeholder="Phone">

                                        </div>

                                <div class="form-group">

                                    <label class="p-font">Address Details</label>

                                  <div id="editor" class="contact-us editor"></div>

                                </div>

                                <div class="form-group">

                                  <button class="btn-custom p-font">Create Contact us</button>

                                </div>

                               </form>

                                </div>

                            </div>

                           

                        </div><!-- end form-box -->

                    </div><!-- end col-lg-12 -->

                   

                     

                

                    

                     <div class="col-lg-3 responsive-column--m">

                        <div class="form-box dashboard-card">









               

                            

                            

@endsection