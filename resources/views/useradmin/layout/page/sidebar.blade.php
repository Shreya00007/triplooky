

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

                    @if(Session::has("user_login"))
                    <div class="avatar avatar-sm flex-shrink-0 mr-2"><img src="{{url('')}}/user/{{$data->image}}" alt="team-img"></div>
                                                @else
                                                <div class="avatar avatar-sm flex-shrink-0 mr-2"><img src="{{asset('user-assets/images/team8.jpg')}}" alt="team-img"></div>
                                                @endif

                </div>

                <div class="author-bio">

                   <center> <h4 class="author__title p-font">{{Session::get("user_name")}}</h4></center>

                    <center><span class="author__meta p-font">Welcome {{Session::get("user_name")}}</span></center>

                </div>

            </div>

        </div>

        <div class="sidebar-menu-wrap">

            <ul class="sidebar-menu toggle-menu list-items">

               <li class="page-active"><a href="dashboard.php"><i class="la la-dashboard mr-2"></i>Dashboard</a></li>

               <!-- <li><a href="booking.php"><i class="las la-ticket-alt mr-2 text-color"></i>Organizer</a></li>
               -->

               <!-- <li><a href="/admin/language"><i class="las la-language mr-2 text-color"></i>Trips</a></li>
                  -->

                <!-- <li><a href="/admin/currency"><i class="las la-pound-sign mr-2 text-color"></i>List of sites via 3rd Party</a></li>
                     -->

               <!-- <li><a href="customer.php"><i class="las la-user-tie mr-2 text-color"></i>Trip History</a></li>
               -->

              <!--  <li><a href="payment.php"><i class="las la-money-check-alt mr-2 text-color"></i>Payment History</a></li>
              -->

              <!--  <li><a href="#"><i class="las la-history mr-2 text-color"></i>My Review</a></li>
              -->

              <!--  <li><a href="inquiry.php"><i class="las la-phone mr-2 text-color"></i>Inquiry</a></li>
              -->

               <!-- <li><a href="employees.php"><i class="las la-heart mr-2 text-color"></i>Wishlist</a></li>
               -->

                 

                <li><a href="/user/profile"><i class="las la-user-circle mr-2 text-color"></i>My Profile</a></li>
                <li><a href="/user/save-plan-list"><i class="las la-suitcase mr-2 text-color"></i>My Save Plan</a></li>

                

               

                   

                    

               <!-- <li><a href="/admin/banner"><i class="la la-cog mr-2 text-color-10"></i>Slider Settings</a></li>
               -->

              <!--  <li><a href="settings.php"><i class="la la-cog mr-2 text-color-10"></i>Settings</a></li>
              -->

                <li><a href="/user/logout"><i class="la la-power-off mr-2 text-color-11"></i>Logout</a></li>

            </ul>

        </div><!-- end sidebar-menu-wrap -->

    </div>

</div><!-- end sidebar-nav -->

<!-- ================================

       END DASHBOARD NAV

================================= -->

