@extends("admin.layout.header")
@section("title","CMS Foodn And Drink List")
@section("content")
<div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="breadcrumb-content">
                            <div class="section-heading">
                                <h2 class="sec__title font-size-30 text-white p-font">CMS Food And Drink list</h2>
                            </div>
                        </div><!-- end breadcrumb-content -->
                    </div><!-- end col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="breadcrumb-list text-right">
                            <ul class="list-items">
                                <li><a href="index.html" class="text-white p-font">Home</a></li>
                                <li class="p-font"> CMS Food And Drink List</li>
                                
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
                     {!! session()->get('message') !!}
                 </div>
                    <div class="col-lg-12">
                        <div class="form-box">
                            <div class="card" style="border:none;box-shadow: 0px 0px 5px black;border-radius: 2px;">
                                <div class="card-header d-flex justify-content-between align-items-center py-4" style="background: deeppink;border-radius: 2px;">
                                    <div> <h5 class="p-font text-white"><b> CMS Food And Drink List</b></h5></div>
                                   
                                </div>
                                <div class="card-body">
                                     <table class="table table-custom">
                                         <thead>
                                             <tr>
                                                 <th>Sr.No</th>
                                                 <th>Name</th>
                                                 <th>Status</th>
                                                 <th>Photo</th>
                                                 <th>Action</th>
                                             </tr>
                                         </thead>
                                         <tbody>
                                            @foreach($data as $key=>$list)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td>{{$list->name}}</td>
                                                <td>
                                                    @if($list->status==1)
                                                   <a href="/admin/cms/food-and-drink/status-change/{{base64_encode($list->id)}}">
                                                        <button class="btn btn-success shadow-none city-status-btn" data="{{$list->id}}" status="1">Active</button>
                                                   </a>
                                                    @else
                                                    <a href="/admin/cms/food-and-drink/status-change/{{base64_encode($list->id)}}">
                                                    <button class="btn btn-danger shadow-none city-status-btn" data="{{$list->id}}" status="0">Inactive</button></a>
                                                    @endif
                                                </td>
                                                <td>
                                                    <img src="{{url('')}}/food-and-drink-image/images/{{$list->image}}" width="100">
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center align-items-center">
                                                       <a href="/admin/cms/food-and-drink/edit/{{base64_encode($list->id)}}"><button class="edit-city-btn icon-btn bg-success text-white mr-2" data=""><i class="la la-edit"></i>
                                                        </button></a>
                                                        <a href="/admin/cms/food-and-drink/delete/{{base64_encode($list->id)}}" onclick="return confirm('Are you sure to delete')">
                                                               <button class="icon-btn delete-city-btn btn-danger text-white shadow-none mr-2" data="{{$list->id}}"><i class="la la-trash" ></i></button>
                                                        </a>
                                                       
                                                     
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


