@extends("admin.layout.header")
@section("title","Edit Why use triplooky")
@section("content")

<div class="row align-items-center">

                    <div class="col-lg-6">

                        <div class="breadcrumb-content">

                            <div class="section-heading">

                                <h2 class="sec__title font-size-30 text-white p-font">Update Why use Triplooky</h2>

                            </div>

                        </div><!-- end breadcrumb-content -->

                    </div><!-- end col-lg-6 -->

                    <div class="col-lg-6">

                        <div class="breadcrumb-list text-right">

                            <ul class="list-items">

                                <li><a href="index.html" class="text-white">Home</a></li>

                                <li>Why use Triplooky</li>

                                

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

                        <div class="form-box dashboard-card" style="box-shadow: 0px 0px 5px black;border-radius: 2px;">

                            <div class="form-title-wrap d-flex justify-content-between align-items-center">

                               <div> <h3 class="title p-font">Update triplooky</h3></div>

                               

                            </div>

                            <div class="form-content">

                                <div class="row">

                                    <div class="col">

                                    	 <div class="form-content">

                               <form class="update-why-triplooky-form">

                                <input type="hidden" name="id" value="{{$data[0]->id}}" >

                                <div class="form-group">

                                    <label class="p-font">Triplooky Heading</label>

                                    <input type="text" name="heading" class="form-control shadow-none require" placeholder="Heading" value="{{$data[0]->heading}}" required="">

                                </div>

                                <div class="form-group">

                                    <label class="p-font">Triplooky Image</label>

                                    <input type="file" name="image" class="form-control shadow-none mb-2" placeholder="Thing To do Image">

                                    <img src="{{url('')}}/why_triplooy/{{$data[0]->image}}" width="100">

                                </div>

                                



                                <div class="form-group">

                                    <label class="p-font">Description</label>

                                  <div id="editor" class="desc editor">

                                      {!!$data[0]->description !!}

                                  </div>

                                </div>

                                

                                <div class="form-group row">

    <div class="col-sm-6">

      <label class="p-font"> Region</label>

                                    

                      <select name="region" id="region" class="form-control shadow-none require select-region-thing-to-do">

<option value="">Select Region</option>

        @foreach($region as $rg)



            <option value="{{ $rg->id }}" {{ ($data[0]->region_id == $rg->id) ? 'selected' : '' }}>

                {{ $rg->region }}

            </option>



        @endforeach



    </select>                  

                              

    </div>

    <div class="col-sm-6">

      <label class="p-font"> City</label>

                                    <select name="city" id="city" class="form-control shadow-none require select-city-thing-to-do">

                                        <option value="">Select City</option>

        @foreach($city as $ct)



            <option value="{{ $ct->id }}" {{ ($data[0]->city_id == $ct->id) ? 'selected' : '' }}>

                {{ $ct->ville }}

            </option>



        @endforeach

                                    </select> 

    </div>

  </div>

                                <div class="form-group">

                                  <Button class="btn-custom">Update Why use Triplooky</Button>

                                </div>

                               </form>

                           </div>

                                    </div>

                                  

                                   

                                </div><!-- end row -->

                            </div>

                        </div><!-- end form-box -->

                    </div><!-- end col-lg-12 -->

                   

                     

                

                    

                     <div class="col-lg-3 responsive-column--m">

                        <div class="form-box dashboard-card">









               

                            

                            

@endsection