@extends('layouts.master')
@section('css')
    @toastr_css()
@stop

@section('title')


@stop

<!-- breadcrumb -->
@section('PageTitle')
    <span class="m-5">طلبات التبرع</span>


@stop
<!-- breadcrumb -->

@section('content')
    <!-- row -->

    <div class="row">

        <div class="col-xl-12 mb-30">
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

                    @can('اضافة تبرع')

                        <a href="{{route('donation_request.create')}}" class="btn btn-success btn-sm" role="button"
                           aria-pressed="true">أضافة طلب تبرع</a><br><br>
                        @endcan

                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                               style="text-align: center">
                            <thead>

                            <tr>
                                <th>#</th>
                                <th>الاسم</th>
                                <th>اسم المستشفى</th>
                                <th>رقم المريض</th>
                                <th>المدينة</th>
                                <th>عنوان المستشفى</th>
                                <th> العمر</th>
                                <th>فصيلة الدم</th>
                                <th>عدد الشنط</th>
                                <th>اسم العميل</th>
                                <th> خط الطول</th>
                                <th>خط العرض </th>
                                <th>الوصف  </th>
                                <th>العمليات</th>


                            </tr>
                            </thead>
                            <tbody>



                            <?php $i = 0; ?>

                            @foreach ($donationRequest as $donationRequests)
                                <tr>

                                    <td>{{$loop->iteration }}</td>
                                    <td>{{$donationRequests->name }}</td>
                                    <td>{{$donationRequests->hospital_name }}</td>
                                    <td>{{$donationRequests->patient_phone }}</td>
                                    <td>{{$donationRequests->city->name }}</td>
                                    <td>{{$donationRequests->hospital_addres }}</td>
                                    <td>{{$donationRequests->patient_age }}</td>
                                    <td>{{$donationRequests->blood_type->name }}</td>
                                    <td>{{$donationRequests->count_bage }}</td>
                                    <td>{{$donationRequests->client->name }}</td>
                                    <td>{{$donationRequests->latitude }}</td>
                                    <td>{{$donationRequests->longitude }}</td>
                                    <td>{{$donationRequests->description }}</td>



                                    <td>
                                        <div class="dropdown show">
                                            <a class="btn btn-success btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                العمليات
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">




                                                    @can('تعديل تبرع')
                                                        <a class="dropdown-item" href="{{route('donation_request.edit',$donationRequests->id)}}"><i style="color:green" class="fa fa-edit"></i>&nbsp;  تعديل بيانات طلب التبرع</a>

                                                    @endcan
                                                        @can('حذف تبرع')
                                                <a class="dropdown-item" data-target="#Delete_Student{{ $donationRequests->id }}" data-toggle="modal" href="##Delete_Student{{ $donationRequests->id }}"><i style="color: red" class="fa fa-graduation-cap"></i>&nbsp; {{ trans('Students_trans.student_graduation') }}</a>

                                                    @endcan

                                            </div>
                                        </div>



                                    </td>
                                </tr>


                                <div class="modal fade" id="Delete_Student{{ $donationRequests->id }}" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    حذف طلب التبرع
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('donation_request.destroy', 'test') }}"
                                                      method="post">
                                                    {{ method_field('Delete') }}
                                                    @csrf
                                                    <span class="alert-danger">{{ $donationRequests->name }}</span>حذف طلب التبرع باسم  :
                                                    <input id="id" type="hidden" name="id" class="form-control"
                                                           value="{{ $donationRequests->id }}">
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">إلغاء</button>
                                                        <button type="submit"
                                                                class="btn btn-danger">تأكيد</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            @endforeach
                        </table>
                    </div>



                </div>
            </div>



        </div>
    </div>






    <!-- row closed -->
@endsection
@section('js')

@endsection
