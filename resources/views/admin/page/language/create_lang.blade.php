@extends("admin.layout.header")
@section("title","Add Language")
@section("content")

<div class="row align-items-center">

                    <div class="col-lg-6">

                        <div class="breadcrumb-content">

                            <div class="section-heading">

                                <h2 class="sec__title font-size-30 text-white"> Language Setting</h2>

                            </div>

                        </div><!-- end breadcrumb-content -->

                    </div><!-- end col-lg-6 -->

                    <div class="col-lg-6">

                        <div class="breadcrumb-list text-right">

                            <ul class="list-items">

                                <li><a href="index.html" class="text-white">Home</a></li>

                                <li>Language</li>

                                

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

                                    <div> <h5 class="p-font text-white">Language List</h5></div>

                                    <div><button class="btn-custom" data-target="#lang-modal" data-toggle="modal">Add Language</button></div>

                                </div>

                                <div class="card-body">

                                     <table class="table table-custom lang-table">

                                         <tr class="p-font text-center">

                                           

                                             <th>Language Name</th>

                                             <th>Status</th>

                                             <th>Action</th>

                                         </tr>

                                         @foreach($data as $key=> $list)

                                               <tr >

                                                  

                                                   <td>{{$list->lang_name}}</td>

                                                   <td>@if($list->status=="inactive")

                                                    <button class="btn btn-danger shadow-none p-font edit-lang-staus-btn" data="{{($list->id)}}" status="0">incative</button>

                                                   @else

                                                   <button class="btn btn-success shadow-none p-font edit-lang-staus-btn" data="{{($list->id)}}" status="1">Active</button>

                                                   @endif

                                               </td>

                                                   <td class="d-flex justify-content-center align-items-center">

                                                      <button class="icon-btn bg-success mr-2 edit-lang-btn" data="{{($list->id)}}"> <i class="la la-edit  text-white"></i></button>

                                                      <a href="/admin/delete-lang/{{$list->id}}" onclick="return confirm('Are you sure')">
                                                           <button class="icon-btn bg-danger delete-lang-btn" data="{{($list->id)}}" > <i class="la la-trash text-white"></i></button>
                                                      </a>

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



@section("modal")

<div class="modal fade" id="lang-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

  <div class="modal-dialog modal-dialog-centered" role="document">

    <div class="modal-content" style="border-radius: 2px;box-shadow: 0px 0px 10px black;">

      <div class="modal-header">

        <h5 class="modal-title" id="exampleModalLongTitle">Add New Language</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">×</span>

        </button>

      </div>

      <div class="modal-body">

    <form class="lang-form">

                                <div class="form-group">

                                  <label class="p-font">Language Name</label>

                                  <input type="text" name="lang" class="form-control shadow-none" placeholder="Language Name">

                                </div>

                                <div class="form-group">

                                  <Button class="btn-custom" role="insert">Create Language</Button>

                                </div>

                               </form>

      </div>

     

    </div>

  </div>

</div>






<div class="modal bd-example-modal-sm" id="lang-delete-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content" style="border-radius: 2px;box-shadow: 0px 0px 10px black;">
      
      <div class="modal-body" style="height: 220px;">
     <center><h6 class="p-font"> <b>Are You sure</b></h6></center>
     <hr>
     <center><i class="la la-question-circle text-danger" style="font-size:65px"></i></center>
     <center><div class="d-flex mt-4 justify-content-center align-items-center">
          <button class="btn shadow-none px-4 p-font mr-3 confirm-delete-lang-btn" style="border-radius:2px !important;background: darkred;color: white;">Yes</button>
      <button class="btn btn-info shadow-none px-4 p-font" data-dismiss="modal" style="border-radius:2px !important;background: darkblue;color: white;">No</button>
     </div></center>
      </div>
     
    </div>
  </div>
</div>

@endsection