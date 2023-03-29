<!-- Main Sidebar Container -->
<aside class="main-sidebar  elevation-4">
    <!-- Brand Logo -->


    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{url::asset('admin/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
{{Auth::user()->name}}
            </div>
        </div>

        <!-- SidebarSearch Form -->


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
               @can('المحافظات')
                <li class="nav-item menu-open">
                    <a href="{{route('governorate.index')}}" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            المحافظات
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                </li>
                @endcan

                @can('المدن')
                <li class="nav-item menu-open">
                    <a href="{{route('cities.index')}}" class="nav-link ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            المدن
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                </li>
                @endcan

                @can('الاقسام')
                <li class="nav-item menu-open">
                    <a href="{{route('categories.index')}}" class="nav-link ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            الاقسام
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                </li>
                @endcan

                @can('المنشورات')
                <li class="nav-item menu-open">
                    <a href="{{route('posts.index')}}" class="nav-link ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            المنشورات
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                </li>
                @endcan


                    <li class="nav-item menu-open">
                        <a href="{{route('bloodtype.index')}}" class="nav-link ">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                الفصائل
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>

                    </li>



            @can('العملاء')
                <li class="nav-item menu-open">
                    <a href="{{route('clients.index')}}" class="nav-link ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            العملاء
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                </li>
                @endcan



                @can('قائمة التبرع')
                <li class="nav-item menu-open">
                    <a href="{{route('donation_request.index')}}" class="nav-link ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            طلبات التبرع
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                </li>
                @endcan

                @can('قائمة الرسائل')
                <li class="nav-item menu-open">
                    <a href="{{route('contact.index')}}" class="nav-link ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            اتصل بنا
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                </li>
                @endcan

                @can('الاعدادات')
                <li class="nav-item menu-open">
                    <a href="{{route('setting.index')}}" class="nav-link ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            الاعدادات
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>


                </li>
                @endcan


@can("المستخدمين")

                    <li class="nav-item menu-open">
                        <a href="{{route('users.index')}}" class="nav-link ">
                                        <i class="nav-icon fas fa-tachometer-alt"></i>
                                        <p>
                                            قائمة المستخدمين
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                </li>
                @endcan

@can('عرض صلاحية')
                    <li class="nav-item menu-open">
                                    <a href="{{route('roles.index')}}" class="nav-link ">
                                        <i class="nav-icon fas fa-tachometer-alt"></i>
                                        <p>
                                            صلاحيات المستخدمين
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a></li>
                @endcan

                <li class="nav-item menu-open">
                    <a href="get_password" class="nav-link ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                           تغيير كلمة المرور
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>


                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
