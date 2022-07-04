@extends("admin.layout.header")
@section("title","Cookie Policy")
@section("content")

<div class="row align-items-center">

                    <div class="col-lg-6">

                        <div class="breadcrumb-content">

                            <div class="section-heading">

                                <h2 class="sec__title font-size-30 text-white"> Cookie Policy Setting</h2>

                            </div>

                        </div><!-- end breadcrumb-content -->

                    </div><!-- end col-lg-6 -->

                    <div class="col-lg-6">

                        <div class="breadcrumb-list text-right">

                            <ul class="list-items">

                                <li><a href="index.html" class="text-white">Home</a></li>

                                <li>Cookie Policy</li>

                                

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

                                    <div> <h5 class="p-font text-white">Cookie Policy</h5></div>

                                    <div><button class="btn-custom">Show About us</button></div>

                                </div>

                                <div class="card-body">

                                     <form class="cookie-policy-form">

                                <div class="form-group">

                                  <div id="editor" class="cookie-policy editor"></div>

                                </div>

                                <div class="form-group">

                                  <Button class="btn-custom">Create Cookie Policy</Button>

                                </div>

                               </form>

                                </div>

                            </div>

                           

                        </div><!-- end form-box -->

                    </div><!-- end col-lg-12 -->

                   

                     

                

                    

                     <div class="col-lg-3 responsive-column--m">

                        <div class="form-box dashboard-card">









               

                            

                            

@endsection