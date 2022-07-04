@extends("front.layout.header")

@section("title","FAQ`s")

@section("content")

<main id="main">

	<div id="banner">

      <div class="container-fluid bodyPad">

         <h2>FAQ's</h2>

         <ul>

            <li>

               <a href="index.php" class="brdtitle">Home</a>

            </li>

            <li class="list">

              FAQ's

            </li>

         </ul>

      </div>

   </div>

<div class="aboutus">

  <div class="container-fluid bodyPad" style="text-align: justify-all;word-wrap: break-word;">

  	@if(count($data)>0)

     {!!$data[0]->faq!!}

    @endif

  </div>

    </div>

      </main>

@endsection