@php 
use App\Models\Admin;
use App\Models\Currency;
$data=Admin::first();
$currency=Currency::select("currency_name","symbol")->where("status","=","active")->get()->toArray();
@endphp
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <title>@yield("title")</title>
      <link rel="icon" type="image/x-icon" href="{{url('')}}/front-assets/assets/img/newtriplogo.png" />
      <meta content="" name="description">
      <meta content="" name="keywords">
      <!-- Google Fonts -->
      <link href="{{url('')}}/front-assets/assets/canilari-1/Canilari-Pro.ttf" rel="stylesheet">
      <!-- Vendor CSS Files -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link href="{{url('')}}/front-assets/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
      <link href="{{url('')}}/front-assets/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <link href="{{url('')}}/front-assets/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
      <link href="{{url('')}}/front-assets/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
      <link href="{{url('')}}/front-assets/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
      <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
      <link href="{{url('')}}/front-assets/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
      <link href="{{url('')}}/front-assets/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
      <link href="{{url('')}}/front-assets/assets/canilari-1/Canilari-Ornaments.ttf" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400&family=Varela&family=Varela+Round&display=swap" rel="stylesheet">
      <!-- Template Main CSS File -->
      <link href="{{asset('front-assets/assets/css/style.css')}}?cache=<?php echo time() ?>" rel="stylesheet">
      <link href="{{url('')}}/front-assets/assets/css/nouislider.css" rel="stylesheet">
      <link href="{{url('')}}/front-assets/assets/css/swiper.min.css" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="{{url('')}}/front-assets/assets/css/jquery-ui.css">
      <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
      <link href="https://cdnjs.cloudflare.com/ajax/libs/air-datepicker/2.2.3/css/datepicker.css">
      <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome-font-awesome.min.css">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.8/slick-theme.min.css">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.8/slick.css">
      <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css"> -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
       <script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.5.7/slick.min.js"></script>
       <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
       
     
      @yield("css")
      <style>
        .p-font{
          font-family: 'Poppins', sans-serif;
        }
         .dropdown-menu{display:none;}
         .userIcn{
            font-size:25px !important;

         }
         a.nav-link.scrollto.sign-out {
            background: #fa842d;
            color: #ffffff!important;
            text-align: center;
            padding: 10px 16px;
            margin-left: 20px;
            border-radius: 6px;
         }
         
         div.number{
         
          position: absolute;
          z-index: 1000 !important;
         }
         .form-submit-btn{
          background: #006994;
    color: #ffffff;
    padding: 8px 12px;
    width: 175px;
         }
         .form-submit-btn:hover{
          color: white;
         }
      </style>
   </head>
   <body data="{{csrf_token()}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
      <!-- ======= Header ======= -->
      <!-- fixed-top  -->
      <header id="header" class="header-inner-pages">
         <div class="container-fluid bodyPad  justify-content-between">
            <!-- <li class="logo"><a href="index.html">Hidayah</a></li>  -->
            <!-- Uncomment below if you prefer to use an image logo -->
            <a href="{{url('/')}}" class="logo mobile">
            <img src="{{url('/')}}/admin-assets/images/admin_image/{{$data->admin_image}}" alt="" class="img-fluid">
            </a>  
            <nav id="navbar" class="navbar">
               <ul class="navbar-left text-left">
                  <li><a href="{{url('/')}}" class="logo mobile"><img src="{{url('')}}/admin-assets/images/admin_image/{{$data->admin_image}}" alt="" class="img-fluid"></a>  </li>
                  <li class="">
                     <a class="nav-link scrollto" href="#">Discover Morocco</a>
                     <ul class="dropdown-menu mega-menu" style="display:none;">
                        <li>
                            @php
                              use App\Models\DiscoverMorocco;
                              $south_atlantic=DiscoverMorocco::select("city_name")->where("type","Southern | Atlantic")->where("status",1)->get();
                              $south_central=DiscoverMorocco::select("city_name")->where("type","South-Central | Sahara")->where("status",1)->get();
                               $south_central=DiscoverMorocco::select("city_name")->where("type","South-Central | Sahara")->where("status",1)->get();
                               $cental_atlantic=DiscoverMorocco::select("city_name")->where("type","Central | Atlantic")->where("status",1)->get();
                               $North_Central=DiscoverMorocco::select("city_name")->where("type","North-Central")->where("status",1)->get();
                               $Northwestern=DiscoverMorocco::select("city_name")->where("type","Northwestern | Atlantic & Mediterranean")->where("status",1)->get();
                               
                              @endphp
                           <div class="d-flex justify-bw">
                              <div class="d_s">
                                 <h3 class="f18">Southern | Atlantic</h3>
                                 @foreach($south_atlantic as $list1)
                                  <a href="/discover-morocco/Southern | Atlantic/{{$list1->city_name}}">{{$list1->city_name}}</a>
                                  @endforeach
                                  
                              </div>
                              <div class="d_s">
                                 <h3 class="f18">South-Central | Sahara</h3>
                                 @foreach( $south_central as $list2)
                                  <a href="/discover-morocco/South-Central | Sahara/{{$list2->city_name}}">{{$list2->city_name}}</a>
                                  @endforeach
                               
                              </div>
                              <div class="d_s">
                                 <h3 class="f18">Central | Atlantic</h3>
                                 @foreach( $cental_atlantic as $list3)
                                  <a href="/discover-morocco/Central | Atlantic/{{$list3->city_name}}">{{$list3->city_name}}</a>
                                  @endforeach
                                 
                              </div>
                              <div class="d_s">
                                 <h3 class="f18">North-Central</h3>
                                  @foreach( $North_Central as $list4)
                                  <a href="/discover-morocco/North-Central/{{$list4->city_name}}">{{$list4->city_name}}</a>
                                @endforeach
                                 
                              </div>
                              <div class="d_s">
                                 <h3 class="f18">Northwestern | Atlantic & Mediterranean</h3>
                                  @foreach( $Northwestern as $list5)
                                  <a href="/discover-morocco/Northwestern | Atlantic & Mediterranean/{{$list5->city_name}}">{{$list5->city_name}}</a>
                                  @endforeach
                                
                              </div>
                           </div>
                        </li>
                     </ul>
                  </li>
                  <li class="">
                     <a href="javascript:void(0);" class="nav-link scrollto">Must Do & See</a>
                     <ul class="dropdown-menu mega-menu" style="display:none;">
                        <li>
                           <div class="d-flex justify-bw">
                              @php
                              use App\Models\MustDoAndSee;
                              $nature=MustDoAndSee::select("city_name")->latest()->where("type","Nature & Discovery")->where("status",1)->get();
                               $culture=MustDoAndSee::select("city_name")->latest()->where("type","Medina & Culture")->where("status",1)->get();
                                $beach=MustDoAndSee::select("city_name")->latest()->where("type","Beach & Sport")->where("status",1)->get();
                              @endphp
                              <div class="d_s">
                                 <h3 class="f18">Nature & Discovery</h3>
                                 @foreach($nature as $nature_list)
                                  <a href="/must-to-do/{{$nature_list->city_name}}">{{$nature_list->city_name}}</a>
                                 @endforeach
                                  
                              </div>
                              <div class="d_s">
                                 <h3 class="f18">Medina & Culture</h3>
                                  @foreach($culture as $culture_list)
                                  <a href="/must-to-do/{{$culture_list->city_name}}">{{$culture_list->city_name}}</a>
                                 @endforeach
                              </div>
                              <div class="d_s">
                                 <h3 class="f18">Beach & Sports</h3>
                                  @foreach($beach as $beach_list)
                                  <a href="/must-to-do/{{$beach_list->city_name}}">{{$beach_list->city_name}}</a>
                                 @endforeach
                              </div>
                           </div>
                        </li>


              
                     </ul>
                  </li>
                  <!-- <li><a class="nav-link scrollto" href="/activity">Activites</a></li> -->
                    @if(session()->has('user_login'))
                     @if(session()->has("myplan"))
                 <li>
                   <a class="nav-link scrollto" href="/user/save-plan-list-data-show" >My Trip Plan</a>
                 </li>
              
                @endif
                    @endif
               </ul>
               <ul class="text-right">
                  <li class="dropdown">
                    @if(session()->has('currency_name'))
                     <a class="nav-linkscrollto show-currency btn shadow-sm" href="#">
                        <!-- <span class="f20">{{$currency[0]['symbol']}}</span> --> <span class="default-currency">{{session('currency_name')}}</span>
                     </a>
                    @else
                     <a class="nav-linkscrollto show-currency btn shadow-sm" href="#">
                        <!-- <span class="f20">{{$currency[0]['symbol']}}</span> --> <span class="default-currency"></span>
                     </a>
                    @endif
                     <ul class="dropdown-menu" id="currency">
                     @for($i=0;$i<count($currency);$i++)
                      <a class="nav-linkscrollto dropdown-item select-currency" href="#">
                        <span class="f20">{{$currency[$i]['symbol']}}</span> <span>{{$currency[$i]['currency_name']}}</span>
                     </a>
                     @endfor
                      
                      
                       
                                            
                      
                     
                       
                      
                      
                      
                        
                      
                       
                     </ul>
                  </li>

                  <li>
                     @if(session("user_login"))
                  
                     <div class="dropdown">
                       <a class="dropdown-toggle shadow-none" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                          @if(!empty(session()->get('user_image')))
                          <img src="{{url('')}}/user/{{session('user_image')}}" width="30">
                          @else
                          <i class="bi bi-person userIcn"></i>
                          @endif
                       {{session('user_name')}}
                     </a>
                             <!-- <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                         <a class="dropdown-item" href="/user/logout">Logout</a>
                         
                       </div> -->
                     </div>
                    
                     @else
                     <a class="nav-link scrollto login-modal-link" href="javascript:void(0)" >Log In</a>
                     @endif
                  </li>
                  <!-- <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
                     </li> -->
                 @if(session('user_login'))
                 <li><a class="nav-link scrollto sign-out" href="/user/logout" >Sign Out</a></li>
                 @else
                 <li><a class="nav-link scrollto sign-up-modal-link" href="javascript:void(0)" >Sign Up</a></li>
                 @endif
               </ul>
               <i class="bi bi-list mobile-nav-toggle text-right"></i>
            </nav>
            <!-- .navbar -->
         </div>
      </header>
      <!-- End Header -->
      @yield("content")
      <!-- ======= Footer ======= -->
      <footer class="new_footer_area bg_color">
         <div class="new_footer_top mt-5">
            <div class="container bodyPad">
               <div class="row">
                  <!-- <div class="col-lg-2 col-md-6">
                     <div class="f_widget about-widget pl_70" >
                        <h3 class="f-title f_600 t_color f_size_18" ><span style="color: #000000;">Triplooky</span></h3>
                        <ul class="list-unstyled f_list">
                           <li><a href="#">Partner with us</a></li>
                           <li><a href="#">Triplooky</a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-lg-2 col-md-6">
                     <div class="f_widget about-widget pl_70">
                        <h3 class="f-title f_600 t_color f_size_18">Browse</h3>
                        <ul class="list-unstyled f_list">
                           <li><a href="#">Trip by Other Users</a></li>
                           <li><a href="#">Destination</a></li>
                           <li><a href="#">Credit</a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-lg-2 col-md-6">
                     <div class="f_widget about-widget pl_70">
                        <h3 class="f-title f_600 t_color f_size_18">Help</h3>
                        <ul class="list-unstyled f_list">
                           <li><a href="/faq">FAQ</a></li>
                           <li><a href="/about">About us</a></li>
                           <li><a href="/contactus">Contact us</a></li>
                           <li><a href="/privacypolicy">Privacy Policy</a></li>
                           <li><a href="/cookiepolicy">Cookie Policy</a></li>
                           <li><a href="/copyright-policy">Copyright Policy</a></li>
                           <li><a href="/term">Terms of Uses</a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-lg-3 col-md-6">
                     <div class="f_widget about-widget pl_70">
                        <h3 class="f-title f_600 t_color f_size_18 d-flex">Setting</h3>
                        <ul class="list-unstyled f_list d-flex justify-content align-center">
                           <li><a href="#">Currency:Moroccan Dhiram</a></li>
                           <li class="ml-auto"><a href="javascript:void(0)" data-modal-trigger="sample-modal" class="demo__btn demo__btn--secondary"><u>Change</u></a></li>
                        </ul>
                        <ul class="list-unstyled f_list d-flex justify-content align-center">
                           <li><a href="javascript:void(0)">Language:English</a></li>
                           <br> 
                           <li class="ml-auto"><a href="javascript:(void)" id="open-btn1"><u>Change</u></a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-lg-3 col-md-6">
                     <div class="f_widget social-widget pl_70">
                        <h3 class="f-title f_600 t_color f_size_18">Team Solutions</h3>
                        <div class="f_social_icon">
                           <a href="#" class="facebook"><i class="fab fa-facebook" aria-hidden="true"></i></a>
                           <a href="#" class="twitter"><i class="fab fa-twitter" aria-hidden="true"></i></a>
                           <a href="#" class="insta"><i class="fab fa-instagram" aria-hidden="true"></i></a>
                           <a href="#" class="youtube"><i class="fab fa-youtube" aria-hidden="true"></i></a>
                        </div>
                        <div class="visit-blog text-center mt-3">
                           <a href="blog.php"> Visit Our Blog<i class="fa fa-angle-double-right" style="margin-left: 3px;" aria-hidden="true"></i></a>
                        </div>
                     </div>
                  </div> -->
                  <div class="col-md-12">
                     <div class="f_widget about-widget pl_70">
                        <h3 class="f-title f_600 t_color f_size_18" ><span style="color: #000000;">Triplooky</span></h3>
                        <ul class="list-unstyled f_list d-flex align-items-center justify-bw">
                           <li><a href="/about">About us</a></li>
                           <li><a href="/contactus">Contact us</a></li>
                           <li><a href="/privacypolicy">Privacy Policy</a></li>
                           <li><a href="/cookiepolicy">Cookie Policy</a></li>
                           <!-- <li><a href="/copyright-policy">Copyright Policy</a></li> -->
                           <li><a href="/term">Terms of Uses</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="footer_bottom mt-3">
            <div class="container-fluid bodyPad">
               <div class="row align-items-center">
                  <div class="col-lg-12 text-center border-2">
                     <p class="mt-3 f_400 blue"><span>© 2021</span> Triplooky <span>
                        <strong> reserved and design by Nota Bene Global Services Pvt Ltd.</strong></span>
                     </p>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <!-- End Footer -->
      <!-- modal section -->
      <!-- <a href="javascript:void(0)" data-modal-trigger="sample-modal" class="demo__btn demo__btn--secondary">Sample Modal</a> -->
      <div class="modal" data-modal-name="sample-modal">
         <div class="modal__dialog">
            <button class="modal__close" data-modal-dismiss>×</button>
            <div class="modal__content">
               <div class="modalup text-center">
                  <h3 class="chng-cur">
                     Change currency
                  </h3>
               </div>
               <div class="topcur">
                  <h4 class="tpp">top cureenecy</h4>
                  <div class="topp d-flex">
                     <p class="c1"><b>US$</b> U.S. Dollar</p>
                     <p class="c2"><b>£</b> Euro</p>
                     <p class="c3"><b>₹</b> Indian Rupee </p>
                  </div>
               </div>
               <div class="all-currencies">
                  <h3 class="fsf">All currencies</h3>
                  <div class="row">
                     <div class="col-md-3 sm-12">
                        <div class="con-cur">
                           <p><span>ARS</span> Argentine Peso</p>
                           <p><span>AUS</span> Australian Dolar </p>
                           <p><span>AZN</span> Azerbaijani Manat</p>
                           <p><span>BHD</span> Bahraini Dinar</p>
                           <p><span>RS</span> Brazillian Real</p>
                           <p><span>BGN</span> Bulgarian Lev</p>
                           <p><span>CAS</span> Canadian Dollar</p>
                           <p><span>XOF</span> CFA Franc BCEAO</p>
                           <p><span>CLS</span> Chilean Peso </p>
                           <p><span>CNY</span> Chinese Yuan</p>
                           <p><span>COP</span> Colombian Peso</p>
                           <p><span>CZK</span> Czech Peso</p>
                           <p><span>DKK</span> Danis Krone</p>
                        </div>
                     </div>
                     <div class="col-md-3 sm-12">
                        <div class="con-cur">
                           <p><span>EGP</span> Eyptian Pound</p>
                           <p><span>E</span> Euro</p>
                           <p><span>FJD</span> Fijian Dollar</p>
                           <p><span>GEL</span> Georgian Lari</p>
                           <p><span>HK$</span> Hong Kong Dollar</p>
                           <p><span>HUF</span> Hungarian Forint</p>
                           <p><span>KR</span> Icelandic Krone</p>
                           <p><span>₹</span> Indian Rupee</p>
                           <p><span>IDR</span> Indonesian Rupiee</p>
                           <p><span>₪</span> Israeli New Sheqel</p>
                           <p><span>JPY</span> Japanese Yen</p>
                           <p><span>JPD</span> Jordanian Dinar</p>
                           <p><span>KZD</span> Kazakisthan Ten..</p>
                        </div>
                     </div>
                     <div class="col-md-3 sm-12">
                        <div class="con-cur">
                           <p><span>w</span> Korean Won</p>
                           <p><span>KWD</span> Kuwati Dinar</p>
                           <p><span>MYR</span> Malaysia Ringgit</p>
                           <p><span>MXS</span> Mexican Peso </p>
                           <p><span>MDL</span> Moldovan Leu</p>
                           <p><span>NAD</span> Namibian Dollar</p>
                           <p><span>NTS</span> New Taiwan Dollar</p>
                           <p><span>NZD</span> NewZealand Dollar</p>
                           <p><span>NOK</span> Norwegian Krone</p>
                           <p><span>OMR</span> Oman Rial</p>
                           <p><span>PLN</span> Polish Zloty</p>
                           <p><span>£</span> Pound Sterling</p>
                           <p><span>QAR</span> Qatar Rial</p>
                        </div>
                     </div>
                     <div class="col-md-3 sm-12">
                        <div class="con-cur">
                           <p><span>RON</span> Romanian Leu</p>
                           <p><span>RUB</span> Russian Ruble</p>
                           <p><span>SAR</span> Saudi Riyal</p>
                           <p><span>S$</span> Singapore Dollar</p>
                           <p><span>ZAR</span> South African Ra..</p>
                           <p><span>SEK</span> Swedish Krona</p>
                           <p><span>CHF</span> Swiss Franc</p>
                           <p><span>THB</span> Thai Baht</p>
                           <p><span>TL</span> Turkish Lira </p>
                           <p><span>AED</span> U.A.E. Dhiram</p>
                           <p><span>US$</span> U.S. Dollar</p>
                           <p><span>UAH</span> Ukrainian Hryvnia</p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- second modal -->
      <!-- <a href="javascript:void(0)" id="open-btn1">
         OPEN THE MODAL
         
         </a> -->
      <!-- Modal Background and Modal -->
      <div id="modal-background1">
         <div id="modal1">
            <span id="close-btn1">&times;</span>
            <div class="chng-lng">
               <p>Change Language</p>
            </div>
            <form>
               <select class="form-control form-control-lg">
                  <option>English</option>
                  <option>Nederlands</option>
                  <option>Arabic</option>
               </select>
            </form>
            <!--    <div class="lng">
               <a href="">English</a>
               
               <a href="">Nederlands</a>
               
               <a href="">Arabic</a>
               
               </div> -->
         </div>
      </div>
      <!-- end secodn ,odal -->
      <!---loader ------------>
      <div class="loader d-none">
         <div class="col-sm-2 col-xs-4 text-center">
            <div class="pulse-loader"> </div>
            <h6 class="text-dar mt-3">Loading...</h6>
         </div>
      </div>
       <div class="loader1 d-none" style="background: rgba(255,255,255,0.7);">
         <div class="col-sm-2 col-xs-4 text-center">
            <div class="pulse-loader"> </div>
            <h4 class="text-dar mt-3">Please Wait...</h4>
         </div>
      </div>
      <!--end loader -------------------->
      <style>
         /* loader */
         .loader{
         width: 100%;
         height: 100%;
         position: fixed;
         top: 0;
         z-index: 9999999999;
         left: 0;
         background-color: white;
         display: flex;
         justify-content: center;
         align-items: center;
         }
         .pulse-loader:not(:required) {
         display: inline-block;
         width: 50px;
         height: 50px;
         -moz-animation: pulse-loader 0.7s linear infinite alternate;
         -webkit-animation: pulse-loader 0.7s linear infinite alternate;
         animation: pulse-loader 0.7s linear infinite alternate;
         border: 2px solid #e67e22;
         -moz-border-radius: 50%;
         -webkit-border-radius: 50%;
         border-radius: 50%;
         overflow: hidden;
         text-indent: 50px;
         }
         @-moz-keyframes pulse-loader {
         0% {
         -moz-box-shadow: #e67e22 0 0 0px 20px;
         box-shadow: #e67e22 0 0 0px 20px;
         }
         40% {
         -moz-box-shadow: none;
         box-shadow: none;
         }
         100% {
         -moz-box-shadow: #e67e22 0 0 0px 25px inset;
         box-shadow: #e67e22 0 0 0px 25px inset;
         }
         }
         @-webkit-keyframes pulse-loader {
         0% {
         -webkit-box-shadow: #e67e22 0 0 0px 20px;
         box-shadow: #e67e22 0 0 0px 20px;
         }
         40% {
         -webkit-box-shadow: none;
         box-shadow: none;
         }
         100% {
         -webkit-box-shadow: #e67e22 0 0 0px 25px inset;
         box-shadow: #e67e22 0 0 0px 25px inset;
         }
         }
         @keyframes pulse-loader {
         0% {
         -moz-box-shadow: #e67e22 0 0 0px 20px;
         -webkit-box-shadow: #e67e22 0 0 0px 20px;
         box-shadow: #e67e22 0 0 0px 20px;
         }
         40% {
         -moz-box-shadow: none;
         -webkit-box-shadow: none;
         box-shadow: none;
         }
         100% {
         -moz-box-shadow: #e67e22 0 0 0px 25px inset;
         -webkit-box-shadow: #e67e22 0 0 0px 25px inset;
         box-shadow: #e67e22 0 0 0px 25px inset;
         }
         }
         /* end loader ****/
         h5{
         font-size: 13px;
         }
         .modal {
         display: none;
         position: fixed;
         top: 0;
         right: 0;
         bottom: 0;
         left: 0;
         padding: 15px;
         overflow: auto;
         background-color: rgba(0, 0, 0, 0.88);
         -webkit-animation-duration: 0.35s;
         animation-duration: 0.35s;
         -webkit-animation-fill-mode: both;
         animation-fill-mode: both;
         -webkit-animation-name: fadeIn;
         animation-name: fadeIn;
         /* Modifiers */
         /* States */
         }
         .modal__dialog {
         position: relative;
         max-width: 500px;
         padding: 20px;
         margin: auto;
         border-radius: 4px;
         background-color: #fff;
         }
         .modal__close {
         position: absolute;
         top: 20px;
         right: 20px;
         padding: 0;
         border: none;
         color: #ccc;
         background-color: transparent;
         background-image: none;
         }
         .modal__close:focus {
         outline: 0;
         }
         .modal__header {
         border-bottom: 1px solid #e2e2e2;
         }
         .modal__title {
         margin: 0 0 15px;
         }
         .modal__content {
         padding: 10px 0;
         font-size: 13px;
         line-height: 1.6;
         color: #555;
         }
         .modal__footer {
         padding-top: 20px;
         border-top: 1px solid #e2e2e2;
         text-align: right;
         }
         .modal--fullscreen {
         padding: 5px;
         }
         .modal--fullscreen .modal__dialog {
         width: 100%;
         max-width: none;
         height: 100%;
         border-radius: 0;
         }
         .modal.is-modal-active {
         display: flex;
         }
         /* Animation */
         @-webkit-keyframes fadeIn {
         0% {
         opacity: 0;
         }
         100% {
         opacity: 1;
         }
         }
         @keyframes fadeIn {
         0% {
         opacity: 0;
         }
         100% {
         opacity: 1;
         }
         }
         .modal__dialog {
         position: relative;
         max-width: 816px;
         padding: 20px;
         width: 100%;
         margin: auto;
         border-radius: 4px;
         background-color: #fff;
         }
         .con-cur span {
         font-size: 15px;
         font-weight:900;
         color:black
         }
         h3.fsf {
         font-size: 23px;
         font-weight: 900;
         color: #000000;
         }
         h3.chng-cur {
         color: #000000;
         font-weight: 600;
         }
         p.c2 {
         margin-left: 65px;
         }
         p.c3 {
         margin-left: 65px;
         font-weight: 900;
         color: #000000;
         }
         .topp b{
         margin: 10px;
         font-size: 17px;
         font-weight: bolder;
         color: #000;
         }
         h4.tpp {
         color: #000000;
         font-weight: 700;
         }
         button.modal__close {
         font-weight: 900;
         font-size: 28px;
         color: #000000;
         }
         /*second moidal css*/
         #modal-background1 {
         display: none;
         background-color: rgba(0, 0, 0, 0.2);
         position: fixed;
         top: 0;
         left: 0;
         width: 100%;
         height: 100%;
         z-index: 1;
         }
         .yes, .no {
         border: none;
         padding: 7px 14px;
         font-size: 1rem;
         border-radius: 5px;
         }
         .yes {
         background-color: #00ff00;
         }
         .no {
         background-color: #ff0000;
         }
         #close-btn1 {
         float: right;
         font-size: 22px;
         }
         #close-btn1:hover {
         cursor: pointer;
         color: #ff0000;
         }
         .chng-lng {
         margin-top: 22px;
         }
         .lng a {
         color: #000;
         margin: 4px;
         font-size: 19px;}
         .chng-lng {
         font-size: 24px;
         font-weight: 800;
         margin-top: 22px;
         }
         .login-message{
            width:100%;
            position:absolute;
            height:fit-content;
            padding:15px 0px;
            display:flex;
            justify-content:center;
            align-items:center;
            color: #D8000C;
               background-color: #FFBABA;
         }

         /*end css*/
         .open-ids {
  width: 236px;
  margin: 0 auto;
}

