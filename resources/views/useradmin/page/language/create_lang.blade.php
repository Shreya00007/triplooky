@extends("admin.layout.header")
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
                            <div class="card" style="border:none;box-shadow: 0px 0px 5px black;border-radius: 2px;">
                                <div class="card-header d-flex justify-content-between align-items-center py-3" style="background: #28e5f3;border-radius: 2px;">
                                    <div> <h5 class="p-font text-white">Language List</h5></div>
                                    <div><button class="btn-custom" data-target="#lang-modal" data-toggle="modal">Add Language</button></div>
                                </div>
                                <div class="card-body">
                                     <table class="table table-custom lang-table">
                                         <tr class="p-font text-center">
                                           
                                             <th>Language Name</th>
                                             <th>Status</th>
                                             <th>Action</th>
                                         </tr>
                                         @foreach($data as $key=> $list)
                                               <tr >
                                                  
                                                   <td>{{$list->lang_name}}</td>
                                                   <td>@if($list->status=="inactive")
                                                    <button class="btn btn-danger shadow-none p-font edit-lang-staus-btn" data="{{($list->id)}}" status="0">incative</button>
                                                   @else
                                                   <button class="btn btn-success shadow-none p-font edit-lang-staus-btn" data="{{($list->id)}}" status="1">Active</button>
                                                   @endif
                                               </td>
                                                   <td class="d-flex justify-content-center align-items-center">
                                                      <button class="icon-btn bg-success mr-2 edit-lang-btn" data="{{($list->id)}}"> <i class="la la-edit  text-white"></i></button>
                                                       <button class="icon-btn bg-danger delete-lang-btn" data="{{($list->id)}}" > <i class="la la-trash text-white"></i></button>
                                                   </td>
                                               </tr>
                                         @endforeach
                                     </table>
                                </div>
                            </div>
                           
                        </div><!-- end form-box -->
                    </div><!-- end col-lg-12 -->
                   
                     
                
                    
                     <div class="col-lg-3 responsive-column--m">
                        <div class="form-box dashboard-card">




               
                            
                            
@endsection

@section("modal")
<div class="modal fade" id="lang-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" style="border-radius: 2px;box-shadow: 0px 0px 10px black;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">AddLanguage</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
    <form class="lang-form">
                                <div class="form-group">
                                  <label class="p-font">Language Name</label>
                                  <input type="text" name="lang" class="form-control shadow-none" placeholder="Language Name">
                                </div>
                                <div class="form-group">
                                  <Button class="btn-custom" role="insert">Create Language</Button>
                                </div>
                               </form>
      </div>
     
    </div>
  </div>
</div>
<div class="modal fade" id="lang-delete-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" style="border-radius: 2px;box-shadow: 0px 0px 10px black;">
      
      <div class="modal-body" style="height: 150px;">
     <center><h3 class="p-font"> <b>Are You sure</b></h3></center>
     <hr>
     <center><div class="d-flex mt-4">
          <button class="btn btn-danger shadow-none px-4 p-font mr-3 confirm-delete-lang-btn">Confirm</button>
      <button class="btn btn-info shadow-none px-4 p-font" data-dismiss="modal">Close</button>
     </div></center>
      </div>
     
    </div>
  </div>
</div>
@endsection