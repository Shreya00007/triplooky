@extends("admin.layout.header")
@section("title","Why use triplooky details")
@section("content")

<div class="row align-items-center">

                    <div class="col-lg-6">

                        <div class="breadcrumb-content">

                            <div class="section-heading">

                                <h2 class="sec__title font-size-30 text-white"> Why use Triplooky Setting</h2>

                            </div>

                        </div><!-- end breadcrumb-content -->

                    </div><!-- end col-lg-6 -->

                    <div class="col-lg-6">

                        <div class="breadcrumb-list text-right">

                            <ul class="list-items">

                                <li><a href="index.html" class="text-white">Home</a></li>

                                <li>Why use triplooky</li>

                                

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

                         



                          

                           

                            <div class="card" style="border:none;box-shadow: 0px 0px 5px black;">

                                <div class="card-header d-flex justify-content-between align-items-center" style="background: #28e5f3;border-radius: 2px;" >

                                    <div> <h5 class="p-font text-white">Why use triplooky</h5></div>

                                   <a href="/admin/view-triplooy-use"> <button class="btn btn-danger">Back</button></a>

                                    

                                </div>

                                <div class="card-body p-font">

                                    <h4>Heading : {{$data[0]->heading}}</h4>
                                    <br>

                                    <h5> Why use Triplooky </h5>
                                    <br>

                                    <img src="http://triplookydev.zobofy.com/why_triplooky/{{$data[0]->image}}" width="100">
                                    <br>

                               <h5>Dscription</h5>

                               <p>{!! $data[0]->description !!}</p>



                                   

                                </div>

                            </div>

                           

                        </div><!-- end form-box -->

                    </div><!-- end col-lg-12 -->

                   

                     

                

                    

                     <div class="col-lg-3 responsive-column--m">

                        <div class="form-box dashboard-card">









               

                            

                            

@endsection