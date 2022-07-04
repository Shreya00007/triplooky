@extends("admin.layout.header")
@section("title","Region List")
@section("content")
<div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="breadcrumb-content">
                            <div class="section-heading">
                                <h2 class="sec__title font-size-30 text-white"> Region Setting</h2>
                            </div>
                        </div><!-- end breadcrumb-content -->
                    </div><!-- end col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="breadcrumb-list text-right">
                            <ul class="list-items">
                                <li><a href="index.html" class="text-white">Home</a></li>
                                <li>Region</li>
                                
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
                           
                            <div class="card" style="border:none;box-shadow: 0px 0px 5px black;">
                                <div class="card-header d-flex justify-content-between align-items-center" style="background: #28e5f3;border-radius: 2px;" >
                                    <div> <h5 class="p-font text-white">Region</h5></div>
                                    
                                </div>
                                <div class="card-body p-font">

                                     <table class="table text-center table-custom">
                                        <tr>
                                            <th>Sr.No</th>
                                            <th>Region</th>
                                           
                                            <th>Action</th>
                                        </tr>
                                         @foreach($data as $key=> $list)
                                         <tr>
                                         <td>{{$key+1}}</td>
                                         <td>{{$list->region}}</td>
                                          
                                           
                                           <td>
                                               <div class="d-flex justify-content-center align-items-center">
                                                   <a href="/admin/thing-to-do/edit/{{base64_encode($list->id)}}">
                                                       <button class="icon-btn bg-success mr-2 text-white shadow-none"><i class="la la-edit"></i></button>
                                                   </a>
                                                   <a href="/admin/thing-to-do/delete/{{base64_encode($list->id)}}"> <button class="icon-btn bg-danger text-white shadow-none mr-2"><i class="la la-trash"></i></button></a>
                                                    <a href="/admin/thing-to-do/view/{{base64_encode($list->id)}}"> <button class="icon-btn bg-info text-white shadow-none"><i class="la la-eye"></i></button></a>
                                               </div>
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