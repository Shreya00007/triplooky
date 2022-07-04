@extends("front.layout.header")
@section("title","Your Tour List")
@section("content")
<main id="main">

   <div class="d-flex align-items-center px-5 py-2" style="background: #f3f9f6;">
    <a href="/" class="mr-2 d-block">Home-></a>
    <a href="">City</a>
    
    
   </div>








    <section class="container mb-2" style="margin-bottom:-110px !important">
        <div class="d-flex justify-content-between align-items-center">
            <div class=""><h3>Morocco City</h3></div>
            <div class="p-font"><span class="mr-1">Any Question ? Call Now ! <i class="fa fa-phone mr-2"></i> +91 8310115455</span> , <span>+91 854755248</span></div>
        </div>
   </section>


   <section class="container-fluid bodyPad"  style="margin-bottom:-110px !important">
    <div class="row">
        <div class="col-sm-3 mb-4 p-0">
            <div class="card">
                <div class="card-body" style="box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.4);border-radius: 2px;">
                    <h4>Excellent 4.6</h4>
            <i class="fa fa-star" style="color:orange;font-size: 20px;"></i><i class="fa fa-star" style="color:orange;font-size: 20px;"></i>
            <i class="fa fa-star" style="color:orange;font-size: 20px;"></i>
            <i class="fa fa-star" style="color:orange;font-size: 20px;"></i>
            <i class="fa fa-star-half" style="color:orange;font-size: 20px;"></i>
            <p style="font-size:12px;">See our 273 reviews on <i class="fa fa-star" style="color:orange;font-size: 16px;"></i> Triplooky</p>
                </div>
            </div>
        </div>
        <div class="col-sm-5 px-5">
            <div class="d-flex">
                <div class="logo p-2  px-4 mr-3" style="width:fit-content;border-top: 3px ridge darkblue;margin-right: 15px;box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.4);border-radius: 2px;"><img src="{{url('')}}/front-assets/assets/img/newlogo.png" width="100"></div>
                <div class="logo p-2  px-4" style="width:fit-content;display: flex;justify-content: center;align-items: center;box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.4);border-radius: 2px;"><h5 style="font-weight: bold;color: red;margin: 0;padding: 0;font-size: 18px;">Get Your Guide</h5></div>
            </div>
            <div class="search" style="width:93%">
                <div class="input-group">
                    <input type="tex" name="search-tour" class="form-control shadow-none py-2" placeholder="Search City,Tour & Places" style="border:1px solid #ccc;border-radius: 2px;" value="{{$city}}">
                    <div class="input-group-append">
                        <button class="btn btn-success py-2 shadow-none rounded-0 px-3"><i class="fa fa-search"></i></button>
                    </div>
                    <div class="search-city-box">
                      <ul class="search-city-box-ul"></ul>
                  </div>
                </div>

            </div>
        </div>
        <div class="col-sm-4">
            <div class="d-flex align-items-center justify-content-between">
                <div style="margin-right: 8px;"><h6 class="p-font mr-1">Sort By</h6></div>
                <div>
                    <select class="form-control  price-filter py-2" city="{{$city}}" style="font-size:12px;box-shadow: 0px 0px 2px rgba(0, 0, 0, 0.4);border-radius: 2px;">
                        <option>Price</option>
                        <option value="low-to-high">Price (Low To High)</option>
                            <option value="high-to-low">Price (High To Low)</option>
                    </select>
                </div>
                <div class="ml-2"><select class="form-control py-2" style="font-size:12px;box-shadow: 0px 0px 2px rgba(0, 0, 0, 0.4);border-radius: 2px;">
                        <option>Rating</option>
                        <option>Rating (Low To High)</option>
                            <option>Rating (High To Low)</option>
                    </select></div>
                <div></div>
            </div>
        </div>
    </div>
    
   </section>

   <section class="container-fluid bodyPad">
    <div class="row">
        <div class="col-sm-3 p-0 p-1  mb-4" style="height: fit-content;box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.3);">
            <div class="d-flex justify-content-between align-items-center bg-info px-3 py-2"><h4 class="p-font text-white p-0 m-0" style="font-size:18px;">Filter your search</h4><p class="text-white p-0 m-0"><a href="" class="text-white">Reset All</a></p></div>
            <div class="mt-1 px-2 border-bottom">
                <h5 style="font-size:20px;">Category</h5>
                @foreach($category as $category)
                <a href="javascript:void(0)" style="color:black !important;font-size: 14px !important;" class="thing-to-do-filter-by-category" city="{{$city}}" data="{{$category->id}}">
           <div class="d-flex align-items-center">
                    <div class="mr-4"><input type="checkbox" name="category-check-box" style="width:15px;height: 15px;margin-right: 5px;"></div>
                    <div><p class="p-0 m-0 mb-2">{{$category->category_name}}</p></div>
                    
                </div>         
                </a>
                @endforeach
                
                

            </div>
            <div class="mt-4 px-2">
                <h5 style="font-size:20px;">Tour Language</h5>
                @foreach($lang as $lang)
                <a href="javascript:void(0)" style="color:black !important;font-size: 14px !important;" city="{{$city}}" data="{{$lang->id}}" class="thing-to-do-lang">
           <div class="d-flex align-items-center" >
                    <div class="mr-4"><input type="checkbox" name="lang-check-box" style="width:15px;height: 15px;margin-right: 5px;"></div>
                    <div><p class="p-0 m-0 mb-2">{{$lang->lang_name}}</p></div>
                    
                </div>         
                </a>
                @endforeach
                
                

            </div>
        </div>
        <div class="col-md-9 tour-box">
            @foreach($data as $list)
            <div class="card tour-card-box" style="box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.4);border-radius: 2px;height: fit-content;border-radius: 2px;">
                <div class="card-body py-2 px-2">
                    <div class="row">
                <div class="col-sm-3">
                    <img src="{{url('')}}/thing-to-do/{{$list->image}}" width="100%" class="shadow-sm">
                </div>
                <div class="col-sm-7">
                    <h6>
{{$list->heading}}</h6>
<i class="fa fa-star" style="color:orange;font-size: 15px;"></i><i class="fa fa-star" style="color:orange;font-size: 15px;"></i>
            <i class="fa fa-star" style="color:orange;font-size: 15px;"></i>
            <i class="fa fa-star" style="color:orange;font-size: 15px;"></i>
            <i class="fa fa-star" style="color:orange;font-size: 15px;"></i>
            <span class="ml-2">5 Reviews</span>
            <div>{!! Str::limit($list->overview, 290, ' ...') !!}</div>
                </div>
                <div class="col-sm-2">
                    <p class="float-right" style="text-align: right;">From</p>
                    <h5>USD 32.49</h5>
                    <a href="/search/tour/{{$list->city_name}}/{{$list->heading}}"><button class="btn btn-info shadow-none p-font px-4 text-white">Details</button></a>
                </div>
            </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
   </section>






  
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
    width: 85.5%;
   height: fit-content;
    background: white;
    position: absolute;
    left: 2px;
    top: 43px;
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
    
    width: 100%;
    
    border-bottom: 1px solid #ccc;
    padding: 10px 15px;
   transition: 0.5s;
   font-size: 13px !important;
   text-align: left !important;

}
.search-city-box-ul li:hover{
     background:#f3f9f6 ;


}
.tour-card-box{
    transition: 0.5s;


}
.tour-card-box:hover{
   box-shadow: 0px 0px 2px black !important;
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