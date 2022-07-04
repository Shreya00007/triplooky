@extends("admin.layout.header")
@section("title","Update FAQ`s")
@section("content")

<div class="row align-items-center">

                    <div class="col-lg-6">

                        <div class="breadcrumb-content">

                            <div class="section-heading">

                                <h2 class="sec__title font-size-30 text-white">FAQ Setting</h2>

                            </div>

                        </div><!-- end breadcrumb-content -->

                    </div><!-- end col-lg-6 -->

                    <div class="col-lg-6">

                        <div class="breadcrumb-list text-right">

                            <ul class="list-items">

                                <li><a href="index.html" class="text-white">Home</a></li>

                                <li>FAQ</li>

                                

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

                                

                                <h4 class="text-white p-font">FAQ</h4>

                                <div><a href="/admin/faq"><button class="btn btn-danger shadow-none p-font"><i class="la la-mail-reply-all mr-2"></i>Back</button></a>

                                       @if(count($data)>0)

                                        <a href="/admin/faq-edit"><button class="btn btn-success shadow-none"><i class="la la-edit mr-2

                                        "></i>Edit</button></a>

                                         <a href="/admin/faq-delete/@if(count($data)>0) {{base64_encode($data[0]->id)}} @endif"><button class="btn btn-warning shadow-none text-white p-font"><i class="la la-trash mr-2

                                        "></i>Delete</button></a>

                                       @endif

                                    </div>

                            </div>

                            <div class="card-body">

                                @if(count($data))

                                     {!! $data[0]->faq !!}



                                    @else

                                    <h2 class="text-danger p-font">No FAQ`s created Yet</h2>

                                    @endif

                            </div>

                        </div>

                    </div><!-- end col-lg-12 -->

                   

                     

                

                    

                     <div class="col-lg-3 responsive-column--m">

                        <div class="form-box dashboard-card">









               

                            

                            

@endsection