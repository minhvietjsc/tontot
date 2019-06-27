@extends('layouts.app')
@section('title', $data->title)
@section('content')
    <style>
        .top-80{ top:80px}
        .list-group-item{  padding: 10px 5px}
        .btn-lg { width: 30%}
        .bx-viewport{ height: auto !important}
        .seller-info .thumbnail {height: 76px; width: 75px !important}
        .company-logo-thumb{float: left}
        .sidebar-panel {
            box-shadow: none;
        }
        .sidebar-panel .panel-heading {
            background: #fff;
        }
        h2.auto-price {
            font-size: 20px;
        }
        .cat-item .item-price {padding-top: 10px;}
        .box-price {
            border-radius: 5px;
            background: #F68121;
            padding: 5px 10px;
            color: #fff;
        }
        .cat-item-ads .ads-item:hover {
            box-shadow: 0px 0px 10px 1px #B6B6B6;
        }
    </style>
<?php
$avator = asset('assets/images/users/male.png');
if(isset($data->user->image)){
    if($data->user->type == 'c' ){
        $avator = asset('assets/images/users/company.png');
    }
    if($data->user->type == 'u' ){
        if($data->user->gender == 'm'){
        if($data->user->gender == 'm'){
            $avator = asset('assets/images/users/male.png');
        }
        if($data->user->gender == 'f'){
            $avator = asset('assets/images/users/female.png');
        }
    }
}else if($data->user->image!= null){
    $avator = asset('assets/images/users/'.$data->user->image.'');
}
}
?>
    <style>
        .media-heading{ padding-left: 5px; font-size: 12px!important; }
        aside.panel.panel-body.panel-details{ padding:5px!important;}
        .key-features .media i {  font-size: 20px;   margin-right: 3px; }
        .text-center{ text-align: center!important; }
        .p-25{padding: 5px 15px 5px 15px;}
        .seller-info img{
            height:100px;
        }
        .main-container .container {
            background: #fff;
            box-shadow: 0px 1px 6px 2px #ccc;
            border-radius: 4px;
        }
        .social-link {
            margin-top: 30px;
            text-align: center;
            margin-left: 50%;
            transform: translate(-60%, -50%);
        }
        h1.auto-heading {
            padding-bottom: 10px;
            border-bottom: 1px dotted #ccc;
        }
        h2.auto-price {
            margin-top: 10px;
        }
        .buy-now:hover, .buy-now:visited, .buy-now:focus, .buy-now{
            background-color: #C72F28!important;
            border: 1px solid #C72F28 !important;
            color: #fff;
        }
        .add-to-cart:hover, .add-to-cart:focus, .add-to-cart{
            background-color: #f68121 !important;
            border: 1px solid #f68121 !important;
            color: #fff;
        }
        .chathead {color: #f68121 !important;}
        #amount {
            width: 40px;
            border-radius: 5px;
            border: 1px solid #ccc;
            text-align: center;
            padding: 2px;
        }
        .btn-minus, .btn-plus {
            border: 1px solid #ccc;
            border-radius: 4px;
        }
    </style>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <div class="main-container">
        <div class="container">
            <div class="row"> 
                @if($setting->single_ads  == 1 && $setting->single_ads_p == 'ah' )
                    <div class="ads_bs m-b-10">
                        {!! $setting->single_adsense !!}
                    </div>
                @endif
                <div class="col-md-9">
                    <ol class="breadcrumb pull-left">
                        <li><span class="date"><i class=" icon-clock"> </i> {{ $data->created_at->diffForHumans() }}</span></li>
                        <li><span class="category"><a href="{{url('search/query?main_category='.$data->category->slug)}}"> {{ ucfirst($data->category->name) }} </a></span></li>
                        <li class="active"><span class="item-location"><i class="fa fa-map-marker"></i> {{ ucfirst($data->city->title) }} </span></li>
                    </ol>
                    <a href="javascript:;" class="pull-right m-t-10"><i class="fa fa-line-chart m-l-10" aria-hidden="true"></i> Lượt xem <span class="">{{ floor($data->visit/2) }}</span></a>
                </div>
                <div class="col-md-3">
                    <div class="pull-right backtolist">
                        <a href="javascript:;" onclick="goBack()"> <i class="fa fa-angle-double-left"></i>  Quay lại kết quả</a>
                    </div>
                </div>
            </div>
            <!-- /row -->
            <div class="row">
                <div class="col-md-4">
                    <div class="ads-image">
                        <div class="bx-wrapper" style="max-width: 100%;"><div class="bx-viewport" style="width: 100%; overflow: hidden; position: relative; height: 304px;">
                                <ul class="bxslider" style="width: 515%; position: relative; transition-duration: 0s; transform: translate3d(-497px, 0px, 0px);">
                                    @if(count($data->ad_images) > 0)
                                        @foreach($data->ad_images as $img)
                                            <li style="float: left; list-style: none; position: relative; width: 497px;" class="bx-clone"><img src="{{ asset('assets/images/listings/'.$img->image.'') }}" alt="img"></li>
                                        @endforeach
                                    @else
                                        <li style="float: left; list-style: none; position: relative; width: 497px;" class="bx-clone"><img src="{{ asset('assets/images/listings/empty.jpg') }}" alt="img"></li>
                                    @endif
                                </ul>
                            </div>
                        </div>

                        <div id="bx-pager">
                            <?php $count = 0; ?>
                            @if(count($data->ad_images) > 0)
                                @foreach($data->ad_images as $img)
                                    <a class="thumb-item-link active" data-slide-index="{{$count}}" href="javascript:void(0);"><img src="{{ asset('assets/images/listings/'.$img->image.'') }}" alt="img"></a>
                                <?php $count++; ?>
                                @endforeach
                                @else
                                <a class="thumb-item-link active" data-slide-index="{{$count}}" href="javascript:void(0);"><img src="{{ asset('assets/images/listings/empty.jpg') }}" alt="img"></a>
                            @endif
                        </div>
                        <div class="row ">
                            <div class="col-sm-12 automobile-left-col social-link">
                                <div class="a2a_kit a2a_kit_size_32 a2a_default_style pull-right m-b-5" style="margin-top: -18px;">
                                    <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                                    <a class="a2a_button_sms"></a>
                                    <a class="a2a_button_facebook"></a>
                                    <a class="a2a_button_twitter"></a>
                                    <a class="a2a_button_whatsapp"></a>
                                    <a class="a2a_button_copy_link"></a>
                                    <a class="a2a_button_facebook_messenger"></a>
                                    <a class="a2a_button_google_plus"></a>
                                </div>
                                <script async src="https://static.addtoany.com/menu/page.js"></script>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-sm-12">
                            <h1 class="auto-heading" style="padding-right: 0; font-size: 24px;">
                                {{ ucfirst($data->title) }} 
                            </h1>
                            @if($setting->hide_price == 0)
                            @if($data->price_option!='')
                            <h2 class="auto-price" style="display: block;position: relative;    text-decoration-line: line-through;">  <span style="color: #292b2c; font-weight: normal;">Giá:</span> {{ $setting->currency_place == 'left' ? $setting->currency : ''  }}{{ number_format($data->price) }} {{  $setting->currency_place == 'right' ? $setting->currency : ''  }}</h2>
                           <h2 class="auto-price" style="display: block;position: relative;">  <span style="color: #292b2c; font-weight: normal;">Giá khuyến mại:</span> {{ $setting->currency_place == 'left' ? $setting->currency : ''  }}{{ number_format($data->price_option) }} {{  $setting->currency_place == 'right' ? $setting->currency : ''  }}</h2>
                            @else 
                            <h2 class="auto-price" style="display: block;position: relative;">  <span style="color: #292b2c; font-weight: normal;">Giá:</span> {{ $setting->currency_place == 'left' ? $setting->currency : ''  }}{{ number_format($data->price) }} {{  $setting->currency_place == 'right' ? $setting->currency : ''  }}</h2>
                            @endif
                            @endif
                        </div>
                    </div>
                    <!-- /row -->
                    <div class="row">
                        <label style="font-size: 16px; color: #292b2c; font-weight: normal;" class="col-md-2">Số lượng: </label>
                        <div class="col-md-5">
                            <button class="btn-minus btn-default btn-small">
                                <i class="fa fa-minus"></i>
                            </button>
                            <input type="text" name="" id="amount" value="1">
                            <button class="btn-plus btn-default btn-small">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /row -->
                    <div class="text-left m-t-20 btn-detail">
                        @if(!Auth::guest() && Auth::user()->chat_lock == 0)
                            <!-- check if user is locked or not in chat setting table -->
                        <?php
                        $is_locked = DB::table('chat_setting')->where([ 'user_id' => Auth::user()->id, 'blocked_user' => $data->user->id ] )->value('blocked_user');

                        ?>
                            @if( $data->user->id != Auth::user()->id && $data->user->is_login == 1 && $is_locked =='' )
                                <button style="margin-right: 3%;" class="btn btn-default btn-lg chathead" data-for="{{ $data->user->id }}"><i class=" icon-chat"></i> Chat ngay </button>
                            @endif
                        @endif
                        
                        <!-- Button trigger modal -->
                        <button onclick="addToCart({{$data->id}})" style="margin-right: 3%;" type="button" class="btn btn-lg add-to-cart"> <i class="fa fa-shopping-cart f-20"></i> Thêm vào giỏ hàng </button>
                        <button onclick="addToCart({{$data->id}}, 'buynow')" type="button" class="btn btn-lg buy-now"> <i class="fa fa-shopping-cart f-20"></i> Mua ngay </button>
                    </div>
                    <aside>
                        <div class="col-md-6" style="padding-left: 0; margin-top: 10px;">
                            <div class="panel sidebar-panel panel-contact-seller">
                                <div class="panel-heading">{{ ( $data->user->type == 'c' )? 'Liên hệ đại lý' : 'Thông tin người bán' }}</div>
                                <div class="panel-content user-info">
                                    <div class="panel-body p-0">
                                        <div class="seller-info" style="position: relative">

                                            <div class="company-logo-thumb col-md-6 row">
                                                <a><img src="{{ $avator }}" class="thumbnail" alt="img"> </a>
                                            </div>
                                            <div class="company-logo-thumb col-md-6 row">
                                                <div class="m-l-5">
                                                    <h3 class="no-margin"> {{ ucwords($data->user->name) }}</h3>
                                                    @if($data->user->is_verified == 2)
                                                        <div class="btn btn-xs btn-success"> Người dùng đã xác minh </div>
                                                    @endif
                                                    @if($data->user->mobile_verify == 1)
                                                        <div style="font-size: 12px;" class="btn btn-xs btn-success m-t-5">Đã xác minh điện thoại</div>
                                                    @endif
                                                    <i> {!!  ($data->user->is_login == 1)? '<span class="label label-success">Online</span>' : '<span class="label label-danger">Offline</span>' !!} </i>

                                                </div>
                                            </div>

                                            <div class="clearfix"></div>
                                            <div class="text-leftt clearfix">

                                                @if($data->user->type == 'c')
                                                    @if($data->user->telephone)
                                                        <p>Số điện thoại: <strong>{{ ucfirst($data->user->telephone) }}</strong></p>
                                                    @endif
                                                    @if($data->user->fax)
                                                        <p>FAX: <strong>{{ ucfirst($data->user->fax) }}</strong></p>
                                                    @endif
                                                    @if($data->user->address)
                                                        <p>Vị trí: <strong>{{ ucfirst($data->user->address) }}</strong></p>
                                                    @endif
                                                @endif

                                                <?php

                                                $user_rated = '';
                                                $rating = DB::table('user_rating')
                                                ->select(DB::raw('count(score) as total, AVG(score) as avg'))
                                                  ->where('user_id', $data->user->id)->first();

                                                if(!Auth::guest()){
                                                    /* check ip recorded rating ? */
                                                    $user_rated = DB::table('user_rating')
                                                        ->where(['user_id' => $data->user->id, 'by_user' => auth::user()->id])
                                                        ->value('id');
                                                }
                                                ?>
                                                @if(!Auth::guest() && auth::user()->id != $data->user->id)
                                                    <div data-toggle="tooltip" id="rating" {{ $user_rated!='' ? 'data-read="true"' : '' }} data-score="{{ floor($rating->avg) }}" class="click" ></div>
                                                @else
                                                    <div id="rating" data-read="true" data-score="{{ floor($rating->avg) }}" class="click" ></div>
                                                @endif

                                            </div>
                                            <div class="clearfix"></div>
                                            <button style="padding: 5px;" type="button" class="btn btn-primary col-md-3" data-toggle="modal" data-target="#contactModalId"> <i class="fa fa-envelope-o" aria-hidden="true"></i> Liên hệ </button>
                                            <a @if($data->user->mobile_verify == 1) title="Đã xác minh điện thoại" @endif id="Mobile_Contact" data-toggle="modal" data-target="#showPhone" class="btn  btn-info col-md-offset-1 col-md-8" onclick="$('#phone_hide').addClass('hidden'); $('#phone_show').removeClass('hidden');"><i class=" icon-phone-1"></i> <span id="phone_hide">Hiển thị số điện thoại</span>
                                                <span id="phone_show" class="hidden">{{ $data->user->phone}}</span>
                                                @if($data->user->mobile_verify == 1)
                                                    <i class="fa fa-check"></i>
                                                @endif
                                            </a>
                                            <div class="clearfix"></div>
                                            <a href="{{ url('user-ads', $data->user->id) }}" class="btn btn-primary btn-block m-t-5"> <i class=" fa fa-user"></i> Xem thêm quảng cáo </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6" style="margin-top: 10px;">
                            <div class="panel sidebar-panel">
                                <div class="panel-heading">Mẹo an toàn cho người mua</div>
                                <div class="panel-content">
                                    <div class="panel-body text-left">
                                        <ul class="list-check">
                                            <li> Gặp người bán ở nơi công cộng</li>
                                            <li> Kiểm tra các mặt hàng trước khi bạn mua</li>
                                            <li> Chỉ trả tiền sau khi nhận hàng</li>
                                        </ul>
                                        <!--<p><a class="pull-right" href="javascript:void(0);"> Know more <i class="fa fa-angle-double-right"></i> </a></p>-->
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if( $setting->single_ads == 1 && $setting->single_ads_p == 'r' )
                            <div class=" inner-box">
                                <!-- ads box -->
                                {!! $setting->single_adsense !!}
                            </div>
                        @endif
                    </aside>
                </div>
            </div>
            <!-- /row -->
            <div class="row ">                   
                @if(count($ad_cf_data) > 0 )
                <div class="col-md-5">
                    <h5 class="list-title"><strong>Thông tin chính</strong></h5>
                    <ul class="list-group">
                        @foreach($ad_cf_data as $index => $value)
                            <?php $type = $value->type ?>
                            @if($value->column_value !='' && $value->img =='' && $value->type !='textarea')
                                <li class="list-group-item">
                                    <span class="data-type">   @if($value->icon !='' || $value->image!='')  {!! ($value->icon!='')? '<i class="'.$value->icon.'"></i>' : '<img src="'.asset('assets/images/c_icons/'.$value->image.'').'" height="20" width="20">' !!} @endif <span class="txt">{{ ucfirst( str_replace('_', ' ', $value->column_name) ) }}</span>  </span>
                                    @if( $type == 'url')
                                        <a class="pull-right" target="_blank" href="{{ $value->column_value  }}"> {{  parse_url($value->column_value, PHP_URL_HOST)  }} </a>
                                        @elseif( $type =='checkbox' || $type == 'radio')
                                        <strong class="media-heading pull-right">{{ (ucfirst($value->column_value) == 1)? 'Yes': ucfirst($value->column_value) }} {{ $value->inscription }}</strong>
                                        @else
                                        <strong class="media-heading pull-right">{{ ucfirst($value->column_value) }} {{ $value->inscription }}</strong>

                                    @endif
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="{{count($ad_cf_data) > 0 ? 'col-md-7' : 'col-md-12' }}">
                    <div class="Ads-Details">
                        <h5 class="list-title"><strong>Chi tiết</strong></h5>
                        <div class="row">
                            <div class="ads-details-info col-md-12">
                                {!! ucfirst($data->description) !!}
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /row -->
            <div class="col-md-12 m-b-20">
                <div class="clearfix"></div>
                <!-- custom fields image and textarea -->
                @if(count($ad_cf_data) > 0 )
                    @foreach($ad_cf_data as $index => $value)
                        @if($value->column_value !=''  && $value->type =='file')
                            <h4 class="data-type list-title">   @if($value->icon !='' || $value->image!='')  {!! ($value->icon!='')? '<i class="'.$value->icon.'"></i>' : '<img src="'.asset('assets/images/c_icons/'.$value->image.'').'" height="20" width="20">' !!} @endif <span class="txt">{{ ucfirst( str_replace('_', ' ', $value->column_name) ) }}</span>  </h4>
                            <div>
                                @if($value->img == 'png' || $value->img == 'jpg' || $value->img == 'jpeg' || $value->img == 'gif')
                                    <img src="{{ asset('assets/images/cf_image/'.$value->column_value.'') }}" alt="" class="img-responsive img-thumbnail" >
                                @else
                                    <h4><a download="" href="{{ asset('assets/images/cf_image/'.$value->column_value.'') }}"> <i class="fa fa-download"></i> {{$value->column_name}}</a></h4>
                                @endif
                            </div>
                        @endif
                    @endforeach
                @endif

                <!-- textarea -->
                @if(count($ad_cf_data) > 0 )
                    @foreach($ad_cf_data as $index => $value)
                        @if($value->column_value !=''  && $value->type =='textarea')
                            <h4 class="data-type list-title">   @if($value->icon !='' || $value->image!='')  {!! ($value->icon!='')? '<i class="'.$value->icon.'"></i>' : '<img src="'.asset('assets/images/c_icons/'.$value->image.'').'" height="20" width="20">' !!} @endif <span class="txt">{{ ucfirst( str_replace('_', ' ', $value->column_name) ) }}</span>  </h4>
                            <div>
                                {{ $value->column_value }}
                            </div>
                        @endif
                    @endforeach
                @endif
                <!-- groups data -->
                @if( count( $groups ) > 0)
                    <?php $count=0; ?>
                    @foreach($groups as $row)
                        <?php $count++;  $i=0; ?>
                        <div class="col-md-12">
                            <h4 class="text-uppercase list-title"> @if($row['group_icon'] !='' || $row['group_image']!='')  {!! ($row['group_icon']!='')? '<i class="'.$row['group_icon'].'"></i>' : '<img src="'.asset('assets/images/groups_icons/'.$row['image'].'').'" height="20" width="20">' !!} @endif  {{ ucwords($row['group_title']) }}</h4>
                            <ul class="list-circle">
                                @foreach($row['group_fields'] as $val)
                                    <?php $i++; ?>
                                    @if($i> 2 )
                                        <h4 class="col-md-12 row " data-if="0" data-str="{{ $row['group_title'] }}" id="main_{{ $count }}" onclick="show_hide(this)"><a href="javascript:void(0)">Hiển thị tất cả {{ $row['group_title'] }}</a></h4>
                                        <?php break; ?>
                                    @else
                                    <p class="col-md-6"> @if($val->icon !='' || $val->image!='')  {!! ($val->icon!='')? '<i class="'.$val->icon.'"></i>' : '<img src="'.asset('assets/images/groups_icons/'.$val->image.'').'" height="20" width="20"> ' !!} @endif  {!! ( $val->column_value == 0)? '<s class="m-l-5"> '.ucfirst( $val->title). '</s>'  : '<span class="m-l-5">'. ucfirst( $val->title) .'</span>'  !!}</p>
                                    @endif

                                @endforeach
                                <?php $i = 0; ?>
                                    @foreach($row['group_fields'] as $val)
                                        <?php $i++; ?>
                                        @if($i> 2 )
                                            <p class="col-md-6 hidden main_{{$count }}"> @if($val->icon !='' || $val->image!='')  {!! ($val->icon!='')? '<i class="'.$val->icon.'"></i>' : '<img src="'.asset('assets/images/groups_icons/'.$val->image.'').'" height="20" width="20"> ' !!} @endif  {!! ( $val->column_value == 0)? '<s class="m-l-5"> '.ucfirst( $val->title). '</s>'  : '<span class="m-l-5">'. ucfirst( $val->title) .'</span>'.$val->column_value   !!}</p>
                                      @endif
                                    @endforeach
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                    @endforeach
                @endif

                <div class="clearfix"></div>

            </div>
            <div class="row" style="padding: 15px;">
                <h5 class="list-title"><strong>Mặt hàng liên quan</strong></h5>
                <div class="cat-item">
                    <div class="row cat-item-ads">  
                        @foreach($suggestProducts as $key => $ad)
                        <div class="col-md-3 col-sm-3 col-xs-3 multiple text-center ads-item">
                            <a title="{{ ucfirst($ad->title) }}" style="margin: auto; display: inline-block;" href="{{url('tin/'.urlencode(str_slug(str_replace(' - ', '', $ad->title.'-'.$ad->id), '-')))}}">
                            <img class="img-responsive" src="{{ asset('assets/images/listings/'.$ad->image) }}" alt="img">
                            <h5 class="add-title">
                                <a title="{{ ucfirst($ad->title) }}" href="{{url('tin/'.urlencode(str_slug(str_replace(' - ', '', $ad->title.'-'.$ad->id), '-')))}}">{{ str_limit(ucfirst($ad->title), 65) }}</a>
                            </h5>
                            @if($setting->hide_price==0)
                            <h5 class="item-price">
                            Giá chỉ <span class="box-price">{{  $setting->currency_place == 'left' ? $setting->currency : ''  }}{{ number_format($ad->price) }} {{  $setting->currency_place == 'right' ? $setting->currency : ''  }} </span></h5>
                           @endif
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Modal contact user-->
<div class="modal fade top-80" id="contactModalId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="loginModelTitleId"> {{ (!Auth::guest())? 'Liên hệ người dùng' : 'Đăng nhập để gửi tin nhắn' }} </h4>
            </div>
            <div class="modal-body">
                <div id="login-container" class="{{ (!Auth::guest())? 'hidden' : '' }}">
                    <div class="text-center">
                        <h2 class="logo-title">
                            <span class="logo-icon"><img src="{{asset('assets/images/logo/logo.jpg')}}" alt=""> </span>
                        </h2>
                    </div>

                    <form id="loginform">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <div class="col-md-12">
                                <label for="email" class=" control-label">E-Mail:</label>
                                <div class="input-icon"><i class="icon-user fa"></i>
                                    <input id="email" type="email" class="form-control" name="email"  required autofocus autocomplete="off">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <label for="password" class="control-label">Mật khẩu:</label>
                                <div class="input-icon"><i class="icon-lock fa"></i>
                                    <input id="password" type="password" class="form-control" name="password" required autocomplete="off">
                                </div>

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" > Ghi nhớ đăng nhập
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 ">
                                <button type="submit" class="btn btn-primary btn-block">Đăng nhập</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="clearfix"></div>
                <div id="Email-container" class="{{ (Auth::guest())? 'hidden' : '' }}">

                    <form id="contactForm" action="">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $data->user->id }}">
                        <input type="hidden" name="ad_id" value="{{ $data->id }}">
                        <div class="form-group">
                            <label for="">Tin nhắn <span class="text-danger">*</span></label>
                            <textarea required class="form-control" name="msg" id="" rows="3" placeholder="Add text here.."></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success"> <i class="icon-mail" aria-hidden="true"></i> Gửi </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                @if(Auth::guest())
                    <a href="{{ route('register') }}" class="btn btn-primary reg_btn">Đăng ký</a>
                @endif
                <button type="button" class="btn btn-info" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal show phone number -->
    <div class="modal fade top-80" id="showPhone" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h3 class="modal-title text-center">  Làm kinh doanh an toàn trên {{ $setting->title }}</h3>
                </div>
                <div class="modal-body text-center">
                    <div class="p-25">
                        <p>
                            Nếu có thể, hãy gặp trực tiếp người bán để giao dịch. Cố gắng tránh các công cụ thanh toán không tin cậy.
                        </p>
                        <h3><i class="fa fa-phone" aria-hidden="true"></i> @if($data->user->phone == '') <span class="text-danger">Không có sẵn!</span>
                            @else
                                {{ $data->user->phone }}
                                @if($data->user->mobile_verify == 1)
                                    <div class="btn btn-xs btn-success ">Đã xác minh điện thoại</div>
                                @endif
                            @endif
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="detail" class="hidden">
        {{ strip_tags(trim(rtrim($data->description))) }}
    </div>

