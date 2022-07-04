@extends("front.layout.header")

@section("title","Copy Right")

@section("content")

<main id="main">

	<div id="banner">

      <div class="container-fluid bodyPad">

         <h2>Copy Right</h2>

         <ul>

            <li>

               <a href="index.php" class="brdtitle">Home</a>

            </li>

            <li class="list">

             Copy Right

            </li>

         </ul>

      </div>

   </div>

	<div class="aboutus">

 <div class="container-fluid bodyPad">

 	

 		

 	

 	@if(count($data)>0)

   {!!($data[0]->copyright) !!}

   @endif

</div>

 </div>

	</main>

@endsection