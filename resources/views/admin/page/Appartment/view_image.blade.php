@extends("admin.layout.header")
@section("title","View Appartment Photo")
@section("content")
<div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="breadcrumb-content">
                            <div class="section-heading">
                                <h2 class="sec__title font-size-30 text-white p-font">View Appartment Image  Setting</h2>
                            </div>
                        </div><!-- end breadcrumb-content -->
                    </div><!-- end col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="breadcrumb-list text-right">
                            <ul class="list-items">
                                <li><a href="index.html" class="text-white p-font">Home</a></li>
                                <li class="p-font"> View Appartment Image</li>
                                
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
                        {!! Session::get('message')!!}
                        <div class="form-box">
                            <div class="card" style="border:none;box-shadow: 0px 0px 5px black;border-radius: 2px;">
                                <div class="card-header d-flex justify-content-between align-items-center py-2" style="background: deeppink;border-radius: 2px;">
                                    <div> <h5 class="p-font text-white"><b> Photo  List of {{$apparatment->appartment_name}}</b></h5></div>
                                    <div>
                                        <a href="#add-image-modal"  data-toggle="modal">
                                        <button class="btn btn-primary shadow-none"><i class="la la-plus-circle" ></i> Add More Photo</button></a>
                                    </div>
                                   
                                </div>

                                <div class="card-body">
                                   
                                     <table class="table table-custom">
                                         <thead>
                                             <tr>
                                                 <th>Sr.No</th>
                                                 <th>Appartment Name</th>
                                                  <th>Photo</th>
                                              
                                                 <th>Action</th>
                                             </tr>
                                         </thead>
                                         <tbody>
                                            @foreach($data as $key=>$list)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td>{{$apparatment->appartment_name}}</td>
                                                 <td><img src="{{url('')}}/Appartment/images/multiple_image/{{$list->image}}" width="100"></td>
                                                
                                                <td>
                                                    <div class="d-flex justify-content-center align-items-center">
                                                       <button class=" icon-btn bg-success text-white mr-2 edit-appartment-image-btn" data="{{$list->id}}" ><i class="la la-edit"></i>
                                                        </button>
                                                       <a href="/admin/appartment/multiple_image/delete/{{$list->id}}" onclick="return confirm('Are Your Sure To Remove Photo')"><button class="icon-btn  btn-danger text-white shadow-none mr-2" data="{{$list->id}}" ><i class="la la-trash"></i></button>
                                                        </button></a>
                                                       
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                         </tbody>

                                     </table>
                                      
                                </div>
                            </div>
                           
                        </div><!-- end form-box -->
                    </div><!-- end col-lg-12 -->
                   
                     
                
                    
                     <div class="col-lg-3 responsive-column--m">
                        <div class="form-box dashboard-card">




               
                            
                            
@endsection


@section("modal")
<div class="modal fade" id="add-image-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content rounded-0">
      <div class="modal-header rounded-0 bg-light">
        <h5 class="modal-title p-font" id="exampleModalCenterTitle"><b>Add Photo of {{$apparatment->appartment_name}}</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="apparatment-multiple-image-form">
            <div class="form-group">
                @csrf
                <input type="hidden" name="id" value="{{$apparatment->id}}">

                <label class="p-font">Photo</label>
                <input type="file" name="image" class="form-control shadow-none" required="">
            </div>
            <button class="btn btn-primary shadow-none p-font px-3 rounded-0" style="border-radius: 2px !important;">Add Photo</button>
            <div style="float:right;"><span class="message"></span></div>
        </form>
      </div>
     
    </div>
  </div>
</div>

<div class="modal fade" id="update-image-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content rounded-0">
      <div class="modal-header rounded-0 bg-light">
        <h5 class="modal-title p-font" id="exampleModalCenterTitle"><b>Update Photo of {{$apparatment->appartment_name}}</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="update-appartment-multiple-image-form">
            <div class="form-group">
                @csrf
                
                <input type="hidden" name="image_id">
                <label class="p-font">Photo</label>
                <input type="file" name="image" class="form-control shadow-none" required="">
                <img src="" class="update-image-show" width="100">
            </div>
            <button class="btn btn-primary shadow-none p-font px-3 rounded-0" style="border-radius: 2px !important;">Add Photo</button>
            <div style="float:right;"><span class="message"></span></div>
        </form>
      </div>
     
    </div>
  </div>
</div>


@endsection


@section("script")
<script type="text/javascript" src="{{url('')}}/admin-asstes/js/appartment-js/appartment.js"></script>

@endsection