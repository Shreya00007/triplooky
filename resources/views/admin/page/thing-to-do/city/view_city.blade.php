@extends("admin.layout.header")
@section("content")
<div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="breadcrumb-content">
                            <div class="section-heading">
                                <h2 class="sec__title font-size-30 text-white"> View City Setting</h2>
                            </div>
                        </div><!-- end breadcrumb-content -->
                    </div><!-- end col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="breadcrumb-list text-right">
                            <ul class="list-items">
                                <li><a href="index.html" class="text-white">Home</a></li>
                                <li>View City</li>
                                
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
                        <div class="form-box">
                           
                            <div class="card" style="border:none;box-shadow: 0px 0px 5px black;">
                                <div class="card-header d-flex justify-content-between align-items-center" style="background: #28e5f3;border-radius: 2px;" >
                                    <div> <h5 class="p-font text-white">City List</h5></div>
                                    
                                </div>
                                <div class="card-body p-font">
                                      <div class="form-group">
                                          <label class="p-font">Select Region</label>
                                          <select class="p-font  form-control shadow-none" id="select-region">
                                              <option>Select Region</option>
                                              @foreach($data as $list)
                                              <option value="{{$list->id}}">{{$list->region}}</option>
                                              @endforeach
                                          </select>
                                      </div>
                                     <table class="table text-center table-custom city-table">
                                        <tr>
                                            <th>Sr.No</th>
                                            <th>City</th>
                                           
                                            <th>Action</th>
                                        </tr>
                                        
                                  
                                    </table>
                                   
                                </div>
                            </div>
                           
                        </div><!-- end form-box -->
                    </div><!-- end col-lg-12 -->
                   
                     
                
                    
                     <div class="col-lg-3 responsive-column--m">
                        <div class="form-box dashboard-card">




               
                            
                            
@endsection