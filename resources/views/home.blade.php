@extends('layouts.app')
@section('title', 'Sàn Thương mại Điện tử Dịch vụ Nườm Nượp')
@section('content')
<style>
    .img-cat{ height:28px; width: 38px; }
    .slider img{
        min-height: 140px !important;
        width: 270px!important;
    }
  
    .main-container {margin-top: -20px;}
    #myCarousel, #myCarousel img {
        height: 487px;
        /*border: 1px solid #B6B6B6;
        border-left: none;
        box-shadow: 0px 0px 10px 1px #B6B6B6;*/
    }
  .navbar-brand.logo.logo-title{
    width: auto;
    height: 100px;
  }

    .carousel-control {display: none;}
    #myCarousel:hover .carousel-control {display: block;}
    .carousel-inner .item {
        width: 100%;
        overflow: hidden;
    }
    .carousel-inner .item img {
        width: 100%
    }
    .cat-item{
        background: #fff; 
        border: 1px solid #B6B6B6;
        border-right: none;
        margin-top: 10px;
        box-shadow: 0px 0px 10px 1px #B6B6B6;
    }
    .cat-item img {
        width: 100%;
        max-height: 160px;
    }
    .cat-title-home {padding-top: 10px; padding-bottom: 10px;}
    .cat-title-home h2 {display: inline; padding: 0 15px;}
    .cat-item-ads {
        margin-left: 15px;
        margin-right: 15px;
    }
    .cat-item-ads .add-title {
        padding: 0 15px; 
        overflow: hidden;
        word-wrap: break-word;
        height: 2.4rem;
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
<input type="hidden" id="cat-id-active">
<link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
    @if (session('success'))
        <div class="alert alert-success">
            {!! session('success') !!}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">
            {!! session('error') !!}
        </div>
    @endif
    
    <div class="main-container">
        <div class="container">
            <!-- slider -->
            <div class="row slider-top">
                <!-- category -->
                <div class="col-md-2 col-sm-2 col-xs-12" style="padding-right: 0;">
                    <button class=" btn btn-danger click-menu"  > Menu danh sach</button>
                    <ul class="category-leftbar menu-mobile">
                        @foreach($parent_cat as $cat)
                        <li class="category-leftbar-item" data-id="{{$cat['cat']->id}}">
                            <a href="{{url('search/query?main_category='.urlencode($cat['cat']->slug))}}">{{ucfirst($cat['cat']->name)}}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <!-- div category box item -->
                <div class="col-md-10 col-sm-10 col-xs-12 category-box-child"></div>

                <div class="col-md-10 col-sm-10 col-xs-12" style="padding-left: 0;">
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                      <!-- Indicators -->
                      <ol class="carousel-indicators">
                        @foreach($sliders as $key => $slider)
                        <li data-target="#myCarousel" data-slide-to="{{$key}}" class="{{$key == 0 ? 'active' : ''}}"></li>
                        @endforeach
                      </ol>
                      <div class="carousel-inner" role="listbox">
                        
                        @foreach($sliders as $key => $slider)
                        <div class="item {{$key == 0 ? 'active' : ''}}">
                            <a href="{{$slider->link != '' ? $slider->link : '#'}}" title="{{$slider->title}}">
                                <img class="first-slide" src="{{$slider->path}}" alt="{{$slider->title}}">
                            </a>
                          {{-- <div class="container">
                            <div class="carousel-caption">
                              <h1>Example headline.</h1>
                              <p>Note: If you're viewing this page via a <code>file://</code> URL, the "next" and "previous" Glyphicon buttons on the left and right might not load/display properly due to web browser security rules.</p>
                              <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
                            </div>
                          </div> --}}
                        </div>
                        @endforeach

                      </div>
                      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                      </a>
                    </div>
                </div>
<!--  </div>
                <div id="hidden_main_cat" class="col-md-12  p-20">
                <center><h2><span></span> Danh mục </h2></center>

                 <!-- menu cataloge header -->
                 <div class="col-xs-12 col-sm-12 col-md-12 topmenu">
                    <div class="row-featured-category sof_mobi" id = "menu-class-header">
                       @foreach($parent_cat as $item)
                        <a href="{{url('search/query?main_category='.urlencode($item['cat']->slug))}}">
                            <div class="col-md-3 col-sm-3 col-xs-3  f-category">
                                <p>
                                    @if($item['cat']->icon !='')
                                        <i class="{{$item['cat']->icon}} fa-2x"></i>
                                    @else
                                        <img src="{{asset('assets/images/c_icons/'.$item['cat']->image.'')}}" alt="" class="img-cat">
                                    @endif
                                </p>
                                <p>{{ ucfirst($item['cat']->name) }}</p>
                            </div>
                        </a>
                        @endforeach
                    </div> 
                </div>
               <div class="col-xs-12 col-sm-12 col-md-12">
                   <div class="owl-carousel" id="son_mobi">
                         @foreach($parent_cat as $item)
                            <div class="item">
                              <h2><a href="{{url('search/query?main_category='.urlencode($item['cat']->slug))}}">{{ ucfirst($item['cat']->name) }}</a></h2>
                            </div>
                        @endforeach
                    </div>
               </div>
        <!--     </div> --> 
            <!-- list ads by category -->
            @foreach($parent_cat as $cat)
            @if($cat['ads']->count() > 0)
            <div class="cat-item">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 cat-title-home">
                        <h2>{{ucfirst($cat['cat']->name)}}</h2>
                        <a href="{{url('search/query?main_category='.urlencode($cat['cat']->slug))}}">Xem thêm</a>
                    </div>
                </div>
                
                <div class="row cat-item-ads">  
                    @foreach($cat['ads'] as $key => $ad)
                    <div class="col-md-3 col-sm-3 col-xs-6 multiple text-center ads-item">
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
            @endif
            @endforeach
            <!-- end list -->


            <div id="hidden_main_cat" class="col-md-12  p-20">
                <center><h2><span>Tìm theo</span> Danh mục </h2></center>
                <div class="row-featured-category">
                    @foreach($parent_cat as $item)
                        <a href="{{url('search/query?main_category='.urlencode($item['cat']->slug))}}">
                            <div class="col-md-3 col-sm-3 col-xs-3  f-category">
                                <p>
                                    @if($item['cat']->icon !='')
                                        <i class="{{$item['cat']->icon}} fa-2x"></i>
                                    @else
                                        <img src="{{asset('assets/images/c_icons/'.$item['cat']->image.'')}}" alt="" class="img-cat">
                                    @endif
                                </p>
                                <p>{{ ucfirst($item['cat']->name) }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
            <div class=" p-b-10 page-content">
            @if( isset($setting))
             @if( $setting->home_ads_p != 'r' || $setting->home_ads == 0 )
                <div class=" p-b-10 page-content">
             @else
                <div class=" p-b-10 page-content col-md-9">
             @endif
            @endif

            <div id="MainCategory" class="box-title no-border">
                <div class="inner text-center">
                    <h2>Danh mục </h2>
                </div>
            </div>
                <div id="MainCategory">
                    <div class="row-featured-category">
                        @foreach($parent_cat as $item)
                            <a href="{{url('search/query?main_category='.urlencode($item['cat']->slug))}}">
                            <div class="col-md-2 col-sm-2 col-xs-2 f-category">
                                <p>
                                    @if($item['cat']->icon !='')
                                        <i class="{{$item['cat']->icon}} fa-3x"></i>
                                    @else
                                        <img src="{{asset('assets/images/c_icons/'.$item['cat']->image.'')}}" alt="" class="img-cat">
                                    @endif
                                </p>
                                <p>{{ ucfirst($item['cat']->name) }}</p>
                            </div>
                        </a>
                    @endforeach
                    </div>
                </div>
            </div>
            @if( isset($setting->home_ads) && $setting->home_ads  == 1 && $setting->home_ads_p == 'r' )
                <div class="col-sm-3 page-sidebar col-thin-left">
                    <aside>
                        <div class="inner-box">
                            {!! $setting->home_adsense !!}
                        </div>
                        <div class="inner-box no-padding"><img class="img-responsive" src="images/add2.jpg" alt="">
                        </div>
                    </aside>
                </div>
            @endif
        </div>
        <!-- slider  -->
                                                
    <div class="clearfix" style="clear: both"></div>

        @if( count($home_ads) > 0 )
            <div class="col-xl-12 content-box m-t-20">
                <div class=" row-featured">
                    <div class="col-xl-12  box-title ">
                        <div class="inner p-l-r-10">
                            <h2>
                                Quảng cáo <span>nổi bật</span>
                            </h2>
                        </div>
                    </div>
            <!--/.item-list-->
                    @foreach($home_ads as $h_ads)
                        <div class="col-md-3">
                            <div class="item-list">
                                <div class="row">
                                    <div class="no-padding photobox">
                                        <div class="add-image"><span class="photo-count"><i class="fa fa-camera"></i> {{ \App\AdsImages::where('ad_id', $h_ads->id)->count() }} </span>
                                            <a href="{{url('single/'.urlencode(strtolower(str_replace(' ', '-', $h_ads->title.'-'.$h_ads->id)))  )}}">
                                                <img class=" no-margin" src="{{ asset('assets/images/listings/'.$h_ads->image) }}" alt="img">
                                            </a>
                                        </div>
                                    </div>
                                    <a class="pull-left" href="{{url('single/'.urlencode(strtolower(str_replace(' ', '-', $h_ads->title.'-'.$h_ads->id)))  )}}"><strong> {{ ucfirst($h_ads->title) }} </strong> </a>
                                    <a class="pull-right" href="{{url('single/'.urlencode(strtolower(str_replace(' ', '-', $h_ads->title.'-'.$h_ads->id)))  )}}"> <strong> {{  $setting->currency_place == 'left' ? $setting->currency : ''  }}{{ number_format($h_ads->price) }} {{  $setting->currency_place == 'right' ? $setting->currency : ''  }} </strong> </a>

                                    <div class="clearfix"></div>

                                    <!--/.add-desc-box-->
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

    <div class="clearfix" style="clear: both"></div>

    @if( count($home_ads) == -1 )
        @if( count($newAds) > 0 )
        <div class="col-xl-12 content-box m-t-20">
            <div class=" row-featured">
                <div class="col-xl-12  box-title ">
                    <div class="inner p-l-r-10">
                        <h2>
                            DANH SÁCH <span>NỔI BẬT</span>
                        </h2>
                    </div>
                </div>

                <div style="clear: both"></div>
                <div class=" relative  content featured-list-row  w100">
                    <div class="slider autoplay">
                        @foreach($newAds as $ad)
                        <div class="multiple text-center">
                            <a style="margin: auto; display: inline-block;" href="{{url('single/'.urlencode(strtolower(str_replace(' ', '-', $ad->title.'-'.$ad->id)))  )}}">
                            <img class="img-responsive" src="{{ asset('assets/images/listings/'.$ad->image) }}" alt="img" style="height: 100px !important;">
                            <h5 class="add-title" style="padding: 0 15px; overflow: hidden;word-wrap: break-word;">
                                <a title="{{ ucfirst($ad->title) }}" href="{{url('single/'.urlencode(strtolower(str_replace(' ', '-', $ad->title.'-'.$ad->id)))  )}}">{{ ucfirst($ad->title) }}</a>
                            </h5>
                            @if($setting->hide_price==0)
                               <h2 class="item-price text-danger"> {{  $setting->currency_place == 'left' ? $setting->currency : ''  }}{{ number_format($ad->price) }} {{  $setting->currency_place == 'right' ? $setting->currency : ''  }} </h2>
                           @endif
                            </a>
                            
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endif
    @endif

        @if(count($regionAds) == -1)
        <div class="col-xl-12 content-box ">
            <div class=" row-featured">
                <div class="col-xl-12  box-title ">
                    <div class="inner p-l-r-10">
                        <h2>
                            <span><i class="icon-location-2"></i> Vị trí hàng đầu</span>
                        </h2>
                    </div>
                </div>
                <div class="col-xl-12 tab-inner">
                    <div class="row cat-list arrow">
                        @foreach($regionAds as $val)
                        <li class="cat-list col-md-3  col-6 col-xxs-12">
                            <a href="{{ url('search/query') }}?region={{ $val->id }}"> {{$val->title}} <small class="label label-success">{{ \App\Ads::where(['region_id' => $val->id, 'status' => 1])->count() }}</small></a>
                        </li>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
    <div class="page-info stat_bg m-t-20" style="background-size: cover!important;background-position: bottom;">
        <div class="bg-overly">
            <div class="container text-center section-promo">
                <div class="row">
                    <div class="col-sm-3 col-xs-6 col-xxs-12">
                        <div class="iconbox-wrap">
                            <div class="iconbox">
                                <div class="iconbox-wrap-icon">
                                    <i class="icon  icon-group"></i>
                                </div>
                                <div class="iconbox-wrap-content">
                                    <h5><span>{{ number_format( \App\User::where(['type' => 'u'])->count() ) }}</span></h5>
                                    <div class="iconbox-wrap-text">Người bán tin cậy</div>
                                </div>
                            </div>
                            <!-- /..iconbox -->
                        </div>
                        <!--/.iconbox-wrap-->
                    </div>

                    <div class="col-sm-3 col-xs-6 col-xxs-12">
                        <div class="iconbox-wrap">
                            <div class="iconbox">
                                <div class="iconbox-wrap-icon">
                                    <i class="icon  icon-th-large-1"></i>
                                </div>
                                <div class="iconbox-wrap-content">
                                    <h5><span>{{ number_format( \App\Category::where('parent_id', '!=', 0)->count() ) }}</span></h5>

                                    <div class="iconbox-wrap-text">Danh mục</div>
                                </div>
                            </div>
                            <!-- /..iconbox -->
                        </div>
                        <!--/.iconbox-wrap-->
                    </div>
                    <div class="col-sm-3 col-xs-6  col-xxs-12">
                        <div class="iconbox-wrap">
                            <div class="iconbox">
                                <div class="iconbox-wrap-icon">
                                    <i class="icon  icon-map"></i>
                                </div>
                                <div class="iconbox-wrap-content">
                                    <h5><span>{{ number_format(\App\City::count()) }}</span></h5>
                                    <div class="iconbox-wrap-text">Vị trí</div>
                                </div>
                            </div>
                            <!-- /..iconbox -->
                        </div>
                        <!--/.iconbox-wrap-->
                    </div>
                    <div class="col-sm-3 col-xs-6 col-xxs-12">
                        <div class="iconbox-wrap">
                            <div class="iconbox">
                                <div class="iconbox-wrap-icon">
                                    <img src="{{asset('assets/images/spk-icon.png')}}" alt="ad-icon" height="40">
                                </div>
                                <div class="iconbox-wrap-content">
                                    <h5><span>{{ number_format( \App\Ads::where(['status' => 1])->count() ) }}</span></h5>
                                    <div class="iconbox-wrap-text"> Quảng cáo hoạt động </div>
                                </div>
                            </div>
                            <!-- /..iconbox -->
                        </div>
                        <!--/.iconbox-wrap-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/slick.js') }}"></script>

    <script>
        $(document).ready(function () {
            $('.autoplay').slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000,
            });
        })
    </script>
    <script>
      var owl = $('.owl-carousel');
        owl.owlCarousel({
        margin: 10,
        loop: true,
        autoplay: true,
        autoplayTimeout: 4000,
        autoplayHoverPause: true,
        responsive: {
          0: {
            items: 1
          },
          600: {
            items: 2
          },
          1000: {
            items: 3
          }
        }
      })
    </script>

@endsection

