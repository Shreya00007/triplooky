@extends("admin.layout.header")
@section("title","Update Terms")
@section("content")

<div class="row align-items-center">

                    <div class="col-lg-6">

                        <div class="breadcrumb-content">

                            <div class="section-heading">

                                <h2 class="sec__title font-size-30 text-white p-font">Update Terms  Setting</h2>

                            </div>

                        </div><!-- end breadcrumb-content -->

                    </div><!-- end col-lg-6 -->

                    <div class="col-lg-6">

                        <div class="breadcrumb-list text-right">

                            <ul class="list-items">

                                <li><a href="index.html" class="text-white">Home</a></li>

                                <li>Update Terms and use</li>

                                

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

                        <div class="card" style="border:none;box-shadow: 0px 0px 5px black;border-radius: 2px;">

                            <div class="card-header d-flex justify-content-between align-items-center py-3" style="background: #28e5f3;border-radius: 2px;" >

                                

                                <h4 class="text-white p-font">Terms and use</h4>

                                <div><a href="/admin/view-terms"><button class="btn btn-danger shadow-none p-font"><i class="la la-mail-reply-all mr-2"></i>Back</button></a>

                                        

                                    </div>

                            </div>

                            <div class="card-body">

                               <form class="terms-form-update">

                                <input type="hidden" name="id" value="{{base64_encode($data[0]->id)}}">

                                   <div class="form-group">

                                    <input type="hidden" name="id" value="{{base64_encode($data[0]->id)}}">

                                       <div id="editor" class="term editor">

                                    {!! $data[0]->terms !!}

                               </div>

                                   </div>

                                   <button class="btn-custom">Update Terms</button>

                               </form>

                            </div>

                        </div>

                    </div><!-- end col-lg-12 -->

                   

                     

                

                    

                     <div class="col-lg-3 responsive-column--m">

                        <div class="form-box dashboard-card">









               

                            

                            

@endsection