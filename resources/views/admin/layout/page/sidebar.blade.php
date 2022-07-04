

<!-- ================================

       START DASHBOARD NAV

================================= -->

<div class="sidebar-nav sidebar--nav">

    <div class="sidebar-nav-body">

        <div class="side-menu-close">

            <i class="la la-times"></i>

        </div><!-- end menu-toggler -->

        <div class="author-content">

            <div class="d-flex align-items-center">

                <div class="author-img avatar-sm">

                    <img src="{{url('')}}/admin-assets/images/admin_image/{{$data->admin_image}}" alt="testimonial image">

                </div>

                <div class="author-bio">

                    <h4 class="author__title p-font">{{$data->admin_name}}</h4>

                    <span class="author__meta p-font">Welcome to Admin Panel</span>

                </div>

            </div>

        </div>

        <div class="sidebar-menu-wrap">

            <ul class="sidebar-menu toggle-menu list-items">

                <li class="page-active"><a href="/admin/index"><i class="la la-dashboard mr-2"></i>Dashboard</a></li>

               

                <li><a href="/admin/language"><i class="las la-language mr-2 text-color"></i>Language</a></li>

                <li><a href="/admin/currency"><i class="las la-pound-sign mr-2 text-color"></i>Currency</a></li>
                 <li><a href="/admin/currency-converter"><i class="las la-list mr-2 text-color"></i>Currency Converter</a></li>

                <li><a href="/admin/user-list"><i class="las la-user-tie mr-2 text-color"></i>Customer</a></li>

                 <!-- <li>
                    <span class="side-menu-icon toggle-menu-icon">
                        <i class="la la-angle-down"></i>
                    </span>
                    <a href="javascript:void(0);"><i class="la la-fax mr-2 text-color-3"></i>Category</a>
                    <ul class="toggle-drop-menu">
                        <li><a href="/admin/add-catgory">Add Category</a></li>
                        <li><a href="/admin/view-category">View Category</a></li>
                       
                       
                    </ul>
                </li>

                 <li>
                    <span class="side-menu-icon toggle-menu-icon">
                        <i class="la la-angle-down"></i>
                    </span>
                    <a href="javascript:void(0);"><i class="la la-film mr-2 text-color-3"></i>Sub Category</a>
                    <ul class="toggle-drop-menu">
                        <li><a href="/admin/add-sub-categeory">Add Sub Category</a></li>
                        <li><a href="/admin/view-sub-category">View Sub Category</a></li>
                       
                       
                    </ul>
                </li> -->
                 <li>
                    <span class="side-menu-icon toggle-menu-icon">
                        <i class="la la-angle-down"></i>
                    </span>
                    <a href="javascript:void(0);"><i class="la la-bus mr-2 text-color-3"></i>City</a>
                    <ul class="toggle-drop-menu">
                        <li><a href="/admin/add-city">Add City</a></li>
                        <li><a href="/admin/view-city">View City</a></li>
                       
                    </ul>
                </li>
                <li>
                    <span class="side-menu-icon toggle-menu-icon">
                        <i class="la la-angle-down"></i>
                    </span>
                    <a href="javascript:void(0);"><i class="la la-map-marker mr-2 text-color-3"></i>Place</a>
                    <ul class="toggle-drop-menu">
                        <li><a href="/admin/add-place">Add Place</a></li>
                        <li><a href="/admin/view-place-list">View Place list</a></li>
                       
                    </ul>
                </li>
                 
              

            

                 
                 <li>

                    <span class="side-menu-icon toggle-menu-icon">

                        <i class="la la-angle-down"></i>

                    </span>

                    <a href="javascript:void(0);"><i class="la la-newspaper-o mr-2 text-color-3"></i>Things to do</a>

                    <ul class="toggle-drop-menu">

                        <li><a href="/admin/thing-to-do">Add Things to do</a></li>

                        <li><a href="/admin/view-thing-to-do">View Things to do</a></li>
                         <li><a href="/admin/add-thing-to-do-gallery">Add Things to do Gallery</a></li>
                           <li><a href="/admin/thing-gallery-photo">View Thing to do Gallery photo</a></li>
                      

                       

                    </ul>

                </li>
                 <li>
                    <span class="side-menu-icon toggle-menu-icon">
                        <i class="la la-angle-down"></i>
                    </span>
                    <a href="javascript:void(0);"><i class="la la-users mr-2 text-color-3"></i>Tour & Activity</a>
                    <ul class="toggle-drop-menu">
                        <li><a href="/admin/add-tour-and-activity">Add Tour & Activity</a></li>
                        <li><a href="/admin/view-tour-and-activity">View Tour & Activity</a></li>
                       
                       
                    </ul>
                </li>

                <li>

                    <span class="side-menu-icon toggle-menu-icon">

                        <i class="la la-angle-down"></i>

                    </span>

                    <a href="javascript:void(0);"><i class="la la-cube mr-2 text-color-3"></i>Why use Triplooky</a>

                    <ul class="toggle-drop-menu">

                        <li><a href="/admin/why-triplooky">Add Triplooky use</a></li>

                        <li><a href="/admin/view-triplooy-use">View Triplooky use</a></li>

                       

                    </ul>

                </li>

                <li>

                    <span class="side-menu-icon toggle-menu-icon">

                        <i class="la la-angle-down"></i>

                    </span>

                    <a href="javascript:void(0);"><i class="la la-cubes mr-2 text-color-3"></i>How to Video</a>

                    <ul class="toggle-drop-menu">

                        <li><a href="/admin/add-video">Add Video</a></li>

                        <li><a href="/admin/view-video">View Video</a></li>

                       

                    </ul>

                </li>



                

                

                <li>

                    <span class="side-menu-icon toggle-menu-icon">

                        <i class="la la-angle-down"></i>

                    </span>

                    <a href="javascript:void(0);"><i class="la la-language mr-2 text-color-3"></i>Cms</a>

                    <ul class="toggle-drop-menu">

                        <li><a href=javascript:void(0) data-toggle="collapse" data-target="#about" >About us<i class="la la-angle-down float-right "></i></a>

                            <div class="collapse bg-info" id="about" style="border-bottom: 3px groove orange;">

                              <a href="/admin/about" class="text-white">Create About us</a>

                              <a href="/admin/about-us-show" class="text-white">View About us</a>

                               

                                

                            </div>



                        </li>

                        <li><a href=javascript:void(0) data-toggle="collapse" data-target="#faq" >FAQ<i class="la la-angle-down float-right "></i></a>

                            <div class="collapse bg-info" id="faq" style="border-bottom: 3px groove orange;">

                              <a href="/admin/faq" class="text-white">Create FAQ`s</a>

                              <a href="/admin/faq-show" class="text-white">View FAQ`s</a>

                               

                                

                            </div>



                        </li>

                        <li><a href=javascript:void(0) data-toggle="collapse" data-target="#contact" >Contact us<i class="la la-angle-down float-right "></i></a>

                            <div class="collapse bg-info" id="contact" style="border-bottom: 3px groove orange;">

                              <a href="/admin/contact" class="text-white">Create Contact us</a>

                              <a href="/admin/view-contact-us" class="text-white">View Contact us</a>

                               

                                

                            </div>



                        </li>

                      <li><a href=javascript:void(0) data-toggle="collapse" data-target="#policy" >Policy<i class="la la-angle-down float-right "></i></a>

                            <div class="collapse bg-info" id="policy" style="border-bottom: 3px groove orange;">

                              <a href="/admin/policy" class="text-white">Create Policy</a>

                              <a href="/admin/view-policy" class="text-white">View Policy</a>

                               

                                

                            </div>



                        </li>

                       <li><a href=javascript:void(0) data-toggle="collapse" data-target="#cookie-policy" >Cookie Policy<i class="la la-angle-down float-right "></i></a>

                            <div class="collapse bg-info" id="cookie-policy" style="border-bottom: 3px groove orange;">

                              <a href="/admin/cookie-policy" class="text-white">Create Cookie policy</a>

                              <a href="/admin/view-cookie-policy" class="text-white">View cookie policy</a>

                               

                                

                            </div>



                        </li>

                        <li><a href=javascript:void(0) data-toggle="collapse" data-target="#copyright-policy" >CopyRight policy<i class="la la-angle-down float-right "></i></a>

                            <div class="collapse bg-info" id="copyright-policy" style="border-bottom: 3px groove orange;">

                              <a href="/admin/copy-right" class="text-white">Create CopyRight Policy</a>

                              <a href="/admin/view-copy-right" class="text-white">View CopyRight Policy</a>

                               

                                

                            </div>



                        </li>

                       <li><a href=javascript:void(0) data-toggle="collapse" data-target="#Terms" >Terms and use<i class="la la-angle-down float-right "></i></a>

                            <div class="collapse bg-info" id="Terms" style="border-bottom: 3px groove orange;">

                              <a href="/admin/terms" class="text-white">Create Terms</a>

                              <a href="/admin/view-terms" class="text-white">View Terms</a>

                               

                                

                            </div>



                        </li>
                           <li><a href=javascript:void(0) data-toggle="collapse" data-target="#accomodation" >Accomodation<i class="la la-angle-down float-right "></i></a>
                            <div class="collapse bg-info" id="accomodation" style="border-bottom: 3px groove orange;">
                              <a href="/admin/cms/accomodation/add" class="text-white">Add Accomodation</a>
                              <a href="/admin/cms/accomodation/list" class="text-white">View Accomodation</a>
                               
                                
                            </div>

                        </li>
                         <li><a href=javascript:void(0) data-toggle="collapse" data-target="#tour_and_activity" >Tour and Activity<i class="la la-angle-down float-right "></i></a>
                            <div class="collapse bg-info" id="tour_and_activity" style="border-bottom: 3px groove orange;">
                              <a href="/admin/cms/tour-and-activity/add" class="text-white">Add Tour And Activity</a>
                              <a href="/admin/cms/tour-and-activity/list" class="text-white">View Tour And Activity</a>
                               
                                
                            </div>

                        </li>
                         <li><a href=javascript:void(0) data-toggle="collapse" data-target="#food_and_drink" >Food & Drink<i class="la la-angle-down float-right "></i></a>
                            <div class="collapse bg-info" id="food_and_drink" style="border-bottom: 3px groove orange;">
                              <a href="/admin/cms/food-and-drink/add" class="text-white">Add Food & Drink</a>
                              <a href="/admin/cms/food-and-drink/list" class="text-white">View Food & Drink</a>
                               
                                
                            </div>

                        </li>
                         <li><a href=javascript:void(0) data-toggle="collapse" data-target="#transportation" >Transportation<i class="la la-angle-down float-right "></i></a>
                            <div class="collapse bg-info" id="transportation" style="border-bottom: 3px groove orange;">
                              <a href="/admin/cms/transportation/add" class="text-white">Add Transportation</a>
                              <a href="/admin/cms/transportation/list" class="text-white">View Transportation</a>
                               
                                
                            </div>

                        </li>
                         <!-- <li><a href=javascript:void(0) data-toggle="collapse" data-target="#accomodation-price" >Accomodation Price<i class="la la-angle-down float-right "></i></a>
                            <div class="collapse bg-info" id="accomodation-price" style="border-bottom: 3px groove orange;">
                              <a href="/admin/cms/accomodation-price/add" class="text-white">Add Accomodation Price</a>
                              <a href="/admin/cms/accomodation-price/list" class="text-white">View Accomodation Price</a>
                               
                                
                            </div>

                        </li>
                         <li><a href=javascript:void(0) data-toggle="collapse" data-target="#tour-and-activity-price" >Tour And Activit Price<i class="la la-angle-down float-right "></i></a>
                            <div class="collapse bg-info" id="tour-and-activity-price" style="border-bottom: 3px groove orange;">
                              <a href="/admin/cms/tour-and-activity-price/add" class="text-white">Add TourAndActivity Price</a>
                              <a href="/admin/cms/tour-and-activity-price/list" class="text-white">View TourAndActivity</a>
                               
                                
                            </div>

                        </li>
                         <li><a href=javascript:void(0) data-toggle="collapse" data-target="#food-and-drink-price" >Food And Drink Price<i class="la la-angle-down float-right "></i></a>
                            <div class="collapse bg-info" id="food-and-drink-price" style="border-bottom: 3px groove orange;">
                              <a href="/admin/cms/food-and-drink-price/add" class="text-white">Add Food And Drink</a>
                              <a href="/admin/cms/food-and-drink-price/list" class="text-white">View Food And Drink</a>
                               
                                
                            </div>

                        </li>
                         <li><a href=javascript:void(0) data-toggle="collapse" data-target="#transportation-price" >Transportation Price<i class="la la-angle-down float-right "></i></a>
                            <div class="collapse bg-info" id="transportation-price" style="border-bottom: 3px groove orange;">
                              <a href="/admin/cms/transportation-price/add" class="text-white">Add Transportation Price</a>
                              <a href="/admin/cms/transportation-price/list" class="text-white">View Transportation Price</a>
                               
                                
                            </div>

                        </li> -->


                    </ul>

                </li>


               <!--  <li>

                    <span class="side-menu-icon toggle-menu-icon">

                        <i class="la la-angle-down"></i>

                    </span>

                    <a href="#"><i class="la la-area-chart mr-2 text-color-8"></i>Finance</a>

                    <ul class="toggle-drop-menu">

                        <li><a href="admin-invoice.html">Invoice</a></li>

                        <li><a href="admin-payments.html">Payments</a></li>

                        <li><a href="admin-currency-list.html">Currency List</a></li>

                        <li><a href="admin-dashboard-subscribers.html">Subscribers</a></li>

                    </ul>

                </li> -->
                <li>
                    <span class="side-menu-icon toggle-menu-icon">
                        <i class="la la-angle-down"></i>
                    </span>
                    <a href="javascript:void(0);"><i class="la la-bus mr-2 text-color-3"></i>Travel Looking Partner</a>
                    <ul class="toggle-drop-menu">
                        <li><a href="/admin/add-travel-looking-partner">Add Travel  Partner</a></li>
                        <li><a href="/admin/view-travel-looking-partner">View Travel Partner</a></li>
                       
                    </ul>
                </li>
                <li>
                    <span class="side-menu-icon toggle-menu-icon">
                        <i class="la la-angle-down"></i>
                    </span>
                    <a href="javascript:void(0);"><i class="la la-question-circle mr-2 text-color-3"></i>Customer Query</a>
                    <ul class="toggle-drop-menu">
                        <li><a href="/admin/customer-query">View Customer Query</a></li>
                       
                       
                    </ul>
                </li>
                <li>
                    <span class="side-menu-icon toggle-menu-icon">
                        <i class="la la-angle-down"></i>
                    </span>
                    <a href="javascript:void(0);"><i class="la la-map mr-2 text-color-3"></i>Map Details</a>
                    <ul class="toggle-drop-menu">
                        <li><a href="/admin/add-map">Add Map Details</a></li>
                        <li><a href="/admin/view-map">View Map</a></li>
                       
                    </ul>
                </li>
                <!----
                 <li>
                    <span class="side-menu-icon toggle-menu-icon">
                        <i class="la la-angle-down"></i>
                    </span>
                    <a href="javascript:void(0);"><i class="la la-subway mr-2 text-color-3"></i>Transportation</a>
                   <ul class="toggle-drop-menu">
                        <li><a href=javascript:void(0) data-toggle="collapse" data-target="#about" >Transfer<i class="la la-angle-down float-right "></i></a>
                            <div class="collapse bg-info" id="about" style="border-bottom: 3px groove orange;">
                              <a href="/admin/transfer/add-transfer" class="text-white">Create Transfer</a>
                              <a href="/admin/transfer/view-transfer" class="text-white">View Transfer</a>
                               
                                
                            </div>

                        </li>
                        <li><a href=javascript:void(0) data-toggle="collapse" data-target="#faq" >Car Rental<i class="la la-angle-down float-right "></i></a>
                            <div class="collapse bg-info" id="faq" style="border-bottom: 3px groove orange;">
                              <a href="/admin/add-car-rental" class="text-white">Create Car Rental</a>
                              <a href="/admin/view-car-rental" class="text-white">View Car Rental</a>
                               
                                
                            </div>

                        </li>
                        <li><a href=javascript:void(0) data-toggle="collapse" data-target="#contact" >Public Transportation<i class="la la-angle-down float-right "></i></a>
                            <div class="collapse bg-info" id="contact" style="border-bottom: 3px groove orange;">
                              <a href="/admin/public-transportation/add-public-transportation" class="text-white">Create Public Trans</a>
                              <a href="/admin/public-transportation/view-public-transportation" class="text-white">View Public Trans</a>
                               
                                
                            </div>

                        </li>
                      <li><a href=javascript:void(0) data-toggle="collapse" data-target="#policy" >Private Driver<i class="la la-angle-down float-right "></i></a>
                            <div class="collapse bg-info" id="policy" style="border-bottom: 3px groove orange;">
                              <a href="/admin/driver/add-private-driver" class="text-white">Create Driver</a>
                              <a href="/admin/driver/view-driver-list" class="text-white">View Driver</a>
                               
                                
                            </div>

                        </li>
                      
                       
                       
                    </ul>
                </li>
                ---->
                <!---
                  <li>
                    <span class="side-menu-icon toggle-menu-icon">
                        <i class="la la-angle-down"></i>
                    </span>
                    <a href="javascript:void(0);"><i class="la la-road mr-2 text-color-3"></i>Accomodation</a>
                   <ul class="toggle-drop-menu">
                        <li><a href=javascript:void(0) data-toggle="collapse" data-target="#about" >Hotels<i class="la la-angle-down float-right "></i></a>
                            <div class="collapse bg-info" id="about" style="border-bottom: 3px groove orange;">
                              <a href="/admin/hotel/add-hotel" class="text-white">Create Hotels</a>
                              <a href="/admin/hotel/view-hotel" class="text-white">View Hotels</a>
                               
                                
                            </div>

                        </li>
                        <li><a href=javascript:void(0) data-toggle="collapse" data-target="#faq" >Appartment<i class="la la-angle-down float-right "></i></a>
                            <div class="collapse bg-info" id="faq" style="border-bottom: 3px groove orange;">
                              <a href="/admin/add-appartment" class="text-white">Create Appartment</a>
                              <a href="/admin/view-appartment" class="text-white">View Appartment</a>
                               
                                
                            </div>

                        </li>
                        <li><a href=javascript:void(0) data-toggle="collapse" data-target="#contact" >Rides<i class="la la-angle-down float-right "></i></a>
                            <div class="collapse bg-info" id="contact" style="border-bottom: 3px groove orange;">
                              <a href="/admin/rides/add-rides" class="text-white">Create Rides</a>
                              <a href="/admin/rides/view-rides" class="text-white">View Rides</a>
                               
                                
                            </div>

                        </li>
                      <li><a href=javascript:void(0) data-toggle="collapse" data-target="#policy" >Gates<i class="la la-angle-down float-right "></i></a>
                            <div class="collapse bg-info" id="policy" style="border-bottom: 3px groove orange;">
                              <a href="/admin/gates/add-gate" class="text-white">Create Gates</a>
                              <a href="/admin/gates/view-gate" class="text-white">View Gates</a>
                               
                                
                            </div>

                        </li>
                      
                       
                       
                    </ul>
                </li>
                --->
                <li>
                    <span class="side-menu-icon toggle-menu-icon">
                        <i class="la la-angle-down"></i>
                    </span>
                    <a href="javascript:void(0);"><i class="la la-road mr-2 text-color-3"></i>Food and Drink</a>
                      
                             <ul class="toggle-drop-menu">
                        <li><a href="/admin/food-and-drink/add-food-drink" >Add Food Drink</a></li>
                              <li><a href="/admin/food-and-drink/view-food-drink" >View Food Drink</a></li>
                       
                    </ul>
                </li>



                <li>
                    <span class="side-menu-icon toggle-menu-icon">
                        <i class="la la-angle-down"></i>
                    </span>
                    <a href="javascript:void(0);"><i class="la la-road mr-2 text-color-3"></i>Transportation</a>
                      
                             <ul class="toggle-drop-menu">
                        <li><a href="/admin/transportation/add-transportation" >Add Transportation</a></li>
                              <li><a href="/admin/transportation/view-transportation" >View Transportation</a></li>
                       
                    </ul>
                </li>

                 <li>
                    <span class="side-menu-icon toggle-menu-icon">
                        <i class="la la-angle-down"></i>
                    </span>
                    <a href="javascript:void(0);"><i class="la la-road mr-2 text-color-3"></i>Accomodation</a>
                      
                             <ul class="toggle-drop-menu">
                        <li><a href="/admin/accomodation/add-accomodation" >Add Accomodation</a></li>
                              <li><a href="/admin/accomodation/view-accomodation" >View Accomodation</a></li>
                       
                    </ul>
                </li>
                 <li>
                    <span class="side-menu-icon toggle-menu-icon">
                        <i class="la la-angle-down"></i>
                    </span>
                    <a href="javascript:void(0);"><i class="la la-tv mr-2 text-color-3"></i>Must Do And See</a>
                      
                             <ul class="toggle-drop-menu">
                        <li><a href="/admin/must-do-and-see/add-must-do-and-see" >Add Must Do and See</a></li>
                              <li><a href="/admin/must-do-and-see/view-must-do-and-see" >View Must Do and See</a></li>
                       
                    </ul>
                </li>
                 <li>
                    <span class="side-menu-icon toggle-menu-icon">
                        <i class="la la-angle-down"></i>
                    </span>
                    <a href="javascript:void(0);"><i class="la la-tv mr-2 text-color-3"></i>Discover Morroco</a>
                      
                             <ul class="toggle-drop-menu">
                        <li><a href="/admin/discover-morocco/add" >Add </a></li>
                              <li><a href="/admin/discover-morocco/view" >View </a></li>
                       
                    </ul>
                </li>
                
            

               


                <li><a href="/admin/banner"><i class="la la-gavel mr-2 text-color-10"></i>Slider Settings</a></li>

                <li><a href="{{ url('admin/settings') }}"><i class="la la-cog mr-2 text-color-10"></i>Settings</a></li>

                <li><a href="/admin/logout"><i class="la la-power-off mr-2 text-color-11"></i>Logout</a></li>

            </ul>

        </div><!-- end sidebar-menu-wrap -->

    </div>

</div><!-- end sidebar-nav -->

<!-- ================================

       END DASHBOARD NAV

================================= -->

