<!doctype html>
<html lang="en" dir="rtl">
@section('title')
   بنك الدم
@stop
@include('frontend.layouts.head')

<body>
@include('frontend.layouts.header')
@include('frontend.layouts.navbar')
<div class="row">
    <div class="col-md-12 mb-30">
{{--        <div class="card card-statistics h-100">--}}
<!--intro-->
<div class="intro">
    <div id="slider" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#slider" data-slide-to="0" class="active"></li>
            <li data-target="#slider" data-slide-to="1"></li>
            <li data-target="#slider" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item carousel-1 active">
                <div class="container info">
                    <div class="col-lg-5">
                        <h3>بنك الدم نمضى قدما لصحة أفضل</h3>
                        <p>
                            هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص.
                        </p>
                        <a href="#">المزيد</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item carousel-2">
                <div class="container info">
                    <div class="col-lg-5">
                        <h3>بنك الدم نمضى قدما لصحة أفضل</h3>
                        <p>
                            هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص.
                        </p>
                        <a href="#">المزيد</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item carousel-3">
                <div class="container info">
                    <div class="col-lg-5">
                        <h3>بنك الدم نمضى قدما لصحة أفضل</h3>
                        <p>
                            هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي.
                        </p>
                        <a href="#">المزيد</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--about-->
<div class="about">
    <div class="container">
        <div class="col-lg-6 text-center">
            <p>
                <span>بنك الدم</span> هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ.
            </p>
        </div>
    </div>
</div>

<!--inside-article-->
<div class="inside-article">
    <div class="container">
        <div class="path">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">

                    <li class="breadcrumb-item" aria-current="page"><a href="#">المقالات</a></li>

                </ol>
            </nav>
        </div>
        <div class="article-image">
            <img src="{{URL::asset('frontend/imgs/p2.jpg')}}">
        </div>
        <div class="article-title col-12">
            <div class="h-text col-6">
                <h4>طريقة الوقاية من الأمراض</h4>
            </div>
            <div class="icon col-6">
                <button type="button"><i class="far fa-heart"></i></button>
            </div>
        </div>

        <!--text-->


        <!--articles-->
        <div class="articles">
            <div class="title">
                <div class="head-text">
                    <h2>مقالات ذات صلة</h2>
                </div>
            </div>

                    <!-- Set up your HTML -->

                        <div class="row">

                            <div class="owl-carousel articles-carousel">
                                @foreach($post as $posts)
                        <div class="card">
                            <div class="photo">
                                <img src="{{URL::asset('/uploads/posts/'.$posts->image)}}"
                                         alt="profile Pic" height="200" width="200">

{{--                                <a href="article-details.html" class="click">المزيد</a>--}}
                            </div>
{{--                            <form action="{{ route('favorite.add') }}" method="POST"--}}
{{--                                  enctype="multipart/form-data">--}}
{{--                                @csrf--}}
{{--                                <button class="p-2 bg-red-100 rounded hover:bg-red-600">--}}
{{--                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"--}}
{{--                                         stroke="currentColor" class="w-6 h-6 text-red-700 hover:text-red-100">--}}
{{--                                        <path stroke-linecap="round" stroke-linejoin="round"--}}
{{--                                              d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />--}}
{{--                                    </svg>--}}

{{--                                </button>--}}
{{--                            </form>--}}
                            <div class="card-body">
                                <h5 class="card-title">{{$posts->title}}</h5>
                                <p class="card-text">
                                    {{$posts->content}}                                </p>
                            </div>

                        </div>


                                @endforeach


        </div>

                        </div>

        </div>
        </div>
</div>

<!--requests-->
<div class="requests">
    <div class="container">
        <div class="head-text">
            <h2>طلبات التبرع</h2>
        </div>
    </div>
    <div class="content">
        <div class="container">
{{--            <form  method="POST" action="{{route('donation_requests.search')}}">--}}
{{--                <form class="row filter" action="donation_requests.search" method="POST">--}}

            <form class="row filter">

{{--                        @csrf--}}
{{--                    @csrf--}}

                <div class="col-md-9 blood">
                    <div class="form-group ">
                        <input type="search" name="search" id=""  class="form-control" placeholder="البحث باسم المستشفى او العنوان او رقم التليفون" value="{{$search}}"/>
{{--                        <div class="inside-select">--}}
{{--                            <select class="form-control" id="exampleFormControlSelect1" name="blood_type_id" >--}}
{{--                                <option selected disabled>اختر فصيلة الدم</option>--}}
{{--                                @foreach($bloodType as $bloodTypes)--}}
{{--                                    <option  value="{{ $bloodTypes->id }}">{{ $bloodTypes->name }}</option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                            <i class="fas fa-chevron-down"></i>--}}
{{--                        </div>--}}
                    </div>
                    <div class="col-md-2 search">
                        <button type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>

{{--                <div class="col-md-5 city">--}}
{{--                    <div class="form-group">--}}
{{--                        <input type="search" name="blood_type_id" id=""  class="form-control" placeholder="search" value="{{$search}}"/>--}}
{{--                        <div class="inside-select">--}}
{{--                            <select class="form-control" id="exampleFormControlSelect1" name="city_id" >--}}
{{--                                <option selected disabled>اختر المدينة</option>--}}
{{--                                @foreach($city as $cities)--}}
{{--                                    <option  value="{{ $cities->id }}">{{ $cities->name }}</option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                            <i class="fas fa-chevron-down"></i>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                </div>--}}

            </form>


        @foreach($donationRequest as $donations)
            <div class="patients">
                <div class="details">
                    <div class="blood-type">
                        <h2 dir="ltr">{{$donations->blood_type->name}}</h2>
                    </div>

                         <ul>
                        <li><span>اسم الحالة:</span>{{$donations->name}} </li>
                        <li><span>مستشفى:</span> {{$donations->hospital_name}} </li>
                        <li><span>المدينة:</span> {{$donations->city->name}} </li>
                    </ul>

                    <a href="inside-request.html">التفاصيل</a>
                </div>
                @endforeach

        </div>
    </div>
</div>
</div>

<!--contact-->
<div class="contact">
    <div class="container">
        <div class="col-md-7">
            <div class="title">
                <h3>اتصل بنا</h3>
            </div>
            <p class="text">يمكنك الإتصال بنا للإستفسار عن معلومة وسيتم الرد عليكم</p>
            <div class="row whatsapp">
                <a href="#">
                    <img src="{{URL::asset('frontend/imgs/whats.png')}}">
                    <p dir="ltr">+201027659307</p>
                </a>
            </div>
        </div>
    </div>
</div>

<!--app-->
<div class="app">
    <div class="container">
        <div class="row">
            <div class="info col-md-6">
                <h3>تطبيق بنك الدم</h3>
                <p>
                    هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى،
                </p>
                <div class="download">
                    <h4>متوفر على</h4>
                    <div class="row stores">
                        <div class="col-sm-6">
                            <a href="#">
                                <img src="{{URL::asset('frontend/imgs/google.png')}}">
                            </a>
                        </div>
                        <div class="col-sm-6">
                            <a href="#">
                                <img src="{{URL::asset('frontend/imgs/ios.png')}}">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="screens col-md-6">
                <img src="{{URL::asset('frontend/imgs/App.png')}}">
            </div>
        </div>
    </div>
</div>


{{--        </div>--}}
    </div>
</div>
@include('frontend.layouts.footer')
@include('frontend.layouts.script')
</body>

</html>
