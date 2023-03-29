@extends('layouts.master')
@section('css')
    @toastr_css()
@stop

@section('title')


@stop

<!-- breadcrumb -->
@section('PageTitle')
    <span class="m-5">اتصل بنا</span>


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
@can('اضافة رسالة')
                        <button type="button" class="btn-primary button x-small " data-toggle="modal" data-target="#exampleModal">
                            اضافة رسالة جديدة
                        </button>
                        @endcan
                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                               style="text-align: center">
                            <thead>

                            <tr>
                                <th>#</th>
                                <th>اسم العميل</th>
                                <th>البريد الإلكترونى</th>
                                <th>العنوان</th>
                                <th>الرسالة</th>
                                <th>التليفون</th>

                                <th>العمليات</th>


                            </tr>
                            </thead>
                            <tbody>



                            <?php $i = 0; ?>

                            @foreach ($contact as $contacts)
                                <tr>

                                    <td>{{$loop->iteration }}</td>
                                    <td>{{$contacts->name }}</td>
                                    <td>{{$contacts->email }}</td>
                                    <td>{{$contacts->subject }}</td>
                                    <td>{{$contacts->message }}</td>

                                    <td>{{$contacts->phone }}</td>


                                    <td>
                                        @can('تعديل رسالة')
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                data-target="#edit{{ $contacts->id }}"
                                                title="{{ trans('Grades_trans.Edit') }}"><i class="fa fa-edit"></i></button>
                                        @endcan
                                            @can('حذف رسالة')
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#delete{{ $contacts->id }}"
                                                title="{{ trans('Grades_trans.Delete') }}"><i
                                                class="fa fa-trash"></i></button>
                                            @endcan
                                    </td>
                                </tr>
                                <div class="modal fade" id="edit{{ $contacts->id }}" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    تعديل االقسم
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- edit_form -->
                                                <form action="{{ route('contact.update', 'test') }}" method="post">
                                                    {{ method_field('patch') }}
                                                    @csrf

                                                    <div class="repeater">
                                                        <div data-repeater-list="List_Classes">
                                                            <div data-repeater-item>
                                                                <div class="row">
                                                                    <input class="form-control" type="hidden" name="id" value="{{$contacts->id}}"/>




                                                                </div>
                                                            </div>

                                                            <div class="row">

                                                                <div class="col">
                                                                    <label for="Name"
                                                                           class="mr-sm-2">اسم القسم
                                                                        :</label>
                                                                    <input class="form-control" type="text" name="name" value="{{$contacts->name}}"/>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <label for="Name"
                                                                           class="mr-sm-2">البريد الألكترونى
                                                                        :</label>
                                                                    <input class="form-control" type="text" name="email" value="{{$contacts->email}}"/>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <label for="Name"
                                                                           class="mr-sm-2">العنوان
                                                                        :</label>
                                                                    <input class="form-control" type="text" name="subject" value="{{$contacts->subject}}"/>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <label for="message"
                                                                           class="mr-sm-2">الرسالة
                                                                        :</label>
                                                                    <textarea class="col" name="message">
                                                {{$contacts->message}}
                                                                </textarea>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <label for="Name"
                                                                           class="mr-sm-2">التليفون
                                                                        :</label>
                                                                    <input class="form-control" type="text" name="phone" value="{{$contacts->phone}}"/>
                                                                </div>

                                                            </div>



                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">الغاء</button>
                                                                <button type="submit"
                                                                        class="btn btn-success">تأكيد</button>
                                                            </div>


                                                        </div>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="modal fade" id="delete{{ $contacts->id }}" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    حذف الرسالة
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('contact.destroy', 'test') }}"
                                                      method="post">
                                                    {{ method_field('Delete') }}
                                                    @csrf
                                                    <span class="alert-danger">{{ $contacts->name }}</span>  حذف الرسالة باسم  :
                                                    <input id="id" type="hidden" name="id" class="form-control"
                                                           value="{{ $contacts->id }}">
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
                    {{--                    add new governorate--}}

                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                             aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                                            اضافة رسالة جديدة
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                        <form class=" row mb-30" action="{{ route('contact.store') }}" method="POST">
                                            @csrf
                                            <div class="card-body">
                                                <div class="repeater">
                                                    <div data-repeater-list="List_Classes">
                                                        <div data-repeater-item>
                                                            <div class="row">

                                                                <div class="col">
                                                                    <label for="Name"
                                                                           class="mr-sm-2">اسم القسم
                                                                        :</label>
                                                                    <input class="form-control" type="text" name="name" />
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <label for="Name"
                                                                           class="mr-sm-2">البريد الألكترونى
                                                                        :</label>
                                                                    <input class="form-control" type="text" name="email" />
                                                                </div>
                                                            </div>
                                                                <div class="row">
                                                                <div class="col">
                                                                    <label for="Name"
                                                                           class="mr-sm-2">العنوان
                                                                        :</label>
                                                                    <input class="form-control" type="text" name="subject" />
                                                                </div>
                                                                </div>
                                                                    <div class="row">
                                                                        <div class="col">
                                                                        <label for="message"
                                                                               class="mr-sm-2">الرسالة
                                                                            :</label>
                                                                <textarea class="col" name="message">

                                                                </textarea>
                                                                        </div>
                                                                    </div>
                                                                        <div class="row">
                                                                <div class="col">
                                                                    <label for="Name"
                                                                           class="mr-sm-2">التليفون
                                                                        :</label>
                                                                    <input class="form-control" type="text" name="phone" />
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">الغاء</button>
                                                        <button type="submit"
                                                                class="btn btn-success">تأكيد</button>
                                                    </div>


                                                </div>
                                            </div>
                                        </form>
                                    </div>


                                </div>

                            </div>

                        </div>


                </div>
            </div>


            <!-- add_modal_class -->
        </div>
    </div>






    <!-- row closed -->
@endsection
@section('js')

@endsection