<script src="{{asset('assets/plugins/bxslider/jquery.bxslider.min.js')}}"></script>
<script src="{{asset('assets/js/cookie.js')}}"></script>
    <!-- Rating js -->
    <script src="{{asset('admin_assets/plugins/raty-fa/jquery.raty-fa.js')}}"></script>
<script>
    // detect mobile user
    var is_mobile = !!navigator.userAgent.match(/iphone|android|blackberry/ig) || false;
    $(document).ready(function () {

        var detail = $('#detail').html();

        $('head').append('<meta property="og:url"   content="{{url()->full()}}" />' +
            '  <meta property="og:type"          content="website" />' +
            '  <meta property="og:title"         content="{{ ucfirst($data->title) }}" />' +
            '  <meta property="og:description"   content="'+detail+'" />' +
            '  <meta property="og:image"         content="@if(isset($data->ad_images[0]->orignal_filename)){{ asset('assets/images/listings/'.$data->ad_images[0]->image) }}@endif" /><!-- Twitter Card data -->\n' +
            '<meta name="twitter:card" content="'+detail+'">\n' +
            '<meta name="twitter:site" content="@<?php echo url('/') ?>">\n' +
            '<meta name="twitter:title" content="{{ ucfirst($data->title) }}">\n' +
            '<-- Twitter Summary card images must be at least 120x120px -->\n' +
            '<meta name="twitter:image" content="@if(isset($data->ad_images[0]->orignal_filename)){{ asset('assets/images/listings/'.$data->ad_images[0]->image) }}@endif">');

        if(is_mobile) {
            $('#Mobile_Contact').attr('data-toggle', '').attr('data-target', '');
            $('#Mobile_Contact').attr('href','tel:'+ $('#phone_show').html());
                $('#phone_hide,#phone_show').text('Call');
                $('.chathead').html('<i class=" icon-chat"></i> Chat');
        }
        // ajax submit form
        $("#loginform").submit(function(){
            $('#loading').show();
            var data = new FormData(this);
            $.ajax({
                url: "{{url('user-login')}}",
                data: data,
                contentType: false,
                processData: false,
                type: 'POST',
                success: function(result){
                    if(result!=''){
                        //var obj = $.parseJSON(result);
                        var obj = result;
                        if(obj.msg == 1) {
                            swal('Success', 'Đăng nhập thành công!', 'success');
                            $('#loginModelTitleId').html('Liên hệ người dùng');
                            $('#login-container, .reg_btn').addClass('hidden');
                            $('#Email-container').removeClass('hidden');
                        }else{
                            swal('Error!', 'Mật khẩu không đúng!', 'error');
                        }
                        $('#loading').hide();
                    }
                }
            });
            return false;
        });

        // contact Form
        $("#contactForm").submit(function(){
            $("#contactForm button").html( '<i class="fa fa-spinner fa-spin"></i> đang xử lý...' );

            var data = new FormData(this);
            $.ajax({
                url: "{{url('contact-user')}}",

                data: data,
                contentType: false,
                processData: false,
                type: 'POST',
                success: function(result){
                    if(result!=''){

                        if(result == 1) {
                            $('#contactModalId').modal('hide');
                            swal('Success', 'Gửi tin nhắn thành công!', 'success');
                            window.location.reload();
                        }else{
                            swal('Error!', 'Unknown error!', 'error');
                        }
                        $("#contactForm button").html( 'Gửi' );
                        $("#contactForm textarea").html( '' );
                    }
                }
            });
            return false;
        });
    });
    // start chat function

    $('.chathead').on('click', function () {

        var forchat = $(this).data('for');
        $('#target').val(forchat);

         $.cookie("chatHead", '{{ $data->user->id }}', { path: '/' });
         $.cookie("chatUser", '{{ ucwords($data->user->name) }}', { path: '/' });

        var to = $.cookie('chatHead');

        if(hide_chat != 'hide') {
            $.post(
                    '{{route('load_chat_head')}}',
                    {id: to},
                    function (data) {
                        console.log(data.length);
                        if (data != 0) {
                            //$('#chat .chat').html(data);
                            // scroll down
                            $("#chat .panel-body").scrollTop($("#chat .panel-body")[0].scrollHeight);
                            $('.badge-white').html('0');
                        } else {

                        }
                    }
            );
            $('#chat .input-group').removeClass('hidden');
        }

        if($('#chat .panel-body').hasClass('hidden')){
            if(hide_chat != 'hide') {
                $('#chat .chat').find('center').html('<center> Chưa có cuộc trò chuyện nào! <br> Start chat with <strong>' + $.cookie('chatUser') + '</strong> </center>');
            }
            $('#chat .panel-body,#chat .panel-footer, #chat .btn-settings ').removeClass('hidden');
            $('#chat .btn-indicator').html('<i class="fa fa-angle-up"></i>');
            $("#chat .panel-body").scrollTop($("#chat .panel-body")[0].scrollHeight);
        }else{
            $('#chat .panel-body,.panel-footer').addClass('hidden');
            $('#chat .btn-indicator').html('<i class="fa fa-angle-down"></i>');
        }
    });
    // end chat function

        $('.bxslider').bxSlider({
            pagerCustom: '#bx-pager',
            adaptiveHeight: true
        });

        function show_hide(e){
            var id = $(e).attr('id');
            var str = $(e).data('str');
            var iff = $(e).attr('data-if');

            if(iff == 0){
                $(e).html('<a href="javascript:void(0)"> Ẩn ' + str + '</a>' );
                $(e).attr('data-if', "1");
            }else {
                $(e).attr('data-if', '0');
                $(e).html( '<a href="javascript:void(0)"> Hiển thị toàn bộ ' + str + '</a>' );
            }
            $('.'+id).toggleClass('hidden', 'slow');

        }

    /* ratery  */

    var hint = '{{$rating->total}} phiếu bầu, trung bình {{ floor($rating->avg) }} trên 5';

    (function ($) {
        $(function () {
            $('#readOnly').raty({
                readOnly: true,
                score: 3,
            });

            $('.click').raty({
                readOnly: function(){
                    return $(this).attr('data-read');
                },
                score: function () {
                    return $(this).attr('data-score');
                },
                click: function (score, evt)
                {
                    $.post('{{ route('user-rating') }}',
                        {user_id:'{{ $data->user->id }}', score:score, ip:'{{ $user_ip }}'},
                            function(data){
                                if(data.msg == 1){
                                    $("#rating").html('<span class="text-success">Đã đánh giá '+score+' thành công!</span>');
                                }
                            });
                },
                half: true,
                hints: [hint, hint, hint, hint, hint]
            });
        });
        $('.btn-minus').click(function() {
            const amount = $('#amount').val();
            if(amount > 1) {
                $('#amount').val(parseInt(amount) - 1);
            }
            return;
        });
        $('.btn-plus').click(function() {
            const amount = $('#amount').val();
            $('#amount').val(parseInt(amount) + 1);
            return;
        });
    })(jQuery);

    function addToCart(id, type = '') {
        if(type == 'buynow') {
            location.href = '{{url("/gio-hang")}}?id='+id+'&amount='+$('#amount').val()+'&type=buynow';
        } else {
            $.ajax({
                type: 'GET',
                url: '{{route('order.addToCart')}}',
                data: {id: id, amount: $('#amount').val()},
                success: function(rsp) {
                    if(rsp.success !== undefined && rsp.success === true) {
                        $('#item-cart').text(rsp.amount);
                        $('.alert-page span').text('Thêm vào giỏ hàng thành công!');
                        $('.alert-page').animate({'opacity': 1, 'visibility': 'visible'});
                        setTimeout(function() {
                            $('.alert-page').animate({'opacity': 0, 'visibility': 'hidden'});
                        }, 1500);
                    }
                }
            });
        }
    }

</script>
@endsection
