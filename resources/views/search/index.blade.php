@extends('layouts.app')
@section('title', isset($category) ? $category->name : 'Kết quả tìm kiếm')
@section('content')
<style>
  .price-box img{height: 20px!important; }
  .irs-single{ margin-left: 9px; }
  .btn-auths{ padding: 2px 7px !important; }
  .ads-details .btn{ white-space: normal;  }
  input[type='text'].form-control{ padding: 5px 5px }
  .form-control{border: 1px solid #c0c0c0; height: 38px !important; }
  #cf_field .col-md-2{
    padding: 0 1px!important;
  }
  #cf_field .col-md-2:first-child{
    padding-left: 5px!important;
  }
</style>
<!-- ION Slider -->
<link href="{{ asset('assets/plugins/ion-rangeslider/ion.rangeSlider.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/plugins/ion-rangeslider/ion.rangeSlider.skinFlat.css') }}" rel="stylesheet" type="text/css"/>

<?php
$req_region = $req_keyword = $req_price_sort = $low_price = $high_price = $online= '';

if(isset($_REQUEST['online']))
  $online = $_REQUEST['online'];
if(isset($_REQUEST['region']))
  $req_region = $_REQUEST['region'];
if(isset($_REQUEST['keyword']))
  $req_keyword = $_REQUEST['keyword'];
if(isset($_REQUEST['price_sort']))
  $req_price_sort = $_REQUEST['price_sort'];
if(isset($_REQUEST['price_range'])){
  $price_exp = explode(';', $_REQUEST['price_range']);
  $low_price = $price_exp[0];
  $high_price = $price_exp[1];
}else{
  $low_price = 1;
  $high_price = 10000000;
}
$image = 1;
if(isset($_REQUEST['image']))
  $image = $_REQUEST['image'];
?>
@if($setting->search_ads  == 1 && $setting->search_ads_p == 'bs' )
<div class="search-row-wrapper">
  <div class="container">
    <div class="ads_bs m-b-10">
      {!! $setting->search_adsense !!}
    </div>
  </div>
</div>
@endif

