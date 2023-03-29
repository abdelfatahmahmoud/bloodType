@extends('frontend.layouts.master')
    @section('css')
        @toastr_css()
    @stop

    @section('title')

        اتصل بنا
    @stop

    <!-- breadcrumb -->

    <!-- breadcrumb -->

    @section('content')
        <!--contact-->

    <div class="contact-now">
        <div class="container">
            <div class="path">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">الرئيسية</a></li>
                        <li class="breadcrumb-item active" aria-current="page">تواصل معنا</li>
                    </ol>
                </nav>
            </div>
            <div class="row methods">
                <div class="col-md-6">
                    <div class="call">
                        <div class="title">
                            <h4>اتصل بنا</h4>
                        </div>
                        <div class="content">
                            <div class="logo">
                                <img src="{{URL::asset('imgs/logo.png')}}">
                            </div>
                            <div class="details">
                                <ul>
                                    <li><span>الجوال:</span> 124123412312</li>
                                    <li><span>فاكس:</span> 234234234</li>
                                    <li><span>البريد الإلكترونى:</span> name@name.com</li>
                                </ul>
                            </div>
                            <div class="social">
                                <h4>تواصل معنا</h4>
                                <div class="icons" dir="ltr">
                                    <div class="out-icon">
                                        <a href="https://www.facebook.com/abdelftah.mahmoud.73/" class="facebook"><i class="fab fa-facebook-f"></i></a>
                                    </div>
                                    <div class="out-icon">
                                        <a href="#" class="twitter"><i class="fab fa-twitter"></i></a>                                    </div>
                                    <div class="out-icon">
{{--                                        <a href="#"><img src="{{URL::asset('frontend/imgs/003-youtube.svg')}}"></a>--}}
                                    </div>
                                    <div class="out-icon">
                                        <a href="https://www.instagram.com/body_mahmoud79/" class="instagram"><i class="fab fa-instagram"></i></a>

                                    </div>
                                    <div class="out-icon">
                                        <a href="#" class="whatsapp"><i class="fab fa-whatsapp"></i></a>
                                    </div>
                                    <div class="out-icon">
{{--                                        <a href="#"><img src="{{URL::asset('frontend/imgs/006-google-plus.svg')}}"></a>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="contact-form">
                        <div class="title">
                            <h4>تواصل معنا</h4>
                        </div>
                        <div class="fields">
                            <form class=" row mb-30" action="{{ route('contacts_us.store') }}" method="POST"  enctype="multipart/form-data">
                                @csrf
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="الإسم" name="name">
                                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="البريد الإلكترونى" name="email">
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="الجوال" name="phone">
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="عنوان الرسالة" name="subject">
                                <textarea placeholder="نص الرسالة" class="form-control" name="message" id="exampleFormControlTextarea1" rows="3" name="text"></textarea>
                                <input type="submit" value="إنشاء"></input>
                            </form>
                            <br>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
@section('js')

@endsection
