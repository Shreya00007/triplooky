@extends("admin.layout.header")

@section("title","Transportation")
@section("content")
<div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="breadcrumb-content">
                            <div class="section-heading">
                                <h2 class="sec__title font-size-30 text-white p-font">Transportation Comment Setting</h2>
                            </div>
                        </div><!-- end breadcrumb-content -->
                    </div><!-- end col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="breadcrumb-list text-right">
                            <ul class="list-items">
                                <li><a href="index.html" class="text-white p-font">Home</a></li>
                                <li class="p-font"> Transportation Comment</li>
                                
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
                                <div class="card-header d-flex justify-content-between align-items-center py-3" style="background:black;border-radius: 2px;">
                                    <div> <h6 class="p-font text-white"><b> Transportation Comment List</b></h6></div>
                                   
                                </div>
                                <div class="card-body">
                                   @if(!empty($data))
                                   <ul class="list-group">
                                    @for($i=0;$i<count($data);$i++)
                                    <li class="list-group-item d-flex justify-content-between align-items-center mb-2 border border-dark">
               {{$data[$i]['comments']}}
        <span class="d-flex flex-column">
          <div>{{$data[$i]['user_email']}}</div>
         <div class="d-flex"> <pre class="p-font"><span>Rating</span> <b class="text-success">{{$data[$i]['rating']}}</b></pre></div>
          <div class="d-flex">@for($j=0;$j<$data[$i]['rating'];$j++)
             <i class="la la-star" style="color: orange"></i>
          @endfor
        </div>
        <div>Comment Date: {{date("d-m-Y",strtotime($data[$i]['created_at']))}}</div>
      
    </span>
  </li>
                                    @endfor
  
  
</ul>
                                   @else
                                   <h1>No Any Comment</h1>
                                   @endif
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
                  $("select").on("change",function(){
                    if($(this).next().is("p")){
                        $(this).next("p").remove();
                    }
                  });

                 $('.select-city').selectpicker();
                $('.selectpicker').change(function (e) {
    $("select[name=city]").val(($(e.target).val()));
});

                //multiple image select 20 validation
                $(".images").on("change",function(){
                    var file_length=this.files.length;
                  
                    if(file_length>10){
                        $(this).val("");
                        alert("Not select file more than 10");
                    }
                });
                //end multiple image select 20 validation
              </script> 

              <style type="text/css">
                  .select {
    width: 200px;
    height: 30px;
    background-color: #141414 !important;
    border-style: solid;
    border-left-width: 3px;
    border-left-color: #00DDDD;
    border-top: none;
    border-bottom: none;
    border-right: none;
    color: white;
    font-size: 18px;
    font-weight: 200;
    padding-left: 6px;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
}
.selectpicker{
    width: 200px;
    height: 30px;
    background-color: #141414 !important;
    border-style: solid;
    border-left-width: 3px;
    border-left-color: #00DDDD;
    border-top: none;
    border-bottom: none;
    border-right: none;
    color: white;
    font-size: 18px;
    font-weight: 200;
    padding-left: 6px;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
}
select::-ms-expand { /* for IE 11 */
    display: none;
}
.wia-filter-value {
    width: 200px;
    height: 30px;
    background-color: #141414 !important;
    border-style: solid;
    border-left-width: 3px;
    border-left-color: #00DDDD;
    border-top: none;
    border-bottom: none;
    border-right: none;
    color: white;
    font-size: 18px;
    font-weight: 200;
    padding-left: 6px;
}
              </style>             
                            
@endsection