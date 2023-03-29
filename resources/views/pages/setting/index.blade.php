@extends('layouts.master')
@section('css')
    @toastr_css()
@stop

@section('title')
    الأعدادات

@stop

<!-- breadcrumb -->
@section('PageTitle')
    <span class="m-5">الأعدادات</span>


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
@can('اضافة اعدادات')
                        <button type="button" class="btn-primary button x-small " data-toggle="modal" data-target="#exampleModal">
                            اضافة اعدادات</button><br><br>

                        @endcan
                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                               style="text-align: center">
                            <thead>

                            <tr>
                                <th>#</th>
                                <th>اشعارات الاعدادات</th>
                                <th>عن الموقع</th>
                                <th>التليفون</th>
                                <th>الايميل</th>
                                <th>فيس بوك</th>
                                <th>تويتر</th>
                                <th> انيستجرام</th>
                                <th> العمليات</th>



                            </tr>
                            </thead>
                            <tbody>



                            <?php $i = 0; ?>

                            @foreach ($setting as $settings)
                                <tr>

                                    <td>{{$loop->iteration }}</td>
                                    <td>{{$settings->notifecations_settings_text }}</td>
                                    <td>{{$settings->about_app }}</td>
                                    <td>{{$settings->phone }}</td>
                                    <td>{{$settings->email}}</td>
                                    <td>{{$settings->fb_link }}</td>
                                    <td>{{$settings->tw_link }}</td>
                                    <td>{{$settings->insta }}</td>




                                    <td>
                                        @can('تعديل اعدادات')
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                data-target="#edit{{ $settings->id }}"
                                                title="{{ trans('Grades_trans.Edit') }}"><i class="fa fa-edit"></i></button>
                                        @endcan

                                            @can('حذف اعدادات')
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#delete{{ $settings->id }}"
                                                title="{{ trans('Grades_trans.Delete') }}"><i
                                                class="fa fa-trash"></i></button>
                                            @endcan
                                    </td>
                                </tr>
{{--edit setting--}}

                                <div class="modal fade"  id="edit{{ $settings->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                     aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                                                    تعديل الاعدادات
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <form class=" row mb-30" action="{{ route('setting.update', 'test') }}" method="POST"  enctype="multipart/form-data">
                                                    {{ method_field('patch') }}
                                                    @csrf
                                                    <div class="card-body">
                                                        <div class="repeater">
                                                            <div data-repeater-list="List_Classes">
                                                                <div data-repeater-item>
                                                                    <div class="row">

                                                                        <div class="col">
                                                                            <label for="Name"
                                                                                   class="mr-sm-2">نص الاشعارات
                                                                                :</label>
                                                                            <input class="form-control" type="hidden" name="id" value="{{$settings->id}}" />

                                                                            <input class="form-control" type="text" name="notifecations_settings_text" value="{{$settings->notifecations_settings_text}}" />
                                                                        </div>

                                                                    </div>


                                                                    <div class="col ">
                                                                        <label for="Name"
                                                                               class="mr-sm-2">التليفون
                                                                            :</label>
                                                                        <input class="form-control" type="text" name="phone" value="{{$settings->phone}}" />
                                                                    </div>

                                                                    <div class="col ">
                                                                        <label for="Name"
                                                                               class="mr-sm-2">الايميل
                                                                            :</label>
                                                                        <input class="form-control" type="text" name="email" value="{{$settings->email}}" />
                                                                    </div>
                                                                    <div class="col ">
                                                                        <label for="Name"
                                                                               class="mr-sm-2">عن الموقع
                                                                            :</label>
                                                                        <input class="form-control" type="text" name="about_app" value="{{$settings->about_app}}" />
                                                                    </div>

                                                                    <div class="col ">
                                                                        <label for="Name"
                                                                               class="mr-sm-2"> فيس بوك
                                                                            :</label>
                                                                        <input class="form-control" type="text" name="fb_link" value="{{$settings->fb_link}}" />
                                                                    </div>

                                                                    <div class="col ">
                                                                        <label for="Name"
                                                                               class="mr-sm-2"> تويتر
                                                                            :</label>
                                                                        <input class="form-control" type="text" name="tw_link" value="{{$settings->tw_link}}" />
                                                                    </div>

                                                                    <div class="col ">
                                                                        <label for="Name"
                                                                               class="mr-sm-2"> انيستجرام
                                                                            :</label>
                                                                        <input class="form-control" type="text" name="insta" value="{{$settings->insta}}" />
                                                                    </div>




                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                                data-dismiss="modal">الغاء</button>
                                                                        <button type="submit"
                                                                                class="btn btn-success">تأكيد</button>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </form>
                                            </div>

                                        </div>


                                        <!-- add_modal_class -->
                                    </div>
                                </div>



                                <div class="modal fade" id="delete{{ $settings->id }}" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                   حذف اعدادات التبرع
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('setting.destroy', 'test') }}"
                                                      method="post">
                                                    {{ method_field('Delete') }}
                                                    @csrf
                                                    <span class="alert-danger">{{ $settings->name }}</span> حذف اعداادات التبرع
                                                    <input id="id" type="hidden" name="id" class="form-control"
                                                           value="{{ $settings->id }}">
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
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                             aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                                            اضافة اعدادات
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                        <form class=" row mb-30" action="{{ route('setting.store') }}" method="POST"  enctype="multipart/form-data">
                                            @csrf
                                            <div class="card-body">
                                                <div class="repeater">
                                                    <div data-repeater-list="List_Classes">
                                                        <div data-repeater-item>
                                                            <div class="row">

                                                                <div class="col">
                                                                    <label for="Name"
                                                                           class="mr-sm-2">نص الاشعارات
                                                                        :</label>
                                                                    <input class="form-control" type="text" name="notifecations_settings_text" />
                                                                </div>

                                                            </div>


                                                        <div class="col ">
                                                            <label for="Name"
                                                                   class="mr-sm-2">التليفون
                                                                :</label>
                                                            <input class="form-control" type="text" name="phone" />
                                                        </div>

                                                        <div class="col ">
                                                            <label for="Name"
                                                                   class="mr-sm-2">الايميل
                                                                :</label>
                                                            <input class="form-control" type="text" name="email" />
                                                        </div>
                                                        <div class="col ">
                                                            <label for="Name"
                                                                   class="mr-sm-2">عن الموقع
                                                                :</label>
                                                            <input class="form-control" type="text" name="about_app" />
                                                        </div>

                                                        <div class="col ">
                                                            <label for="Name"
                                                                   class="mr-sm-2"> فيس بوك
                                                                :</label>
                                                            <input class="form-control" type="text" name="fb_link" />
                                                        </div>

                                                        <div class="col ">
                                                            <label for="Name"
                                                                   class="mr-sm-2"> تويتر
                                                                :</label>
                                                            <input class="form-control" type="text" name="tw_link" />
                                                        </div>

                                                        <div class="col ">
                                                            <label for="Name"
                                                                   class="mr-sm-2"> انيستجرام
                                                                :</label>
                                                            <input class="form-control" type="text" name="insta" />
                                                        </div>




                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">الغاء</button>
                                                <button type="submit"
                                                        class="btn btn-success">تأكيد</button>
                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                </form>
                            </div>

                                </div>


            <!-- add_modal_class -->
        </div>
    </div>






    <!-- row closed -->
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')

@endsection
