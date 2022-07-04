@extends("admin.layout.header")
@section("title","Add CurrencyConverter")
@section("content")
<div class="row align-items-center" >
                    <div class="col-lg-6">
                        <div class="breadcrumb-content">
                            <div class="section-heading">
                                <h2 class="sec__title font-size-30 text-white p-font">Update CurrencyConverter Setting</h2>
                            </div>
                        </div><!-- end breadcrumb-content -->
                    </div><!-- end col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="breadcrumb-list text-right">
                            <ul class="list-items">
                                <li><a href="index.html" class="text-white p-font">Home</a></li>
                                <li class="p-font">Update CurrencyConverter</li>
                                
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
                        <div class="message"></div>
                        <div class="form-box">
                            <div class="card" style="border:none;box-shadow: 0px 0px 5px black;border-radius: 2px;">
                                <div class="card-header d-flex justify-content-between align-items-center py-3" style="background: dodgerblue;border-radius: 2px;">
                                    <div> <h4 class="text-white p-font"><b>Update CurrencyConverter</b></h4></div>
                                    <div><a href="/admin/currency-convert/list"><button class="btn btn-success">View List</button></a></div>
                                </div>
                                <div class="card-body">
                                   
                                     <form class="CurrencyConverter-form" action="/admin/currency/currency-convert/update" method="post">
                                       @csrf
                                       <input type="hidden" name="id" value="{{$data['id']}}">
                                       <div class="form-group">
                                         <label class="p-font">Currency From</label>
                                         <select class="form-control shadow-none p-font" name="currency_from">
                                           <option>Select Currency</option>
                                           @for($i=0;$i<count($currency);$i++)
                                           <option value="{{$currency[$i]['currency_name']}}" {{$data['currency_from']==$currency[$i]['currency_name']?"selected":""}}>{{$currency[$i]['currency_name']}}</option>
                                           @endfor
                                         </select>
                                       </div>
                                  
                                   <div class="form-group">
                                         <label class="p-font">Currency To</label>
                                         <select class="form-control shadow-none p-font" name="currency_to">
                                           <option>Select Currency</option>
                                           @for($i=0;$i<count($currency);$i++)
                                           <option value="{{$currency[$i]['currency_name']}}" {{$data['currency_to']==$currency[$i]['currency_name']?"selected":""}}>{{$currency[$i]['currency_name']}}</option>
                                           @endfor
                                         </select>
                                       </div>

                                       <div class="form-group">
                                         <label>Price From</label>
                                         <input type="number" name="price_from" class="form-control shadow-none p-font" placeholder="Price From" value="{{$data['price_from']}}" step="any">
                                       </div>
                                        <div class="form-group">
                                         <label>Price To</label>
                                         <input type="number" name="price_to" class="form-control shadow-none p-font" placeholder="Price To" value="{{$data['price_to']}}" step="any">
                                       </div>
                                  
                                 
                                 
                                 

                              
                                   
                                  
                               
                               

                                        <div class="form-group mb-0 d-flex justify-content-between align-items-center">
                                            <button class="btn-custom p-font">Update</button>
                                            <div class="d-none alert d-flex justify-content-between align-items-center activity-message"><div class="mr-5"><span></span></div>
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

@section("script")
<script type="text/javascript" src="{{url('')}}/admin-asstes/js/CurrencyConverter-js/CurrencyConverter.js"></script>

@endsection