@extends("admin.layout.header")
@section("title","Transportation List")
@section("content")
<div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="breadcrumb-content">
                            <div class="section-heading">
                                <h2 class="sec__title font-size-30 text-white p-font">TransportationSetting</h2>
                            </div> 
                        </div><!-- end breadcrumb-content -->
                    </div><!-- end col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="breadcrumb-list text-right">
                            <ul class="list-items">
                                <li><a href="index.html" class="text-white p-font">Home</a></li>
                                <li class="p-font"> Transportation List</li>
                                
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
                                <div class="card-header d-flex justify-content-between align-items-center py-3" style="background: #28e5f3;border-radius: 2px;">
                                    <div> <h6 class="p-font text-white"><b>Transportation List</b></h6></div>
                                   
                                </div>
                                <div class="card-body">
                                    <table class="table table-custom">
                                        <tr>
                                            <th>
                                                Sr.No
                                            </th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Photo</th>
                                             <th>Type</th>
                                            
                                          
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        @foreach($data as $key=>$list)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$list->name}}</td>
                                            <td>{{$list->price}}</td>
                                            <td><img src="{{url('')}}/transportation-image/images/{{$list->image}}" width="100"></td>
                                          <td>{{$list->type}}</td>
                                            <td>
                                                @if($list->status==1)
                                                 <a href="/admin/transportation/status-change/{{base64_encode($list->id)}}"> <button class="btn btn-success">Active</button></a>
                                                @else
                                                  <a href="/admin/transportation/status-change/{{base64_encode($list->id)}}"> <button class="btn btn-danger">Deactive</button></a>
                                                @endif
                                            </td>
                                            
                                            <td>
                                                <div class="btn btn-group">
                                                   <a href="/admin/transportation/edit/{{base64_encode($list->id)}}">
                                                    <button class="btn rounded-0 btn-success"><i class="la la-edit"></i></button>
                                               </a>

                                                <a href="/admin/transportation/delete/{{base64_encode($list->id)}}">
                                                    <button class="btn rounded-0 btn-danger"><i class="la la-trash"></i></button>
                                               </a>
                                                <a href="/admin/transportation/transportation-multiple-image/{{base64_encode($list->id)}}">
                                                    <button class="btn rounded-0 btn-info"><i class="la la-photo"></i></button>
                                               </a>
                                                <a href="/admin/transportation/comment/{{base64_encode($list->id)}}" title="comments">
                                                    <button class="btn rounded-0 btn-dark"><i class="la la-eye"></i></button>
                                               </a>
                                              </div>

                                            </td>
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




               
              <script type="text/javascript">
                  function removeErrorshow(input){
                    if($(input).next().is("p")){
                        $(input).next("p").remove();
                    }

                  }
              </script>              
                            
@endsection