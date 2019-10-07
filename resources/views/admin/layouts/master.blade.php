<!DOCTYPE html>
<html lang="en,vi">
<head>
    <title> @yield('title') </title>
    <meta charset="utf-8">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
          name='viewport'/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <link rel="icon" type="image/png" href="{{ URL::asset('public/images/icons/favicon.png') }}"/>
    <link rel="apple-touch-icon" href="">
    <link rel="icon" href="">
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons"/>
    <link rel="stylesheet" href="{{ asset('/public/admin/css/font-awesome.min.css') }}">
    <!-- CSS Files -->
    <link href="{{ asset('/public/admin/css/material-dashboard.min.css?v=2.0.2') }}" rel="stylesheet"/>

    <script src="{{ asset('/public/admin/js/core/jquery.min.js?v=3.2.1') }}"></script>
    <script>
        $(function () {
            $(".nav li a").each(function () {
                var $link = $(this).attr("href");
                var defaultUrl = $link.lastIndexOf('/') + 1;
                var currentUrl = location.pathname;
                var arrCurrentUrl = currentUrl.split('/');
                var urlC = arrCurrentUrl[arrCurrentUrl.length - 2];
                if ($link.substring(defaultUrl) === urlC) {
                    $(this).closest('li').addClass('active');
                }
            })
        });
    </script>

</head>
<body class="">
<div class="wrapper">
    <div class="sidebar" data-color="green" data-background-color="white"
         data-image="{{ asset('/public/admin/images/sidebar-1.jpg') }}">
        <div class="sidebar-wrapper">
            <div class="user">
                <div class="photo">
                    <img id="pp" src="{{ asset('public/images/user.png') }}" alt=""/>
                </div>
                <div class="user-info">
                    <a class="username">
                        <span id="username" class="text-info">Admin</span>
                        <span id="uid" class="text-danger">Thang Vo</span>
                    </a>
                </div>
            </div>
            @include('admin.layouts.menu_nav')
        </div>
    </div>
    <div class="main-panel">
        <nav class="navbar navbar-expand-lg navbar-transparent  navbar-absolute fixed-top">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <div class="navbar-minimize">
                        <button id="minimizeSidebar" class="btn btn-just-icon btn-white btn-fab btn-round">
                            <i class="material-icons text_align-center visible-on-sidebar-regular">more_vert</i>
                            <i class="material-icons design_bullet-list-67 visible-on-sidebar-mini">view_list</i>
                        </button>
                    </div>
                    <a class="navbar-brand" href="{{ url('/') }}">Go Market</a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
                        aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end">
                    <form class="navbar-form">
                        <span class="bmd-form-group">
                            <div class="input-group no-border">
                                <input class="form-control" type="text" value="" placeholder="Gõ từ cần tìm kiếm ..."/>
                                <button class="btn btn-round btn-white btn-just-icon">
                                    <i class="material-icons">search</i>
                                    <div class="ripple-contaiter"></div>
                                </button>
                            </div>
                        </span>
                    </form>
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdownMenuLink" class="nav-link" href="#" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">notifications</i>
                                <span class="notification">5</span>
                                <p class="d-lg-none d-md-block">Thông báo</p>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="#">Có 1 đơn hàng mới mã: #3574</a>
                                <a class="dropdown-item" href="#">Liên hệ từ khách hàng</a>
                                <a class="dropdown-item" href="#">Báo lỗi sản phẩm</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a id="navbarDropdownMenuLink" class="nav-link" href="#pablo" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">person</i>
                                <p class="d-lg-none d-md-block">Account</p>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="#">Xem tài khoản</a>
                                <a class="dropdown-item" href="#">Đăng xuất</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->

        <!-- view content -->

        <div class="content">
            <div class="col-lg-12">
            @if( Session::has('flash_message'))
                <div class="alert alert-danger">
                    {{ Session::get('flash_message') }}
                </div>
            @endif
        </div>
            @yield('content')
        </div>
        <!-- end view content -->
        <!--footer-->
        @yield('admin.layout.footer')
    </div>
</div>
</body>
@include('admin.layouts.script')
</html>
