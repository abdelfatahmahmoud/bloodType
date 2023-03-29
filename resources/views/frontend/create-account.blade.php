@extends('frontend.layouts.master')
@section('css')
    @toastr_css()
@stop

@section('title')

انشاء حساب جديد
@stop

<!-- breadcrumb -->

<!-- breadcrumb -->

@section('content')
<!--form-->
<div class="form">
    <div class="container">
        <div class="path">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">الرئيسية</a></li>
                    <li class="breadcrumb-item active" aria-current="page">انشاء حساب جديد</li>
                </ol>
            </nav>
        </div>
        <div class="account-form">
            <form class=" row mb-30" action="{{ route('register.store') }}" method="POST"  enctype="multipart/form-data">
                @csrf
                <input type="text" class="form-control" id="exampleInputEmail1" name="name" aria-describedby="emailHelp" placeholder="الإسم">

                <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="البريد الإلكترونى">

                <input placeholder="تاريخ الميلاد" class="form-control" type="text" name="birth_date" onfocus="(this.type='date')" id="date">

                <select class="form-control" id="blood_type_id" name="blood_type_id">
                    <option value="" selected
                            disabled>فصيلة الدم
                    </option>
                    @foreach ($blood_type as $blood_types)
                        <option value="{{ $blood_types->id }}"> {{ $blood_types->name }}
                        </option>
                    @endforeach
                </select>


                <select class="form-control" id="city_id" name="city_id">
                    <option value="" selected
                            disabled>المدن
                    </option>
                    @foreach ($city as $cities)
                        <option value="{{ $cities->id }}"> {{ $cities->name }}
                        </option>
                    @endforeach
                </select>


                <input type="text" class="form-control" name="phone" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="رقم الهاتف">

                <input placeholder="آخر تاريخ تبرع" name="donation_list_date" class="form-control" type="text" onfocus="(this.type='date')" id="date">

                <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="كلمة المرور">

                <input type="password" class="form-control" name="password-confirmation" id="exampleInputPassword1" placeholder="كلمة المرور">

                <div class="create-btn">
                    <input type="submit" value="إنشاء"></input>
                </div>
            </form>
            <br>
        </div>
    </div>
</div>
@endsection
@section('js')

@endsection
