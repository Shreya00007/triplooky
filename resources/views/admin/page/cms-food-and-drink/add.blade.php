@extends("admin.layout.header")
@section("title","Add CMS Food And Drink")
@section("content")
<div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="breadcrumb-content">
                            <div class="section-heading">
                                <h2 class="sec__title font-size-30 text-white p-font">CMS Food And Drink Setting</h2>
                            </div>
                        </div><!-- end breadcrumb-content -->
                    </div><!-- end col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="breadcrumb-list text-right">
                            <ul class="list-items">
                                <li><a href="index.html" class="text-white p-font">Home</a></li>
                                <li class="p-font">CMS Food And Drink</li>
                                
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
                                    <div> <h6 class="p-font text-white"><b>Add CMS Food And Drink</b></h6></div>
                                   
                                </div>
                                <div class="card-body">
                                     <form action="/admin/cms/food-and-drink/add-data"   class="city-form-insert" enctype="multipart/form-data" method="post">
                                        @csrf
                                         
                                        <div class="form-group">
                                            <label class="p-font">Name</label>
                                            <input type="text" name="name" class="form-control shadow-none " placeholder="Name" oninput="removeErrorshow(this)" value="{{old('city-name')}}">
                                            @if($errors->has('name'))
                                            <p class="text-danger p-font"><i class="la la-warning"></i> {{$errors->first('name')}}</p>
                                            @endif
                                        </div>
                                       
                                       <div class="form-group">
                                           <label class="p-font">Select Status</label>
                                           <select class="form-control shadow-none" name="status">
                                               <option>Select Status</option>
                                               <option value="1" {{old('status')=="1"?"selected":""}}>Active</option>
                                               <option value="0" {{old('status')=="0"?"selected":""}}>Inactive</option>
                                           </select>
                                            @if($errors->has('status'))
                                            <p class="text-danger p-font"><i class="la la-warning"></i> {{$errors->first('status')}}</p>
                                            @endif
                                       </div>
                                         
                                       
                                        
                                       
                                        

                                       
                                        <div class="form-group">
                                            <label class="p-font">Thumnail Photo </label>
                                          <input type="file" name="image" class="form-control shadow-none" placeholder="Thumnail Photo" oninput="removeErrorshow(this)">
                                           @if($errors->has('image'))
                                            <p class="text-danger p-font"><i class="la la-warning"></i> {{$errors->first('image')}}</p>
                                            @endif
                                        </div>
                                           
                                       


                                        
                                        
                                        
                                        
                                        
                                        
                                         
                               
                                <div class="form-group">
                                  <button class="btn-custom p-font">Create CMS Food And Drink </button>
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