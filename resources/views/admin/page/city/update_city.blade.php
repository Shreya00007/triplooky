@extends("admin.layout.header")
@section("title","Update City Details")
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
                                    <div> <h6 class="p-font text-white"><b>Update City</b></h6></div>
                                   
                                </div>
                                <div class="card-body">
                                     <form action="/admin/update-city-data" enctype="multipart/form-data" method="post" class="update-city">
                                        @csrf
                                         <input type="hidden" name="id" value="{{$data->id}}">
                                        <div class="form-group">
                                            <label class="p-font">City Name</label>
                                            <input type="text" name="city_name" class="form-control shadow-none " placeholder="City" value="{{$data->city_name}}">
                                             @if($errors->has('city'))
                                            <p class="text-danger p-font"><i class="la la-warning"></i> {{$errors->first('city')}}</p>
                                            @endif
                                        </div>
                                       
                                       
                                        <div class="form-group">
                                            <label class="p-font">City Temperature & Condition </label>
                                            <input type="text" name="temp" class="form-control shadow-none " placeholder="City Temperature & Condition" oninput="removeErrorshow(this)" value="{{$data->temp}}" >
                                             @if($errors->has('temp'))
                                            <p class="text-danger p-font"><i class="la la-warning"></i> {{$errors->first('temp')}}</p>
                                            @endif
                                        </div>

                                         <div class="form-group">
                                            <label class="p-font">City Population </label>
                                            <input type="text" name="population" class="form-control shadow-none " placeholder="City Population" oninput="removeErrorshow(this)" value="{{$data->population}}">
                                             @if($errors->has('population'))
                                            <p class="text-danger p-font"><i class="la la-warning"></i> {{$errors->first('population')}}</p>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label class="p-font">City Surface Area </label>
                                            <input type="text" name="area" class="form-control shadow-none " placeholder="City Surface Area" oninput="removeErrorshow(this)" value="{{$data->area}}">
                                             @if($errors->has('area'))
                                            <p class="text-danger p-font"><i class="la la-warning"></i> {{$errors->first('area')}}</p>
                                            @endif
                                        </div>
                                            <div class="form-group">
                                            <label class="p-font">City Map Location </label>
                                            <textarea name="map_location" class="form-control shadow-none" placeholder="City Map Location" oninput="removeErrorshow(this)" value="{{$data->map_location}}" rows="6" spellcheck="false">
                                            	{{$data->map_location}}
                                            	
                                            </textarea> 
                                             @if($errors->has('location'))
                                            <p class="text-danger p-font"><i class="la la-warning"></i> {{$errors->first('location')}}</p>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label class="p-font">Select City</label>
                                            <select class="selectpicker form-control shadow-none" name="good_for[]"  multiple data-actions-box="true" >
                                            	@php
                                            	$list=['Nature & Discovery','Medina & Culture','Beach & Sports'];
                                            	$good_for=json_decode($data->good_for);
                                            	@endphp
                                              @if($data->good_for)
                                              @foreach($list as $key=> $list_data)
                                              @if(in_array($list_data,$good_for))
                                                <option value="{{$list_data}}" selected="">{{$list_data}}</option>
                                                @else
                                                <option value="{{$list_data}}">{{$list_data}}</option>
                                                @endif
                                              @endforeach
                                              @else
                                              <option value="Nature & Discovery">Nature & Discovery</option>
                                              <option value="Medina & Culture">Medina & Culture</option>
                                              <option value="Beach & Sports" >Beach & Sports</option>
                                              @endif
                                          
                                            </select>
                                              @if($errors->has('good_for'))
                                            <p class="text-danger p-font"><i class="la la-warning"></i> {{$errors->first('good_for')}}</p>
                                            @endif
                                        </div>
                                        

                                         <div class="form-group">
                                            <label class="p-font">City Recommended Days </label>
                                          <input type="text" name="recommend_day" class="form-control shadow-none" placeholder="City Recommended Days" oninput="removeErrorshow(this)" value="{{$data->recommend_day}}">
                                           @if($errors->has('day'))
                                            <p class="text-danger p-font" ><i class="la la-warning"></i> {{$errors->first('day')}}</p>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label class="p-font">City Thumnail Photo </label>
                                          <input type="file" name="city-image" class="form-control shadow-none" placeholder="City Thumnail Photo" oninput="removeErrorshow(this)">
                                          <img src="{{url('')}}/city-image/images/{{$data->image}}" width="100">
                                           @if($errors->has('image'))
                                            <p class="text-danger p-font"><i class="la la-warning"></i> {{$errors->first('image')}}</p>
                                            @endif
                                        </div>
                                         <div class="form-group">
                                            <label class="p-font">City Weather Photo </label>
                                          <input type="file" name="weather_image" class="form-control shadow-none" placeholder="City Weather Photo" oninput="removeErrorshow(this)" >
                                          <img src="{{url('')}}/city-image/weather/{{$data->weather_image}}" width="100">
                                           @if($errors->has('weather_image'))
                                            <p class="text-danger p-font"><i class="la la-warning"></i> {{$errors->first('weather_image')}}</p>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label class="p-font">City Busy Month Photo </label>
                                          <input type="file" name="busy_month_image" class="form-control shadow-none" placeholder="City Busy Month Photo" oninput="removeErrorshow(this)" >
                                          <img src="{{url('')}}/city-image/busy-month/{{$data->busy_month_image}}" width="100">
                                           @if($errors->has('busy_month_image'))
                                            <p class="text-danger p-font"><i class="la la-warning"></i> {{$errors->first('busy_month_image')}}</p>
                                            @endif
                                        </div>
                                         <div class="form-group">
                                            <label class="p-font">City Description </label>
                                           <textarea class="form-control shadow-none d-none" placeholder="City Description" name="description" oninput="removeErrorshow(this)">
                                               
                                              
                                           </textarea>
                                            <div class="editor">
                                                 {!! $data->description !!}
                                               </div>
                                            @if($errors->has('description'))
                                            <p class="text-danger p-font"><i class="la la-warning"></i> {{$errors->first('description')}}</p>
                                            @endif
                                        </div>


                                        
                                        
                                        
                                         
                               
                                <div class="form-group">
                                  <button class="btn-custom p-font">Update City</button>
                                </div>
                                <div class="message"></div>
                               </form>
                                </div>
                            </div>
                           
                        </div><!-- end form-box -->
                    </div><!-- end col-lg-12 -->
                   
                     
                
                    
                     <div class="col-lg-3 responsive-column--m">
                        <div class="form-box dashboard-card">




               
                            
                            
@endsection

@section("script")
<script type="text/javascript">
    //city image validation
    // $("input[name=city-image]").on("change",function(){
    //     var file=this.files[0];
    //     var url=URL.createObjectURL(file);
    //     var image=new Image();
    //     image.src=url;
    //     image.onload=function(){
    //        if(image.height==400 && image.width==826){

    //        }
    //        else{
    //         alert("City Photo Size Should be 826/400");
    //         $("input[name=city-image]").val("");
    //        }
    //     }
    // });

    //form submit editor data to append in textarea
                  $(".update-city").submit(function(){
                    if($(".ql-editor").hasClass("ql-blank")){
                        $("textarea[name='description']").html("");
                    }
                    else{
                        $("textarea[name='description']").html($(".ql-editor").html());
                    }
                  });
</script>
@endsection