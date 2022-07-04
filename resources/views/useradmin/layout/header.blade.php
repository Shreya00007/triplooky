@php
  use App\Models\User;
  $data=User::where("email",session()->get("user_login"))->first();

  @endphp
@include("useradmin.layout.page.head")



@include("useradmin.layout.page.canvas")

@include("useradmin.layout.page.sidebar")



<section class="dashboard-area">

    @include("useradmin.layout.page.header")

    <div class="dashboard-content-wrap">

        <div class="dashboard-bread dashboard-bread-2">

            <div class="container-fluid">

                  @yield("content")

                        </div><!-- end form-box -->

                    </div><!-- end col-lg-3 -->

                </div><!



                @include("useradmin.layout.page.footer")



                 @yield("modal")