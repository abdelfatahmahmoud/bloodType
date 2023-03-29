@extends('layouts.master')
@section('css')
    @toastr_css()
    @stop

@section('title')


@stop

<!-- breadcrumb -->
@section('PageTitle')
    <span class="m-5">المحافظات</span>


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



@can('اضافة محافظة')
                        <button type="button" class="btn-primary button x-small " data-toggle="modal" data-target="#exampleModal">
                        اضافة محافظة
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
                                <th>اسم المحافظة</th>
                                <th>العمليات</th>

                            </tr>
                            </thead>
                            <tbody>



{{--                            <?php $i = 0; ?>--}}

                            @foreach ($Goverorates as $Goverorate)
                                <tr>

                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $Goverorate->name }}</td>
                                    <td>

                                        @can('تعديل محافظة')
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                data-target="#edit{{ $Goverorate->id }}"
                                                title="{{ trans('Grades_trans.Edit') }}"><i class="fa fa-edit"></i></button>

                                        @endcan
                                            @can('حذف محافظة')
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#delete{{ $Goverorate->id }}"
                                                title="{{ trans('Grades_trans.Delete') }}"><i
                                                class="fa fa-trash"></i></button>
                                            @endcan
                                    </td>
                                </tr>

                                <!-- edit_modal_governorate -->
                                <div class="modal fade" id="edit{{ $Goverorate->id }}" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    تعديل المحافظة
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- edit_form -->
                                                <form action="{{ route('governorate.update', 'test') }}" method="post">
                                                    {{ method_field('patch') }}
                                                    @csrf

                                                        <div class="repeater">
                                                            <div data-repeater-list="List_Classes">
                                                                <div data-repeater-item>
                                                                    <div class="row">
                                                                        <input class="form-control" type="hidden" name="id" value="{{$Goverorate->id}}"/>

                                                                        <div class="col">
                                                                            <label for="Name"
                                                                                   class="mr-sm-2">اسم المحافظة
                                                                                :</label>
                                                                            <input class="form-control" type="text" name="name" value="{{$Goverorate->name}}"/>
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
                                <div class="modal fade" id="delete{{ $Goverorate->id }}" tabindex="-1" role="dialog"
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
                                                <form action="{{ route('governorate.destroy', 'test') }}"
                                                      method="post">
                                                    {{ method_field('Delete') }}
                                                    @csrf
                                                    <span class="alert-danger">{{ $Goverorate->name }}</span>  حذف المحافظة :
                                                    <input id="id" type="hidden" name="id" class="form-control"
                                                           value="{{ $Goverorate->id }}">
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
                                           اضافة محافظةجديدة
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                        <form class=" row mb-30" action="{{ route('governorate.store') }}" method="POST">
                                            @csrf
                                            <div class="card-body">
                                                <div class="repeater">
                                                    <div data-repeater-list="List_Classes">
                                                        <div data-repeater-item>
                                                            <div class="row">

                                                                <div class="col">
                                                                    <label for="Name"
                                                                           class="mr-sm-2">اسم المحافظة
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
{{--<script type="test/javascript" charset="utf-8" src="//cdn.datatables.net/1.10.16/ja/jquery.datatables.js"></script>--}}
<script>
    $(document).ready(function (){
       var table = $('#datatable').DataTable({
          'processing':true,
           'serverSide': true,
           'ajax' : "{{route('governorate.index')}}",
           'columns' :[
               {'data' : 'name'}
           ],
       });
       $('.filter-input').keyup(function (){
        table.column($(this).data('column'))
            .search($(this).val()).draw();
       });

    });

</script>

@endsection
