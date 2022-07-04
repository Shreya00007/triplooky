@extends("admin.layout.header")
@section("title","Add City")
@section("content")
<div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="breadcrumb-content">
                            <div class="section-heading">
                                <h2 class="sec__title font-size-30 text-white p-font">City Setting</h2>
                            </div>
                        </div><!-- end breadcrumb-content -->
                    </div><!-- end col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="breadcrumb-list text-right">
                            <ul class="list-items">
                                <li><a href="index.html" class="text-white p-font">Home</a></li>
                                <li class="p-font"> City</li>
                                
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
                                    <div> <h6 class="p-font text-white"><b>Add New City</b></h6></div>
                                   
                                </div>
                                <div class="card-body">
                                     <form action="/admin/add-city-data"   class="city-form-insert add-city-form" enctype="multipart/form-data" method="post">
                                        @csrf
                                         
                                        <div class="form-group">
                                            <label class="p-font">City Name</label>
                                            <input type="text" name="city_name" class="form-control shadow-none " placeholder="City Name" oninput="removeErrorshow(this)" value="{{old('city-name')}}">
                                            @if($errors->has('city_name'))
                                            <p class="text-danger p-font"><i class="la la-warning"></i> {{$errors->first('city_name')}}</p>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label class="p-font">City Temperature & Condition </label>
                                            <input type="text" name="temp" class="form-control shadow-none " placeholder="City Temperature & Condition" oninput="removeErrorshow(this)" value="{{old('temp')}}">
                                             @if($errors->has('temp'))
                                            <p class="text-danger p-font"><i class="la la-warning"></i> {{$errors->first('temp')}}</p>
                                            @endif
                                        </div>
                                         <div class="form-group">
                                            <label class="p-font">City Population </label>
                                            <input type="text" name="population" class="form-control shadow-none " placeholder="City Population" oninput="removeErrorshow(this)" value="{{old('population')}}">
                                             @if($errors->has('population'))
                                            <p class="text-danger p-font"><i class="la la-warning"></i> {{$errors->first('population')}}</p>
                                            @endif
                                        </div>
                                         
                                         <div class="form-group">
                                            <label class="p-font">City Surface Area </label>
                                            <input type="text" name="area" class="form-control shadow-none " placeholder="City Surface Area" oninput="removeErrorshow(this)" value="{{old('area')}}">
                                             @if($errors->has('area'))
                                            <p class="text-danger p-font"><i class="la la-warning"></i> {{$errors->first('area')}}</p>
                                            @endif
                                        </div>
                                        
                                       
                                         <div class="form-group">
                                            <label class="p-font">City Map Location </label>
                                            <input type="text" name="map_location" class="form-control shadow-none " placeholder="City Map Location" oninput="removeErrorshow(this)" value="{{old('location')}}">
                                             @if($errors->has('map_location'))
                                            <p class="text-danger p-font"><i class="la la-warning"></i> {{$errors->first('map_location')}}</p>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label class="p-font">Select City</label>
                                            <select class="selectpicker form-control shadow-none" name="good_for[]"  multiple data-actions-box="true" >
                                               <option>Nature & Discovery</option>
                                               <option>Medina & Culture</option>
                                               <option>Beach & Sports</option>
                                              
                                            </select>
                                              @if($errors->has('good_for'))
                                            <p class="text-danger p-font"><i class="la la-warning"></i> {{$errors->first('good_for')}}</p>
                                            @endif
                                        </div>

                                         <div class="form-group">
                                            <label class="p-font">City Recommended Days </label>
                                          <input type="text" name="recommend_day" class="form-control shadow-none" placeholder="City Recommended Days" oninput="removeErrorshow(this)" value="{{old('day')}}">
                                           @if($errors->has('recommend_day'))
                                            <p class="text-danger p-font" ><i class="la la-warning"></i> {{$errors->first('recommend_day')}}</p>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label class="p-font">City Thumnail Photo </label>
                                          <input type="file" name="city-image" class="form-control shadow-none" placeholder="City Thumnail Photo" oninput="removeErrorshow(this)">
                                           @if($errors->has('city-image'))
                                            <p class="text-danger p-font"><i class="la la-warning"></i> {{$errors->first('city-image')}}</p>
                                            @endif
                                        </div>
                                           <div class="form-group">
                                            <label class="p-font">City Multiple Photo </label>
                                          <input type="file" name="multi_image[]" class="form-control shadow-none" placeholder="City Thumnail Photo" oninput="removeErrorshow(this)" multiple>
                                           @if($errors->has('multi_image'))
                                            <p class="text-danger p-font"><i class="la la-warning"></i> {{$errors->first('multi_image')}}</p>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label class="p-font">City Weather Photo </label>
                                          <input type="file" name="weather_image" class="form-control shadow-none" placeholder="City Weather Photo" oninput="removeErrorshow(this)" required>
                                           @if($errors->has('multi_image'))
                                            <p class="text-danger p-font"><i class="la la-warning"></i> {{$errors->first('weather_image')}}</p>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label class="p-font">City Busy Month Photo </label>
                                          <input type="file" name="busy_month_image" class="form-control shadow-none" placeholder="City Busy Month Photo" oninput="removeErrorshow(this)" required>
                                           @if($errors->has('busy_month_image'))
                                            <p class="text-danger p-font"><i class="la la-warning"></i> {{$errors->first('busy_month_image')}}</p>
                                            @endif
                                        </div>
                                         <div class="form-group">
                                            <label class="p-font">City Description </label>
                                           <textarea class="form-control shadow-none d-none" placeholder="City Description" name="description" oninput="removeErrorshow(this)"></textarea>
                                           <div class="editor"></div> 
                                            @if($errors->has('description'))
                                            <p class="text-danger p-font"><i class="la la-warning"></i> {{$errors->first('description')}}</p>
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




             <script>
                 $(document).ready(function(){
                       
             
                  function removeErrorshow(input){
                    if($(input).next().is("p")){
                        $(input).next("p").remove();
                    }

                  }
                  $('#select-good-for').selectpicker('refresh');
                $('.selectpicker').change(function (e) {
    $("select[name=good_for]").val(($(e.target).val()));
});
            

            //form submit editor data to append in textarea
                  $(".add-city-form").submit(function(){
                    if($(".ql-editor").hasClass("ql-blank")){
                        $("textarea[name='description']").html("");
                    }
                    else{
                        $("textarea[name='description']").html($(".ql-editor").html());
                    }
                  });
                 });
             </script>
              
              <style>
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