@extends("admin.layout.header")
@section("title","FAQ`s")
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

                        <div class="form-box dashboard-card">

                            <div class="form-title-wrap d-flex justify-content-between align-items-center">

                               <div> <h3 class="title">Create New FAQ</h3></div>

                               

                            </div>

                            <div class="form-content">

                                <div class="row">

                                    <div class="col">

                                    	 <div class="form-content">

                               <form class="faq-form">

                                <div class="form-group">

                                  <div id="editor" class="faq editor"></div>

                                </div>

                                <div class="form-group">

                                  <Button class="btn-custom">Create FAQ</Button>

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