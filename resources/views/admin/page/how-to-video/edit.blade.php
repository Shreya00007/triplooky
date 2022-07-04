@extends("admin.layout.header")
@section("title","Edit How To video")
@section("content")

<div class="row align-items-center">

                    <div class="col-lg-6">

                        <div class="breadcrumb-content">

                            <div class="section-heading">

                                <h2 class="sec__title font-size-30 text-white p-font">Update How to video</h2>

                            </div>

                        </div><!-- end breadcrumb-content -->

                    </div><!-- end col-lg-6 -->

                    <div class="col-lg-6">

                        <div class="breadcrumb-list text-right">

                            <ul class="list-items">

                                <li><a href="index.html" class="text-white">Home</a></li>

                                <li>How To video</li>

                                

                            </ul>

                        </div><!-- end breadcrumb-list -->

                    </div><!-- end col-lg-6 -->

                </div><!-- end row -->

               

            </div>

        </div><!-- end dashboard-bread -->

        <div class="dashboard-main-content mt-5">

            <div class="container-fluid">

                <div class="row">

                    

                   <h4>{!! Session::get("message") !!}</h4>

                    <div class="col-lg-12">

                        <div class="form-box dashboard-card" style="box-shadow: 0px 0px 5px black;border-radius: 2px;">

                            <div class="form-title-wrap d-flex justify-content-between align-items-center">

                               <div> <h3 class="title p-font">Update How To video</h3></div>

                               

                            </div>

                            <div class="form-content">

                                <div class="row">

                                    <div class="col">

                                    	 <div class="form-content">

                               <form action="/admin/update-video-link" method="post">

                                @csrf

                                <input type="hidden" name="id" value="{{$data[0]->id}}" >

                                <div class="form-group">

                                    <label class="p-font">How to video Link</label>

                                    <input type="text" name="link" class="form-control shadow-none require" placeholder="Heading" value="{{$data[0]->video_link}}" required="">

                                </div>

                                

                                



                               

                                <div class="form-group">

                                  <Button class="btn-custom">Update How to video</Button>

                                </div>

                               </form>

                           </div>

                                    </div>

                                  

                                   

                                </div><!-- end row -->

                            </div>

                        </div><!-- end form-box -->

                    </div><!-- end col-lg-12 -->

                   

                     

                

                    

                     <div class="col-lg-3 responsive-column--m">

                        <div class="form-box dashboard-card">









               

                            

                            

@endsection