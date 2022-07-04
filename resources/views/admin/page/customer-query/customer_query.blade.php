@extends("admin.layout.header")
@section("title","Cutsomer Query")
@section("content")
<div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="breadcrumb-content">
                            <div class="section-heading">
                                <h2 class="sec__title font-size-30 text-white">Customer Query</h2>
                            </div>
                        </div><!-- end breadcrumb-content -->
                    </div><!-- end col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="breadcrumb-list text-right">
                            <ul class="list-items">
                                <li><a href="index.html" class="text-white">Home</a></li>
                                <li>Customer Query</li>
                                
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
                       {!! Session::get("message") !!}
                        <div class="form-box dashboard-card" style="box-shadow: 0px 0px 5px black;border-radius: 2px;">
                            <div class="form-title-wrap d-flex justify-content-between align-items-center">
                               <div> <h3 class="title p-font">Cutsomer Query</h3></div>
                               
                            </div>
                            <div class="form-content">
                                <div class="row">
                                    <div class="col">
                                    	 <table class="table-custom">
                                          <tr><th>
                                              Sr.No
                                          </th>
                                          <th>Name</th>
                                          <th>Email</th>
                                          <th>Subejct</th>
                                          <th>Query</th>
                                          <th>Date
                                          <th>Action</th>
                                      </tr>   
                                      @foreach($data as $key=>$list)
                                      <tr>
                                          <td>{{$key+1}}</td>
                                          <td>{{$list->name}}</td>
                                          <td>{{$list->email}}</td>
                                          <td>{{$list->subject}}</td>
                                          <td width="20%">{{$list->query}}</td>
                                          <td>{{date('d-m-Y',strtotime($list->created_at))}}</td>
                                          <td><a href="/admin/customer-query-delete/{{$list->id}}"><button class="icon-btn bg-danger text-white"><i class="la la-trash "></i></button></a></td>
                                      </tr>
                                      @endforeach
                                         </table> 
                                         {{$data->links()}}
                                    </div>
                                  
                                   
                                </div><!-- end row -->
                            </div>
                        </div><!-- end form-box -->
                    </div><!-- end col-lg-12 -->
                   
                     
                
                    
                     <div class="col-lg-3 responsive-column--m">
                        <div class="form-box dashboard-card">




               
                            
                            
@endsection