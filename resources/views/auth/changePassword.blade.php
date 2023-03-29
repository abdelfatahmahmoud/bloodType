@extends('layouts.master')
@section('css')
    @toastr_css

    @section('title')
        تغيير كلمة الرور

    @stop

    <!-- breadcrumb -->
    @section('PageTitle')
        <span class="m-5">تغيير كلمة الرور</span>


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

                        {{--                    add new governorate--}}
                            <form action="{{ route('change_password') }}" method="post">

                                @csrf

                                <div class="repeater">
                                    <div data-repeater-list="List_Classes">
                                        <div data-repeater-item>
                                            <div class="row">
                                                <div class="col">
                                                    <label for="Name"
                                                           class="mr-sm-2">كلمة المرور القديمة
                                                        :</label>
                                                    <input class="form-control" type="password" name="oldPassword" value=""/>
                                                </div>
                                                </div>
                                            <div class="row">
                                                <div class="col">
                                                    <label for="Name"
                                                           class="mr-sm-2">كلمة المرور الجديدة
                                                        :</label>
                                                    <input class="form-control" type="password" name="newPassword" value=""/>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col">
                                                    <label for="Name"
                                                           class="mr-sm-2">كلمة المرور الجديدة
                                                        :</label>
                                                    <input class="form-control" type="password" name="newPassword_confirmation" value=""/>
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


            <!-- add_modal_class -->
        </div>







        <!-- row closed -->
    @endsection
    @section('js')

    @endsection
