@extends("admin.layout.header")
@section("content")
<div class="row align-items-center" >
                    <div class="col-lg-6">
                        <div class="breadcrumb-content">
                            <div class="section-heading">
                                <h2 class="sec__title font-size-30 text-white p-font">Activity Setting</h2>
                            </div>
                        </div><!-- end breadcrumb-content -->
                    </div><!-- end col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="breadcrumb-list text-right">
                            <ul class="list-items">
                                <li><a href="index.html" class="text-white p-font">Home</a></li>
                                <li class="p-font">Activity</li>
                                
                            </ul>
                        </div><!-- end breadcrumb-list -->
                    </div><!-- end col-lg-6 -->
                </div><!-- end row -->
               
            </div>
        </div><!-- end dashboard-bread -->
        <div class="dashboard-main-content mt-2">
            <div class="container-fluid">
                <div class="row">
                    
                 
                    <div class="col-lg-12">
                        <div class="form-box">
                            <div class="card" style="border:none;box-shadow: 0px 0px 5px black;border-radius: 2px;">
                                <div class="card-header d-flex justify-content-between align-items-center py-3" style="background: #28e5f3;border-radius: 2px;">
                                    <div> <h4 class="text-white p-font"><b>Activity List</b></h4></div>
                                    <div><span></span></div>
                                </div>
                                <div class="card-body">
                                    <table class="table text-center">
                                        <tr style="font-size:20px !important" class="p-font">
                                            <th class="text-center">Sr.No</th>
                                            <th class="text-center">Activity Name</th>
                                            <th class="text-center">Activity Image</th>
                                            <th class="text-center">Activity Date</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                        @foreach($data as $key=> $list)
                                        <tr style="font-size:20px !important" class="p-font">
                                            <td class="text-center">{{$key+1}}</td>
                                            <td class="text-center">{{$list->activity_name}}</td>
                                            <td class="text-center"><img src="{{url('')}}/admin-asstes/images/activity_image/{{$list->activity_image}}" width="100"></td>
                                            <td class="text-center">{{date("d-m-Y",strtotime($list->activity_date))}}</td>
                                            <td class="text-center">
                                                @if($list->activity_status==0)
                                                <span class="badge badge-warning p-font py-1 px-2 text-white" data="0" style="cursor:pointer;">Pending</span>
                                                @else
                                                <span class="badge badge-success p-font py-1 px-3 text-white" data="1" style="cursor:pointer;" >Active</span>

                                                @endif
                                            </td>
                                            <td class="text-center"><div class="btn-group">
                                                <a href="/admin/activity-edit/{{$list->id}}">
                                                    <button class="btn btn-success shadow-none"><i class="la la-edit" style="font-size:20px;"></i></button>
                                                </a>
                                                 <button class="btn btn-danger shadow-none delete-activity-btn" data="{{$list->id}}"><i class="la la-trash" style="font-size:20px;"></i></button>

                                                
                                            </div></td>
                                        </tr>
                                        @endforeach
                                    </table>

                                  {{$data->links()}}

                                 
                                </div>
                            </div>
                           
                        </div><!-- end form-box -->
                    </div><!-- end col-lg-12 -->
                   
                     
                
                    
                     <div class="col-lg-3 responsive-column--m">
                        <div class="form-box dashboard-card">




               
                            
                            
@endsection