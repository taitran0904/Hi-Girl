<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="">
    <title>Admin</title>
    <link href="{{ URL::asset('source/assets/dest/bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('source/assets/dest/bower_components/metisMenu/dist/metisMenu.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('source/assets/dest/dist/css/sb-admin-2.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('source/assets/dest/bower_components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href="source/assets/dest/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
    <link href="source/assets/dest/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Quản lý bài viết</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        {{-- <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li> --}}
                        <li><a href="{{ route('trang-chu') }}"><i class="fa fa-gear fa-fw"></i> Website</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="{{ route('dangxuat') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="{{ route('admin') }}"> Quản lý baner</a>
                        </li>
                        <li>
                            <a href="#"> Quản lý danh mục<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ route('danh-sach-danh-muc') }}">Danh sách danh mục</a>
                                </li>
                                <li>
                                    <a href="{{ route('them-danh-muc') }}">Thêm mới danh mục</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"> Quản lý sản phẩm<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ route('danh-sach-san-pham') }}">Danh sách sản phẩm</a>
                                </li>
                                <li>
                                    <a href="{{ route('them-san-pham') }}">Thêm mới sản phẩm</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                       
                        <li>
                            <a href="#"> Quản lý khách hàng<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ route('danh-sach-khach-hang') }}">Danh sách khách hàng</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        <li>
                            <a href="#"> Quản lý hoá đơn<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ route('danh-sach-hoa-don') }}">Danh sách hoá đơn</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                       
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        @yield('content')

    </div>
    <script src="{{ URL::asset('source/assets/dest/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('source/assets/dest/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('source/assets/dest/bower_components/metisMenu/dist/metisMenu.min.js') }}"></script>
    <script src="{{ URL::asset('source/assets/dest/dist/js/sb-admin-2.js') }}"></script>
    <script src="{{ URL::asset('source/assets/dest/bower_components/DataTables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('source/assets/dest/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js') }}"></script>
</body>

</html>
