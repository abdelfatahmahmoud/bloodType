@extends('layouts.master')
@section('css')


    @section('title')


    @stop

    <!-- breadcrumb -->
    @section('PageTitle')
        <span class="m-5">المنشورات</span>


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
@can('اضافة منشور')
                        <button type="button" class="btn-primary button x-small " data-toggle="modal" data-target="#exampleModal">
                            اضافة منشورات جديدة
                        </button>
                            @endcan
                        <br>
                        <br>
                        <div class="table-responsive">
                            <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                                   style="text-align: center">
                                <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>عنوان</th>
                                    <th>الصورة </th>
                                    <th>الموضوع </th>
                                    <th>القسم </th>
                                    <th>العمليات</th>

                                </tr>
                                </thead>
                                <tbody>

{{--                                <?php $i = 0; ?>--}}

                                @foreach ($posts as $post)
                                    <tr class="text-center">
{{--                                            <?php $i++; ?>--}}
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $post->title }}</td>
                                        <td><img src="{{URL::asset('/uploads/posts/'.$post->image)}}" alt="profile Pic" height="60" width="100"></td>
                                        <td>{{ $post->content }}</td>
                                        <td>{{ $post->category->name }}</td>
                                        <td>
                                            @can('تعديل منشور')
                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                    data-target="#edit{{ $post->id }}"
                                                    title="{{ trans('Grades_trans.Edit') }}"><i class="fa fa-edit"></i></button>

                                            @endcan
                                                @can('حذف منشور')
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                    data-target="#delete{{ $post->id }}"
                                                    title="{{ trans('Grades_trans.Delete') }}"><i
                                                    class="fa fa-trash"></i></button>
                                                @endcan
                                        </td>
                                    </tr>
                                    <div class="modal fade"
                                         id="edit{{ $post->id }}"
                                         tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalLabel"
                                         aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title"
                                                        style="font-family: 'Cairo', sans-serif;"
                                                        id="exampleModalLabel">
                                                        تعديل المنشورات
                                                    </h5>
                                                    <button type="button" class="close"
                                                            data-dismiss="modal"
                                                            aria-label="Close">
                                                                                    <span
                                                                                        aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                    <form class=" row mb-30" action="{{ route('posts.update', 'test') }}" method="POST"  enctype="multipart/form-data">
                                                        {{ method_field('patch') }}
                                                        @csrf
                                                        <div class="card-body">
                                                            <div class="repeater">
                                                                <div data-repeater-list="List_Classes">
                                                                    <div data-repeater-item>
                                                                        <div class="row">
                                                                            <input class="form-control" type="hidden" name="id" value="{{$post->id}}"/>

                                                                            <div class="col">
                                                                                <label for="Name"
                                                                                       class="mr-sm-2">العنوان
                                                                                    :</label>
                                                                                <input class="form-control" type="text" name="title"  value="{{$post->title}}" />
                                                                            </div>

                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="col">

                                                                                <embed src="{{ URL::asset('uploads/posts/'.$post->image) }}" type="application/pdf"   height="150px" width="100px"><br><br>

                                                                                <div class="form-group">
                                                                                    <label for="academic_year">المرفقات : <span class="text-danger">*</span></label>
                                                                                    <input type="file" accept="application/pdf"  name="image">
                                                                                </div>

                                                                            </div>
                                                                        </div>


                                                                    </div>
                                                                    <div class="col ">
                                                                        <label for="Name"
                                                                               class="mr-sm-2">الموضوع
                                                                            :</label>
                                                                        <input class="form-control" type="text" name="contentt"  value="{{$post->content}}" />
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <label for="inputName"
                                                                   class="control-label">الاقسام</label>
                                                            <select name="category_id" class="custom-select"
                                                                    onchange="console.log($(this).val())">
                                                                <!--placeholder-->
                                                                <option value="" selected
                                                                        disabled>الاقسام
                                                                </option>
                                                                @foreach ($category as $categories)
                                                                    <option value="{{ $categories->id }}"> {{ $categories->name }}
                                                                    <option  value="{{ $categories->id }}" {{$post->category_id == $categories->id ?'selected':''}}>{{ $categories->name }}</option>

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
                                        </div>
                                            </form>
                                                </div>
                                            </div>
                                        </div>

                                    </div>


                                    <!-- delete_modal-city -->
                                    <div class="modal fade" id="delete{{ $post->id }}" tabindex="-1" role="dialog"
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
                                                    <form action="{{ route('posts.destroy', 'test') }}"
                                                          method="post">
                                                        {{ method_field('Delete') }}
                                                        @csrf
                                                        :  حذف المدن<span class="alert-danger">{{ $post->name }}</span>
                                                        <input id="id" type="hidden" name="id" class="form-control"
                                                               value="{{ $post->id }}">
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
                        {{--                    add new posts--}}
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                             aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                                            اضافة منشور جديد
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                        <form class=" row mb-30" action="{{ route('posts.store') }}" method="POST"  enctype="multipart/form-data">
                                            @csrf
                                            <div class="card-body">
                                                <div class="repeater">
                                                    <div data-repeater-list="List_Classes">
                                                        <div data-repeater-item>
                                                            <div class="row">

                                                                <div class="col">
                                                                    <label for="Name"
                                                                           class="mr-sm-2">العنوان
                                                                        :</label>
                                                                    <input class="form-control" type="text" name="title" />
                                                                </div>

                                                            </div>
                                                            <div class="form-row">
                                                                <div class="col">
                                                                    <div class="form-group">
                                                                        <label for="academic_year">الصور : <span class="text-danger">*</span></label>
                                                                        <input type="file" accept="application/pdf/jpg/png" name="image" required>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="col ">
                                                            <label for="Name"
                                                                   class="mr-sm-2">الموضوع
                                                                :</label>
                                                            <input class="form-control" type="text" name="contentt" />
                                                        </div>

                                                    </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <label for="inputName"
                                                               class="control-label">الاقسام</label>
                                                        <select name="category_id" class="custom-select"
                                                                onchange="console.log($(this).val())">
                                                            <!--placeholder-->
                                                            <option value="" selected
                                                                    disabled>الاقسام
                                                            </option>
                                                            @foreach ($category as $categories)
                                                                <option value="{{ $categories->id }}"> {{ $categories->name }}
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