<div class="main-container">
  <div class="container">
    <div class="row">
      @if($setting->search_ads  == 1 && $setting->search_ads_p == 'as' )
      <div class="ads_bs m-b-10">
        {!! $setting->search_adsense !!}
      </div>
      @endif
    </head>
    <body>
      <div class="menu-chil">
        <ul>
          <?php 
            foreach ($parent_cat as $key=>$value){ 
              echo '<li><a href="'.url("search/query?main_category=".urlencode($value["cat"]->slug)).'">'.$value['cat']["name"].'</a></li>';
            } 
          ?>
        </ul>  
      </div>
      <div class="col-sm-9 page-content col-thin-left">
        <div class="category-list">
          <div class="tab-box ">
            <ul class="nav nav-tabs add-tabs" id="ajaxTabs" role="tablist">

              @if (session('error'))
              <span class="label label-danger m-l-10">{{ session('error') }}</span>
              @endif
            </ul>
            <div class="tab-filter">
             <!--  <select class="selectpicker select-sort-by" data-style="btn-select" data-width="auto" onchange="sortPrice(this.value)">
                <option value="">Sắp xếp theo </option>
                <option value="asc">Giá: Thấp đến Cao</option>
                <option value="desc">Giá: Cao xuống Thấp</option>
              </select> -->
            </div>
          </div>

          <div class="listing-filter">
            <div class="pull-left col-xs-6 col-xs-12">
              <h2>Quảng cáo nổi bật</h2>
            </div>
            <div class="pull-right col-xs-6 col-xs-12 text-right listing-view-action">
              <p>Chế độ xem : </p>
              <span class="list-view active"><i class="icon-th 2x"></i></span>
              <span class="compact-view"><i class=" icon-th-list 2x"></i></span>
              <span class="grid-view "><i class=" icon-th-large 2x" style="margin-right: 4px"></i></span>
            </div>
            <!--<form action="" id="custom_data">-->
              <div id="cf_field">
                @foreach($search_fields as $item)
                <div class="col-md-2">
                  <label for="">{{ucfirst($item->name)}}:</label>
                  <select name="custom_search[{{ strtolower( str_replace(' ', '_', $item->name) ) }}]" form="search_form" onchange="$('#loading').show();$('#search_form').submit()" class="form-control">
                    <option value="">All {{ucfirst($item->name)}} </option>
                    @foreach(explode(',', $item->options) as $value)
                    <option @if(isset($_REQUEST['custom_search'][strtolower( str_replace(' ', '_', $item->name) )]) && $value == $_REQUEST['custom_search'][strtolower( str_replace(' ', '_', $item->name) )]) selected @endif       value="{{$value}}">{{ ucwords($value) }}</option>
                    @endforeach
                  </select>
                </div>
                @endforeach
              </div>
              <!--</form>-->
              <div class="clearfix"></div>
            </div>

            <div class="mobile-filter-bar col-lg-12  ">
              <ul class="list-unstyled list-inline no-margin no-padding">
                <li class="filter-toggle">
                  <a class="">
                    <i class="icon-th-list"></i>
                    Lọc
                  </a>
                </li>
              </ul>
            </div>
            <div class="menu-overly-mask"></div>
            <div class="adds-wrapper">
              <div class="tab-content">
                <div class="tab-pane active">
                  @if(count($result) > 0)
                  @foreach($result as $v)
                  <!-- urgent top page price -->
                  @if($v->f_type == 'top_page_price' || $v->f_type == 'urgent_top_price')

                  <div class="item-list make-grid m-b-20" style="background: #ececec;min-height: 366px;">
                   @if($v->f_type == 'urgent_top_price')
                   <div class="cornerRibbons urgentAds">
                     <a href="#"> Khẩn cấp</a>
                   </div>
                   @endif
                   <div class="col-md-2 no-padding photobox">
                     <div class="add-image"><span class="photo-count">
                      <i class="fa fa-camera"></i> {{ count($v->ad_images) }} </span>
                      <a href="{{url('tin/'.urlencode(str_slug(str_replace(' - ', '', $v->title.'-'.$v->id), '-')))}}">
                       <img class="thumbnail no-margin" src="{!! asset('assets/images/listings/'.(isset($v->ad_images[0]->image)? $v->ad_images[0]->image : 'empty.jpg').'') !!}" alt="img">
                     </a>
                   </div>
                 </div>
                 <!--/.photobox-->
                 <div class="col-sm-8 add-desc-box col-md-7">

                   <div class="ads-details">
                     <h1 class="add-title"><a href="{{url('tin/'.urlencode(str_slug(str_replace(' - ', '', $v->title.'-'.$v->id), '-')))}}">{{ ucfirst($v->title) }} </a></h1>
                     <span class="info-row">
                      <!--<span class="add-type business-ads tooltipHere" data-toggle="tooltip" data-placement="right" title="Business Ads">B </span>-->
                      <span class="date"><i class=" icon-clock"> </i> {{ $v->created_at->diffForHumans() }} </span>
                      - <span class="category">{{ $v->category->name }} </span>-
                      <span class="item-location"><i class="fa fa-map-marker"></i> {{ ucwords( $v->city->title ) }}</span>
                      - <span data-toggle="tooltip" data-placement="top" title="" data-original-title="{{ floor($v->visit/2) }} Xem quảng cáo "><i class="fa fa-eye" aria-hidden="true"> {{ floor($v->visit/2) }}</i></span>
                      - <span data-toggle="tooltip" data-placement="top" title="" data-original-title="{{ floor($v->message) }} Tin nhắn "><i class="fa fa-envelope-o" aria-hidden="true"> {{ floor($v->message) }}</i></span>
                    </span>
                  </div>

                  <div class="ads-details m-t-10">
                   @foreach($v->ad_cf_data as $data)
                   @if($data->column_value!='')
                   <span class="label label-default">@if($data->icon!='' || $data->image !='')  {!! ($data->icon!='')? '<i class="'.$data->icon.'"></i>' : '<img src="'.asset('assets/images/c_icons/'.$data->image.'').'" height="38" width="30" >' !!} @endif <strong>{{ ucfirst(str_replace('_', ' ', $data->column_name)) }}: </strong><span class="m-r-5 p-5"> {{$data->column_value}}</span></span>
                   @endif
                   @endforeach
                 </div>
               </div>
               <!--/.add-desc-box-->
               <div class="col-md-3 text-right  price-box">
                 @if($setting->hide_price==0)
                 <h2 class="item-price text-danger"> {{  $setting->currency_place == 'left' ? $setting->currency : ''  }}{{ number_format($v->price) }} {{  $setting->currency_place == 'right' ? $setting->currency : ''  }} </h2>
                 @endif
                 @if(isset($v->user->is_verified) && $v->user->is_verified==2)
                 <a class="btn bg-white  btn-sm btn-auths" > <img src="{{ asset('assets/img/vfy.png') }}" title="Người dùng đã xác minh" alt="" height="22px"> <span>Người dùng đã xác minh</span> </a>
                 @endif

               </div>
               <!--/.add-desc-box-->
               <div class="job-actions pull-right">
                 <ul class="list-unstyled list-inline">
                   @if(!Auth::guest())
                   <li>
                     <a class="save-add"  data-action="{{ (count($v->save_add) > 0)? 'del': 'ins' }}" data-id="{{$v->id}}" href="javascript:void(0)" title="" >
                       @if(count($v->save_add) > 0)
                       <span class="fa fa-star"></span>
                       <span class="text">Đã lưu thêm</span>
                       @else
                       <span class="fa fa-star-o"></span>
                       <span class="text">Lưu thêm</span>
                       @endif
                       <span class=" hidden fa fa-spinner fa-spin"></span>
                     </a>
                   </li>
                   @endif
                   <li class="saved-job">
                     @if($v->is_login)
                     <a class=""> <i class="fa fa-circle text-success"></i> <span>Online</span> </a>
                     @else
                     <a class=""> <i class="fa fa-circle text-danger"></i> <span>Offline</span> </a>
                     @endif
                   </li>
                 </ul>
               </div>
             </div>
             @endif
             <!-- End urgent top page price -->
             @if($v->f_type == 'urgent_price' || $v->f_type == '' || $v->f_type == 'home_page_price')
             <div class="item-list make-list " style="">
              @if($v->f_type == 'urgent_price')
              <div class="cornerRibbons urgentAds">
                <a href="#"> Khẩn cấp</a>
              </div>
              @endif
              <div class="col-md-2 col-xs-6 col-sm-6 no-padding photobox">
                <div class="add-image"><span class="photo-count">
                  <i class="fa fa-camera"></i> {{ count($v->ad_images) }} </span>
                  <a href="{{url('tin/'.urlencode(str_slug(str_replace(' - ', '', $v->title.'-'.$v->id), '-')))}}">
                    <img class="thumbnail no-margin" src="{!! asset('assets/images/listings/'.(isset($v->ad_images[0]->image)? $v->ad_images[0]->image : 'empty.jpg').'') !!}" alt="img">
                  </a>
                </div>
              </div>
              <!--/.photobox-->
              <div class="col-sm-8 col-xs-6 add-desc-box col-md-7">
                <div class="ads-details">
                  <h6 class="add-title"><a href="{{url('tin/'.urlencode(str_slug(str_replace(' - ', '', $v->title.'-'.$v->id), '-')))}}">{{ ucfirst($v->title) }} </a></h6>
                  <span class="info-row">
                    <!--<span class="add-type business-ads tooltipHere" data-toggle="tooltip" data-placement="right" title="Business Ads">B </span>-->
                    <span class="date"><i class=" icon-clock"> </i> {{ $v->created_at->diffForHumans() }} </span>
                    - <!-- <span class="category">{{ $v->category->name }} </span> -->-
                    <span class="item-location"><i class="fa fa-map-marker"></i> {{ ucwords( $v->city->title ) }}</span>
                    - <span data-toggle="tooltip" data-placement="top" title="" data-original-title="{{ floor($v->visit/2) }} Xem quảng cáo "><i class="fa fa-eye" aria-hidden="true"> {{ floor($v->visit/2) }}</i></span>
                    - <span data-toggle="tooltip" data-placement="top" title="" data-original-title="{{ floor($v->message) }} Tin nhắn "><i class="fa fa-envelope-o" aria-hidden="true"> {{ floor($v->message) }}</i></span>
                  </span>
                </div>
                <div class="ads-details m-t-10">
                 @foreach($v->ad_cf_data as $data)
                 @if($data->column_value!='')
                 <span class="label label-default">@if($data->icon!='' || $data->image !='')  {!! ($data->icon!='')? '<i class="'.$data->icon.'"></i>' : '<img src="'.asset('assets/images/c_icons/'.$data->image.'').'" height="38" width="30" >' !!} @endif <strong>{{ ucfirst(str_replace('_', ' ', $data->column_name)) }}: </strong><span class="m-r-5 p-5"> {{$data->column_value}}</span></span>
                 @endif
                 @endforeach
               </div>
             </div>
             <!--/.add-desc-box-->
             <div class="col-md-3 text-right  price-box">
              @if($setting->hide_price==0)

              <h2 class="item-price text-danger" id="price_sort"> {{  $setting->currency_place == 'left' ? $setting->currency : ''  }} {{ number_format($v->price) }} {{  $setting->currency_place == 'right' ? $setting->currency : ''  }} </h2>
              @endif
              @if(isset($v->user->is_verified) && $v->user->is_verified==2)
              <a class="btn bg-white  btn-sm btn-auths" > <img src="{{ asset('assets/img/vfy.png') }}" title="Người dùng đã xác minh" alt="" height="22px"> <span>Người dùng đã xác minh</span> </a>
              @endif

            </div>
            <!--/.add-desc-box-->
            <div class="job-actions pull-right">
              <ul class="list-unstyled list-inline">
                @if(!Auth::guest())
                <li>
                  <a class="save-add"  data-action="{{ (count($v->save_add) > 0)? 'del': 'ins' }}" data-id="{{$v->id}}" href="javascript:void(0)" title="" >
                    @if(count($v->save_add) > 0)
                    <span class="fa fa-star"></span>
                    <span class="text">Đã lưu thêm</span>
                    @else
                    <span class="fa fa-star-o"></span>
                    <span class="text">Lưu thêm</span>
                    @endif
                    <span class=" hidden fa fa-spinner fa-spin"></span>
                  </a>
                </li>
                @endif
                <li class="saved-job">
                  @if($v->is_login)
                  <a class=""> <i class="fa fa-circle text-success"></i> <span>Online</span> </a>
                  @else
                  <a class=""> <i class="fa fa-circle text-danger"></i> <span>Offline</span> </a>
                  @endif
                </li>
              </ul>
            </div>
          </div>
          @endif

          @endforeach
          @else
          <div class="lable label-danger p-20 font-white text-center">
            Không tìm thấy kết quả !
          </div>
          @endif
        </div>


      </div>
    </div>
    <!--<div class="tab-box  save-search-bar text-center"><a href="#"> <i class=" icon-star-empty"></i>Save Search </a></div>-->
  </div>
  <div class="pagination-bar text-center">
    {{--{{ $result->links() }}--}}
    @if(count($result) > 0)
    {{ $result->appends(request()->query())->links() }}
    @endif
  </div>

  <div class="post-promo text-center">
    <h2> Bạn có gì để bán không? </h2>
    <h5>Bán sản phẩm của bạn trực tuyến MIỄN PHÍ. Nó dễ hơn bạn nghĩ !</h5>
    <a href="{{route('ads.create')}}" class="btn btn-lg btn-border btn-post btn-danger">Đăng quảng cáo miễn phí </a>
  </div>
