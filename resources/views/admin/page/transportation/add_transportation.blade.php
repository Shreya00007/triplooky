@extends("admin.layout.header")
@section("title","Transportation")
@section("content")
<div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="breadcrumb-content">
                            <div class="section-heading">
                                <h2 class="sec__title font-size-30 text-white p-font">Transportation Setting</h2>
                            </div>
                        </div><!-- end breadcrumb-content -->
                    </div><!-- end col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="breadcrumb-list text-right">
                            <ul class="list-items">
                                <li><a href="index.html" class="text-white p-font">Home</a></li>
                                <li class="p-font"> Transportation</li>
                                
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
                                    <div> <h6 class="p-font text-white"><b>Add Transportation</b></h6></div>
                                   
                                </div>
                                <div class="card-body">
                                     <form action="/admin/transportation/add-transportation"    enctype="multipart/form-data" method="post" class="add-transportation-form">
                                        @csrf
                                         
                                        <div class="form-group">
                                            <label class="p-font">Transportation Name</label>
                                            <input type="text" name="name" class="form-control shadow-none " placeholder="Transportation Name" oninput="removeErrorshow(this)" value="{{old('name')}}">
                                            @if($errors->has('name'))
                                            <p class="text-danger p-font"><i class="la la-warning"></i> {{$errors->first('name')}}</p>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label class="p-font">Thumbnail Photo </label>
                                            <input type="file" name="image" class="form-control shadow-none images" placeholder="Photo" oninput="removeErrorshow(this)" value="{{old('image')}}" accept="image/*" value="{{old('image')}}" multiple="">
                                             @if($errors->has('image'))
                                            <p class="text-danger p-font"><i class="la la-warning"></i> {{$errors->first('image')}}</p>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label class="p-font">Multiple Photo </label>
                                            <input type="file" name="multi_image[]" class="form-control shadow-none images" placeholder="Photo" oninput="removeErrorshow(this)" value="{{old('multiple_image')}}" accept="image/*" value="{{old('image')}}" multiple="">
                                             @if($errors->has('multiple_image'))
                                            <p class="text-danger p-font"><i class="la la-warning"></i> {{$errors->first('multiple_image')}}</p>
                                            @endif
                                        </div>
                                         <div class="form-group">
                                            <label class="p-font">Phone No </label>
                                            <div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">(+212)-</span>
  </div>
  <input type="text" name="phone" class="form-control shadow-none " placeholder="Phone No" oninput="removeErrorshow(this)" value="{{old('phone')}}" maxlength="50" >
