@extends("admin.layout.header")
@section("title","Hotel List")
@section("content")
<div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="breadcrumb-content">
                            <div class="section-heading">
                                <h2 class="sec__title font-size-30 text-white p-font">Hotel Setting</h2>
                            </div>
                        </div><!-- end breadcrumb-content -->
                    </div><!-- end col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="breadcrumb-list text-right">
                            <ul class="list-items">
                                <li><a href="index.html" class="text-white p-font">Home</a></li>
                                <li class="p-font"> Hotel List</li>
                                
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
                                <div class="card-header d-flex justify-content-between align-items-center py-3" style="background: deeppink;border-radius: 2px;">
                                    <div> <h5 class="p-font text-white"><b> Hotel List</b></h5></div>
                                   
                                </div>

                                <div class="card-body">
                                   
                                     <table class="table table-custom">
                                         <thead>
                                             <tr>
                                                 <th>Sr.No</th>
                                                 <th>Hotel Name</th>
                                                  <th>Photo</th>
                                                 <th>Status</th>
                                                 <th>Action</th>
                                             </tr>
                                         </thead>
                                         <tbody>
                                            @foreach($data as $key=>$list)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td>{{$list->hotels_name}}</td>
                                                 <td><img src="{{url('')}}/hotels_image/images/thumb_image/{{$list->thumb_image}}" width="100"></td>
                                                <td>
                                                    @if($list->status==1)
                                                    <a href="/admin/hotel/status-change/{{base64_encode($list->id)}}"><button class="btn btn-success shadow-none sub-category-status-btn" data="{{$list->id}}" status="1">Active</button></a>
                                                    @else
                                                    <a href="/admin/hotel/status-change/{{base64_encode($list->id)}}"> <button class="btn btn-danger shadow-none " data="{{$list->id}}" status="0">inactive</button></a>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center align-items-center">
                                                        <a href="/admin/hotel/edit/{{base64_encode($list->id)}}"><button class="edit-city-btn icon-btn bg-success text-white mr-2" data=""><i class="la la-edit"></i>
                                                        </button></a>
                                                        <a href="/admin/hotel/delete/{{base64_encode($list->id)}}" title="View Multiple Photo"><button class="icon-btn  btn-danger text-white shadow-none mr-2" data="{{$list->id}}" ><i class="la la-trash"></i></button></a>
                                                        </button></a>
                                                        <a href="/admin/hotel/image/{{base64_encode($list->id)}}"><button class="icon-btn  btn-info text-white shadow-none" data="{{$list->id}}"><i class="la la-picture-o"></i></button></a>
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
<div class="modal bd-example-modal-sm" id="city-delete-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content" style="border-radius: 2px;box-shadow: 0px 0px 10px black;">
      
      <div class="modal-body" style="height: 220px;">
     <center><h6 class="p-font"> <b>Are You sure</b></h6></center>
     <hr>
     <center><i class="la la-question-circle text-danger" style="font-size:65px"></i></center>
     <center><div class="d-flex mt-4 justify-content-center align-items-center">
          <button class="btn shadow-none px-4 p-font mr-3 confirm-delete-city-btn" style="border-radius:2px !important;background: darkred;color: white;">Yes</button>
      <button class="btn btn-info shadow-none px-4 p-font" data-dismiss="modal" style="border-radius:2px !important;background: darkblue;color: white;">No</button>
     </div></center>
      </div>
     
    </div>
  </div>
</div>
@endsection