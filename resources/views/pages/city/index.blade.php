@extends('layouts.master')
@section('css')
    @toastr_css

@section('title')


@stop

<!-- breadcrumb -->
@section('PageTitle')
    <span class="m-5">المدن</span>


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
                        @can('اضافة مدينة')
                    <button type="button" class="btn-primary button x-small " data-toggle="modal" data-target="#exampleModal">
                        اضافة مدينة جديدة
                    </button>
                        @endcan
                        <br>
                        <br>
                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                               style="text-align: center">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>اسم المدينة</th>
                                <th>اسم المحافظة</th>
                                <th>العمليات</th>

                            </tr>
                            </thead>
                            <tbody>



                            <?php $i = 0; ?>

                            @foreach ($city as $cities)
                                <tr>
                                        <?php $i++; ?>
                                    <td>{{ $i }}</td>
                                    <td>{{ $cities->name }}</td>
                                    <td>{{ $cities->governorate->name }}</td>
                                    <td>

                                        @can('تعديل مدينة')
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                data-target="#edit{{ $cities->id }}"
                                                title="{{ trans('Grades_trans.Edit') }}"><i class="fa fa-edit"></i></button>
                                        @endcan
                                            @can('حذف مدينة')
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#delete{{ $cities->id }}"
                                                title="{{ trans('Grades_trans.Delete') }}"><i
                                                class="fa fa-trash"></i></button>
                                            @endcan
                                    </td>
                                </tr>
                                <div class="modal fade"
                                     id="edit{{ $cities->id }}"
                                     tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel"
                                     aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title"
                                                    style="font-family: 'Cairo', sans-serif;"
                                                    id="exampleModalLabel">
                                                  تعديل المدن
                                                </h5>
                                                <button type="button" class="close"
                                                        data-dismiss="modal"
                                                        aria-label="Close">
                                                                                    <span
                                                                                        aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <form
                                                    action="{{ route('cities.update', 'test') }}"
                                                    method="POST">
                                                    {{ method_field('patch') }}
                                                    {{ csrf_field() }}
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="inputName"
                                                                   class="control-label">المدن</label>
                                                            <input type="text"
                                                                   name="name"
                                                                   class="form-control"
                                                                   value="{{ $cities->name }}">
                                                        </div>



                                                            <input class="form-control" type="hidden" name="id" value="{{$cities->id}}"/>


                                                    <br>

                                                    <div class="col">
                                                        <label for="inputName"
                                                               class="control-label">المحافظات</label>
                                                        <select name="governorate_id"
                                                                class="custom-select"
                                                                onclick="console.log($(this).val())">
                                                            <!--placeholder-->
                                                            <option
                                                                value="{{ $cities->governorate->id }}">
                                                                {{ $cities->governorate->name }}
                                                            </option>
                                                            @foreach ($governorate as $governorates)
                                                                <option
                                                                    value="{{ $governorates->id }}">
                                                                    {{ $governorates->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                            <div class="modal-footer">
                                                <button type="button"
                                                        class="btn btn-secondary"
                                                        data-dismiss="modal">إلغاء</button>
                                                <button type="submit"
                                                        class="btn btn-danger">تأكيد</button>
                                            </div>
                                                    </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                </div>


                                    <!-- delete_modal-city -->
                                    <div class="modal fade" id="delete{{ $cities->id }}" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                        id="exampleModalLabel">
                                                        حذف المدن
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('cities.destroy', 'test') }}"
                                                          method="post">
                                                        {{ method_field('Delete') }}
                                                        @csrf
                                                          :  حذف المدن<span class="alert-danger">{{ $cities->name }}</span>
                                                        <input id="id" type="hidden" name="id" class="form-control"
                                                               value="{{ $cities->id }}">
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
                                           اضافة مدينةجديدة
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                        <form class=" row mb-30" action="{{ route('cities.store') }}" method="POST">
                                            @csrf
                                            <div class="card-body">
                                                <div class="repeater">
                                                    <div data-repeater-list="List_Classes">
                                                        <div data-repeater-item>
                                                            <div class="row">

                                                                <div class="col">
                                                                    <label for="Name"
                                                                           class="mr-sm-2">اسم المدينة
                                                                        :</label>
                                                                    <input class="form-control" type="text" name="name" />
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col">
                                                        <label for="inputName"
                                                               class="control-label">المحافظات</label>
                                                        <select name="governorate_id" class="custom-select"
                                                                onchange="console.log($(this).val())">
                                                            <!--placeholder-->
                                                            <option value="" selected
                                                                    disabled>المحافظات
                                                            </option>
                                                            @foreach ($governorate as $governorates)
                                                                <option value="{{ $governorates->id }}"> {{ $governorates->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <br>
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
        </div>


        <!-- add_modal_class -->
    </div>







    <!-- row closed -->
@endsection
@section('js')

@endsection
