@extends("admin.layout.header")
@section("title","Add Map")
@section("content")
<div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="breadcrumb-content">
                            <div class="section-heading">
                                <h2 class="sec__title font-size-30 text-white p-font"> Map Setting</h2>
                            </div>
                        </div><!-- end breadcrumb-content -->
                    </div><!-- end col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="breadcrumb-list text-right">
                            <ul class="list-items">
                                <li><a href="index.html" class="text-white">Home</a></li>
                                <li class="p-font">Map Details</li>
                                
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
                        <div class="form-box dashboard-card" style="border:none;box-shadow: 0px 0px 5px black;border-radius: 2px;">
                            <div class="form-title-wrap d-flex justify-content-between align-items-center"  style="background: #28e5f3;border-radius: 2px;">
                               <div> <h3 class="title text-white p-font">Map</h3></div>
                               
                            </div>
                            <div class="form-content">
                                <div class="row">
                                    <div class="col">
                                    	 <div class="form-content">
                               <form class="map-form">
                                <div class="form-group">
                                    <label class="p-font">Add New Map</label>
                                 <textarea class="map form-control shadow-none"></textarea>
                                </div>
                                <div class="form-group">
                                  <Button class="btn-custom p-font">Create Map</Button>
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