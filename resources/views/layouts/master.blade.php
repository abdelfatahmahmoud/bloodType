<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    @include('layouts.head')
</head>

<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper" style="font-family: 'Cairo', sans-serif">


    <!--=================================
preloader -->



    <!--=================================
preloader -->

    @include('layouts.navbar')
    @include('layouts.sidebar')

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
                    <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                        <li class="breadcrumb-item"><a href="{{ url('/home') }}" class="default-color">الصفحة الرئيسية</a></li>
                        <li class="breadcrumb-item active">@yield('PageTitle')</li>
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
    @include('layouts.footer')
</div>
@include('layouts.script')

</body>

</html>
