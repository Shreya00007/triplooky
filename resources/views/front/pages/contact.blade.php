@extends("front.layout.header")

@section("title","Contact us")

@section("content")

<main id="main">  

   <div id="banner">

      <div class="container-fluid bodyPad">

         <h2>Contact us</h2>

         <ul>

            <li>

               <a href="#" class="brdtitle">Home</a>

            </li>

            <li class="list">

             Contact us

            </li>

         </ul>

      </div>

   </div>

   <!-- Blog listing section start -->

   <div class="container mt-5 mb-5">

      <div class="mapouter">

            <div class="gmap_canvas">

               
              @if(count($map)>0)
             {!! $map[0]->map !!}
              @endif

               <style>.mapouter{position:relative;text-align:right;height:250px;width:100%;}</style>

               <style>.gmap_canvas {overflow:hidden;background:none!important;height:250px;width:100%;}</style>

            </div>

         </div>

          @if(count($data)>0)

          <div class="d-flex just mt-3">

         <div class="contact-social">

            <i class="fas fa-envelope"></i>

            <span>{{$data[0]->email}}</span>

         </div>

         <div class="contact-social">

            <i class="fas fa-phone"></i>

            <span>{{$data[0]->phone}}</span>

         </div>

         <div class="contact-social">

            <i class="fas fa-map-marker-alt"></i>

            <span>{!!$data[0]->address !!}</span>

         </div>

      </div>

          @else

          

          @endif



      <div class="contact-form mt-5">

         <h3>Send us message</h3>

         <form  class="form text-left customer-query-form">

            <div class="row">
  @csrf
               <div class="col-md-4 col-xs-12">

                  <div class="form-group cont">            

                     <input type="text" id="user" class="form-control shadow-none" placeholder="Your name" name="name" required="">

                  </div>

                  <div class="form-group cont">            

                     <input type="email" id="user" class="form-control shadow-none" placeholder="Your email" name="email" required="">

                  </div>

                  <div class="form-group cont">            

                     <input type="text" id="user" class="form-control shadow-none" placeholder="Your subject" name="subject" required="">

                  </div>

               </div>

               <div class="col-md-8 col-xs-12">

                  <div class="form-group cont">

                     <textarea cols="6" rows="4" class="form-control shadow-none" placeholder="Your message" name="query" required=""></textarea>

                  </div>

                  <div class="text-right">

                     <button type="submit" class="form-submit">Submit</button>

                  </div>

               </div>

            </div>

         </form>

      </div>

      

   </div>

   

  

  

</main>

@endsection