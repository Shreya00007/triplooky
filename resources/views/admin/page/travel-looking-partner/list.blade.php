@extends("admin.layout.header")
@section("title","Travel looking partnerList")
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
                   <div class="col-sm-12">
                        <div class="card" style="border:none;box-shadow: 0px 0px 5px black;border-radius: 2px;">
                        <div class="card-header py-3" style="background: #28e5f3;border-radius: 2px;border: none;">
                            <h5 class="p-font text-white">Tarvel looking Partner List</h5>
                        </div>

                        <div class="card-body">
                            <table class="table-custom table">
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Partner Name</th>
                                      <th>Photo</th>
                                        <th>Status</th>
                                          <th>Action</th>

                                    <th>
                                </tr>
                                @foreach($data as $key=>$list)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$list->travel_partner_company_name}}</td>
                                    <td><img src="{{url('')}}/travel-looking-partner/{{$list->travel_partner_company_logo}}" width="100"></td>
                                    <td>
                                        @if($list->status=="inactive")
                                        <button class="btn btn-danger travel-looking-partner-status-btn p-font shadow-none" status="0" data="{{$list->id}}">inactive</button>
                                        @else <button class="btn btn-success travel-looking-partner-status-btn p-font shadow-none" status="1" data="{{$list->id}}">active</button>

                                        @endif

                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center align-items-center">
                                            <a href="/admin/edit-travel-looking-partner/{{$list->id}}"> <button class="icon-btn bg-success edit-travel-looking-partner-btn mr-2 text-white shadow-none"><i class="la la-edit"></i></button>
                                                 </a>
                                           <a href="/admin/details-travel-looking-partner/{{$list->id}}">
                                                 <button class="icon-btn bg-info edit-travel-looking-partner-btn mr-2 text-white"><i class="la la-eye"></i></button>
                                             </a>
                                          
                                              <button class="icon-btn bg-danger delete-travel-looking-partner-btn text-white" data="{{$list->id}}"><i class="la la-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach

                            </table>
                        </div>
                    </div>
                   </div>
                 
                   
                     
                
                    
                     <div class="col-lg-3 responsive-column--m">
                        <div class="form-box dashboard-card">




               
                            
                            
@endsection