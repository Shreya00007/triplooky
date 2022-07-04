@extends("front.layout.header")

@section("title","Terms and use")

@section("content")

<main id="main">

	<div id="banner">

      <div class="container-fluid bodyPad">

         <h2>Terms and use</h2>

         <ul>

            <li>

               <a href="index.php" class="brdtitle">Home</a>

            </li>

            <li class="list">

             Terms and use

            </li>

         </ul>

      </div>

   </div>

	<div class="aboutus">

 <div class="container-fluid bodyPad">

 	@if(count($data)>0)

   {!! $data[0]->terms !!}

   @endif

 	

 		

 	



</div>

 </div>

	</main>

@endsection