</div>
<div class="col-sm-3 page-sidebar mobile-filter-sidebar">

  <aside>
    <div class="row inner-box">
      <hr>
      @if($setting->hide_price==0)
      <div class="form-group">
        <label for="price_range" class=" control-label"><b>Giá ({{$setting->currency}})</b><span class="font-normal text-muted f-s-12 clearfix"></span></label>
        <div class="">
          <input type="text" id="price_range" form="search_form" name="price_range">
        </div>
      </div>

      <div class="form-group">
        <label for="location" class=" control-label">Sắp xếp theo Tỉnh/Thành Phố</label>
        <select id="location" name="location" class="form-control price_sort_select" form="search_form" >
          <option value="0">--- Thành Phố ---</option>    
          @foreach($city_select as $key => $value)
            <option value='{{ $value->id }}'>{{ $value->title }}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group">
        <label for="price_sort" class="control-label">Sắp xếp theo Giá</label>
        <select name="price_sort" id="price_sort" class="form-control price_sort_select" form="search_form">
          <option value="0">--- Giá ---</option>
          <option value="asc">Giá từ Thấp đến Cao</option>
          <option value="desc"> Giá từ Cao xuống Thấp </option>
        </select>
      </div>
      @endif
      <div class="form-group">
        <label for="online" class="">Người dùng Online / Offline</label>
        <select name="online" id="" class="form-control" form="search_form">
          <option @if( $online == '') selected @endif  value="">Tất cả</option>
          <option @if( $online == 1) selected @endif  value="1">Online</option>
          <option @if( $online == 2 ) selected @endif  value="2">Offline</option>
        </select>
      </div>
      <div class="form-group">
        <label for="img">
          <input type="radio" name="image" value="1" id="img" {{ ($image==1)? 'checked':'' }} form="search_form">
          Ảnh
        </label>
        <label for="no-img" class="m-l-5">
          <input type="radio" name="image" value="0" id="no-img" {{ ($image==0)? 'checked':'' }} form="search_form">
          Không có hình ảnh
        </label>
      </div>
      <div class="form-group">
        <button id="search_btn" class="btn btn-search btn-danger"> <i class="fa fa-search" aria-hidden="true"></i> Tìm kiếm</button>
      </div>
      <div class="clearfix"></div>
    </div>
    @if( $setting->search_ads == 1 && $setting->search_ads_p == 'r' )
    <div class="row inner-box" >
      <!-- ads box -->
      {!! $setting->search_adsense !!}
    </div>
    @endif
  </aside>

