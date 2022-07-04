@extends("admin.layout.header")
@section("title","Add Place")
@section("content")
<div class="row align-items-center" >
                    <div class="col-lg-6">
                        <div class="breadcrumb-content">
                            <div class="section-heading">
                                <h2 class="sec__title font-size-30 text-white p-font">Place Setting</h2>
                            </div>
                        </div><!-- end breadcrumb-content -->
                    </div><!-- end col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="breadcrumb-list text-right">
                            <ul class="list-items">
                                <li><a href="index.html" class="text-white p-font">Home</a></li>
                                <li class="p-font">Place</li>
                                
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
                                    <div> <h5 class=" p-font" style="color:whitesmoke;"><b>Add New Place</b></h5></div>
                                    <div><span></span></div>
                                </div>
                                <div class="card-body">
                                 <form class="place-form">
                                    @csrf
                                         <div class="form-group">
                                         <label class="p-font">Place Name</label>
                                         <input type="text" name="place-name" class="form-control shadow-none require" placeholder="Place Name">
                                     </div>
                                     <div class="row">
                                    <div  class="col">
                                        <div class="form-group">
                                            <label class="p-font">Region</label>
                                            <select class="form-control shadow-none require" name="region" id="place-region">
                                                <option>Select Region</option>
                                                @foreach($region as $list)
                                                <option value="{{$list->id}}">{{$list->region}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="p-font">City</label>
                                            <select class="form-control shadow-none place-city require" name="city">
                                                <option>Select City </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Place Description</label>
                                            <div class="editor desc"></div>
                                        </div>
                                    </div>
                                </div>

                                <button class="btn-custom p-font">create place</button>
                                 </form>
                                </div>
                                
                            </div>
                           
                        </div><!-- end form-box -->
                    </div><!-- end col-lg-12 -->
                   
                     
                
                    
                     <div class="col-lg-3 responsive-column--m">
                        <div class="form-box dashboard-card">




               
                            
                            
@endsection

@section("script")
<script type="text/javascript" src="{{url('')}}/admin-asstes/js/place-js/place.js"></script>
@endsection