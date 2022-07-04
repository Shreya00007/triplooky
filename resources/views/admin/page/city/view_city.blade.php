@extends("admin.layout.header")
@section("title","City List")
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
                                <div class="card-header d-flex justify-content-between align-items-center py-4" style="background: deeppink;border-radius: 2px;">
                                    <div> <h5 class="p-font text-white"><b> City List</b></h5></div>
                                   
                                </div>
                                <div class="card-body">
                                     <table class="table table-custom">
                                         <thead>
                                             <tr>
                                                 <th>Sr.No</th>
                                                 <th>City Name</th>
                                                 <th>City Photo</th>
                                                 <th>Order</th>
                                                 <th>Status</th>
                                                 <th>Action</th>
                                             </tr>
                                         </thead>
                                         <tbody>
                                            @foreach($data as $key=>$list)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td>{{$list->city_name}}</td>
                                                <td><img src="{{url('')}}/city-image/images/{{$list->image}}" width="100"></td>
                                                <td>
                                                    <div class="input-group">
                                                        <select class="form-control shadow-none" name="order">
                                                              @foreach($data as $key=>$list1)
                                                            <option {{$list->order_by==$key+1?"selected":""}}>{{$key+1}}</option>
                                                            @endforeach
                                                        </select>
                                                        <div class="input-group-append">
                                                            <button class="btn btn-primary shadow-none p-font city-order-change-btn" data="{{$list->id}}">Change</button>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    @if($list->status==1)
                                                    <button class="btn btn-success shadow-none city-status-btn" data="{{$list->id}}" status="1">Active</button>
                                                    @else
                                                    <button class="btn btn-danger shadow-none city-status-btn" data="{{$list->id}}" status="0">Inctive</button>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center align-items-center">
                                                        <a href="/admin/city/edit-city/{{base64_encode($list->id)}}"><button class="edit-city-btn icon-btn bg-success text-white mr-2" data=""><i class="la la-edit"></i>
                                                        </button></a>
                                                        <a href="/admin/city/delete-city/{{$list->id}}" onclick="return confirm('Are you sure to delete')">
                                                               <button class="icon-btn delete-city-btn btn-danger text-white shadow-none mr-2" data="{{$list->id}}"><i class="la la-trash" ></i></button>
                                                        </a>
                                                         <a href="/admin/city/city-image/{{base64_encode($list->id)}}" >
                                                               <button class="icon-btn  btn-dark text-white shadow-none" data="{{base64_encode($list->id)}}"><i class="la la-photo" ></i></button>
                                                        </a>
                                                     
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                         </tbody>

                                     </table>
                                      {{$data->links()}}
                                </div>
                            </div>
                           
                        </div><!-- end form-box -->
                    </div><!-- end col-lg-12 -->
                   
                     
                
                    
                     <div class="col-lg-3 responsive-column--m">
                        <div class="form-box dashboard-card">

<!------------ CITY ORDER CHANGE ----------------------->
<script type="text/javascript">
    $(document).ready(function(){
        $(".city-order-change-btn").each(function(){
            $(this).click(function(){
                var btn=this;
                var order_value=$(this).parent().parent().find("select").val().trim();
               var id=$(this).attr("data");
               $.ajax({
                 type:"POST",
                 url:"/admin/city/update-city-order",
                 data:{
                    _token:$("body").attr("data"),
                    id:id,
                    order:order_value,

                 },
                 beforeSend:function(){
                    $(btn).html('Please Wait');
                    $(btn).attr("disabled",true);
                 },
                 success:function(response){
                    $(btn).html('Change');
                    $(btn).attr("disabled",false);
                    if(response.message=="success"){
                        location.reload();

                    }
                    else{
                        alert(response.message);
                    }
                 }

               });
            });
        });
    });
</script>
<!--END CITY ORDER CHANGE --------------------------->


               
                            
                            
@endsection


