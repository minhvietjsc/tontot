<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@if( isset($setting->title)) {{ $setting->title. ' | ' }} @endif @yield('title') </title>
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('assets/ico/fav.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('assets/ico/fav.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('assets/ico/fav.ico')}}">
    <link rel="apple-touch-icon-precomposed" href="{{asset('assets/ico/fav.ico')}}">
    @if(isset($setting))
    <link rel="shortcut icon" href="{{ asset('assets/images/logo/'.$setting->logo)}}">
    @endif
    <link href="{{ asset('assets/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}?v={{ time() }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/owl.carousel.min.css') }}" rel="stylesheet">

   <!--  <link href="{{ asset('assets/plugins/bxslider/jquery.bxslider.css ') }}" rel="stylesheet"/> -->
    <!-- Sweet Alert -->
    <link href="{{ asset('assets/plugins/bootstrap-sweetalert/sweet-alert.css') }}" rel="stylesheet" type="text/css">

    <!-- DataTables -->
    <link href="{{ asset('assets/plugins/datatables/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/plugins/datatables/buttons.bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>

    <link href="{{ asset('assets/plugins/datatables/dataTables.bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/compo.css') }}" rel="stylesheet" type="text/css" />
    <!-- Notification css (Toastr) -->
    <link href="{{ asset('admin_assets/plugins/toastr/toastr.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/repon.css') }}" rel="stylesheet">
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js')}}"></script>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <script>
        /* ajax post setup for csrf token */
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        paceOptions = {
            elements: true
        };
        var base_url = '<?= url('/') ?>';
    </script>
    <script src="{{ asset('assets/js/pace.min.js') }}"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-127116884-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-127116884-1');
    </script>
    <style type="text/css">
        .form-control{ background-color: white!important;}
    </style>
</head>
<body>
<input type="hidden" id="delete_link" value="<?php echo route('delete'); ?>" >
<input type="hidden" id="get_category_child" value="{{url('category/getCatChildById')}}">
<div id="wrapper">
    <div class="header-top">
        <div class="bg-top">
            <div class="container">
                <div class="pull-left" style="line-height: 28px;font-size: 18px; color: #fff">
                    <span>Hotline:</span> 
                    <span>{{isset($setting) ? $setting->hotline : ''}}</span>
                </div>
                <ul class="top pull-right">
                    <li class="item-top"><a href="#">Chăm sóc khách hàng</a></li>
                    <li class="item-top"><a href="#">Kiểm tra đơn hàng</a></li>
                    @if(Auth::guest())
                        <li class="item-top"><a href="{{route('login')}}">Đăng nhập </a></li>
                        <li class="item-top"><a href="{{route('register')}}"> Đăng ký </a></li>
                    @else
                    <li class="dropdown item-top">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span>{{ ucfirst( Auth::user()->name ) }}</span> <i class="icon-user fa"></i> <i class=" icon-down-open-big fa"></i></a>
                        <ul class="dropdown-menu user-menu">
                            @if(Auth::user()->type == 'adm')
                            <li><a href="{{ url('dashboard') }}"><i class="fa fa-bar-chart"></i> Trang quản trị </a></li>
                            @endif
                            <li><a href="{{ url('user-panel') }}"><i class="icon-home"></i> Dashboard </a></li>

                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class=" icon-logout "></i> Đăng xuất </a></li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </ul>
                    </li>
                    @endif
                    <li class="item-top"><a href="{{route('ads.create')}}">Đăng quảng cáo</a></li>
                    <li class="dropdown item-top">
                        <a><span class="caret"></span> VN</a>
                        <ul class="dropdown-menu user-menu">
                            <li><a href="#">VN</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="header">
            <nav class="navbar navbar-default" role="navigation" style="background-color: {{ isset($setting->nav_bg)? $setting->nav_bg:'' }} !important;">
            
                <div class="container box-menu">
                    <div class="navbar-header">
                        <a href="#" title="" class="ico-menu"> <i class="fa fa-th-list"></i></a>
                        
                        <a class="btn btn-lg pull-right btn-border btn-post btn-danger btn-submit" href="{{route('ads.create')}}">
                            Chèn quảng cáo <img src="{{ asset('assets/img/cam.png') }}" alt="camera" height="25px">
                        </a>
                        <button class="flag-menu country-flag btn btn-default hidden" href="#select-country" data-toggle="modal">
                            <span class="flag-icon flag-icon-us"></span> <span class="caret"></span>
                        </button>
                        <a href="{{url('/')}}" class="navbar-brand logo logo-title">
                            @if(!empty($setting->logo)) 
                            <img src="{{ asset('assets/images/logo/'.$setting->logo)}}" alt="logo" class="img-responsive"> 
                            @else
                            <span>nuomnuop.com</span>
                            @endif
                        </a>
                    </div>
                    <div class="navbar-collapse collapse form-search-top">
                        <form action="{{url('search/query')}}" method="get" id="search_form">
                            <div class="search-row animated fadeInUp">
                                <div class="keyword search-col relative" style="border-radius: 3px 0 0 3px;"><i class="icon-docs icon-append"></i>
                                    <input type="text" name="keyword" class="form-control has-icon" placeholder="Từ khóa tìm kiếm" value="">
                                </div>
                                <div class="location search-col relative locationicon">
                                    <i class="icon-location-2 icon-append"></i>
                                    <select name="region" id="region" class="form-control locinput input-rel searchtag-input has-icon selecters">
                                        <option value="">Chọn khu vực</option>
                                        @foreach($region_top as $value)
                                            <option value="{{ $value->id }}" {{(\Request::has('region') && \Request::get('region') == $value->id) ? 'selected' : ''}}>{{ ucfirst($value->title) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="category search-col relative">
                                    <i class="icon  icon-th icon-append"></i>
                                    <select name="category" class="form-control locinput input-rel has-icon" id="category" >
                                        <option value=""> Chọn danh mục</option>
                                        {!! \App\Http\Controllers\Controller::buildCategory(0, $category_top) !!}
                                    </select>
                                </div>
                                <input id="price_sort" type="hidden" name="price_sort">
                                <div class="search-col btn-submitSearch">
                                    <button class="btn btn-default btn-search btn-block"><i class="icon-search"></i></button>
                                </div>
                                <div class="notify">
                                    @php 
                                        $temp = 0;
                                    @endphp
                                    @if(Auth::check())
                                    @php 
                                        $temp = DB::table('message')->where(['to' => Auth::user()->id, 'is_checked' => 0])->count();
                                    @endphp
                                    @endif
                                    <a class="color-white" href="{{route('message.index')}}">
                                        <span class="fa fa-bell f-20"></span> 
                                        <small class="badge badge-white chat_notify"> {{ $temp }} </small>
                                        <span>Thông báo</span> 
                                    </a>
                                </div>
                                <div class="shop-cart">
                                    <a class="color-white" href="{{route('order.viewCart')}}">
                                        <span class="fa fa-shopping-cart f-20"></span> 
                                        <small id="item-cart" class="badge"> {{\App\Order::countCart()}}</small>
                                        <span>Giỏ hàng</span>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle " type="button" style="background-color: #f68121">
                            <i class="fa fa-search" style="font-size: 28px;margin-top: 5px;color:#fff"></i>
                            <!-- <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span> -->
                        </button>
                </div>
            </nav>
        </div>
    </div>
    @yield('content')

    @include('partials.footer')