@extends("admin.layout.header")
@section("title","Place List")
@section("content")
<div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="breadcrumb-content">
                            <div class="section-heading">
                                <h2 class="sec__title font-size-30 text-white p-font">Place Details</h2>
                            </div>
                        </div><!-- end breadcrumb-content -->
                    </div><!-- end col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="breadcrumb-list text-right">
                            <ul class="list-items">
                                <li><a href="index.html" class="text-white p-font">Home</a></li>
                                <li class="p-font"> Place Details</li>
                                
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
                                    <div> <h5 class="p-font text-white"><b> Place Details</b></h5></div>
                                    <div><a href="/admin/view-place-list"><button class="btn btn-info p-font shadow-none"><i class='la la-arrow-left'></i> Back to list</button></a></div>
                                   
                                </div>


                                <div class="card-body">
                                    <table class="table border p-font">
                                        <tr>
                                            <td class="border" width="20%"><h6>Place Name</h6></td>
                                            <td class="border text-left" width="80%"><h6>{{$data->place_name}}</h6></td>
                                        </tr>
                                        <tr>
                                            <td class="border" width="20%"><h6>City Name</h6></td>
                                            <td class="border text-left" width="80%"><h6>{{$data->city}}</h6></td>
                                        </tr>
                                        <tr>
                                            <td class="border" width="20%"><h6>Region</h6></td>
                                            <td class="border text-left" width="80%"><h6>{{$data->region}}</h6></td>
                                        </tr>
                                         <tr>
                                            <td class="border" width="20%"><h6>Description</h6></td>
                                            <td class="border text-left" width="80%">{!! $data->place_desc !!}</td>
                                        </tr>
                                    </table>
                                   
                                     
                                </div>
                            </div>
                           
                        </div><!-- end form-box -->
                    </div><!-- end col-lg-12 -->
                   
                     
                
                    
                     <div class="col-lg-3 responsive-column--m">
                        <div class="form-box dashboard-card">




               
                            
                            
@endsection




