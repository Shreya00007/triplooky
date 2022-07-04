@extends("admin.layout.header")
@section("title","Add Banner")
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
                                           <th scope="col" class="text-center p-font">
                                               Order
                                           </th>

                                           <th scope="col" class="text-center p-font">Status</th>                                           

                                           <th scope="col" class="text-center p-font">Action</th>                                          

                                       </tr>

                                       </thead>

                                       <tbody class="text-center">

                                       @foreach($data as $key=>$banner)

                                       <tr>

                                           <td class="text-center p-font">{{$key+1}}</td>

                                           <td class="text-center"><img src="{{url('')}}/admin-assets/images/banner/{{$banner->banner_name}}" width="100"></td>

                                      <td>
                                         
                                             <div class="input-group">
                                                <select class="form-control shadow-none order-select-value" style="width:40px !important;text-align: center !important;">
                                                  @foreach($data as $key_value=> $data1)
                                                  @if($data1->order_by==$key+1)
                                                  <option selected="">{{$key_value+1}}</option>
                                                  @else
                                                  <option >
                                                      {{$key_value+1}}
                                                  </option>
                                                  @endif
                                                  
                                                  @endforeach
                                              </select>
                                             <div class="input-group-append"> <button class="btn btn-info shadow-none  p-font banner-order-change-btn" data="{{$banner->id}}">Change</button></div>

                                             </div>
                                          
                                      </td>

                                       <td class="text-center p-font">

                                           @if($banner->status=="0")

                                           <button class="btn btn-danger banner-status-btn shadow-none" status="0" data="{{$banner->id}}">incative</span></button>

                                           @else

                                           <button class="btn btn-success banner-status-btn shadow-none" status="1" data="{{$banner->id}}">Active</span></button>

                                           @endif



                                       </td>

                                       <td class=" p-font">

                                        <div class="d-flex justify-content-center">

                                            <button class="icon-btn badge-success banner-edit-btn" data="{{$banner->id}}"><i class="la la-edit  badge-success" ></i></button> 

                                          <button class="icon-btn bg-danger text-white ml-1 banner-delete-btn" data="{{$banner->id}}"><i class="la la-trash icon-btn " ></i></button>

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
                            <div><span>Banner Photo Size Should be equal or greater (1340*400)</span></div>
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

                  <div class="modal fade" id="edit-banner-moal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

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

                                    <form class="update-banner-form" name="banner-form" enctype="mutipart/form-data">

                                <div class="form-group">

                                    <label class="p-font">Banner Photo</label>

                                    <input type="file" name="banner" class="form-control shadow-none rounded-0" placeholder="Banner Photo" required="">

                                </div>

                                <div class="form-group mb-0">

                                    <button class="btn-custom p-font" role="insert">Update Slider</button>

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

                <div class="modal  bd-example-modal-sm" id="banner-delete-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">

    <div class="modal-content" style="border-radius: 2px;box-shadow: 0px 0px 10px black;">

      

      <div class="modal-body" style="height: 220px;">

     <center><h6 class="p-font"> <b>Are You sure</b></h6></center>

     <hr>

     <center><i class="la la-question-circle text-danger" style="font-size:65px"></i></center>

     <center><div class="d-flex mt-4 justify-content-center align-items-center">

          <button class="btn btn-danger shadow-none px-4 p-font mr-3 confirm-delete-banner-btn">Yes</button>

      <button class="btn btn-info shadow-none px-4 p-font" data-dismiss="modal">No</button>

     </div></center>

      </div>

     

    </div>

  </div>

</div>

@endsection