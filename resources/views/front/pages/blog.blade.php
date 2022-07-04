@extends("front.layout.header")

@section("title","Blog")

@section("content")

<main id="main">  

	<div id="banner">

		<div class="container-fluid bodyPad">

			<h2>Blogs Listing</h2>

			<ul>

				<li>

					<a href="index.php" class="brdtitle">Home</a>

				</li>

				<li class="list">

				 Blogs Listing

				</li>

			</ul>

		</div>

	</div>

	<!-- Blog listing section start -->

	<div class="container mt-5 mb-5">

		<div class="row">

			<div class="col-md-9 col-xs-12">

				<div class="blog-section">

					<div class="img-section">

						<img src="{{url('')}}/front-assets/assets/img/trip.jpg" alt="trip" class="img-fluid">

					</div>

					<div class="content-section">

						<h3>The perfect summer destination</h3>

						<p class="pd-16">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>

						<div class="btn-section">

							<a href="blogdetail.php">Read more</a>

						</div>

					</div>

				</div>

				<div class="blog-section">

					<div class="img-section">

						<img src="{{url('')}}/front-assets/assets/img/trip2.jpg" alt="trip" class="img-fluid">

					</div>

					<div class="content-section">

						<h3>The perfect summer destination</h3>

						<p class="pd-16">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>

						<div class="btn-section">

							<a href="blogdetail.php">Read more</a>

						</div>

					</div>

				</div>

				<div class="blog-section">

					<div class="img-section">

						<img src="{{url('')}}/front-assets/assets/img/trip3.jpg" alt="trip" class="img-fluid">

					</div>

					<div class="content-section">

						<h3>The perfect summer destination</h3>

						<p class="pd-16">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>

						<div class="btn-section">

							<a href="blogdetail.php">Read more</a>

						</div>

					</div>

				</div>

			</div>

			<div class="col-md-3 col-xs-12">

				<div class="lefttop text-center">

					<p>Traveling to Morocco?</p>

					<a href="#" class="stBtn">Start Planning</a>

				</div>

				<div class="lefttop text-center">

					<p>Searching for something specific? </p>

					<a href="#" class="atBtn">Ask a Question</a>

				</div>

				<div class="boxCard mt-5">

					<h3>Recommended Tours</h3>

				</div>

				<div class="rate-content">

					<p>Recommended Tours</p>

				</div>

				<div class="rt-star">

					<p>Private Best of Versailles Day Tour includes</p>

					<div class="d-flex">

						<div class="l">

							<i class="fas fa-star yellow"></i>

							<i class="fas fa-star yellow"></i>

							<i class="fas fa-star yellow"></i>

							<i class="fas fa-star yellow"></i>

							<i class="fas fa-star yellow"></i>

						</div>

						<div class="c">

							9 Reviews 8 Hrs

						</div>

					</div>

					<div class="d-flex just">

						<div class="mad">

							MAD 607.26

						</div>

						<a href="javascript:void(0);" class="btnBook">Book Now</a>

					</div>

				</div>

				<div class="rt-star">

					<p>Private Best of Versailles Day Tour includes</p>

					<div class="d-flex">

						<div class="l">

							<i class="fas fa-star yellow"></i>

							<i class="fas fa-star yellow"></i>

							<i class="fas fa-star yellow"></i>

							<i class="fas fa-star"></i>

							<i class="fas fa-star"></i>

						</div>

						<div class="c">

							9 Reviews 8 Hrs

						</div>

					</div>

					<div class="d-flex just">

						<div class="mad">

							MAD 607.26

						</div>

						<a href="javascript:void(0);" class="btnBook">Book Now</a>

					</div>

				</div>



				<div class="boxCard mt-5">

					<h3>Instagram Post</h3>

				</div>

				<div class="msryBox">

					<div class="row">

						<div class="col-md-4 col-xs-6">

							<div class="smImg">

								<img src="{{url('')}}/front-assets/assets/img/trip.jpg" class="img-fluid">

							</div>

							<div class="smImg">

								<img src="{{url('')}}/front-assets/assets/img/trip2.jpg" class="img-fluid">

							</div>

							<div class="lrgImg">

								<img src="{{url('')}}/front-assets/assets/img/trip4.jpg" class="img-fluid">

							</div>

						</div>

						<div class="col-md-4 col-xs-6">

							<div class="lrgImg">

								<img src="{{url('')}}/front-assets/assets/img/trip3.jpg" class="img-fluid">

							</div>

							<div class="smImg">

								<img src="{{url('')}}/front-assets/assets/img/trip2.jpg" class="img-fluid">

							</div>

							<div class="smImg">

								<img src="{{url('')}}/front-assets/assets/img/trip4.jpg" class="img-fluid">

							</div>							

						</div>

						<div class="col-md-4 col-xs-6">

							<div class="lrgImg">

								<img src="{{url('')}}/front-assets/assets/img/trip2.jpg" class="img-fluid">

							</div>

							<div class="smImg">

								<img src="{{url('')}}/front-assets/assets/img/trip3.jpg" class="img-fluid">

							</div>

							<div class="smImg">

								<img src="{{url('')}}/front-assets/assets/img/trip.jpg" class="img-fluid">

							</div>		

						</div>

					</div>

				</div>

				<div class="boxCard mt-5">

					<h3>Contact Us</h3>

					<div class="d-flex alc">

						<div class="social-icon">

							<i class="fas fa-envelope gray"></i>

						</div>

						<div class="address">

							<p>support @triplooky.com</p>

						</div>

					</div>

					<div class="d-flex alc">

						<div class="social-icon">

							<i class="fas fa-phone-alt gray"></i>

						</div>

						<div class="address">

							<p>+222-5548 656</p>

						</div>

					</div>

					<div class="d-flex alc">

						<div class="social-icon">

							<i class="fas fa-map-marker-alt gray"></i>

						</div>

						<div class="address">

							<p>Street No: 1234/A, Blu Vard Area, Main Double road, Africa</p>

						</div>

					</div>

				</div>

				<div class="boxCard mt-5">

					<h3>Recent Post</h3>

					<div class="d-flex alc mt-3">

						<div class="lImg">

							<img src="{{url('')}}/front-assets/assets/img/trip2.jpg">

						</div>

						<div class="rContent">

							HOST A FAMILY PARTY 27 May, 2017

						</div>

					</div>

					<div class="d-flex alc mt-3">

						<div class="lImg">

							<img src="{{url('')}}/front-assets/assets/img/trip3.jpg">

						</div>

						<div class="rContent">

							HOST A FAMILY PARTY 27 May, 2017

						</div>

					</div>

					<div class="d-flex alc mt-3">

						<div class="lImg">

							<img src="{{url('')}}/front-assets/assets/img/trip.jpg">

						</div>

						<div class="rContent">

							HOST A FAMILY PARTY 27 May, 2017

						</div>

					</div>

					<div class="d-flex alc mt-3">

						<div class="lImg">

							<img src="{{url('')}}/front-assets/assets/img/trip3.jpg">

						</div>

						<div class="rContent">

							HOST A FAMILY PARTY 27 May, 2017

						</div>

					</div>

				</div>

				<div class="boxcard mt-5 text-center">

					<h4>Follow Us</h4>

					<div class="d-flex">

						<div class="icon">

							<img src="{{url('')}}/front-assets/assets/img/facebook.png">

							

						</div>

						<div class="icon">

						<img src="{{url('')}}/front-assets/assets/img/insta.jpg">

						</div>

						<div class="icon">

							<img src="{{url('')}}/front-assets/assets/img/twitter.png">

							</div>

						<div class="icon">

							<img src="{{url('')}}/front-assets/assets/img/pinterest.png">

						</div>

					</div>



				</div>

			</div>

		</div>

	</div>

	<!-- Blog listing section end -->

	<!-- Box listing section start -->

	<div class="container mb-5">

		<div class="listing">

			<h2>Browse Categories</h2>

		</div>

		<div class="row">

			<div class="col-md-4 col-xs-12">

				<a href="#" class="Categories-box">

					Adventure activities in Miami

				</a>

			</div>

			<div class="col-md-4 col-xs-12">

				<a href="#" class="Categories-box">

					Adventure activities in Miami

				</a>

			</div>

			<div class="col-md-4 col-xs-12">

				<a href="#" class="Categories-box">

					Adventure activities in Miami

				</a>

			</div>

		</div>

		<div class="row mt-3">

			<div class="col-md-4 col-xs-12">

				<a href="#" class="Categories-box">

					Adventure activities in Miami

				</a>

			</div>

			<div class="col-md-4 col-xs-12">

				<a href="#" class="Categories-box">

					Adventure activities in Miami

				</a>

			</div>

			<div class="col-md-4 col-xs-12">

				<a href="#" class="Categories-box">

					Adventure activities in Miami

				</a>

			</div>

		</div>

	</div>

	<!-- Box listing section end -->

	<!-- kfjksdjfisjifj -->

	<div class="container mt-5 mb-5">

		<div class="row">

			<div class="col-md-9 col-xs-12">

				<div class="blog-section">

					<div class="img-section">

						<img src="{{url('')}}/front-assets/assets/img/trip.jpg" alt="trip" class="img-fluid">

					</div>

					<div class="content-section">

						<h3>The perfect summer destination</h3>

						<p class="pd-16">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>

						<div class="btn-section">

							<a href="#">Read more</a>

						</div>

					</div>

				</div>

			</div>

		</div>

	</div>



  

</main>

@endsection