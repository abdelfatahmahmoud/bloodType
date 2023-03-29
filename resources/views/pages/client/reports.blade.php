@extends('layouts.master')

@section('title')
العملاء

@stop

<!-- breadcrumb -->
@section('PageTitle')
    <span class="m-5">تقرير العملاء</span>


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

                    <div class="card-header pb-0">

                        <form action="/get_client_filter" method="POST" role="search" autocomplete="off">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-lg-3 mg-t-20 mg-lg-t-0" id="invoice_number">
                                    <p class="mg-b-10">البحث بالاسم رقم التليفون</p>
                                    <input type="text" class="form-control" id="name" name="name">

                                </div><!-- col-4 -->

                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-1 col-md-1">
                                    <button class="btn btn-secondary btn-block">بحث</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <br>
                        <br>


                        <div class="table-responsive">
                            @if (isset($details))
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

                                {{--                            <?php $i = 0; ?>--}}

                                @foreach ($details as $client)
                                    <tr>

                                        <td>{{$loop->iteration }}</td>
                                        <td>{{$client->name }}</td>
                                        <td>{{$client->email }}</td>
                                        <td>{{$client->phone }}</td>
                                        <td>{{$client->city->name }}</td>
                                        <td>{{$client->BloodType->name }}</td>
                                        <td>{{$client->donation_list_date }}</td>
                                        <td>

                                            @if($clients->is_active == 1)
                                                <span class="text-success">{{$clients->status}}</span>

                                            @else
                                                <span class="text-danger">{{$clients->status}}</span>
                                            @endif


                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                    data-target="#edit{{ $client->id }}"
                                                    title="تعديل"><i class="fa fa-edit"></i></button>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                    data-target="#delete{{ $client->id }}"
                                                    title="حذف"><i
                                                    class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>


                                @endforeach
                            </table>
                            @endif
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
