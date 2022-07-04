@extends("admin.layout.header")
@section("title","Update Public Transportation")
@section("content")
<div class="row align-items-center" >
                    <div class="col-lg-6">
                        <div class="breadcrumb-content">
                            <div class="section-heading">
                                <h2 class="sec__title font-size-30 text-white p-font">Public Transportation Setting</h2>
                            </div>
                        </div><!-- end breadcrumb-content -->
                    </div><!-- end col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="breadcrumb-list text-right">
                            <ul class="list-items">
                                <li><a href="index.html" class="text-white p-font">Home</a></li>
                                <li class="p-font">Public Transportation</li>
                                
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
                     <div class="message"></div>
                        <div class="form-box">
                            <div class="card" style="border:none;box-shadow: 0px 0px 5px black;border-radius: 2px;">
                                <div class="card-header d-flex justify-content-between align-items-center py-3" style="background: #28e5f3;border-radius: 2px;">
                                    <div> <h5 class="text-white p-font"><b>Update Public Transportation</b></h5></div>
                                    <div><span></span></div>
                                </div>
                                <div class="card-body">
                                     <form  class="update-public-transport-form">
                                        @csrf
                                        
                                        <div class="form-group">
                                            <input type="hidden" name="id" value="{{$data->id}}">
                                            <label class="p-font">Average charge/Person</label>
                                            <input type="number" name="charge_of_person" class="form-control shadow-none rounded-0 require" placeholder="Average charge/Person" value="{{$data->charge_of_person}}">
                                            
                                        
                                        </div>
                                         <div class="form-group">
                                            <label class="p-font">Photo</label>
                                            <input type="file" name="image" class="form-control shadow-none rounded-0" placeholder="Photo">
                                            <img src="{{url('')}}/Transportation/images/{{$data->image}}" width="100">
                                           
                                        
                                        </div>

                                         <div class="form-group">
                                            <label class="p-font">Charge</label>
                                            <input type="number" name="charge" class="form-control shadow-none rounded-0 require" placeholder="Charge" value="{{$data->charge}}">
                                           
                                        
                                        </div>

                                         <div class="form-group">
                                            <label class="p-font">Details</label>
                                            <div class="editor desc" name="details" data="Details">
                                                {!! $data->details !!}
                                            </div>
                                        
                                        </div>
                                        
                                        

                                        <div class="form-group mb-0 d-flex justify-content-between align-items-center">
                                            <button class="btn-custom p-font">Update Public Transport</button>
                                            <div class="alert d-flex justify-content-between align-items-center category-message"><div class="mr-5"><span></span></div>
                                            </div>
                                        </div>
                               
                               </form>
                                </div>
                            </div>
                           
                        </div><!-- end form-box -->
                    </div><!-- end col-lg-12 -->
                   
                     
                
                    
                     <div class="col-lg-3 responsive-column--m">
                        <div class="form-box dashboard-card">




               
                            
                            
@endsection


@section("script")
<script type="text/javascript" src="{{url('')}}/admin-asstes/js/public-transport/public_transport.js"></script>

@endsection