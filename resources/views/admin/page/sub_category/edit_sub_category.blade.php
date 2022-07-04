@extends("admin.layout.header")
@section("title","Update Sub Category")
@section("content")
<div class="row align-items-center" >
                    <div class="col-lg-6">
                        <div class="breadcrumb-content">
                            <div class="section-heading">
                                <h2 class="sec__title font-size-30 text-white p-font">Update Sub Category Setting</h2>
                            </div>
                        </div><!-- end breadcrumb-content -->
                    </div><!-- end col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="breadcrumb-list text-right">
                            <ul class="list-items">
                                <li><a href="index.html" class="text-white p-font">Home</a></li>
                                <li class="p-font">Update Sub Category</li>
                                
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
                         {!! Session::get('message') !!}
                        <div class="form-box">
                            <div class="card" style="border:none;box-shadow: 0px 0px 5px black;border-radius: 2px;">
                                <div class="card-header d-flex justify-content-between align-items-center py-3" style="background: #28e5f3;border-radius: 2px;">
                                    <div> <h5 class="text-white p-font"><b>Update Sub Category</b></h5></div>
                                    <div><span></span></div>
                                </div>
                                <div class="card-body">
                                     <form  method="POST"  action="/admin/update-sub-categeory-data">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$data->id}}">
                                        <div class="form-group">

                                            <label class="p-font">Select Category</label>
                                            <select class="form-control shadow-none" name="category" >
                                                <option>Select Category</option>
                                                @foreach($category as $list)
                                                <option value="{{$list->id}}" {{$data->categories['category_name']==$list->category_name?'selected':''}} >{{$list->category_name}}</option>
                                                @endforeach
                                            </select>
                                            {{old('category')}}
                                            <p class="text-danger p-font">{{$errors->first('category')}}</p>
                                        </div>
                                        <div class="form-group">
                                            <label class="p-font">Sub Category Name</label>
                                            <input type="text" name="sub_category_name" class="form-control shadow-none rounded-0" placeholder="Sub Category Name" value="{{$data->sub_category_name}}">
                                        </div>
                                        <p class="text-danger p-font"> {{$errors->first('sub_category_name')}}</p>
                                        
                                        

                                        <div class="form-group mb-0 d-flex justify-content-between align-items-center">
                                            <button class="btn-custom p-font">Update Sub Category</button>
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