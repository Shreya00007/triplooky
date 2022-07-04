@extends("front.layout.header")

@section("title","About us")

@section("content")

<main id="main">

	<div id="banner">

      <div class="container-fluid bodyPad">

         <h2>About Us</h2>

         <ul>

            <li>

               <a href="index.php" class="brdtitle">Home</a>

            </li>

            <li class="list">

             About us

            </li>

         </ul>

      </div>

   </div>

	<div class="aboutus">

 <div class="container-fluid bodyPad">

 

 		

 	@if(count($data)>0)

   {!! $data[0]->about_us !!}

   @endif

 	



</div>

 </div>

	</main>

@endsection