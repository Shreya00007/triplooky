@extends("admin.layout.header")
@section("title","Update City Photo")
@section("content")
<div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="breadcrumb-content">
                            <div class="section-heading">
                                <h2 class="sec__title font-size-30 text-white p-font">City Photo Setting</h2>
                            </div>
                        </div><!-- end breadcrumb-content -->
                    </div><!-- end col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="breadcrumb-list text-right">
                            <ul class="list-items">
                                <li><a href="index.html" class="text-white p-font">Home</a></li>
                                <li class="p-font"> City Photo</li>
                                
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
                                    <div> <h6 class="p-font text-white"><b>Update City Photo</b></h6></div>
                                    <div>
                                        <a href="/admin/city/city-image/{{base64_encode($city_name['id'])}}">
                                            <button class="btn btn-dark shadow-none"><i class="la la-arrow-right"></i></button>
                                        </a>
                                    </div>
                                   
                                </div>
                                <div class="card-body">
                                     <form action="/admin/city/edit-city-image-data"   enctype="multipart/form-data" method="post">
                                        @csrf
                                         
                                        <div class="form-group">
                                            <label class="p-font">City Name</label>
                                            <input type="text" name="city_name" class="form-control shadow-none " placeholder="City Name" oninput="removeErrorshow(this)" value="{{$city_name['city_name']}}" readonly>
                                            <input type="hidden" name="id" value="{{$data['id']}}">
                                            @if($errors->has('city_name'))
                                            <p class="text-danger p-font"><i class="la la-warning"></i> {{$errors->first('city_name')}}</p>
                                            @endif
                                        </div>
                                      
                                       
                                       
                                        
                                       
                                        
                                        

                                       
                                          
                                        <div class="form-group">
                                            <label class="p-font">City Photo </label>
                                          <input type="file" name="city-image" class="form-control shadow-none" placeholder="City Thumnail Photo" oninput="removeErrorshow(this)" required >
                                          <img src="{{url('')}}/city-image/images/{{$data['image']}}" width="100">
                                           @if($errors->has('city-image'))
                                            <p class="text-danger p-font"><i class="la la-warning"></i> {{$errors->first('city-image')}}</p>
                                            @endif
                                        </div>
                                        
                                        
                                        
                                        
                                        
                                        
                                         
                               
                                <div class="form-group">
                                  <button class="btn-custom p-font">Create City</button>
                                </div>
                                <div class="message"></div>
                               </form>
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