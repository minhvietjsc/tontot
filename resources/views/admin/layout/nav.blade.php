@include('admin.update.check_update')
<?php
$version_update = updateCurl('http://apps.ranksol.com/app_updates/classified_app/update.php?ver='.$setting->version.'&time='.time(), 'post');
/*
print_r($version_update);
die();*/
if($version_update!=''){
    \Session::put('up_version', json_decode($version_update) );
}
?>
<!-- Top Bar Start -->
<div class="topbar">
    <!-- LOGO -->
    <div class="topbar-left">
        <a href="{!! url('/') !!}" class="logo"><span> {{ $setting->title }} </span><i class="mdi mdi-cube"></i></a>
    </div>
    <!-- Button mobile view to collapse sidebar menu -->
    <div class="navbar navbar-default" role="navigation">
        <div class="container">
            <a href="{{ url('/') }}" class="btn btn-primary m-t-15 "> Truy cập website </a>
            @if($setting->translate == 1)
            <a class="btn btn-primary btn-sm m-t-15" style="padding: 0px 4px 3px 6px !important;" id="google_translate_element"></a>
            @endif
            <!-- Navbar-left -->
            <ul class="nav navbar-nav navbar-left">
                <li>
                    <button class="button-menu-mobile open-left waves-effect waves-light">
                        <i class="mdi mdi-menu"></i>
                    </button>
                </li>
                <li class="hidden-xs">
            </ul>
            <!-- Right(Notification) -->
            <ul class="nav navbar-nav navbar-right">

                <li class="dropdown user-box">
                    <a href="" class="dropdown-toggle waves-effect waves-light user-link" data-toggle="dropdown" aria-expanded="true">
                        <img src="<?= (Auth::user()->image !="")? asset('assets/images/users/'.Auth::user()->image) : asset('assets/images/user_hidden.png') ?>" alt="user-img" class="img-circle user-img profile-img">
                    </a>

                    <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right user-list notify-list">
                        <li>
                            <h5> Xin chào, <span id="user_name"> {{ Auth::user()->name }} </span> </h5>
                        </li>
                        <li><a href="{{ url('profile')  }}"><i class="ti-user m-r-5"></i> Thông tin Tài khoản</a></li>

                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="ti-power-off m-r-5"></i> Đăng xuất
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                    </ul>
                </li>
            </ul> <!-- end navbar-right -->
        </div><!-- end container -->
    </div><!-- end navbar -->
</div>
<!-- Top Bar End -->

<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- User detail -->
            <div class="user-details">
                <div class="overlay"></div>
                <div class="text-center">
                    <img src="<?= (Auth::user()->image !="")? asset('assets/images/users/'.Auth::user()->image) : asset('assets/images/user_hidden.png') ?>" alt="" class="img-thumbnail profile-img" style="height: 45px;">
                </div>
                <div class="user-info">
                    <div>
                        <a href="#setting-dropdown" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> {{ Auth::user()->name }} <span class="mdi mdi-menu-down"></span></a>
                    </div>
                </div>
            </div>
            <!-- end user detail -->

            <div class="dropdown" id="setting-dropdown">
                <ul class="dropdown-menu">
                    <li><a href="{{ url('profile')  }}"><i class="mdi mdi-face-profile m-r-5"></i> Thông tin Tài khoản</a></li>
                    <li><a href=""><i class="mdi mdi-account-settings-variant m-r-5"></i> Cài đặt</a></li>
                    <li>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="ti-power-off m-r-5"></i> Đăng xuất
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </div>
            <ul>
            
                <?php 
                
                $ver_update = json_decode($version_update);
                if(isset($ver_update->updates)) 
                {
                    
                ?>
                <li class="">
                    <a href="{{ url('update-version') }}" class="waves-effect active">
                        <i class="mdi mdi-access-point"></i>
                        <span class="badge badge-danger pull-right">Mới</span>
                        <span>Nâng cấp phiên bản  <?php $ver = \Session::get('up_version'); echo isset($ver->version)?$ver->version:'';  ?></span>
                    </a>
                </li>
                <?php } ?>
                <li class="menu-title">Điều hướng</li>
                <li><a href="{{ url('dashboard') }}" class="waves-effect"><i class="mdi mdi-view-dashboard"></i><span> Dashboard </span> </a></li>
                <li>
                    <a href="{{ url('users') }}" class="waves-effect">
                        <i class="fa fa-user"></i>
                        <span> Quản lý Người dùng</span> 
                    </a>
                </li>
                <li>
                    <a href="{{ url('employees') }}" class="waves-effect">
                        <i class="fa fa-users"></i>
                        <span> Quản lý nhân viên</span> 
                    </a>
                </li>
                <li>
                    <a href="{{ route('order.index') }}" class="waves-effect">
                        <i class="fa fa-shopping-cart"></i>
                        <span> Quản lý Đơn hàng</span> 
                    </a>
                </li>
                <li><a href="{{ route('ads.index') }}" class="waves-effect"><i class="fa fa-tv" aria-hidden="true"></i><span> Quản lý Quảng cáo</span> </a></li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-file"></i> <span>Quản lý trang</span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('custom-page.index') }}">Tạo trang</a></li>
                        <li><a href="{{ route('custom-page.create') }}">Danh sách trang</a></li>

                    </ul>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-cog"></i> <span>Cài đặt</span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{!! Route('setting.create') !!}">Cấu hình Website</a></li>
                        <li><a href="{!! Route('setting.index') !!}">Cài đặt Adsense</a></li>
                        <li><a href="{!! Route('email-settings.index') !!}">Cài đặt Email</a></li>
                        <li><a href="{!! Route('featured-ads.index') !!}">Cài đặt quảng cáo nổi bật</a></li>
                        @if($setting->mobile_verify == 1)
                        <li><a href="{!! Route('mobile_verify.index') !!}">Xác minh bằng điện thoại di động</a></li>
                        @endif
                    </ul>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-list-alt"></i> <span>Quản lý Danh mục</span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('category.create') }}" class="waves-effect"><i class="fa fa-plus"></i><span>Thêm mới</span> </a></li>
                        <li><a href="{{ route('category.index') }}" class="waves-effect"><i class="fa fa-list"></i><span>Danh sách</span> </a></li>
                    </ul>
                </li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-files-o"></i> <span>Quản lý Nhóm</span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('groups.create') }}" class="waves-effect"><i class="fa fa-plus"></i><span>Thêm mới</span> </a></li>
                        <li><a href="{{ route('groups.index') }}" class="waves-effect"><i class="fa fa-list"></i><span>Danh sách</span> </a></li>
                    </ul>
                </li>

                 <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-map-marker"></i> <span>Quản lý Vị trí</span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{ url('region') }}" class="waves-effect"><i class="fa fa-plus"></i><span>Khu vực</span> </a></li>
                        <li><a href="{{ url('city') }}" class="waves-effect"><i class="fa fa-plus"></i><span>Thành phố</span> </a></li>
                    </ul>
                </li>
                <!-- Custom Fields -->
                <li><a href="{{ url('customfields') }}" class="waves-effect"><i class="fa fa-list"></i><span>Quản lý trường(field)</span></a></li>

                <!-- Sliders -->
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-file"></i> <span>Quản lý slider ảnh</span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('slider.vAdd') }}">Thêm ảnh cho slider</a></li>
                        <li><a href="{{ route('slider.index') }}">Danh sách ảnh slider</a></li>

                    </ul>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
        <div class="clearfix"></div>
    </div>
    <!-- Sidebar -left -->
</div>
