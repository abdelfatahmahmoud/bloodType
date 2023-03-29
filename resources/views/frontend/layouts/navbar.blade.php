<!--nav-->
<div class="nav-bar">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="index">
                <img src="{{URL::asset('frontend/imgs/logo.png')}}" class="d-inline-block align-top" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="index">الرئيسية <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about">عن بنك الدم</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('article.index') }}">المقالات</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('donation_requests.create') }}">طلبات التبرع</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('how_are.index') }}">من نحن</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contacts_us.index') }}">اتصل بنا</a>
                    </li>
                </ul>

                <!--not a member-->

@auth('client')

                    <div class="row buttons">

                        <div class="col-md-6 left">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i
                                    class="bx bx-log-out" ></i>تسجيل خروج</a>
                        </div>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                @endauth

                @if(!auth('client')->check())
                <div class="accounts">
                    <a href="{{route('register.index')}}" class="create">إنشاء حساب جديد</a>
                    <a href="{{route('auth')}}" class="signin">الدخول</a>
                </div>
                @endif
                @if(auth('client')->check())
                <a href="#" class="donate">
                    <img src="{{URL::asset('frontend/imgs/transfusion.svg')}}">
                    <p>طلب تبرع</p>
                </a>

                @endif
            </div>
        </div>
    </nav>
</div>
