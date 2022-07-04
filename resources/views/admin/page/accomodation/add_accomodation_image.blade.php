@extends("admin.layout.header")
@section("title","Add Accomodation Photo")
@section("content")
<div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="breadcrumb-content">
                            <div class="section-heading">
                                <h2 class="sec__title font-size-30 text-white p-font">Accomodation Photo Setting</h2>
                            </div>
                        </div><!-- end breadcrumb-content -->
                    </div><!-- end col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="breadcrumb-list text-right">
                            <ul class="list-items">
                                <li><a href="index.html" class="text-white p-font">Home</a></li>
                                <li class="p-font"> Accomodation Photo</li>
                                
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
                                    <div> <h6 class="p-font text-white"><b>Add Accomodation Photo</b></h6></div>
                                    <div><a href="/admin/accomodation/multiple-image/{{base64_encode($data->id)}}"><button class="btn btn-dark"><i class="la la-arrow-right"></i></button></a></div>
                                   
                                </div>
                                <div class="card-body">
                                    <form method="post" action="/admin/accomodation/add-more-image-accomodation-data" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label class="p-font">Accomodation Name</label>
                                            <input type="text" name="" value="{{$data->name}}" class="form-control shadow-none" readonly="">
                                            <input type="hidden" name="id" value="{{$data->id}}">
                                        </div>
                                        <div class="form-group">
                                            <label class="p-font">Photo</label>
                                            <input type="file" name="image[]" multiple="" class="form-control shadow-none" required="">
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-primary shadow-none">Add Photo</button>
                                        </div>
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