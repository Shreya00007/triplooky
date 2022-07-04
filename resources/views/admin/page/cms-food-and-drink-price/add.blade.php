@extends("admin.layout.header")
@section("title","Add CMS Food And Drink  Price")
@section("content")
<div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="breadcrumb-content">
                            <div class="section-heading">
                                <h2 class="sec__title font-size-30 text-white p-font">CMS Food And Drink  Price Setting</h2>
                            </div>
                        </div><!-- end breadcrumb-content -->
                    </div><!-- end col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="breadcrumb-list text-right">
                            <ul class="list-items">
                                <li><a href="index.html" class="text-white p-font">Home</a></li>
                                <li class="p-font">CMS Food And Drink  Price</li>
                                
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
                                    <div> <h6 class="p-font text-white"><b>Add CMS Food And Drink  Price</b></h6></div>
                                   
                                </div>
                                <div class="card-body">
                                     <form action="/admin/cms/food-and-drink-price/add-data"   class="city-form-insert" enctype="multipart/form-data" method="post">
                                        @csrf
                                         
                                        <div class="form-group">
                                            <label class="p-font">Max Price</label>
                                            <input type="number" name="max_price" class="form-control shadow-none " placeholder="Max Price" oninput="removeErrorshow(this)" value="{{old('max_price')}}">
                                            @if($errors->has('max_price'))
                                            <p class="text-danger p-font"><i class="la la-warning"></i> {{$errors->first('max_price')}}</p>
                                            @endif
                                        </div>
                                         <div class="form-group">
                                            <label class="p-font">Min Price</label>
                                            <input type="number" name="min_price" class="form-control shadow-none " placeholder="Min Price" oninput="removeErrorshow(this)" value="{{old('min_price')}}">
                                            @if($errors->has('min_price'))
                                            <p class="text-danger p-font"><i class="la la-warning"></i> {{$errors->first('min_price')}}</p>
                                            @endif
                                        </div>
                                       
                                    
                                       
                                        
                                       
                                        

                                       
                                  
                                           
                                       


                                        
                                        
                                        
                                        
                                        
                                        
                                         
                               
                                <div class="form-group">
                                  <button class="btn-custom p-font">Create CMS Food And Drink Price</button>
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