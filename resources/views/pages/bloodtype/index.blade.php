@extends('layouts.master')
@section('css')
    @toastr_css

    @section('title')

        فصائل الدم
    @stop

    <!-- breadcrumb -->
    @section('PageTitle')
        <span class="m-5">فصائل الدم</span>


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
{{--@can('اضافة فصيلة')--}}
                        <button type="button" class="btn-primary button x-small " data-toggle="modal" data-target="#exampleModal">
                            اضافة فصيلة
                        </button>
{{--                            @endcan--}}
                        <br>
                        <br>
                        <div class="table-responsive">
                            <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                                   style="text-align: center">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>اسم الفصيلة</th>
                                    <th>العمليات</th>

                                </tr>
                                </thead>
                                <tbody>



                                <?php $i = 0; ?>

                                @foreach ($categories as $category)
                                    <tr>
                                            <?php $i++; ?>
                                        <td>{{ $i }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>
{{--                                            @can('اضافة تعديل')--}}
                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                    data-target="#edit{{ $category->id }}"
                                                    title="{{ trans('Grades_trans.Edit') }}"><i class="fa fa-edit"></i></button>
{{--                                            @endcan--}}
{{--                                                @can('اضافة حذف')--}}
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                    data-target="#delete{{ $category->id }}"
                                                    title="{{ trans('Grades_trans.Delete') }}"><i
                                                    class="fa fa-trash"></i></button>
{{--                                                @endcan--}}
                                        </td>
                                    </tr>

                                    <!-- edit_modal_governorate -->
                                    <div class="modal fade" id="edit{{ $category->id }}" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                        id="exampleModalLabel">
                                                        تعديل الفصيلة
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- edit_form -->
                                                    <form action="{{ route('bloodtype.update', 'test') }}" method="post">
                                                        {{ method_field('patch') }}
                                                        @csrf

                                                        <div class="repeater">
                                                            <div data-repeater-list="List_Classes">
                                                                <div data-repeater-item>
                                                                    <div class="row">
                                                                        <input class="form-control" type="hidden" name="id" value="{{$category->id}}"/>

                                                                        <div class="col">
                                                                            <label for="Name"
                                                                                   class="mr-sm-2">اسم الفصيلة
                                                                                :</label>
                                                                            <input class="form-control" type="text" name="name" value="{{$category->name}}"/>
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
                                    <!-- delete_modal_goverorate -->
                                    <div class="modal fade" id="delete{{ $category->id }}" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                        id="exampleModalLabel">
                                                        حذف الفصيلة
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('bloodtype.destroy', 'test') }}"
                                                          method="post">
                                                        {{ method_field('Delete') }}
                                                        @csrf
                                                        <span class="alert-danger">{{ $category->name }}</span>  حذف القسم :
                                                        <input id="id" type="hidden" name="id" class="form-control"
                                                               value="{{ $category->id }}">
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
                                            اضافة فصيلة جديدة
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                        <form class=" row mb-30" action="{{ route('bloodtype.store') }}" method="POST">
                                            @csrf
                                            <div class="card-body">
                                                <div class="repeater">
                                                    <div data-repeater-list="List_Classes">
                                                        <div data-repeater-item>
                                                            <div class="row">

                                                                <div class="col">
                                                                    <label for="Name"
                                                                           class="mr-sm-2">اسم الفصيلة
                                                                        :</label>
                                                                    <input class="form-control" type="text" name="name" />
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
            </div>


            <!-- add_modal_class -->
        </div>







        <!-- row closed -->
    @endsection
    @section('js')

    @endsection
