@extends("admin.layout.header")
@section("content")
<div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="breadcrumb-content">
                            <div class="section-heading">
                                <h2 class="sec__title font-size-30 text-white p-font">Banner Setting</h2>
                            </div>
                        </div><!-- end breadcrumb-content -->
                    </div><!-- end col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="breadcrumb-list text-right">
                            <ul class="list-items">
                                <li><a href="index.html" class="text-white p-font">Home</a></li>
                                <li class="p-font">Banner</li>
                                
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
                               <div> <h3 class="title pb-1">Banner List</h3></div>
                               <div><button class="btn-custom p-font" data-target="#add-slider" data-toggle="modal">Add New Banner</button></div>
                            </div>
                            <div class="form-content">
                                <div class="row">
                                    <div class="col">
                                    	 <div class="table-form table-responsive mb-0">
                                   <table class="table text-center w-100 mb-0" style="text-align:center !important;">
                                       <thead>
                                       <tr>
                                           <th scope="col" class="text-center p-font">Sr.No</th>
                                           <th scope="col" class="text-center p-font">Image</th>
                                           <th scope="col" class="text-center p-font">Status</th>                                           
                                           <th scope="col" class="text-center p-font">Action</th>                                          
                                       </tr>
                                       </thead>
                                       <tbody class="text-center">
                                       @foreach($data as $key=>$banner)
                                       <tr>
                                           <td class="text-center p-font">{{$key+1}}</td>
                                           <td class="text-center"><img src="{{url('')}}/admin-assets/images/banner/{{$banner->banner_name}}" width="100"></td>
                                      
                                       <td class="text-center p-font">
                                           @if($banner->status=="incative")
                                           <span class="badge badge-warning" status="0" data="{{$banner->id}}">incative</span></span>
                                           @else
                                           <span class="badge badge-success" status="0" data="{{$banner->id}}">incative</span></span>
                                           @endif

                                       </td>
                                       <td class=" p-font">
                                        <div class="d-flex justify-content-center">
                                            <button class="icon-btn badge-success banner-edit-btn"><i class="la la-edit  badge-success" data="{{$banner->id}}"></i></button> 
                                          <button class="icon-btn bg-danger text-white ml-1"><i class="la la-trash icon-btn " data="{{$banner->id}}"></i></button>
                                        </div>  
                                       </td>
                                        </tr>
                                       @endforeach
                                       </tbody>
                                   </table>
                               </div>
                                    </div>
                                  
                                   
                                </div><!-- end row -->
                            </div>
                        </div><!-- end form-box -->
                    </div><!-- end col-lg-12 -->
                   
                     
                
                    
                     <div class="col-lg-3 responsive-column--m">
                        <div class="form-box dashboard-card">




               
                            
                            
@endsection

@section("modal")
<!--modal of add new slider --->
                  <div class="modal fade" id="add-slider" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title p-font" id="exampleModalLabel">Slider Setting</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                     
                          <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <form class="banner-form" name="banner-form" enctype="mutipart/form-data">
                                <div class="form-group">
                                    <label class="p-font">Banner Photo</label>
                                    <input type="file" name="banner" class="form-control shadow-none rounded-0" placeholder="Banner Photo">
                                </div>
                                <div class="form-group mb-0">
                                    <button class="btn-custom p-font" role="insert">Create New Slider</button>
                                </div>
                            </form>
                                </div>
                                <div class="col-lg-8 text-center">
                                    <p class="p-font">Live Preview Bannner</p>
                                    <div class="banner-preview-box">
                                        <img src="" class="banner-preview-img" width="100%">
                                    </div>
                                </div>
                            </div>
                           
                          </div>
                          
                     
                    </div>
                  </div>
                </div>
                <!--end coding of add new slider --->
@endsection