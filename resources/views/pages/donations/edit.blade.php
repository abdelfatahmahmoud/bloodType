@extends('layouts.master')
@section('css')
    @toastr_css()
@stop

@section('title')


@stop

<!-- breadcrumb -->
@section('PageTitle')
    <span class="m-5">تعديل طلب تبرع </span>


@stop
<!-- breadcrumb -->

@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="post"  action="{{route('donation_request.update',$donationRequest->id)}}" autocomplete="off" enctype="multipart/form-data">
                        {{ method_field('patch') }}
                        @csrf
                        {{--                        <h6 style="font-family: 'Cairo', sans-serif;color: blue">{{trans('Students_trans.personal_information')}}</h6><br>--}}
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>اسم المرض <span class="text-danger">*</span></label>
                                    <input  type="text" name="name"  class="form-control" value="{{$donationRequest->name}}">
                                    <input  type="hidden" name="id"  class="form-control" value="{{$donationRequest->id}}">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>اسم المستشفى : <span class="text-danger">*</span></label>
                                    <input  class="form-control" name="hospital_name" type="text" value="{{$donationRequest->hospital_name}}">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>التليفون </label>
                                    <input type="text"  name="patient_phone" class="form-control" value="{{$donationRequest->patient_phone}}">
                                </div>
                            </div>
                        </div>

                        <div class="row">


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="gender">المدينة : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="city_id">
                                        <option selected disabled>اختار المدينة</option>
                                        @foreach($city as $cities)
                                            <option selected disabled value="{{ $cities->id }}">{{ $cities->name }}</option>

                                            <option  value="{{ $cities->id }}">{{ $cities->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>عنوان المستشفى  :</label>
                                    <input class="form-control" type="text"  id="datepicker-action" name="hospital_addres" value="{{$donationRequest->hospital_addres}}">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>العمر  :</label>
                                    <input class="form-control" type="text"  id="datepicker-action" name="patient_age" value="{{$donationRequest->patient_age}}">
                                </div>
                            </div>


                        </div>

                        {{--                        <h6 style="font-family: 'Cairo', sans-serif;color: blue">{{trans('Students_trans.Student_information')}}</h6><br>--}}
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="gender">فصيلة الدم : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="blood_type_id">
                                        @foreach($bloodType as $bloodTypes)
                                            <option selected disabled value="{{ $bloodTypes->id }}">{{ $bloodTypes->name }}</option>
                                            <option  value="{{ $bloodTypes->id }}">{{ $bloodTypes->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>عدد الشنط  :</label>
                                    <input class="form-control" type="text"  id="datepicker-action" name="count_bage" value="{{$donationRequest->count_bage}}">
                                </div>
                            </div>


                        </div><br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>خط الطول  :</label>
                                    <input class="form-control" type="text"  id="datepicker-action" name="latitude" value="{{$donationRequest->latitude}}">
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>خط العرض  :</label>
                                    <input class="form-control" type="text"  id="datepicker-action" name="longitude" value="{{$donationRequest->longitude}}">
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label> الوصف  :</label>

                                    <textarea  class="form-control" type="text"  name="description">{{$donationRequest->description}}</textarea>

                                </div>
                            </div>



                        </div>


                        <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">حفظ البيانات</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render

@endsection
