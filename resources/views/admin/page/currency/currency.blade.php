@extends("admin.layout.header")
@section("title","Currency")

@section("content")

<div class="row align-items-center" >

                    <div class="col-lg-6">

                        <div class="breadcrumb-content">

                            <div class="section-heading">

                                <h2 class="sec__title font-size-30 text-white p-font">Currency Setting</h2>

                            </div>

                        </div><!-- end breadcrumb-content -->

                    </div><!-- end col-lg-6 -->

                    <div class="col-lg-6">

                        <div class="breadcrumb-list text-right">

                            <ul class="list-items">

                                <li><a href="index.html" class="text-white p-font">Home</a></li>

                                <li class="p-font">Currency</li>

                                

                            </ul>

                        </div><!-- end breadcrumb-list -->

                    </div><!-- end col-lg-6 -->

                </div><!-- end row -->

               

            </div>

        </div><!-- end dashboard-bread -->

        <div class="dashboard-main-content mt-5">

            <div class="container-fluid">

                <div class="row">

                    
              <div class="col-lg-12">{!!session()->get("message")!!}</div>
                 

                    <div class="col-lg-12">

                        <div class="form-box">

                            <div class="card" style="border:none;box-shadow: 0px 0px 5px black;border-radius: 2px;">

                                <div class="card-header d-flex justify-content-between align-items-center py-3" style="background: #28e5f3;border-radius: 2px;">

                                    <div> <h4 class="text-white p-font"><b>Currency List</b></h4></div>

                                    <div><button class="btn-custom p-font" data-toggle="modal" data-target="#currency-modal">Add New Currency</button></div>

                                </div>

                                <div class="card-body">

                                     <table class="table table-custom currency-table">

                                         <tr>

                                             <th>Country Name</th>

                                               <th>Currency Short Name</th>

                                                 <th>Symbol </th>

                                                   <th>Status</th>

                                                     <th>Action</th>

                                         </tr>

                                         @foreach($data as $list)

                                         <tr>

                                             <td>{{$list->country_name}}</td>

                                              <td>{{$list->currency_name}}</td>

                                               <td>{{$list->symbol}}</td>

                                                <td>
                                                    @if($list->status=="active")
                                                    <a href="/admin/currency-status-update/update-status/{{base64_encode($list->id)}}">
                                                        <button class="btn btn-success shadow-none">active</button>
                                                    </a>
                                                    @else
                                                     <a href="/admin/currency-status-update/update-status/{{base64_encode($list->id)}}">
                                                        <button class="btn btn-danger shadow-none">inactive</button>
                                                    </a>
                                                    @endif
                                                </td>

                                                 <td>

                                                     <div class="d-flex justify-content-center align-items-center">

                                                         <button class="btn-danger btn icon-btn mr-1 shadow-none delete-currency-btn" data="{{$list->id}}"><i class="la la-trash"></i></button>

                                                         <button class="btn-success btn icon-btn shadow-none edit-currency-btn"  data="{{$list->id}}"><i class="la la-edit"></i></button>

                                                     </div>

                                                 </td>



                                         </tr>

                                         @endforeach

                                     </table>

                                     {{$data->links()}}

                                </div>

                            </div>

                           

                        </div><!-- end form-box -->

                    </div><!-- end col-lg-12 -->

                   

                     

                

                    

                     <div class="col-lg-3 responsive-column--m">

                        <div class="form-box dashboard-card">









               

                            

                            

@endsection





@section("modal")