</div>
</div>
</div>
</div>
<input class="hidden form-control" type="text" id="search_prm" data-keyword="{{ (isset($_REQUEST['keyword']))? $_REQUEST['keyword'] : ''  }}" data-category="{{ (isset($_REQUEST['category']))? $_REQUEST['category'] : ''  }}" data-region="{{ (isset($_REQUEST['region']))? $_REQUEST['region'] : ''  }}" >
<script src="{{ asset('assets/plugins/ion-rangeslider/ion.rangeSlider.min.js') }}"></script>
<script>

  // category selectd
  $(document).ready(function () {
   $('#category  option[value="{{$req_category}}"]').prop("selected", true);
   $('.price_sort_select  option[value="{{$req_price_sort}}"]').prop("selected", true);
 });

  $(document).ready(function () {
    $("#price_range").ionRangeSlider({
      type: "double",
      grid: true,
      min: 0,
      max: 100000000000,
      from: <?= $low_price ?>,
      to: <?= $high_price ?>,
      prefix: "{{$setting->currency}}"
    });

      //search btn
      $('#search_btn').click(function () {
        $('#loading').show();
        $('#search_form').submit();
      });
    });

  function sortPrice(v){
    $('#loading').show();
    $('#price_sort').val(v);
    $('#search_form').submit();
        //console.log('ko');
      }

    </script>
    @endsection

