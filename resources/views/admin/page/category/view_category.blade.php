@extends("admin.layout.header")
@section("title","View Category")
@section("content")
<div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="breadcrumb-content">
                            <div class="section-heading">
                                <h2 class="sec__title font-size-30 text-white p-font">Category Setting</h2>
                            </div>
                        </div><!-- end breadcrumb-content -->
                    </div><!-- end col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="breadcrumb-list text-right">
                            <ul class="list-items">
                                <li><a href="index.html" class="text-white p-font">Home</a></li>
                                <li class="p-font"> Category</li>
                                
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
                            <div class="card" style="border:none;box-shadow: 0px 0px 5px black;border-radius: 2px;">
                                <div class="card-header d-flex justify-content-between align-items-center py-4" style="background: deeppink;border-radius: 2px;">
                                    <div> <h5 class="p-font text-white"><b> Category List</b></h5></div>
                                   
                                </div>
                                <div class="card-body">
                                     <table class="table table-custom">
                                         <thead>
                                             <tr>
                                                 <th>Sr.No</th>
                                                 <th>Category Name</th>
                                                 <th>Status</th>
                                                 <th>Action</th>
                                             </tr>
                                         </thead>
                                         <tbody>
                                            @foreach($data as $key=>$list)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td>{{$list->category_name}}</td>
                                                <td>
                                                    @if($list->status=="active")
                                                    <button class="btn btn-success shadow-none category-status-btn" data="{{$list->id}}" status="1">Active</button>
                                                    @else
                                                    <button class="btn btn-danger shadow-none category-status-btn" data="{{$list->id}}" status="0">inactive</button>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center align-items-center">
                                                        <a href="/admin/edit-category/{{base64_encode($list->id)}}"><button class="edit-city-btn icon-btn bg-success text-white mr-2" data=""><i class="la la-edit"></i>
                                                        </button></a>
                                                        <button class="icon-btn delete-category-btn btn-danger text-white shadow-none" data="{{$list->id}}"><i class="la la-trash"></i></button>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                         </tbody>

                                     </table>
                                      {{$data->links()}}
                                </div>
                            </div>
                           
                        </div><!-- end form-box -->
                    </div><!-- end col-lg-12 -->
                   
                     
                
                    
                     <div class="col-lg-3 responsive-column--m">
                        <div class="form-box dashboard-card">




               
                            
                            
@endsection


@section("modal")
<div class="modal bd-example-modal-sm" id="category-delete-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content" style="border-radius: 2px;box-shadow: 0px 0px 10px black;">
      
      <div class="modal-body" style="height: 220px;">
     <center><h6 class="p-font"> <b>Are You sure</b></h6></center>
     <hr>
     <center><i class="la la-question-circle text-danger" style="font-size:65px"></i></center>
     <center><div class="d-flex mt-4 justify-content-center align-items-center">
          <button class="btn shadow-none px-4 p-font mr-3 confirm-delete-category-btn" style="border-radius:2px !important;background: darkred;color: white;">Yes</button>
      <button class="btn btn-info shadow-none px-4 p-font" data-dismiss="modal" style="border-radius:2px !important;background: darkblue;color: white;">No</button>
     </div></center>
      </div>
     
    </div>
  </div>
</div>
@endsection