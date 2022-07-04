@extends("admin.layout.header")
@section("title","View Why use triplooky")
@section("content")

<div class="row align-items-center">

                    <div class="col-lg-6">

                        <div class="breadcrumb-content">

                            <div class="section-heading">

                                <h2 class="sec__title font-size-30 text-white"> Why use Triplooky Setting</h2>

                            </div>

                        </div><!-- end breadcrumb-content -->

                    </div><!-- end col-lg-6 -->

                    <div class="col-lg-6">

                        <div class="breadcrumb-list text-right">

                            <ul class="list-items">

                                <li><a href="index.html" class="text-white">Home</a></li>

                                <li> Why use Triplooky </li>

                                

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

                            @if(Session::has("message_success"))

                            <div class="alert alert-success"><i class="la la-close close" data-dismiss="alert"></i>{{Session::get("message_success")}}</div>

                            @endif



                            @if(Session::has("message"))

                            <div class="alert alert-warning"><i class="la la-close close" data-dismiss="alert"></i>{{Session::get("message")}}</div>

                            @endif

                            <div class="card" style="border:none;box-shadow: 0px 0px 5px black;">

                                <div class="card-header d-flex justify-content-between align-items-center" style="background: #28e5f3;border-radius: 2px;" >

                                    <div> <h5 class="p-font text-white"> Why use Triplooky </h5></div>

                                    

                                </div>

                                <div class="card-body p-font">



                                     <table class="table text-center table-custom">

                                        <tr>

                                            <th>Sr.No</th>

                                            <th>Heading</th>

                                            <th>Image</th>

                                            <th>Staus</th>

                                            <th>Action</th>

                                        </tr>

                                         @foreach($data as $key=> $list)

                                         <tr>

                                         <td>{{$key+1}}</td>

                                         <td>{{$list->heading}}</td>

                                           <td><img src="{{url('')}}/why_triplooy/{{$list->image}}" width="100"></td>

                                           <td>

                                               @if($list->status==0)

                                              <a href="/admin/why-triplooky/status/{{base64_encode($list->id)}}"> <button class="btn btn-danger shadow-none" data="{{$list->id}}">inactive</button>

                                              </a>

                                               @else

                                               <a href="/admin/why-triplooky/status/{{base64_encode($list->id)}}"> <button class="btn btn-success shadow-none" data="{{$list->id}}">active</button></a>

                                                @endif



                                           </td>

                                           <td>

                                               <div class="d-flex justify-content-center align-items-center">

                                                   <a href="/admin/why-triplooky/edit/{{base64_encode($list->id)}}">

                                                       <button class="icon-btn bg-success mr-2 text-white shadow-none"><i class="la la-edit"></i></button>

                                                   </a>

                                                   <a href="/admin/why-triplooky/delete/{{base64_encode($list->id)}}"> <button class="icon-btn bg-danger text-white shadow-none mr-2"><i class="la la-trash"></i></button></a>

                                                    <a href="/admin/why-triplooky/view/{{base64_encode($list->id)}}"> <button class="icon-btn bg-info text-white shadow-none"><i class="la la-eye"></i></button></a>

                                               </div>

                                           </td>

                                   </tr>



                                    @endforeach

                                  

                                    </table>

                                   

                                </div>

                            </div>

                           

                        </div><!-- end form-box -->

                    </div><!-- end col-lg-12 -->

                   

                     

                

                    

                     <div class="col-lg-3 responsive-column--m">

                        <div class="form-box dashboard-card">









               

                            

                            

@endsection