<div class="modal" id="currency-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

  <div class="modal-dialog modal-lg" role="document">

    <div class="modal-content" style="border-radius: 2px;box-shadow: 0px 0px 10px black;">

      <div class="modal-header">

        <h5 class="modal-title p-font" id="exampleModalLongTitle">Add New Currency</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">×</span>

        </button>

      </div>

     <form class="currency-form">

            <div class="modal-body">



               <div class="contact-form-action">                 

                     <div class="input-box">

                        <div class="form-group">

                            <i class="las la-globe form-icon"></i>

                           <input type="text" class="form-control" placeholder="Country Name" name="country_name">

                        </div>

                        <div class="form-group">

                            <i class="las la-wallet form-icon"></i>

                           <input type="text" class="form-control" placeholder="Currency Short Name" name="currency_name">

                        </div>

                        <div class="form-group">

                            <i class="las la-icons form-icon"></i>

                           <input type="text" class="form-control" placeholder="Symbol"  name="symbol">

                        </div>

                        <div class="form-group">

                            <i class="las la-lock form-icon"></i>

                           <select class="form-control p-font" name="status">

                               <option>Select Status</option>

                               <option>Active</option>

                               <option>inactive</option>

                           </select>

                        </div>



                     </div>

                    

                  

               </div>

               <!-- end contact-form-action -->

            </div>

            <div class="modal-footer border-top-0 pt-0">

               <button type="button" class="btn font-weight-bold font-size-15 color-text-2 mr-2 p-font" data-dismiss="modal">Cancel</button>

               <button type="submit" class="theme-btn theme-btn-small p-font">Create Currency</button>

            </div>

            </form>

     

    </div>

  </div>

</div>



<div class="modal-popup">

   <div class="modal fade" id="editCurrency" tabindex="-1" role="dialog" aria-hidden="true">

      <div class="modal-dialog modal-lg" role="document">

         <div class="modal-content" style="border-radius:3px;">

            <div class="modal-header">

               <h5 class="modal-title title p-font" id="exampleModalLongTitle">Edit currency</h5>

               <button type="button" class="close" data-dismiss="modal" aria-label="Close">

               <span aria-hidden="true" class="la la-close"></span>

               </button>

            </div>

             

            <div class="modal-body">

                <form class="currency-update-form">

               <div class="contact-form-action">                 

                     <div class="input-box">

                        <div class="form-group">

                            <i class="las la-globe form-icon"></i>

                           <input type="text" class="form-control" placeholder="Country Name" name="country_name">

                        </div>

                        <div class="form-group">

                            <i class="las la-wallet form-icon"></i>

                           <input type="text" class="form-control" placeholder="Currency Short Name" name="currency_name" >

                        </div>

                        <div class="form-group">

                            <i class="las la-icons form-icon"></i>

                           <input type="text" class="form-control" placeholder="Symbol" name="symbol">

                        </div>

                        <div class="form-group">

                            <i class="las la-lock form-icon"></i>

                           <select class="form-control p-font" name="status">

                               <option>Select Status</option>

                               <option value="active">Active</option>

                               <option value="inactive">inactive</option>

                           </select>

                        </div>



                     </div>

                    

                  

               </div>

               <!-- end contact-form-action -->

            </div>

            <div class="modal-footer border-top-0 pt-0">

               <button type="button" class="btn font-weight-bold font-size-15 color-text-2 mr-2 p-font" data-dismiss="modal">Cancel</button>

               <button type="submit" class="theme-btn theme-btn-small p-font">Update Cuurency</button>

                </form>

            </div>

           

         </div>

      </div>

   </div>

</div>



<div class="modal  bd-example-modal-sm" id="currency-delete-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">

    <div class="modal-content" style="border-radius: 2px;box-shadow: 0px 0px 10px black;">

      

      <div class="modal-body" style="height: 220px;">

     <center><h6 class="p-font"> <b>Are You sure</b></h6></center>

     <hr>

     <center><i class="la la-question-circle text-danger" style="font-size:65px"></i></center>

     <center><div class="d-flex mt-4 justify-content-center align-items-center">

          <button class="btn btn-danger shadow-none px-4 p-font mr-3 confirm-delete-currency-btn">Yes</button>

      <button class="btn btn-info shadow-none px-4 p-font" data-dismiss="modal">No</button>

     </div></center>

      </div>

     

    </div>

  </div>

</div>

@endsection
