@extends("admin.layout.header")
@section("title","User List")
@section("content")

<div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="breadcrumb-content">
                            <div class="section-heading">
                                <h2 class="sec__title font-size-30 text-white p-font">User List</h2>
                            </div>
                        </div><!-- end breadcrumb-content -->
                    </div><!-- end col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="breadcrumb-list text-right">
                            <ul class="list-items">
                                <li><a href="index.html" class="text-white">Home</a></li>
                                <li class="p-font">User List</li>
                                
                            </ul>
                        </div><!-- end breadcrumb-list -->
                    </div><!-- end col-lg-6 -->
                </div><!-- end row -->
               
            </div>
        </div><!-- end dashboard-bread -->
        <div class="dashboard-main-content mt-5">
            <div class="container-fluid">
                <div class="row">
                   <div class="col-sm-12"> {!! Session::get("message") !!}</div>
                   <div class="col-sm-12 mt-2">
                        <div class="card" style="border:none;box-shadow: 0px 0px 5px black;border-radius: 2px;">
                        <div class="card-header py-3" style="background: #28e5f3;border-radius: 2px;border: none;">
                            <h5 class="p-font text-white">User List</h5>
                        </div>
                        
                    
                        <div class="card-body" style="overflow-x:auto;">
                            <table class="table-custom table" >
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Name</th>
                                      <th>Username</th>
                                        <th>Email</th>
                                        <th>Staus</th>
                                        <th>Date</th>
                                        <th>City </th>
                                        <th>Country</th>
                                          <th>Action</th>

                                    <th>
                                </tr>
                                @foreach($data as $key=>$list)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td >{{$list->name}}</td>
                                    <td style="width: 100px;">{{$list->user_name}}</td>
                                    <td >{{$list->email}}</td>
                                    <td>
                                        @if($list->status=="inactive")
                                        <a href="/admin/user-update-status/{{$list->id}}">
                                                 <button class="btn-danger btn edit-travel-looking-partner-btn mr-2 text-white">inactive</button>
                                             </a>
                                        @else
                                        <a href="/admin/user-update-status/{{$list->id}}">
                                                 <button class="btn-success btn edit-travel-looking-partner-btn mr-2 text-white">Active</button>
                                             </a>
                                        @endif
                                    </td>
                                    <td>{{date("d-m-Y",strtotime($list->created_at))}}</td>
                                    
                                    
                                     <td>{{$list->city_name}}</td>
                                     <td>{{$list->country_name}}</td>

                                    
                                    <td>
                                        <div class="d-flex justify-content-between align-items-center">
                                            
                                           
                                          
                                             <a href="/admin/user/delete/{{$list->id}}">
                                                  <button class="icon-btn bg-danger  text-white" data="{{$list->id}}"><i class="la la-trash"></i></button>
                                             </a>
                                             <a href="/admin/user/plan/{{$list->id}}">
                                                  <button class="icon-btn bg-primary  text-white" ><i class="la la-comment-alt"></i></button>
                                             </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach

                            </table>

                            {{$data->links()}}
                        </div>
                    </div>
                   </div>
                 
                   
                     
                
                    
                     <div class="col-lg-3 responsive-column--m">
                        <div class="form-box dashboard-card">




               
                            
                            
@endsection