.auth-provider {
   font-family: system-ui,roboto,sans-serif;
  font-weight: 500;
   font-size: 16px;
  line-height: 40px;
  padding: 0 21px;
  border-radius: 20px;
  cursor: pointer;
  margin-bottom: 16px;
  box-sizing: border-box;
  border: 1px solid #d6d9dc;
  text-align: center;
  background: #FFF;
  color: #535a60
}

.google-login {
  color: #535a60;
  border-color: #d6d9dc
}

.facebook-login {
  color: #FFF;
  background-color: #395697;
  border-color: transparent
}

.kyber-login {
  color: #FFF;
  background-color: #54ae85;
  border-color: transparent
}

.telegram-login {
  margin-bottom: 12px;
}

.svg-icon {
  vertical-align: middle;
  padding-bottom: 4px;
}
      </style>
     
      <!-- end modal scetion -->
      <!-- <div id="preloader"></div> -->
      <a href="#" class="back-to-top d-flex align-items-center justify-content-center active">
      <i class="bi bi-arrow-up-short"></i> </a>
      <div class="social-media-container vertical  clearfix">
         <div class="social-media-icon-container">
            <div class="social-media-icon">
               <a href="" target="_blank" rel="nofollow">
               <i class="fab fa-facebook-f"></i>
               </a>
            </div>
            <span class="social-media-count">6.1K</span>
            <span class="social-media-followers">Followers</span>
         </div>
         <div class="social-media-icon-container">
            <div class="social-media-icon">
               <a href="" target="_blank" rel="nofollow">
               <i class="fab fa-twitter"></i>
               </a>
            </div>
            <span class="social-media-count">9.2K</span>
            <span class="social-media-followers">Followers</span>
         </div>
         <div class="social-media-icon-container">
            <div class="social-media-icon">
               <a href="" target="_blank" rel="nofollow">
               <i class="fab fa-pinterest-p"></i>
               </a>
            </div>
            <span class="social-media-count">5.3M</span>
            <span class="social-media-followers">Followers</span>
         </div>
         <div class="social-media-icon-container">
            <div class="social-media-icon">
               <a href="" target="_blank" rel="nofollow">
               <i class="fab fa-instagram"></i>
               </a>
            </div>
            <span class="social-media-count">11.4K</span>
            <span class="social-media-followers">Followers</span>
         </div>
      </div>
      <!-- Vendor JS Files -->
      <div class="modal" id="loader-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" style="background:inherit !important;display: flex;justify-content: center;align-items: center;">
               <div class="spinner-border text-light" role="status" style="width: 3rem; height: 3rem;">
                  <span class="sr-only">Loading...</span>
               </div>
            </div>
         </div>
      </div>
      <!---signup modal ---->
      <div class="modal register-modal" id="register-modal" >
         <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
               <div class="modal-body p-0" style="background:white">
                  <div class="wrapper-section">
                     <img src="{{url('')}}/admin-assets/images/admin_image/{{$data->admin_image}}" width="100"> 
                     <h6 class="name">Welcome to Triplooky</h6>
                     <p>Register For This Site</p>
                     <p>Registration confirmation will be e-mailed to you.</p>
                     <form class="text-left user-signup-form form" id="user-signup-form" style="display: block;width: 100%;background:white;box-shadow: none;">
                        @csrf
                        <div class="row">
                           <div class="col-md-6 col-xs-12">
                              <div class="form-group">
                                 <label style="margin-bottom:0px">First Name<span style="color: #ED1B24">*</span></label>
                                 <input type="text" id="user" class="form-control shadow-none" placeholder="Enter your first name" name="first_name">
                              </div>
                           </div>
                           <div class="col-md-6 col-xs-12">
                              <div class="form-group">
                                 <label style="margin-bottom:0px">last Name<span style="color: #ED1B24">*</span></label>
                                 <input type="text" id="user" class="form-control shadow-none" placeholder="Enter your last name" name="last_name">
                              </div>
                           </div>
                           <div class="col-md-6 col-xs-12">
                              <div class="form-group">        
                                 <label style="margin-bottom:0px">User Name<span style="color: #ED1B24">*</span></label>
                                 <input type="text" id="user" class="form-control shadow-none" placeholder="Enter your user name" name="user_name">
                              </div>
                           </div>
                           <div class="col-md-6 col-xs-12">
                              <div class="form-group">        
                                 <label style="margin-bottom:0px">E-mail<span style="color: #ED1B24">*</span></label>
                                 <input type="email" id="user" class="form-control shadow-none" placeholder="Enter your email address" name="email">
                              </div>
                           </div>
                           <div class="col-md-6 col-xs-12">
                              <div class="form-group">
                                 <label style="margin-bottom:0px">Password<span style="color: #ED1B24">*</span></label>
                                 <input type="password" class="form-control shadow-none" placeholder="Password" name="password">
                              </div>
                           </div>
                           <div class="col-md-6 col-xs-12">                          
                              <div class="form-group">
                                 <label style="margin-bottom:0px">Confirm Password<span style="color: #ED1B24">*</span></label>
                                 <input type="password" class="form-control shadow-none" placeholder="Confirm password" name="confirm-password">
                              </div>
                              <input type="hidden" name="city_name" id="city_name">
                              <input type="hidden" name="country_name" id="country_name">
                           </div>
                           <div class="col-md-12">
                              <button type="submit" id="login-button">Register</button>
                           </div>
                        </div>
                     </form>
                     <div class="login-bottom mt-2">
                        <p class="p-0 m-0">Already a member?<a href="javascript:void(0)" class="open-login-modal">Login</a></p>
                     </div>
                     <p class="forgot-foot mt-1 p-0 mb-2">© 2021 TripLooky</p>
                     <span class=user-register-message></span> 
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!--end signup modal ----->
      <!---login modal  ---->
      <div class="modal" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content position-relative" style="position:relative">
               <div class="modal-body p-0 position-relative" style="position:relative" >
                 <div style="position:relative">
                 <div class="login-message d-none">
                   
                  </div>
                 </div>
                  
                  <div class="wrapper-section">
                     <img src="{{url('')}}/admin-assets/images/admin_image/{{$data->admin_image}}" width="42%"> 
                     
                  <p class="p-font">Login With Triplooky</p>
                     <form class="text-left" id="user-login-form" style="display: block;width: 100%;background:white;box-shadow: none;">
                        @csrf
                        <div class="row">
                           <div class="col">
                              <div class="form-group">
                                 <label style="float:left;" class="p-font">Email<span style="color: #ED1B24">*</span></label>
                                 <input type="email" id="user" class="form-control shadow-none" placeholder="Enter your email address" name="email">
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col">
                              <div class="form-group">
                                 <label style="float: left;" class="p-font">Password<span style="color: #ED1B24">*</span></label>
                                 <input type="password" class="form-control shadow-none" placeholder="Password" name="password">
                              </div>
                           </div>
                        </div>
                        <div class="d-flex" style="align-items:center;justify-content:space-between;">
                           <div class="form-group" >
                              <input type="checkbox" id="login-remember-me">
                              <label for="rem" class="p-font">Remember me</label>
                           </div>
                           <div class="form-group">
                              <a href="javascript:void(0)" class="ft forget-password-link p-font">Forgot Password?</a>
                           </div>
                        </div>
                        <button type="submit" id="login-button"><div class="spinner-border d-none login-loader" style="width: 2rem; height: 2rem;" role="status">
  <span class="sr-only">Loading...</span></div><span class="login-text"> Login</span></button>
                     </form>
                     <form class="forget-password-form d-none">
                        @csrf
                     <div class="row">
                           <div class="col">
                              <div class="form-group">
                                 <label style="float:left;">E-mail or Username</label>
                                 <input type="email" id="user" class="form-control shadow-none require" placeholder="Email or Username" name="email">
                              </div>
                           </div>
                        </div>
                          
                           <div class="row">
                           <div class="col">
                              <div class="form-group">
                                 <label style="float:left;">New Password</label>
                                 <input type="password" id="user" class="form-control shadow-none require" placeholder="New Password" name="password">
                              </div>
                           </div>
                        </div>
                        <button type="submit" id="login-button"><div class="spinner-border d-none forget-password-loader" style="width: 2rem; height: 2rem;" role="status">
  <span class="sr-only">Loading...</span></div><span class="login-text">Get New Password</span></button>
                        
                     </form>
                     <div class="login-bottom">
                        <hr />
                        <p>Don't have an account?<a href="javascript:void(0)" class="open-register-modal">Sign Up</a></p>
                        <div class="or-section">
                           <span>OR</span>
                        </div>
                      <div class="open-ids mt-1"> 
  
   <div class="auth-provider google-login p-font">
     <a href="/login/google" class="text-dark shadow-sm">
        <svg aria-hidden="true" class="svg-icon" width="18" height="18" viewBox="0 0 18 18">
         <g>
            <path d="M16.51 8H8.98v3h4.3c-.18 1-.74 1.48-1.6 2.04v2.01h2.6a7.8 7.8 0 0 0 2.38-5.88c0-.57-.05-.66-.15-1.18z" fill="#4285F4"></path>
            <path d="M8.98 17c2.16 0 3.97-.72 5.3-1.94l-2.6-2a4.8 4.8 0 0 1-7.18-2.54H1.83v2.07A8 8 0 0 0 8.98 17z" fill="#34A853"></path>
            <path d="M4.5 10.52a4.8 4.8 0 0 1 0-3.04V5.41H1.83a8 8 0 0 0 0 7.18l2.67-2.07z" fill="#FBBC05"></path>
            <path d="M8.98 4.18c1.17 0 2.23.4 3.06 1.2l2.3-2.3A8 8 0 0 0 1.83 5.4L4.5 7.49a4.77 4.77 0 0 1 4.48-3.3z" fill="#EA4335"></path>
         </g>
      </svg>
      Log in with Google
     </a>
   </div>
   <div class="auth-provider facebook-login p-font">
     <a href="/login/facebook" class="text-white"> <svg aria-hidden="true" class="svg-icon" width="18" height="18" viewBox="0 0 18 18">
         <path d="M1.88 1C1.4 1 1 1.4 1 1.88v14.24c0 .48.4.88.88.88h7.67v-6.2H7.46V8.4h2.09V6.61c0-2.07 1.26-3.2 3.1-3.2.88 0 1.64.07 1.87.1v2.16h-1.29c-1 0-1.19.48-1.19 1.18V8.4h2.39l-.31 2.42h-2.08V17h4.08c.48 0 .88-.4.88-.88V1.88c0-.48-.4-.88-.88-.88H1.88z" fill="#fff"></path>
      </svg>
      Log in with Facebook</a>
   </div>
 
