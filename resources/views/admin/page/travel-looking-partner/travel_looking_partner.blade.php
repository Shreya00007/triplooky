@extends("admin.layout.header")
@section("title","Travel looking Partner")
@section("content")
<div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="breadcrumb-content">
                            <div class="section-heading">
                                <h2 class="sec__title font-size-30 text-white p-font">Travel Looking Partner</h2>
                            </div>
                        </div><!-- end breadcrumb-content -->
                    </div><!-- end col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="breadcrumb-list text-right">
                            <ul class="list-items">
                                <li><a href="index.html" class="text-white">Home</a></li>
                                <li class="p-font">Travel Looking Partner</li>
                                
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
                       <h5> {{Session::get("message")}}</h5>
                        <div class="form-box dashboard-card" style="box-shadow: 0px 0px 5px black;border-radius: 2px;">
                            <div class="form-title-wrap d-flex justify-content-between align-items-center">
                               <div> <h3 class="title p-font">Add Travel Looking Partner</h3></div>
                               
                            </div>
                            <div class="form-content">
                                <div class="row">
                                    <div class="col">
                                    	 <div class="form-content">
                               <form class="travel-looking-partner">
                                @csrf
                                 <div class="row">
                                     <div class="col">
                                          <div class="form-group">
                                    <label class="p-font"> Travel Looking Partner Name</label>
                                    <input type="text" name="partner_name" class="form-control shadow-none require" placeholder="Travel Looking Partner Name">
                                </div>
                               
                                     </div>
                                     <div class="col">
                                          <div class="form-group">
                                    <label class="p-font"> Travel Looking Partner Photo</label>
                                    <input type="file" name="partner-company-logo" class="form-control shadow-none require" placeholder="Travel Looking Partner Photo">
                                </div>
                               
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div class="col">
                                        <div class="form-group">
                                            <label>Travel Looking Partner Description</label>
                                             <div id="editor" class="partner editor"></div>
                                        </div>
                                     </div>
                                 </div>
                                

                              
                                <div class="form-group">
                                  <Button class="btn-custom p-font">Create Travel Looking Partner</Button>
                                </div>
                               </form>
                               <div class="message"></div>
                           </div>
                                    </div>
                                  
                                   
                                </div><!-- end row -->
                            </div>
                        </div><!-- end form-box -->
                    </div><!-- end col-lg-12 -->
                   
                     
                
                    
                     <div class="col-lg-3 responsive-column--m">
                        <div class="form-box dashboard-card">




               
                            
                            
@endsection