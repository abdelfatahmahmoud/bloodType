@extends('frontend.layouts.master')
@section('css')
    @toastr_css()
@stop

@section('title')

المقالات
@stop

<!-- breadcrumb -->

<!-- breadcrumb -->

@section('content')
    <!--contact-->
    <!--contact-->
<!--articles-->
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
                                         alt="profile Pic" height="300" width="400">

                                    <a href="article-details.html" class="click">المزيد</a>
                                </div>
                                <a href="#" class="favourite">
                                    <i class="far fa-heart"></i>
                                </a>

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
@endsection
