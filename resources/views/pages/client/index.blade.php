@extends('layouts.master')
@section('css')
    @toastr_css()
@stop

@section('title')


@stop

<!-- breadcrumb -->
@section('PageTitle')
    <span class="m-5">قائمة العملاء</span>


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

<form action=""  class="col-9">
    <div class="form-group">
    <input type="search" name="search" id=""  class="form-control" placeholder="search" value="{{$search}}"/>
    </div>
    <button class="btn btn-secondary"> Search</button>
</form>

                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                               style="text-align: center">
                            <thead>

                            <tr>
                                <th>#</th>
                                <th>اسم العميل</th>
                                <th>البريد الإلكترونى</th>
                                <th>التليفون</th>
                                <th>المدينة</th>
                                <th>فصيلة الدم</th>
                                <th>تاريخ التيرع</th>
                                <th>التفعيل </th>
                                <th>العمليات</th>


                            </tr>
                            </thead>
                            <tbody>



                                                        <?php $i = 0; ?>

                            @foreach ($client as $clients)
                                <tr>

                                    <td>{{$loop->iteration }}</td>
                                    <td>{{$clients->name }}</td>
                                    <td>{{$clients->email }}</td>
                                    <td>{{$clients->phone }}</td>
                                    <td>{{$clients->city->name }}</td>
                                    <td>{{$clients->BloodType->name }}</td>
                                    <td>{{$clients->donation_list_date }}</td>

                                    <td>

                                        @if($clients->is_active == 1)
                                            <span class="text-success">مفعل</span>

                                        @else
                                            <span class="text-danger">غير مفعل</span>
                                        @endif


                                    </td>
                                    <td>
                                        @can('تعديل العميل')
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                data-target="#edit{{ $clients->id }}"
                                                title="{{ trans('Grades_trans.Edit') }}"><i class="fa fa-edit"></i></button>
                                        @endcan

                                            @can('حذف العميل')

                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#delete{{ $clients->id }}"
                                                title="{{ trans('Grades_trans.Delete') }}"><i
                                                class="fa fa-trash"></i></button>
                                            @endcan
                                    </td>
                                </tr>

                                <div class="modal fade" id="edit{{ $clients->id }}" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    تحديث حالة العميل
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form  action="{{ route('clients.update', 'test') }}"
                                                       method="POST">
                                                    {{ method_field('patch') }}
                                                    {{ csrf_field() }}

                                                    <span class="alert-danger">{{ $clients->name }}</span>  تحديث حالة العميل :
                                                    <input id="id" type="hidden" name="id" class="form-control"
                                                           value="{{ $clients->id }}">
                                                    <input id="id" type="text" name="is_active" class="form-control"
                                                           value="{{ $clients->is_active }}">
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


                                <div class="modal fade" id="delete{{ $clients->id }}" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    حذف المحافظة
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('clients.destroy', 'test') }}"
                                                      method="post">
                                                    {{ method_field('Delete') }}
                                                    @csrf
                                                    <span class="alert-danger">{{ $clients->name }}</span>  حذف العميل :
                                                    <input id="id" type="hidden" name="id" class="form-control"
                                                           value="{{ $clients->id }}">
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



            </div>
        </div>


        <!-- add_modal_class -->
    </div>
    </div>






    <!-- row closed -->
@endsection
@section('js')

@endsection