</div>
                        
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!--end login modal  ------->
      @yield("modal")
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.0/jquery-ui.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
      <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>      
      <script src="{{asset('front-assets/assets/vendor/bootstrap/js/daterangepicker.js')}}"></script>
      <!-- <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script> -->
      <script src="{{asset('front-assets/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
      <script src="{{asset('front-assets/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
      <script src="{{asset('front-assets/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
      <script src="{{asset('front-assets/assets/vendor/php-email-form/validate.js')}}"></script>
      <script src="{{asset('front-assets/assets/vendor/purecounter/purecounter.js')}}"></script>
      <script src="{{asset('front-assets/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
      <script src="{{asset('front-assets/assets/vendor/waypoints/noframework.waypoints.js')}}"></script>
      <script src="{{asset('front-assets/assets/js/swiper.min.js')}}"></script>
      <script src="{{url('')}}/front-assets/assets/js/custom.js?cache=<?php echo time() ?>"></script>
      <script src="{{asset('front-assets/assets/js/main.js')}}"></script>

      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.1/js/swiper.min.js"></script>
      <script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.5.7/slick.min.js"></script>
      @yield("js")
      

      <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script> -->
      <script>
         /*! WOW - v1.1.2 - 2015-04-07
         * Copyright (c) 2015 Matthieu Aussaguel; Licensed MIT */(function(){var a,b,c,d,e,f=function(a,b){return function(){return a.apply(b,arguments)}},g=[].indexOf||function(a){for(var b=0,c=this.length;c>b;b++)if(b in this&&this[b]===a)return b;return-1};b=function(){function a(){}return a.prototype.extend=function(a,b){var c,d;for(c in b)d=b[c],null==a[c]&&(a[c]=d);return a},a.prototype.isMobile=function(a){return/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(a)},a.prototype.createEvent=function(a,b,c,d){var e;return null==b&&(b=!1),null==c&&(c=!1),null==d&&(d=null),null!=document.createEvent?(e=document.createEvent("CustomEvent"),e.initCustomEvent(a,b,c,d)):null!=document.createEventObject?(e=document.createEventObject(),e.eventType=a):e.eventName=a,e},a.prototype.emitEvent=function(a,b){return null!=a.dispatchEvent?a.dispatchEvent(b):b in(null!=a)?a[b]():"on"+b in(null!=a)?a["on"+b]():void 0},a.prototype.addEvent=function(a,b,c){return null!=a.addEventListener?a.addEventListener(b,c,!1):null!=a.attachEvent?a.attachEvent("on"+b,c):a[b]=c},a.prototype.removeEvent=function(a,b,c){return null!=a.removeEventListener?a.removeEventListener(b,c,!1):null!=a.detachEvent?a.detachEvent("on"+b,c):delete a[b]},a.prototype.innerHeight=function(){return"innerHeight"in window?window.innerHeight:document.documentElement.clientHeight},a}(),c=this.WeakMap||this.MozWeakMap||(c=function(){function a(){this.keys=[],this.values=[]}return a.prototype.get=function(a){var b,c,d,e,f;for(f=this.keys,b=d=0,e=f.length;e>d;b=++d)if(c=f[b],c===a)return this.values[b]},a.prototype.set=function(a,b){var c,d,e,f,g;for(g=this.keys,c=e=0,f=g.length;f>e;c=++e)if(d=g[c],d===a)return void(this.values[c]=b);return this.keys.push(a),this.values.push(b)},a}()),a=this.MutationObserver||this.WebkitMutationObserver||this.MozMutationObserver||(a=function(){function a(){"undefined"!=typeof console&&null!==console&&console.warn("MutationObserver is not supported by your browser."),"undefined"!=typeof console&&null!==console&&console.warn("WOW.js cannot detect dom mutations, please call .sync() after loading new content.")}return a.notSupported=!0,a.prototype.observe=function(){},a}()),d=this.getComputedStyle||function(a){return this.getPropertyValue=function(b){var c;return"float"===b&&(b="styleFloat"),e.test(b)&&b.replace(e,function(a,b){return b.toUpperCase()}),(null!=(c=a.currentStyle)?c[b]:void 0)||null},this},e=/(\-([a-z]){1})/g,this.WOW=function(){function e(a){null==a&&(a={}),this.scrollCallback=f(this.scrollCallback,this),this.scrollHandler=f(this.scrollHandler,this),this.resetAnimation=f(this.resetAnimation,this),this.start=f(this.start,this),this.scrolled=!0,this.config=this.util().extend(a,this.defaults),this.animationNameCache=new c,this.wowEvent=this.util().createEvent(this.config.boxClass)}return e.prototype.defaults={boxClass:"wow",animateClass:"animated",offset:0,mobile:!0,live:!0,callback:null},e.prototype.init=function(){var a;return this.element=window.document.documentElement,"interactive"===(a=document.readyState)||"complete"===a?this.start():this.util().addEvent(document,"DOMContentLoaded",this.start),this.finished=[]},e.prototype.start=function(){var b,c,d,e;if(this.stopped=!1,this.boxes=function(){var a,c,d,e;for(d=this.element.querySelectorAll("."+this.config.boxClass),e=[],a=0,c=d.length;c>a;a++)b=d[a],e.push(b);return e}.call(this),this.all=function(){var a,c,d,e;for(d=this.boxes,e=[],a=0,c=d.length;c>a;a++)b=d[a],e.push(b);return e}.call(this),this.boxes.length)if(this.disabled())this.resetStyle();else for(e=this.boxes,c=0,d=e.length;d>c;c++)b=e[c],this.applyStyle(b,!0);return this.disabled()||(this.util().addEvent(window,"scroll",this.scrollHandler),this.util().addEvent(window,"resize",this.scrollHandler),this.interval=setInterval(this.scrollCallback,50)),this.config.live?new a(function(a){return function(b){var c,d,e,f,g;for(g=[],c=0,d=b.length;d>c;c++)f=b[c],g.push(function(){var a,b,c,d;for(c=f.addedNodes||[],d=[],a=0,b=c.length;b>a;a++)e=c[a],d.push(this.doSync(e));return d}.call(a));return g}}(this)).observe(document.body,{childList:!0,subtree:!0}):void 0},e.prototype.stop=function(){return this.stopped=!0,this.util().removeEvent(window,"scroll",this.scrollHandler),this.util().removeEvent(window,"resize",this.scrollHandler),null!=this.interval?clearInterval(this.interval):void 0},e.prototype.sync=function(){return a.notSupported?this.doSync(this.element):void 0},e.prototype.doSync=function(a){var b,c,d,e,f;if(null==a&&(a=this.element),1===a.nodeType){for(a=a.parentNode||a,e=a.querySelectorAll("."+this.config.boxClass),f=[],c=0,d=e.length;d>c;c++)b=e[c],g.call(this.all,b)<0?(this.boxes.push(b),this.all.push(b),this.stopped||this.disabled()?this.resetStyle():this.applyStyle(b,!0),f.push(this.scrolled=!0)):f.push(void 0);return f}},e.prototype.show=function(a){return this.applyStyle(a),a.className=a.className+" "+this.config.animateClass,null!=this.config.callback&&this.config.callback(a),this.util().emitEvent(a,this.wowEvent),this.util().addEvent(a,"animationend",this.resetAnimation),this.util().addEvent(a,"oanimationend",this.resetAnimation),this.util().addEvent(a,"webkitAnimationEnd",this.resetAnimation),this.util().addEvent(a,"MSAnimationEnd",this.resetAnimation),a},e.prototype.applyStyle=function(a,b){var c,d,e;return d=a.getAttribute("data-wow-duration"),c=a.getAttribute("data-wow-delay"),e=a.getAttribute("data-wow-iteration"),this.animate(function(f){return function(){return f.customStyle(a,b,d,c,e)}}(this))},e.prototype.animate=function(){return"requestAnimationFrame"in window?function(a){return window.requestAnimationFrame(a)}:function(a){return a()}}(),e.prototype.resetStyle=function(){var a,b,c,d,e;for(d=this.boxes,e=[],b=0,c=d.length;c>b;b++)a=d[b],e.push(a.style.visibility="visible");return e},e.prototype.resetAnimation=function(a){var b;return a.type.toLowerCase().indexOf("animationend")>=0?(b=a.target||a.srcElement,b.className=b.className.replace(this.config.animateClass,"").trim()):void 0},e.prototype.customStyle=function(a,b,c,d,e){return b&&this.cacheAnimationName(a),a.style.visibility=b?"hidden":"visible",c&&this.vendorSet(a.style,{animationDuration:c}),d&&this.vendorSet(a.style,{animationDelay:d}),e&&this.vendorSet(a.style,{animationIterationCount:e}),this.vendorSet(a.style,{animationName:b?"none":this.cachedAnimationName(a)}),a},e.prototype.vendors=["moz","webkit"],e.prototype.vendorSet=function(a,b){var c,d,e,f;d=[];for(c in b)e=b[c],a[""+c]=e,d.push(function(){var b,d,g,h;for(g=this.vendors,h=[],b=0,d=g.length;d>b;b++)f=g[b],h.push(a[""+f+c.charAt(0).toUpperCase()+c.substr(1)]=e);return h}.call(this));return d},e.prototype.vendorCSS=function(a,b){var c,e,f,g,h,i;for(h=d(a),g=h.getPropertyCSSValue(b),f=this.vendors,c=0,e=f.length;e>c;c++)i=f[c],g=g||h.getPropertyCSSValue("-"+i+"-"+b);return g},e.prototype.animationName=function(a){var b;try{b=this.vendorCSS(a,"animation-name").cssText}catch(c){b=d(a).getPropertyValue("animation-name")}return"none"===b?"":b},e.prototype.cacheAnimationName=function(a){return this.animationNameCache.set(a,this.animationName(a))},e.prototype.cachedAnimationName=function(a){return this.animationNameCache.get(a)},e.prototype.scrollHandler=function(){return this.scrolled=!0},e.prototype.scrollCallback=function(){var a;return!this.scrolled||(this.scrolled=!1,this.boxes=function(){var b,c,d,e;for(d=this.boxes,e=[],b=0,c=d.length;c>b;b++)a=d[b],a&&(this.isVisible(a)?this.show(a):e.push(a));return e}.call(this),this.boxes.length||this.config.live)?void 0:this.stop()},e.prototype.offsetTop=function(a){for(var b;void 0===a.offsetTop;)a=a.parentNode;for(b=a.offsetTop;a=a.offsetParent;)b+=a.offsetTop;return b},e.prototype.isVisible=function(a){var b,c,d,e,f;return c=a.getAttribute("data-wow-offset")||this.config.offset,f=window.pageYOffset,e=f+Math.min(this.element.clientHeight,this.util().innerHeight())-c,d=this.offsetTop(a),b=d+a.clientHeight,e>=d&&b>=f},e.prototype.util=function(){return null!=this._util?this._util:this._util=new b},e.prototype.disabled=function(){return!this.config.mobile&&this.util().isMobile(navigator.userAgent)},e}()}).call(this);
      </script>
      @yield("js")
      <!-- Template Main JS File -->
      <script>

        $("#currency a").click(function(){
        var currency=($(this).find("span:nth-child(2)").html());
     
       

        $.ajax({
          type:"POST",
          url:"/currency-change",
          data:{
            _token:$("body").attr("data"),
            currency:currency,
          },
          beforeSend:function(){
           

          },
          success:function(response){
           
         
            location.reload();
          }
        });

        });
        //end currench change
        $(document).ready(function () {
          $(".forget-password-link").click(function(){
            $(".forget-password-form").removeClass("d-none");
            $("#user-login-form").addClass("d-none");
          });

              $('#login-modal').on('hidden.bs.modal', function (e) {
                  $(".forget-password-form").addClass("d-none");
            $("#user-login-form").removeClass("d-none");
             });
          $('.navbar li').hover(function () {
                  $(this).find('.dropdown-menu').first().stop(true, true).slideDown(150);
              }, function () {
                  $(this).find('.dropdown-menu').first().stop(true, true).slideUp(105)
              });


         
          });
      </script>
      <script>
         // cancle date
         $('.cancelBtn').click(function(){
           
               $('.g').css("display","block");
               $('.travel-date').css("display","none");
             });
         //end cancel date
         
            $(document).ready(function(){
        
              $.get("https://ipinfo.io", function(response) {
                $(".select-currency").each(function(index,link){
                  var country_symbol=$(link).find("span:nth-child(2)").text();
                  if(response.country==country_symbol){
                    $(".show-currency").text(country_symbol);
                    $(link).addClass("active text-white");

                  }

                  else{

                    if("{{session()->has('currency_name')}}"==1)
                    {
                     $(".default-currency").text("{{session('currency_name')}}");

                    }
                    else{
                      alert();
                      $(".default-currency").html("USD");
                    }
                    
                    if(country_symbol=="USD"){
                       $(link).addClass("active text-white");
                    }
                  }

          });

                 // //currency select and show
         //  $(".select-currency").each(function(index,link){

         //      $(link).click(function(){
         //        var span=$(link).find("span:nth-child(2)").text();
         //        $(".show-currency").text(span);
                

         //           $(".select-currency").each(function(){
         //            $(this).removeClass("bg-primary text-white");
         //           });
         //             $(link).addClass("bg-primary text-white");
         //      });
         //  });
            
         //  //end currency select and show
        //currency change
         var default_currency=$("span.default-currency").html().trim();
         $(".select-currency").each(function(){
          var currency=$(this).find("span:nth-child(2)").html().trim();
          if(currency==default_currency){
            $(".select-currency").each(function(){
              $(this).removeClass("active text-white");
            });

            $(this).addClass("active text-white");
          }
         });
 
    $("#city_name").val(response.city);
    $("#country_name").val(response.country);


}, "jsonp");
           
              $(".login-modal-link").click(function(){
                
                 if(localStorage.getItem("_Trip_")!=null){
                
                    var data=JSON.parse(localStorage.getItem("_Trip_"));
                   
                    $("#user-login-form input[name='email']").val(atob(data.e));
                    $("#user-login-form input[name='password']").val(atob(data.p));
                    $("#login-remember-me").prop("checked",true);
                 }

             $("#login-modal").modal("show");
             $(".open-register-modal").click(function(){
              $("#login-modal").modal("hide");
               $("#register-modal").modal("show");
             });
             });
             $(".sign-up-modal-link").click(function(){
               $("#register-modal").modal("show");
               $(".open-login-modal").click(function(){
                
                  $("#register-modal").modal("hide");
                   $("#login-modal").modal("show");
               });
             });
            });
         
             $(window).scroll(function() {    
         
               var scroll = $(window).scrollTop();
         
         
         
               if (scroll >= 50) {
         
                   $("#header").addClass("darkHeader");
         
               } else {
         
                   $("#header").removeClass("darkHeader");
         
               }
         
             });
         
           
      </script>
      <script>
         $(window).scroll(function() {    
         
           var scroll = $(window).scrollTop();
         
         
         
           if (scroll >= 100) {
         
               $(".activityMenu").addClass("top72");
         
           } else {
         
               $(".activityMenu").removeClass("top72");
         
           }
         
         });
         
      </script>
      <!-- <script>
         $('.collm').click(function(e) {
         
           e.preventDefault();
         
         
         
           var $this = $(this);
         
         
         
           if ($this.next().hasClass('show')) {
         
               $this.next().removeClass('show');
         
               $this.next().slideUp(350);
         
           } else {
         
               $this.parent().parent().find('li .inner').removeClass('show');
         
               $this.parent().parent().find('li .inner').slideUp(350);
         
               $this.next().toggleClass('show');
         
               $this.next().slideToggle(350);
         
           }
         
         });
         
      </script> -->
      <script>
         const slider = document.getElementById('sliderPrice');
         
         const rangeMin = parseInt(slider.dataset.min);
         
         const rangeMax = parseInt(slider.dataset.max);
         
         const step = parseInt(slider.dataset.step);
         
         const filterInputs = document.querySelectorAll('input.filter__input');
         
         
         
         noUiSlider.create(slider, {
         
             start: [rangeMin, rangeMax],
         
             connect: true,
         
             step: step,
         
             range: {
         
                 'min': rangeMin,
         
                 'max': rangeMax
         
             },
         
           
         
             // make numbers whole
         
             format: {
         
               to: value => value,
         
               from: value => value
         
             }
         
         });
         
         
         
         // bind inputs with noUiSlider 
         
         slider.noUiSlider.on('update', (values, handle) => { 
         
           filterInputs[handle].value = values[handle]; 
         
         });
         
         
         
         filterInputs.forEach((input, indexInput) => { 
         
           input.addEventListener('change', () => {
         
             slider.noUiSlider.setHandle(indexInput, input.value);
         
           })
         
         });
         
      </script>
      <script>
         $('.tb').click(function() {
         
           $(this).addClass('active').siblings().removeClass('active');
         
         });
         
      </script>
      <script>
         $('.modal-close').click(function(){
         
           $('.modal-window').css('visibility', 'hidden');
         
         })
         
      </script>
      <script>
         $('.modal-window').css('visibility', 'hidden');
         
         $('.replybtn').click(function(){
         
           $('.modal-window').css('visibility', 'visible');
         
         })
         
      </script>
      <script>
         $('.gridV').click(function(){
         
           $(this).hide();
         
           $('.listV').show();
         
           $('#viewListing').hide();
         
           $('#viewGrid').show();
         
         });
         
         
         
         $('.listV').click(function(){
         
           $(this).hide();
         
           $('.gridV').show();
         
           $('#viewListing').show();
         
           $('#viewGrid').hide();
         
         });
         
      </script>
      <script>
         //-----JS for Price Range slider-----
         
         
         
         $(function() {
         
         $( "#slider-range" ).slider({
         
         range: true,
         
         min: 1,
         
         max: 36100,
         
         values: [ 1, 36100 ],
         
         slide: function( event, ui ) {
         
         $( "#amount" ).val( "MAD" + ui.values[ 0 ] + " - MAD" + ui.values[ 1 ]);
         
         }
         
         });
         
         $( "#amount" ).val( "MAD" + $( "#slider-range" ).slider( "values", 0 ) +
         
         " - MAD" + $( "#slider-range" ).slider( "values", 1 ) + '+' );
         
         });
         
      </script>
      <script>
         // INCLUDE JQUERY & JQUERY UI 1.12.1
         
         $( function() {
         
           $( "#datepicker" ).datepicker({
         
             dateFormat: "dd-mm-yy"
         
             , duration: "fast"
         
           });
         
           $('#daterange').on('cancel.daterangepicker', function(ev, picker) {
         //do something, like clearing an input
         $('#daterange').val('');
         });
         
         } );
         
      </script>
      <script>
         $('.faq-heading').click(function () {
         
         
         
         $(this).parent('li').toggleClass('the-active').find('.faq-text').slideToggle();
         
         });
         
      </script>
      <script>
         $(function() {
         
             var start = moment().startOf('hour');
             var end = moment().startOf('hour').add(0, 'hour');
         
             function cb(start, end) {
               $('#reportrange span').html(start.format('DD/MM/YYYY') + ' - ' + end.format('DD/MM/YYYY'));
               
             }
         
             $('#reportrange').daterangepicker({
                  // opens: 'left',
                startDate: start,
                 endDate: end,
                 minDate:new Date(),
                 maxDate:"+60",

         
                 locale: {
               format: 'DD/MM/YYYY',
               cancelLabel: 'Clear'
             }
             }, cb);
         
             cb(start, end);
             
         });
         
      </script>
      <!-- <script>
         $(function() {
         
           $('#reportrange, #reportrange span').daterangepicker({
         
             opens: 'left'
         
           }, function(start, end, label) {
         
             console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
         
           });
         
         });
         
         </script> -->
      <script>
         $('.g').click(function() {
         
            $('.g').hide();
         
         });
         
      </script>
      <script>
         var _targettedModal,
         
           _triggers = document.querySelectorAll('[data-modal-trigger]'),
         
           _dismiss = document.querySelectorAll('[data-modal-dismiss]'),
         
           modalActiveClass = "is-modal-active";
         
         
         
         function showModal(el){
         
           _targettedModal = document.querySelector('[data-modal-name="'+ el + '"]');
         
           _targettedModal.classList.add(modalActiveClass);
         
         }
         
         
         
         function hideModal(event){
         
           if(event === undefined || event.target.hasAttribute('data-modal-dismiss')) {
         
               _targettedModal.classList.remove(modalActiveClass);
         
           }
         
         }
         
         
         
         function bindEvents(el, callback){
         
           for (i = 0; i < el.length; i++) {
         
               (function(i) {
         
                   el[i].addEventListener('click', function(event) {
         
                       callback(this, event);
         
                   });
         
               })(i);
         
           }   
         
         }
         
         
         
         function triggerModal(){
         
           bindEvents(_triggers, function(that){
         
               showModal(that.dataset.modalTrigger);
         
           });
         
         }
         
         
         
         function dismissModal(){
         
           bindEvents(_dismiss, function(that){
         
               hideModal(event);
         
           });
         
         }
         
         
         
         function initModal(){
         
           triggerModal();
         
           dismissModal();
         
         }
         
         
         
         initModal();
         
         
         
      </script>
      <script>
         // select the open-btn button
         
         let openBtn1 = document.getElementById('open-btn1');
         
         // select the modal-background
         
         let modalBackground1 = document.getElementById('modal-background1');
         
         // select the close-btn 
         
         let closeBtn1 = document.getElementById('close-btn1');
         
         
         
         // shows the modal when the user clicks open-btn
         
         openBtn1.addEventListener('click', function() {
         
         modalBackground1.style.display = 'block';
         
         });
         
         
         
         // hides the modal when the user clicks close-btn
         
         closeBtn1.addEventListener('click', function() {
         
         modalBackground1.style.display = 'none';
         
         });
         
         
         
         // hides the modal when the user clicks outside the modal
         
         window.addEventListener('click', function(event) {
         
         // check if the event happened on the modal-background
         
         if (event.target === modalBackground1) {
         
           // hides the modal
         
           modalBackground1.style.display = 'none';
         
         }
         
         });
         
      </script>
      <script>
         new WOW().init();
         
         
         
         
         
         
         
         
         
         
         
         
         
         $(document).ready(function() {
         
         
         
          $('#example-1').progress_fnc();
         
          $('#example-2').progress_fnc();
         
          $('#example-3').progress_fnc();
         
          $('#example-4').progress_fnc();
         
          $('#example-5').progress_fnc();
         
          $('#example-6').progress_fnc();
         
          $('#example-7').progress_fnc();
         
          $('#example-8').progress_fnc();
         
          $('#example-9').progress_fnc();
         
          $('#example-10').progress_fnc();
         
          $('#example-11').progress_fnc();
         
          $('#example-12').progress_fnc();
         
          $('#example-13').progress_fnc();
         
         
         
          $('.progressStart').on('click', function() {
         
            var perent = $(this).closest("div").attr("id");
         
            $('#' + perent).progress_fnc({ type: 'start' });
         
          });
         
         
         
          $('.progressReset').on('click', function() {
         
            var perent = $(this).closest("div").attr("id");
         
            $('#' + perent).progress_fnc({ type: 'reset' });
         
          });
         
         
         
         });
         
         
         
         
         
         (function($) {
         
         
         
          $.fn.progress_fnc = function(options) {
         
            var settings = $.extend({
         
              type: 'start'
         
            }, options);
         
         
         
            var div = $(this);
         
            var progress = div.find('.cssProgress');
         
         
         
            progress.each(function() {
         
              var self = $(this);
         
              var progress_bar = self.find('.cssProgress-bar');
         
              var progress_label = self.find('.cssProgress-label, .cssProgress-label2');
         
              var progress_value = progress_bar.data('percent');
         
              var percentage = parseInt(progress_value, 10);
         
         
         
              progress_bar.css({'width': '0%', 'transition': 'none', '-webkit-transition': 'none', '-moz-transition': 'none'});
         
         
         
              if(settings.type == 'start') {
         
         
         
                progress_bar.animate({
         
                  width: percentage
         
                }, {
         
                  duration: 1000,
         
                  step: function(x) {
         
                    progress_label.text(Math.round(x));
         
                  }
         
                });
         
         
         
              } else if(settings.type == 'reset') {
         
                progress_bar.css('width', '0%');
         
                progress_label.text('0%');
         
              }
         
         
         
            });
         
          }
         
         
         
         }(jQuery));
         
      </script>
      <script>
         $(document).ready(function() {
         
         // Swiper: Slider
         
          new Swiper('#sw', {
         
              loop: true,
         
              nextButton: '.swiper-button-next',
         
              prevButton: '.swiper-button-prev',
         
              slidesPerView: 7,
         
              paginationClickable: false,
         
              spaceBetween: 16,
         
              breakpoints: {
         
                  1920: {
         
                      slidesPerView: 7,
         
                      spaceBetween: 16
         
                  },
         
                  1028: {
         
                      slidesPerView: 2,
         
                      spaceBetween: 12
         
                  },
         
                  720: {
         
                      slidesPerView: 1,
         
                      spaceBetween: 6
         
                  }
         
              }
         
          });
         
         });
         
      </script>
      <script>
         $('#planT').click(function(){
         
           $(this).hide();
         
           $('#textPlan').show();
         
         });
         
      </script>
      <!-- <script>
         $('#ff').click(function(i, e) {
         
           i = 0;
         
           i <= 10;
         
           i++ ;
         
         
         
             $('#data').append('<input id="search" class="tt" type="search" name="search" list="" autocomplete="on"/><datalist id="" class="dd"><option label="suggested">Casablanca</option><option label="suggested">Fez</option><option label="suggested">Tangier</option><option label="suggested">Marrakesh</option></datalist>');
         
             $(".tt").attr("list", "searchSuggestions_" + i);
         
             $(".dd").attr("id", "searchSuggestions_" + i);
         
           
         
         });
         
         </script> -->
      <script>
         $(document).ready(function() {
         
         var suburbs = ["Aberfeldy Township", "Altona", "Arthurs Creek", "Arthurs Seat", "Ashwood", "Bacchus Marsh Werribee River", "Ballan", "Beaconsfield Upper", "Beenak", "Berwick", "Blackburn", "Blackburn North", "Blue Mountain", "Box Hill", "Braeside", "Braeside Park", "Broadmeadows", "Brooklyn", "Bulla", "Bulla North", "Bulleen", "Bundoora", "Burnley", "Burwood East", "Cambarville", "Cardinia", "Caulfield", "Caulfield North", "Cement Creek", "Christmas Hills", "Clarkefield", "Clarkefield", "Clayton", "Clearwater Aqueduct", "Coburg", "Coldstream", "Collingwood", "Craigieburn", "Craigieburn East", "Cranbourne", "Dandenong", "Dandenong South", "Dandenong West", "Darraweit", "Deer Park", "Devilbend Reservoir", "Diggers Rest", "Dixons Creek", "Doncaster", "Doncaster East", "Drouin West", "Durdidwarrah", "Eastern G.C. Doncaster", "Elsternwick", "Eltham", "Emerald", "Epping", "Essendon", "Fairfield", "Fawkner", "Fiskville", "Flemington", "Footscray", "Frankston North", "Frankston Pier", "Gardiner", "Glen Forbes South", "Glen Waverley", "Graceburn", "Graceburn Creek Aqueduct", "Greensborough", "Greenvale Reservoir", "Groom's Hill", "Hampton", "Hampton Park", "Hawthorn", "Headworks", "Healesville", "Heathmont", "Heidelberg", "Hurstbridge", "Iona", "Ivanhoe", "Kangaroo Ground", "Keilor", "Keilor North", "Kew", "Keysborough", "Kinglake", "Knox", "Konagaderra", "Kooweerup", "Lake Borrie", "Lancefield", "Lancefield North", "Launching Place", "Lilydale Lake", "Little River", "Loch", "Longwarry North", "Lower Plenty", "Lyndhurst", "Lysterfield", "Maribyrnong", "Maroondah Reservoir", "Melton Reservoir", "Melton Sth Toolern Creek", "Mentone", "Mernda", "Millgrove", "Mitcham", "Montrose", "Mooroolbark", "Mornington", "Mount Dandenong", "Mount Evelyn", "Mount View", "Mt Blackwood", "Mt Bullengarook", "Mt Donna Buang", "Mt Evelyn Stringybark Creek", "Mt Gregory", "Mt Hope", "Mt Horsfall", "Mt Juliet", "Mt Macedon", "Mt St Gwinear", "Mt St Leonard", "Mt Waverley", "Myrrhee", "Narre Warren North", "Nayook", "Neerim South", "Neerim-Elton Rd", "Neerim-Neerim Creek", "Neerim-Tarago East Branch", "Neerim-Tarago West Branch", "North Wharf", "Northcote", "Notting Hill", "Nutfield", "O'Shannassy Reservoir", "Oakleigh South", "Officer", "Officer South", "Olinda", "Pakenham", "Pakenham East", "Pakenham West", "Parwon Parwan Creek", "Poley Tower", "Preston", "Reservoir", "Ringwood", "Rockbank", "Romsey", "Rosslynne Reservoir", "Rowville", "Sandringham", "Scoresby", "Seaford", "Seaford North", "Seville East", "Silvan", "Smiths Gully", "Somerton", "Southbank", "Spotswood", "Springvale", "St Albans", "St Kilda Marina", "Sunbury", "Sunshine", "Surrey Hills", "Tarago Reservoir", "Tarrawarra", "Templestowe", "The Basin", "Thomson Dam", "Tonimbuk", "Toolern Vale", "Torourrong Reservoir", "U/S Goodman Creek Lerderderg River", "Upper Lang Lang", "Upper Pakenham", "Upper Yarra Dam", "Wallaby Creek", "Wallan", "Wantirna South", "Warrandyte", "Williamstown", "Woori Yallock", "Woori Yallock Creek", "Wyndham Vale", "Yallock outflow Cora Lyn", "Yannathan", "Yarra Glen", "Yarra Glen Steels Creek", "Yarra Junction", "Yarra River downstream Doctors Creek", "Yellingbo", "Yering"];
         
         var cache = {};
         
         var searchedBefore = false;
         
         var counter = 1;
         
         var highligtCounter = 0;
         
         var keys = {
         
           ESC: 27,
         
           TAB: 9,
         
           RETURN: 13,
         
           LEFT: 37,
         
           UP: 38,
         
           RIGHT: 39,
         
           DOWN: 40
         
         };
         
         $(".search").on("input", function(event) {
         
           doSearch(suburbs);
         
         });
         
         
         
         $(".search").on("keydown", function(event) {
         
           doKeypress(keys, event);
         
         });
         
         });
         
         
         
         function doSearch(suburbs) {
         
           var query = $(".search").val();
         
           $(".search").removeAttr("aria-activedescendant");
         
           //$('#hint').val('');
         
         
         
           if ($(".search").val().length >= 2) {
         
         
         
             //Case insensitive search and return matches to build the  array
         
             var results = $.grep(suburbs, function(item) {
         
               return item.search(RegExp("^" + query, "i")) != -1;
         
         
         
             });
         
         
         
             if (results.length >= 1) {
         
               $("#res").remove();
         
               $('#announce').empty();
         
               $(".autocomplete-suggestions").show();
         
               $(".autocomplete-suggestions").append('<div id="res" role="listbox" tabindex="-1"></div>');
         
               counter = 1;
         
             }
         
         
         
             //Bind click event to list elements in results
         
             $("#res").on("click", "div", function() {
         
               $(".search").val($(this).text());
         
               $("#res").remove();
         
               $('#announce').empty();
         
               $(".autocomplete-suggestions").hide();
         
               counter = 1;
         
         
         
             });
         
         
         
             //Add results to the list
         
             for (term in results) {
         
         
         
               if (counter <= 5) {
         
                 $("#res").append("<div role='option' tabindex='-1' class='autocomplete-suggestion py-3' id='suggestion-" + counter + "'>" + results[term] + "</div>");
         
                 counter = counter + 1;
         
               }
         
         
         
             }
         
             var number = $("#res").children('[role="option"]').length
         
             if (number >= 1) {
         
               $("#announce").text(+number + " suggestions found" + ", to navigate use up and down arrows");
         
             }
         
         
         
           } else {
         
             $("#res").remove()
         
             $('#announce').empty();
         
             $(".autocomplete-suggestions").hide();
         
           }
         
         
         
         }
         
         
         
         function doKeypress(keys, event) {
         
           var highligted = false;
         
           highligted = $('#res').children('div').hasClass('highligt');
         
           switch (event.which) {
         
         
         
             case keys.ESC:
         
               $(".search").removeAttr("aria-activedescendant");
         
               //$('#hint').val('');
         
               $("#res").remove();
         
               $('#announce').empty();
         
               $(".autocomplete-suggestions").hide();
         
               break;
         
         
         
             case keys.RIGHT:
         
         
         
               return selectOption(highligted)
         
               break;
         
         
         
             case keys.TAB:
         
               $(".search").removeAttr("aria-activedescendant");
         
               //$('#hint').val('');
         
               $("#res").remove();
         
               $('#announce').empty();
         
               $(".autocomplete-suggestions").hide();
         
               break;
         
         
         
             case keys.RETURN:
         
               if (highligted) {
         
                 event.preventDefault();
         
                 event.stopPropagation();
         
                 return selectOption(highligted)
         
               }
         
         
         
             case keys.UP:
         
               event.preventDefault();
         
               event.stopPropagation();
         
               return moveUp(highligted);
         
               break;
         
         
         
             case keys.DOWN:
         
               event.preventDefault();
         
               event.stopPropagation();
         
         
         
               return moveDown(highligted);
         
               break;
         
         
         
             default:
         
               return;
         
           }
         
         }
         
         
         
         function moveUp(highligted) {
         
           var current;
         
           $(".search").removeAttr("aria-activedescendant");
         
           //$('#hint').val('');
         
           if (highligted) {
         
             console.log("Highlighted - " + highligted + "");
         
             current = $('.highligt');
         
             current.attr('aria-selected', false);
         
             current.removeClass('highligt').prev('div').addClass('highligt');
         
             current.prev('div').attr('aria-selected', true);
         
             $(".search").attr("aria-activedescendant", current.prev('div').attr('id'));
         
             //$('#hint').val($('.highligt').text());
         
             highligted = false;
         
           } else {
         
         
         
             //Go back to the bottom of the list
         
         
         
             current = $("#res").children().last('div');
         
             current.addClass('highligt');
         
             current.attr('aria-selected', true);
         
             $(".search").attr("aria-activedescendant", current.attr('id'));
         
             //$('#hint').val($('.highligt').text());
         
         
         
           }
         
         }
         
         
         
         function moveDown(highligted) {
         
         
         
           var current;
         
           $(".search").removeAttr("aria-activedescendant");
         
           //$('#hint').val('');
         
           if (highligted) {
         
             console.log("Highlighted - " + highligted + "");
         
             current = $('.highligt');
         
             current.attr('aria-selected', false);
         
             current.removeClass('highligt').next('div').addClass('highligt');
         
             current.next('div').attr('aria-selected', true);
         
             $(".search").attr("aria-activedescendant", current.next('div').attr('id'));
         
             //$('#hint').val($('.highligt').text());
         
             highligted = false;
         
           } else {
         
         
         
             //Go back to the top of the list
         
             current = $("#res").children().first('div');
         
             current.addClass('highligt');
         
             current.attr('aria-selected', true);
         
             $(".search").attr("aria-activedescendant", current.attr('id'));
         
             //$('#hint').val($('.highligt').text());
         
         
         
           }
         
         }
         
         
         
         function selectOption(highligted) {
         
           if (highligted) {
         
             $(".search").removeAttr("aria-activedescendant");
         
             //$('#hint').val('');
         
             $('.search').val($('.highligt').text());
         
             $('.search').focus();
         
             $("#res").remove();
         
             $('#announce').empty();
         
             $(".autocomplete-suggestions").hide();
         
           } else {
         
             return;
         
           }
         
         }
         
      </script>
      <script>
         $('.addDestination').click(function() {
         
           $(".apF").append('<div style="position: relative;"><select id="combo-box--1" class="my-combo-box form-control form-group"><option selected disabled>Enter destination (region, or city)</option><option value="AU">Australia</option><option value="IN">India</option><option value="AL">Afganistan</option><option value="DZ">Algeria</option><option value="AS">American Samoa</option><option value="AD">Andorra</option><option value="AO">Angola</option><option value="AI">Anguilla</option><option value="AQ">Antarctica</option><option value="AG">Antigua and Barbuda</option><option value="AR">Argentina</option><option value="AM">Armenia</option></select><i class="fas fa-question-circle" id="help"></i></div>');
         
         })
         
         
         
      </script>
      <script>
         function increaseValue() {
         
           var value = parseInt(document.getElementById('number').value, 10);
         
           var hidValue = parseInt(document.getElementById('firstV').value, 10);
         
           value = isNaN(value) ? 0 : value;
         
           value++;
         
           hidValue = isNaN(hidValue) ? 0 : hidValue;
         
           hidValue++;
         
           document.getElementById('number').value = value;
         
           document.getElementById('firstV').value = hidValue;
         
         }
         
         
         
         function decreaseValue() {
         
           var value = parseInt(document.getElementById('number').value, 10);
         
           value = isNaN(value) ? 0 : value;
         
           var hidValue = parseInt(document.getElementById('firstV').value, 10);
         
           value < 1 ? value = 1 : '';
         
           value--;
         
         
         
           hidValue = isNaN(hidValue) ? 0 : hidValue;
         
           hidValue--;
         
           document.getElementById('number').value = value;
         
           document.getElementById('firstV').value = value;
         
         }
         
         // 
         
         function increaseValue1() {
         
           var value = parseInt(document.getElementById('number1').value, 10);
         
           var hidValue = parseInt(document.getElementById('secondV').value, 10);
         
           value = isNaN(value) ? 0 : value;
         
           value++;
         
         
         
           hidValue = isNaN(hidValue) ? 0 : hidValue;
         
           hidValue++;
         
           document.getElementById('number1').value = value;
         
           document.getElementById('secondV').value = value;
         
         }
         
         
         
         function decreaseValue1() {
         
           var value = parseInt(document.getElementById('number1').value, 10);
         
           var hidValue = parseInt(document.getElementById('secondV').value, 10);
         
           value = isNaN(value) ? 0 : value;
         
           value < 1 ? value = 1 : '';
         
           value--;
         
         
         
           hidValue = isNaN(hidValue) ? 0 : hidValue;
         
           hidValue--;
         
           document.getElementById('number1').value = value;
         
           document.getElementById('secondV').value = value;
         
         }
         
         // 
         
         function increaseValue2() {
         
           var value = parseInt(document.getElementById('number2').value, 10);
         
           var hidValue = parseInt(document.getElementById('thirdV').value, 10);
         
           value = isNaN(value) ? 0 : value;
         
           value++;
         
         
         
           hidValue = isNaN(hidValue) ? 0 : hidValue;
         
           hidValue++;
         
           document.getElementById('number2').value = value;
         
           document.getElementById('thirdV').value = value;
         
         }
         
         
         
         function decreaseValue2() {
         
           var value = parseInt(document.getElementById('number2').value, 10);
         
           var hidValue = parseInt(document.getElementById('thirdV').value, 10);
         
           value = isNaN(value) ? 0 : value;
         
           value < 1 ? value = 1 : '';
         
           value--;
         
         
         
         
         
           hidValue = isNaN(hidValue) ? 0 : hidValue;
         
           hidValue--;
         
           document.getElementById('number2').value = value;
         
           document.getElementById('thirdV').value = value;
         
         }
         
         
         
      </script>
      <script>
         $('.txtL').click(function(){
         
           $('.travlNo').toggleClass('show');
         
         });
         
         // 
         
         
         
         
         
         $('.addPass').click( function(){
         
         
         
         var a_value = $('#firstV').val();
         
         var b_value = $('#secondV').val();
         
         var c_value = $('#thirdV').val();
         
         
         
         $('.txtL span').text(parseInt(a_value) + parseInt(b_value)+ parseInt(c_value));
         
         $('.travlNo').removeClass('show');
         
         });
         
         
         
         
         
      </script>
      <script>
         $(document).ready(function(){
         
           $("#planT").click(function(){
         
             $("#planB").hide();
         
           });
         
         });
         
         
         
      </script>
      <style>
         @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&family=Nunito+Sans:wght@200;300;400;600;700;800;900&family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap');
         body{
         font-family: 'Poppins', sans-serif!important;
         }
         .wrapper.form-success .container h6 {
         font-size: 30px;
         color: #111;
         transform: translateY(100px);
         }
         .wrapper-section {
         width: 100%;
         margin: 0 auto;
         background: #ffffff;
         padding: 16px 20px;
         text-align: center;
         border-radius: 2px; 
         box-shadow: 0px 0px 10px -1px rgba(0,0,0,0.5);
         }
         .wrapper-section img{
         /*height: 111px;
         width: 117px;*/
         object-position: center;
         object-fit: cover;
         }
         .wrapper-section h6 {
         font-size: 28px;
         color: #094D80;
         /* transition-duration: 2s;
         transition-timing-function: ease-in-out;*/
         letter-spacing:0.7px;
         padding-top:10px;
         }
         .wrapper-section p{
         letter-spacing: 0.38px;
         color: #606060;
         font-size: 15px;
         }
         .form {
         padding: 0px 24px;
         position: relative;
         }
         .form label{
         letter-spacing: 0.45px;
         float: left;
         font-size: 15px;
         color:#000000;
         }
         .form input {
         outline: 0;
         letter-spacing: 0.5px;
         color: #000000;
         width: 300px;
         border-radius: 2px;
         padding: 5px 15px !important;
         /*margin: 10px auto 10px auto;*/
         display: block; 
         font-size: 20px;
         transition-duration: 0.5s;
         }
         .form input{
         padding: 0px 10px !Important;
         }
         .form input::placeholder{
         font-size: 16px !Important;
         }
         /*form input:hover {
         background-color: rgba(17, 17, 17, 0.4);
         }*/
         .form input:focus {
         background-color: #fff;
         /*width: 300px;*/
         color: #000;
         }
         .bg-bubbles {
         position: absolute;
         top: 0;
         left: 0;
         width: 100%;
         height: 100%;
         z-index: 1;
         }
         .bg-bubbles li {
         position: absolute;
         list-style: none;
         display: block;
         width: 40px;
         height: 40px;
         background-color: rgba(255, 255, 255, 0.15);
         bottom: -160px;
         border-radius: 150px;
         -webkit-animation: square 50s infinite;
         animation: square 50s infinite;
         -webkit-transition-timing-function: linear;
         transition-timing-function: linear;
         }
         .bg-bubbles li:nth-child(1) {
         left: 10%;
         }
         .bg-bubbles li:nth-child(2) {
         left: 20%;
         width: 80px;
         height: 80px;
         animation-delay: 0s;
         animation-duration: 7s;
         }
         .bg-bubbles li:nth-child(3) {
         left: 25%;
         animation-delay: 4s;
         }
         .bg-bubbles li:nth-child(4) {
         left: 40%;
         width: 60px;
         height: 60px;
         animation-duration: 22s;
         background-color: rgba(255, 255, 255, 0.25);
         }
         .bg-bubbles li:nth-child(5) {
         left: 70%;
         }
         .bg-bubbles li:nth-child(6) {
         left: 80%;
         width: 12px;
         height: 12px;
         animation-delay: 30s;
         background-color: rgba(255, 255, 255, 0.3);
         }
         .bg-bubbles li:nth-child(7) {
         left: 32%;
         width: 160px;
         height: 160px;
         animation-delay: 7s;
         }
         .bg-bubbles li:nth-child(8) {
         left: 55%;
         width: 20px;
         height: 20px;
         animation-delay: 15s;
         animation-duration: 40s;
         }
         .bg-bubbles li:nth-child(9) {
         left: 25%;
         width: 10px;
         height: 10px;
         animation-delay: 2s;
         animation-duration: 40s;
         background-color: rgba(255, 255, 255, 0.3);
         }
         .bg-bubbles li:nth-child(10) {
         left: 90%;
         width: 160px;
         height: 160px;
         animation-delay: 11s;
         }
         .bg-bubbles li:nth-child(11) {
         left: 25%;
         width: 60px;
         height: 60px;
         animation-delay: 2s;
         }
         @-webkit-keyframes square {
         0% {
         transform: translateY(0);
         background-color: rgba(255, 255, 255, 0);
         }
         100% {
         transform: translateY(-100px);
         background-color: #ffffff;
         }
         }
         @keyframes square {
         0% {
         transform: translateY(0);
         background-color: #ffffff;
         }
         100% {
         transform: translateY(-500px);
         background-color: rgba(255, 255, 255, 0);
         }
         }
         .form-group {
         margin-bottom: 20px;
         }
         #ch input {
         padding: 0;
         height: initial;
         width: initial;
         margin-bottom: 0;
         display: none;
         cursor: pointer;
         }
         #ch label {
         position: relative;
         cursor: pointer;
         }
         #ch label:before {
         content:'';
         -webkit-appearance: none;
         background-color: transparent;
         border: 1px solid #707070;
         box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05), inset 0px -15px 10px -12px rgba(0, 0, 0, 0.05);
         padding: 6px;
         display: inline-block;
         position: relative;
         vertical-align: top;
         cursor: pointer;
         margin-right: 10px;
         }
         #ch input:checked + label:after {
         content: '';
         display: block;
         position: absolute;
         top: 1px;
         left: 4px;
         width: 6px;
         height: 10px;
         border: solid #0079bf;
         border-width: 0 2px 2px 0;
         transform: rotate(45deg);
      }
         #ch label{
         font-size: 14px;
         color:#707070;
         }
         .ft{
         color: #ED1B24;
         font-size: 14px;
         }
         .ft:hover{
         color: #ED1B24;
         }
         #login-button {
         width: 100%;
         background: #084E7F;
         border-radius: 5px;
         color: #ffffff;
         text-align: center;
         box-shadow: 0px 3px 6px #00000029;
         height: 50px;
         border: none;
         }
         .login-bottom{
         padding:0px 24px;
         }
         .login-bottom p{
         color:#707070;
         font-size:12px;
         letter-spacing: 0.45px;
         text-align: center; 
         }
         .or-section{
         text-align: center;
         position: relative;
         }
         .or-section span {
         display: inline-block;
         width: 25px;
         height: 25px;
         border-radius: 50%;
         border: 1px solid #707070;
         text-align: center;
         font-size: 12px;
         padding: 3px 0px;
         position: relative;
         z-index: 99;
         background: #ffffff
         }
         .or-section:after, .or-section:before{
         content: '';
         width:50%;
         height: 1px;
         background: #707070;
         top:50%;
         position: absolute;
         }
         .or-section:after{
         left:0;
         }
         .or-section:before{
         right: 0;
         }
         .s-around{
         justify-content: space-around;
         }
         .social{
         font-size: 32px;
         }
         .fb{
         color:#3B5998;
         }
         .twit{
         color:#1DA1F2;
         }
         .pit{
         color:#E71D27;
         }
         input.input-place::placeholder{
         color:red !important ;
         }
         input.input-place{
         border: 1px solid red;
         }
         input.input-place:focus{
         border: 1px solid red;
         }
      </style>
      <script>
  $(document).ready(function() {
// Swiper: Slider
    new Swiper('.activities_slider', {
        loop: true,
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        slidesPerView: 4,
        paginationClickable: true,
        spaceBetween: 0,
        breakpoints: {
            1920: {
                slidesPerView: 3,
                spaceBetween:0
            },
            1028: {
                slidesPerView: 1,
                spaceBetween: 0
            },
            720: {
                slidesPerView: 1,
                spaceBetween: 0
            }
        }
    });
});

</script>
<script>
  $(document).ready(function() {
// // Swiper: Slider
//     new Swiper('#daysSlider', {
//         loop: true,
//         nextButton: '.swiper-button-next',
//         prevButton: '.swiper-button-prev',
//         slidesPerView: 1,
//         paginationClickable: true,
//         spaceBetween: 0,
//         breakpoints: {
//             1920: {
//                 slidesPerView: 1,
//                 spaceBetween:0
//             },
//             1028: {
//                 slidesPerView: 1,
//                 spaceBetween: 0
//             },
//             480: {
//                 slidesPerView: 1,
//                 spaceBetween: 0
//             }
//         }
//     });
// });


// 
$('.g').click(function(){
   $('.travel-date').show();
   $('.g').hide();
})

</script>
   </body>
</html>