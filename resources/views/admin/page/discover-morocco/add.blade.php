@extends("admin.layout.header")
@section("title","Add Discover Morocco")
@section("content")
<div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="breadcrumb-content">
                            <div class="section-heading">
                                <h2 class="sec__title font-size-30 text-white p-font">Discover Morocco</h2>
                            </div>
                        </div><!-- end breadcrumb-content -->
                    </div><!-- end col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="breadcrumb-list text-right">
                            <ul class="list-items">
                                <li><a href="index.html" class="text-white p-font">Home</a></li>
                                <li class="p-font"> Discover Morocco</li>
                                
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
                                    <div> <h6 class="p-font text-white"><b>Add Discover Morocco</b></h6></div>
                                    
                                   
                                </div>
                                <div class="card-body">
                                    <form method="post" action="/admin/discover-morocco/add-data" enctype="multipart/form-data" class="add-discover-morocco-form">
                                        @csrf
                                        <div class="form-group">
                                            <label class="p-font">Name</label>
                                            <input type="text" name="name"  class="form-control shadow-none" placeholder=" Name">
                                            <input type="hidden" name="id" value="{{old('name')}}">
                                            @if($errors->first("name"))
                                          <p class="text-danger p-font">  <i class="la la-warning"></i> <span class="">{{$errors->first('name')}}</span></p>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label class="p-font">Select Type</label>
                                            <select class="form-control shadow-none" name="type">
                                                <option>Southern | Atlantic</option>
                                                <option>South-Central | Sahara</option>
                                                <option>Central | Atlantic</option>
                                                <option>North-Central</option>
                                                <option>Northwestern | Atlantic & Mediterranean</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                      
                                         <div class="form-group">
                                            <label class="p-font">Select City</label>
                                            <select class="form-control shadow-none" name="city">
                                                <option>Select City</option>
                                                @foreach($city as $city_list)
                                                <option value="{{$city_list->id}}" {{old('city')==$city_list->id?"selected":""}}>
                                                    {{$city_list->city_name}}
                                                </option>
                                                @endforeach
                                            </select>
                                             @if($errors->first("city"))
                                          <p class="text-danger p-font">  <i class="la la-warning"></i> <span class="">{{$errors->first('city')}}</span></p>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label class="p-font">Thumbnail Photo</label>
                                            <input type="file" name="thumb_image"  class="form-control shadow-none" required="">
                                             @if($errors->first("thumb_image"))
                                          <p class="text-danger p-font">  <i class="la la-warning"></i> <span class="">{{$errors->first('thumb_image')}}</span></p>
                                            @endif
                                        </div>
                                         <div class="form-group">
                                            <label class="p-font">Multiple Photo</label>
                                            <input type="file" name="multi_image[]"  class="form-control shadow-none" required="" multiple="">
                                             @if($errors->first("multi_image"))
                                          <p class="text-danger p-font">  <i class="la la-warning"></i> <span class="">{{$errors->first('multi_image')}}</span></p>
                                            @endif
                                        </div>
                                        

                                         <div class="form-group">
                                            <label class="p-font">Select Status</label>
                                            <select class="form-control shadow-none" name="status">
                                                <option>Select Status</option>
                                                <option value="1" {{old('status')=="1"?"selected":""}}>Active</option>
                                                <option value="0" {{old('status')=="0"?"selected":""}}>Inactive</option>
                                            </select>
                                             @if($errors->first("status"))
                                          <p class="text-danger p-font">  <i class="la la-warning"></i>  <span class="">{{$errors->first('status')}}</span></p>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label class="p-font">Description</label>
                                            <textarea class="form-control shadow-none d-none" name="description" placeholder="Must Do And See Description" rows="6">
                                                {{old('description')}}
                                            </textarea>
                                            <div class="editor"></div>
                                             @if($errors->first("description"))
                                          <p class="text-danger p-font">  <i class="la la-warning"></i> <span class="">{{$errors->first('description')}}</span></p>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <button class="btn-custom shadow-none">Add</button>
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
                  //form submit editor data to append in textarea
                  $(".add-discover-morocco-form").submit(function(){
                    if($(".ql-editor").hasClass("ql-blank")){
                        $("textarea[name='description']").html("");
                    }
                    else{
                        $("textarea[name='description']").html($(".ql-editor").html());
                    }
                  });

              </script>              
                            
@endsection

