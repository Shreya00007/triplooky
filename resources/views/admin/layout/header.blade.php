@php 
use App\Models\Admin;
$data=Admin::first();
@endphp

@include("admin.layout.page.head")

@include("admin.layout.page.canvas")
@include("admin.layout.page.sidebar")

<section class="dashboard-area">
    @include("admin.layout.page.header")
    <div class="dashboard-content-wrap">
        <div class="dashboard-bread dashboard-bread-2">
            <div class="container-fluid">
                  @yield("content")
                        </div><!-- end form-box -->
                    </div><!-- end col-lg-3 -->
                </div><!

                @include("admin.layout.page.footer")

                 @yield("modal")