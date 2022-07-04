@extends("admin.layout.header")
@section("title","CurrencyConverter List")
@section("content")
<div class="row align-items-center" >
                    <div class="col-lg-6">
                        <div class="breadcrumb-content">
                            <div class="section-heading">
                                <h2 class="sec__title font-size-30 text-white p-font">CurrencyConverter Setting</h2>
                            </div>
                        </div><!-- end breadcrumb-content -->
                    </div><!-- end col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="breadcrumb-list text-right">
                            <ul class="list-items">
                                <li><a href="index.html" class="text-white p-font">Home</a></li>
                                <li class="p-font">CurrencyConverter  list</li>
                                
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
                                    <div> <h4 class="text-white p-font"><b>CurrencyConverter  list</b></h4></div>
                                    <div></div>
                                </div>
                                <div class="card-body">
                                   
                                     <table class="table table-custom">
                                         <tr>
                                             <th>Sr.No</th>
                                             <th>Currency From</th>
                                             <th>Currency To</th>
                                             <th>Price From</th>
                                             <th>Price To</th>

                                             <th>Action</th>
                                         </tr>
                                         @for($i=0;$i<count($data);$i++)
                                         <tr>
                                            <td>{{$i+1}}</td>
                                            <td>{{$data[$i]['currency_from']}}</td>
                                            <td>{{$data[$i]['currency_to']}}</td>
                                            <td>{{$data[$i]['price_from']}}</td>
                                            <td>{{$data[$i]['price_to']}}</td>
                                            <td><div class="btn-group">

                                                <a href="/admin/currency/currency-convert/edit/{{base64_encode($data[$i]['id'])}}" class="btn btn-success shadow-none"><i class="la la-edit"></i></a>
                                                 <a href="/admin/currency/currency-convert/delete/{{base64_encode($data[$i]['id'])}}" class="btn btn-danger shadow-none" onclick="return confirm('Are you sure')"><i class="la la-trash"></i></a>
                                            </div></td>
                                         </tr>
                                         @endfor
                                     </table>
                               
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