@extends("admin.layout.header")
@section("title","View Terms")
@section("content")

<div class="row align-items-center">

                    <div class="col-lg-6">

                        <div class="breadcrumb-content">

                            <div class="section-heading">

                                <h2 class="sec__title font-size-30 text-white"> Terms and use Setting</h2>

                            </div>

                        </div><!-- end breadcrumb-content -->

                    </div><!-- end col-lg-6 -->

                    <div class="col-lg-6">

                        <div class="breadcrumb-list text-right">

                            <ul class="list-items">

                                <li><a href="index.html" class="text-white">Home</a></li>

                                <li>Terms and use </li>

                                

                            </ul>

                        </div><!-- end breadcrumb-list -->

                    </div><!-- end col-lg-6 -->

                </div><!-- end row -->

               

            </div>

        </div><!-- end dashboard-bread -->

        <div class="dashboard-main-content mt-5">

            <div class="container-fluid">

                <div class="row">

                    

                  <h2 class="mb-3 p-font">{{Session::get("message")}}</h2>

                    <div class="col-lg-12">

                        <div class="form-box">

                            <div class="card" style="border:none;box-shadow: 0px 0px 5px black;">

                                <div class="card-header d-flex justify-content-between align-items-center" style="background: #28e5f3;border-radius: 2px;" >

                                    <div> <h5 class="p-font text-white">Terms and use</h5></div>

                                    <div><a href="/admin/terms"><button class="btn btn-danger shadow-none p-font"><i class="la la-mail-reply-all mr-2"></i>Back</button></a>

                                        

                                         @if(count($data)>0)

                                         <a href="/admin/terms-edit"><button class="btn btn-success shadow-none"><i class="la la-edit mr-2

                                        "></i>Edit</button></a>

                                         <a href="/admin/terms-delete/@if(count($data)>0) {{base64_encode($data[0]->id)}} @endif"><button class="btn btn-warning shadow-none text-white p-font"><i class="la la-trash mr-2

                                        "></i>Delete</button></a>

                                       @endif

                                    </div>

                                </div>

                                <div class="card-body p-font">

                                  @if(count($data)>0)

                                {!! $data[0]->terms !!}

                               @else

                               <h2 class="text-danger p-font">Not Any Terms Created At</h2>

                               @endif

                                </div>

                            </div>

                           

                        </div><!-- end form-box -->

                    </div><!-- end col-lg-12 -->

                   

                     

                

                    

                     <div class="col-lg-3 responsive-column--m">

                        <div class="form-box dashboard-card">









               

                            

                            

@endsection