@extends("front.layout.header")
@section("title","Find Tour & Activity")
@section("content")
<main id="main">
<div id="banner" style="padding-top:55px">
      <div class="container-fluid bodyPad">
         <h2 class="text-center">Book Tours and Activities for your next trip!
</h2>
<p class="text-center">Triplooky - Trips, Tales & Trust</p>
         <div class="d-flex justify-content-center align-items-center">
             <div class="input-group" style="width:600px;position: relative;">
                 <input type="text" name="search-tour-activity" class="form-control shadow-none py-3 w-50 pl-3" placeholder="Search for cities and things to do & Activity" style="border:none">
                 <div class="input-group-append">
                     <button class="btn btn-danger py-3 px-4 shadow-none p-font" style="border-top-left-radius: 0px;border-bottom-left-radius: 0px;box-sizing: border-box;overflow: hidden;">Search</button>
                 </div>
                  <div class="search-city-box">
                      <ul class="search-city-box-ul"></ul>
                  </div>

             </div>

             
            
         </div>
         <p class="my-2 text-center p-font">Let's make your next trip easy Plan my Trip</p>
        
      </div>
   </div>



<!-- slider -->


<div class="slideshow-container">

<div class="mySlides">
  <h3>Full day tour of Abu Dhabi1</h3>
  <p>We were picked up early in the morning at our Four Points<br> Sheraton Downtown hotel on time with a big comfortable tour bus. I a<br> Sheraton Downtown hotel on time with a big comfortable tour bus. I a</p>
</div>

<div class="mySlides">
  <h3>Full day tour of Abu Dhabi2</h3>
  <p>We were picked up early in the morning at our Four Points<br> Sheraton Downtown hotel on time with a big comfortable tour bus. I a<br> Sheraton Downtown hotel on time with a big comfortable tour bus. I a</p>
</div>

<div class="mySlides">
  <h3>Full day tour of Abu Dhabi3</h3>
  <p>We were picked up early in the morning at our Four Points<br> Sheraton Downtown hotel on time with a big comfortable tour bus. I a<br> Sheraton Downtown hotel on time with a big comfortable tour bus. I a</p>
</div>
<div class="mySlides">
  <h3>Full day tour of Abu Dhabi</h3>
  <p>We were picked up early in the morning at our Four Points<br> Sheraton Downtown hotel on time with a big comfortable tour bus. I a<br> Sheraton Downtown hotel on time with a big comfortable tour bus. I a</p>
</div>

<a class="prev" onclick="plusSlides(-1)">❮</a>
<a class="next" onclick="plusSlides(1)">❯</a>

</div>

<div class="dot-container">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
    <span class="dot" onclick="currentSlide(4)"></span> 
</div>




<!-- hfhhg -->



<!-- sdnn -->


    <section class="promotional-text-container">
      <div class="container-fluid bodyPad">
         <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 custom-height brdr">
               <span class="great-deals">
                  <i class="fa fa-child"></i>
                  <i>Handpicked Activities</i> 
               </span>
               <span class="promotional-text">
                  Explore the best experiences in your favourite cities
               </span>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 custom-height brdr">
               <span class="over-many-activities">
                 <i class="fas fa-money-check-alt"></i>
                  <i>Lowest Prices</i>
               </span>
               <span class="promotional-text">
                  Guaranteed lowest prices. Anyday, everyday. <!-- <span>No Strings attached</span> -->
               </span>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 custom-height">
               <span class="designed-for-you">
                  <i class="fa fa-shield"></i>
                  <i>100% Secure</i>
               </span>
               <span class="promotional-text">
                  Every transaction is secure. <span>Your money is safe</span>
               </span>
            </div>
         </div>
      </div>
   </section>



<div class="container-fluid bodyPad">
    <div class="image-section">
       <div class="section-title text-center">
        <h2>Trending Destination</h2>
       </div>
      <div class="row form-group">
        
      @foreach($data as $list)
      <div class="col-lg-4 mb-5">
           <div class="image-part">
               <div class="image">
                   <img src="{{url('')}}/admin-asstes/images/activity_image/{{$list->activity_image}}">
                   <div class="image-text">
                       <p>{{$list->activity_name}}</p>
                   </div>
               </div>
           </div>
        </div>
      @endforeach
        
        
   </div>
   
     

    </div>
</div>


  
</main>

<style>
   
  .promotional-text-container {
    margin: 20px 0 0;
} 
.promotional-text {
    display: block;
    margin: 0;
    text-align: center;
}
custom-height .fa {
    background: #0f415a none repeat scroll 0 0;
    border: 3px solid #a3e8e8;
    border-radius: 50%;
    color: #fff;
    line-height: 19px;
    padding: 5px;
}
.custom-height i {
    font-size: 17px;
    font-weight: bold;
}
.col-lg-4.col-md-4.col-sm-4.col-xs-4.custom-height {
    text-align: center;
}
.custom-height .fa {
    background: #0f415a none repeat scroll 0 0;
    border: 3px solid #a3e8e8;
    border-radius: 50%;
    color: #fff;
    line-height: 19px;
    padding: 5px;
}
i.fas.fa-money-check-alt {
     background: #0f415a none repeat scroll 0 0;
    border: 3px solid #a3e8e8;
    border-radius: 50%;
    color: #fff;
    line-height: 19px;
    padding: 5px;
}

.brdr{

    border-right: 1px solid #cecece;
}
form {
    display: flex;
    z-index: 10;
    position: relative;
    width: 500px;
    box-shadow: 5px 10px 15px rgb(0 0 0 / 40%);
    background: #ffffff;
}
input[type="search"] {
    flex-basis: 500px;
    padding: 8px 15px 10px;
    overflow: hidden;
}
input[type="submit"] {
    background: #4682b4;
    border: 1px solid #4682b4;
    color: #ffffff;
    padding: 0 30px;
    cursor: pointer;
    transition: all 0.2s;
}
input[type="submit"]:hover {
    background: #325d81;
    border: 1px solid #325d81;
}


.slideshow-container {
  position: relative;
  background: #f1f1f1f1;
}

.mySlides {
  display: none;
  padding: 80px;
  text-align: center;
}

.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  margin-top: -30px;
  padding: 16px;
  color: #888;
  font-weight: bold;
  font-size: 20px;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

.next {
  position: absolute;
  right: 0;
  border-radius: 3px 0 0 3px;
}

.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
  color: white;
}
.dot-container {
    text-align: center;
    padding: 20px;
    background: #ddd;
}
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}
.active, .dot:hover {
  background-color: #717171;
}
q {font-style: italic;}
.author {color: cornflowerblue;}


.search-city-box{
    width: 82.1%;
   height: fit-content;
    background: white;
    position: absolute;
    left: 2px;
    top: 59px;
    z-index: 99999;
    box-shadow: 0px 0px 2px #ccc;
    border-top-left-radius: 3px;
    border-bottom-left-radius: 3px;
    opacity: 0;
    visibility: hidden;
    transition: 0.2s;
     
}
.search-city-box-ul{
    width: 100%;
    list-style: none;
    padding: 0px;
    margin: 0px;

}
.search-city-box-ul li{
    display: flex;
    justify-content: center;
    align-content: center;
    width: 100%;
    
    border-bottom: 1px solid #ccc;
    padding: 10px 20px;
   transition: 0.5s;

}
.search-city-box-ul li:hover{
     background:#f3f9f6 ;
}
</style>
<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
window.onload= function () {
 setInterval(function(){ 
     plusSlides(3);
 }, 3000);
 }


</script>
@endsection