</div>
                                            
                                             @if($errors->has('phone'))
                                            <p class="text-danger p-font"><i class="la la-warning"></i> {{$errors->first('phone')}}</p>
                                            @endif
                                        </div>
                                         <div class="form-group">
                                            <label class="p-font">Star </label>
                                            <input type="number" name="star" class="form-control shadow-none " placeholder="Star" oninput="removeErrorshow(this)" value="{{old('star')}}">
                                             @if($errors->has('star'))
                                            <p class="text-danger p-font"><i class="la la-warning"></i> {{$errors->first('star')}}</p>
                                            @endif
                                        </div>
                                         
                                         <div class="form-group">
                                            <label class="p-font">Rating </label>
                                            <input type="text" name="rating" class="form-control shadow-none " placeholder="Rating" oninput="removeErrorshow(this)" value="{{old('rating')}}">
                                             @if($errors->has('rating'))
                                            <p class="text-danger p-font"><i class="la la-warning"></i> {{$errors->first('rating')}}</p>
                                            @endif
                                        </div>
                                        
                                       
                                         <div class="form-group">
                                            <label class="p-font"> Status</label>
                                            <select class="form-control shadow-none" name="status">
                                                <option  value="select-status">Select Status</option>
                                                <option {{old('status')=='1'?"selected":""}} value="1">Active</option>
                                                <option {{old('status')=='0'?"selected":""}} value="0">Deactive</option>
                                            </select>
                                             @if($errors->has('status'))
                                            <p class="text-danger p-font" ><i class="la la-warning"></i> {{$errors->first('status')}}</p>
                                            @endif

                                        </div>
                                        

                                         <div class="form-group">
                                            <label class="p-font">Type</label>
                                          <select class="form-control shadow-none" name="type">
                                              <option>Select Type</option>
                                               @for($i=0;$i<count($transportation_type);$i++)
                                               <option value="{{$transportation_type[$i]['name']}}" {{$transportation_type[$i]['name']==old('type')?"selected":""}}>{{$transportation_type[$i]['name']}}</option>
                                               @endfor
                                            
                                              
                                            
                                              
                                          </select>
                                         
                                           @if($errors->has('type'))
                                            <p class="text-danger p-font" ><i class="la la-warning"></i> {{$errors->first('type')}}</p>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label class="p-font">Price/Person</label>
                                          <input type="number" name="price" class="form-control shadow-none" placeholder="Price/Person" oninput="removeErrorshow(this)" value="{{old('price')}}">
                                           @if($errors->has('price'))
                                            <p class="text-danger p-font"><i class="la la-warning"></i> {{$errors->first('price')}}</p>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label class="p-font">Link </label>
                                          <input type="url" name="link" class="form-control shadow-none" placeholder="Link" oninput="removeErrorshow(this)" value="{{old('link')}}">
                                           @if($errors->has('link'))
                                            <p class="text-danger p-font"><i class="la la-warning"></i> {{$errors->first('link')}}</p>
                                            @endif
                                        </div>
                                       
                                        <div class="form-group">
                                            <label class="p-font">DriverLanguage</label>
                                            <select class="form-control shadow-none" name="lang_name">
                                                <option>Select language</option>
                                                @foreach($language as $lang)
        <option value="{{$lang->lang_name}}" @if (old('lang_name')==$lang->lang_name) selected="selccted" @endif>{{$lang->lang_name}}</option>
                                                @endforeach

                                            </select>
                                             @if($errors->has('lang_name'))
                                            <p class="text-danger p-font"><i class="la la-warning"></i> {{$errors->first('lang_name')}}</p>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label class="p-font">Map </label>
                                          <input type="text" name="map" class="form-control shadow-none" placeholder="Map" oninput="removeErrorshow(this)" value="{{old('map')}}">
                                           @if($errors->has('map'))
                                            <p class="text-danger p-font"><i class="la la-warning"></i> {{$errors->first('map')}}</p>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                          <label class="p-font">
                                            Select City
                                          </label>
                                          <select class="form-control shadow-none" name="city">
                                            <option>Select City</option>
                                                @foreach($city as $city_list)
                                                <option value="{{$city_list->id}}">{{$city_list->city_name}}</option>
                                                @endforeach
                                          </select>
                                        </div>

                                      <!--   <div class="form-group">
                                            <label class="p-font">Select City</label>
                                            <select class="selectpicker form-control shadow-none" name="city[]"  multiple data-actions-box="true" >
                                               
                                                @foreach($city as $city_list)
                                                <option value="{{$city_list->id}}">{{$city_list->city_name}}</option>
                                                @endforeach
                                            </select>
                                              @if($errors->has('city'))
                                            <p class="text-danger p-font"><i class="la la-warning"></i> {{$errors->first('city')}}</p>
                                            @endif
                                        </div> -->

                                         <div class="form-group">
                                            <label class="p-font">Address </label>
                                           <textarea class="form-control shadow-none" placeholder="Address" name="address" oninput="removeErrorshow(this)" value="{{old('description')}}">
                                               {{old('address')}}
                                           </textarea>
                                            @if($errors->has('address'))
                                            <p class="text-danger p-font"><i class="la la-warning"></i> {{$errors->first('address')}}</p>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label class="p-font">Description</label>
                                         <textarea class="form-control shadow-none d-none" placeholder=" Description" name="description" oninput="removeErrorshow(this)" value="{{old('description')}}">
                                             {{old('desciption')}}
                                         </textarea>
                                         <div class="editor">
                                             {!! old('desciption') !!}
                                         </div> 
                                            @if($errors->has('description'))
                                            <p class="text-danger p-font"><i class="la la-warning"></i> {{$errors->first('description')}}</p>
                                            @endif
                                        </div>


                                        
                                        
                                        
                                        
                                        
                                        
                                         
                               
                                <div class="form-group">
                                  <button class="btn-custom p-font">Add Transportation</button>
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
                  $("select").on("change",function(){
                    if($(this).next().is("p")){
                        $(this).next("p").remove();
                    }
                  });

                 $('.select-city').selectpicker();
                $('.selectpicker').change(function (e) {
    $("select[name=city]").val(($(e.target).val()));
});

                //multiple image select 20 validation
                $(".images").on("change",function(){
                    var file_length=this.files.length;
                  
                    if(file_length>10){
                        $(this).val("");
                        alert("Not select file more than 10");
                    }
                });
                //end multiple image select 20 validation

                 //form submit editor data to append in textarea
                  $(".add-transportation-form").submit(function(){
                    if($(".ql-editor").hasClass("ql-blank")){
                        $("textarea[name='description']").html("");
                    }
                    else{
                        $("textarea[name='description']").html($(".ql-editor").html());
                    }
                  });
              </script> 

              <style type="text/css">
                  .select {
    width: 200px;
    height: 30px;
    background-color: #141414 !important;
    border-style: solid;
    border-left-width: 3px;
    border-left-color: #00DDDD;
    border-top: none;
    border-bottom: none;
    border-right: none;
    color: white;
    font-size: 18px;
    font-weight: 200;
    padding-left: 6px;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
}
.selectpicker{
    width: 200px;
    height: 30px;
    background-color: #141414 !important;
    border-style: solid;
    border-left-width: 3px;
    border-left-color: #00DDDD;
    border-top: none;
    border-bottom: none;
    border-right: none;
    color: white;
    font-size: 18px;
    font-weight: 200;
    padding-left: 6px;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
}
select::-ms-expand { /* for IE 11 */
    display: none;
}
.wia-filter-value {
    width: 200px;
    height: 30px;
    background-color: #141414 !important;
    border-style: solid;
    border-left-width: 3px;
    border-left-color: #00DDDD;
    border-top: none;
    border-bottom: none;
    border-right: none;
    color: white;
    font-size: 18px;
    font-weight: 200;
    padding-left: 6px;
}
              </style>             
                            
@endsection