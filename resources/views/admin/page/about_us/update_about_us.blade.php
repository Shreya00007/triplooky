@extends("admin.layout.header")
@section("title","Update About us")
@section("content")

<div class="row align-items-center" >

                    <div class="col-lg-6">

                        <div class="breadcrumb-content">

                            <div class="section-heading">

                                <h2 class="sec__title font-size-30 text-white p-font">About us Setting</h2>

                            </div>

                        </div><!-- end breadcrumb-content -->

                    </div><!-- end col-lg-6 -->

                    <div class="col-lg-6">

                        <div class="breadcrumb-list text-right">

                            <ul class="list-items">

                                <li><a href="index.html" class="text-white p-font">Home</a></li>

                                <li class="p-font">About us</li>

                                

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

                                    <div> <h6 class="text-white p-font">Update About Us</h6></div>

                                    <div><a href="/admin/about-us-show"><button class="btn btn-danger shadow-none p-font"><i class="la la-mail-reply-all mr-2"></i>Back</button></a></div>

                                </div>

                                <div class="card-body">

                                     <form class="about-us-update-form">

                                        <input type="hidden" name="id" value="{{base64_encode($data[0]->id)}}">

                                <div class="form-group">

                                  <div id="editor" class="about-us editor">

                                      {!! $data[0]->about_us !!}

                                  </div>

                                </div>

                                <div class="form-group">

                                  <Button class="btn-custom p-font">Update About us</Button>

                                </div>

                               </form>

                                </div>

                            </div>

                           

                        </div><!-- end form-box -->

                    </div><!-- end col-lg-12 -->

                   

                     

                

                    

                     <div class="col-lg-3 responsive-column--m">

                        <div class="form-box dashboard-card">









               

                            

                            

@endsection