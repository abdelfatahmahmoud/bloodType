<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    @include('frontend.layouts.head')
</head>

<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper" style="font-family: 'Cairo', sans-serif">


    <!--=================================
preloader -->



    <!--=================================
preloader -->

    @include('frontend.layouts.header')
    @include('frontend.layouts.navbar')
    <!--=================================
 Main content -->
    <!-- main-content -->
    <div class="content-wrapper">
        <div class="container-fluid">
            @yield('page-header')
            <br>
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="mb-0" style="font-family: 'Cairo', sans-serif">@yield('PageTitle')</h4>
                    </div>
                    <div class="col-sm-6">
                        </ol>
                    </div>
                </div>

                @yield('content')

                <!--=================================
 wrapper -->

                <!--=================================
     footer -->


            </div><!-- main content wrapper end-->

        </div>
    </div>


    <!--=================================
    footer -->
    @include('frontend.layouts.footer')
</div>
@include('frontend.layouts.script')

</body>

</html>
