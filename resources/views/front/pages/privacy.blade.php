@extends("front.layout.header")

@section("title","Privacy Policy")

@section("content")

<main id="main">

	<div id="banner">

      <div class="container-fluid bodyPad">

         <h2>Privacy Policy</h2>

         <ul>

            <li>

               <a href="index.php" class="brdtitle">Home</a>

            </li>

            <li class="list">

             Privacy policy

            </li>

         </ul>

      </div>

   </div>

	<div class="aboutus">

 <div class="container-fluid bodyPad">

 	

 		@if(count($data)>0)

   {!!($data[0]->privacy) !!}

   @endif

 	

 	

</div>

 </div>

	</main>

@endsection