@extends('admin.layout.app')
@section('content')
<?php
    $setting = DB::table('setting')->first();

?>
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="page-title-box">
                            <h4 class="page-title">Dashboard</h4>
                            <ol class="breadcrumb p-0 m-0">
                                <li><a href="{{ url('dashboard') }}">Home</a> </li>
                                <li class="active"> Cài đặt quảng cáo nổi bật</li>
                            </ol>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
                <div class="row">
                    <div class="col-md-12 col-xs-12 col-xxs-12">
                        <div class="panel panel-color panel-inverse">
                            <div class="panel-heading">
                                <h3 class="panel-title">Cài đặt quảng cáo nổi bật</h3>
                            </div>
                            <div class="panel-body">
                                <form action="" id="featuredAdsForm">
                                    {{csrf_field()}}
                                    <input type="hidden" id="featuredAdsId" name="id" value="{{ isset($featured_ads->id)? $featured_ads->id : ''}}">
                                    <div class="form-group">
                                        <lable>Tiêu đề</lable>

                                        <input type="text" class="form-control" name="title" required value="{{ isset($featured_ads->title)? $featured_ads->title : ''}}">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <lable>Giá quảng cáo bình thường</lable>
                                                <input type="number" readonly onkeyup="this.value=this.value.replace(/[^\d.]/,'')" onkeydown="this.value=this.value.replace(/[^\d.]/,'')" class="form-control" name="normal_listing_price" value="{{ isset($featured_ads->normal_listing_price)? $featured_ads->normal_listing_price : 0}}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <lable>Giá quảng cáo trên Trang chủ</lable>
                                                <input type="number" onkeyup="this.value=this.value.replace(/[^\d.]/,'')" onkeydown="this.value=this.value.replace(/[^\d.]/,'')" class="form-control" name="home_page_price" value="{{ isset($featured_ads->home_page_price)? $featured_ads->home_page_price : ''}}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <lable>Số ngày quảng cáo trên Trang chủ</lable>
                                                <input type="number" onkeyup="this.value=this.value.replace(/[^\d.]/,'')" onkeydown="this.value=this.value.replace(/[^\d.]/,'')" class="form-control" name="home_page_days" value="{{ isset($featured_ads->home_page_days)? $featured_ads->home_page_days : ''}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <lable>Giá quảng cáo trên đầu trang</lable>
                                                <input type="number" onkeyup="this.value=this.value.replace(/[^\d.]/,'')" onkeydown="this.value=this.value.replace(/[^\d.]/,'')" class="form-control" name="top_page_price" value="{{ isset($featured_ads->top_page_price)? $featured_ads->top_page_price : ''}}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <lable>Số ngày quảng cáo trên đầu trang</lable>
                                                <input type="number" onkeyup="this.value=this.value.replace(/[^\d.]/,'')" onkeydown="this.value=this.value.replace(/[^\d.]/,'')" class="form-control" name="top_page_days" value="{{ isset($featured_ads->top_page_days)? $featured_ads->top_page_days : ''}}">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <lable>Giá quảng cáo khẩn cấp</lable>
                                                <input type="number" onkeyup="this.value=this.value.replace(/[^\d.]/,'')" onkeydown="this.value=this.value.replace(/[^\d.]/,'')" class="form-control" name="urgent_price" value="{{ isset($featured_ads->urgent_price)? $featured_ads->urgent_price : ''}}">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <lable>Số ngày quảng cáo khẩn cấp</lable>
                                                <input type="number" onkeyup="this.value=this.value.replace(/[^\d.]/,'')" onkeydown="this.value=this.value.replace(/[^\d.]/,'')" class="form-control" name="urgent_days" value="{{ isset($featured_ads->urgent_days)? $featured_ads->urgent_days : ''}}">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <lable>Giá quảng cáo khẩn cấp trên đầu trang</lable>
                                                <input type="number" onkeyup="this.value=this.value.replace(/[^\d.]/,'')" onkeydown="this.value=this.value.replace(/[^\d.]/,'')" class="form-control" name="urgent_top_price" value="{{ isset($featured_ads->urgent_top_price)? $featured_ads->urgent_top_price : ''}}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <lable>Số ngày quảng cáo khẩn cấp trên đầu trang</lable>
                                                <input type="number" onkeyup="this.value=this.value.replace(/[^\d.]/,'')" onkeydown="this.value=this.value.replace(/[^\d.]/,'')" class="form-control" name="urgent_top_days" value="{{ isset($featured_ads->urgent_top_days)? $featured_ads->urgent_top_days : ''}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <lable> Mô tả </lable>
                                        <textarea name="description" class="form-control" id="" rows="5">{{ isset($featured_ads->description)? $featured_ads->description : ''}}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <div class="checkbox checkbox-primary checkbox-inline">
                                            <input id="status" name="status" type="checkbox" value="1" {{ isset($featured_ads->status) && $featured_ads->status == 1  ? 'checked' : ''}}>
                                            <label for="status" class="text-bold">Trạng thái</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-success"> Lưu </button>
                                    </div>
                                </form>
                            </div>
                        </div>


                        <div class="panel panel-color panel-inverse">
                            <div class="panel-heading">
                                <h3 class="panel-title">Cài đặt xử lý thanh toán</h3>
                            </div>
                            <div class="panel-body">

                                <h3> Stripe Settings </h3>
                                <hr>

                                <form action="" id="stripeForm">
                                    <input type="hidden" name="id" id="gatewayId" value="{{ isset($paymentGateway)&& $paymentGateway->id ==1 ? $paymentGateway->id : '' }}">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <lable>Khóa công khai (Publishable Key)</lable>
                                        <input type="text" name="stripe_publishable_key" value="{{ isset($paymentGateway)&& $paymentGateway->stripe_publishable_key !='' ? $paymentGateway->stripe_publishable_key : '' }}" class="form-control" placeholder="" required >
                                    </div>

                                    <div class="form-group">
                                        <lable>Khóa bí mật (Secret Key)</lable>
                                        <input type="text" name="stripe_secret_key" value="{{ isset($paymentGateway)&& $paymentGateway->stripe_publishable_key !='' ? $paymentGateway->stripe_publishable_key : '' }}" class="form-control" placeholder="" required >
                                    </div>

                                    <div class="form-group">
                                        <div class="checkbox checkbox-primary checkbox-inline">
                                            <input id="stripe_status" name="stripe_status" type="checkbox" value="1" {{ isset($paymentGateway->stripe_status) && $paymentGateway->stripe_status == 1  ? 'checked' : ''}}>
                                            <label for="stripe_status" class="text-bold">Trạng thái</label>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <button class="btn btn-success btn-sm">Lưu</button>
                                    </div>
                                </form>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div> <!-- container -->
        </div> <!-- content -->
        <script>

            $(document).ready(function () {
               $('#featuredAdsForm').submit(function () {
                   var data = new FormData(this);
                   $.ajax({
                       url: "{{ route('featured-ads.store') }}",
                       data: data,
                       contentType: false,
                       processData: false,
                       type: 'POST',
                       success: function(result){
                           if(result.msg == 1){
                            $('#paypalId').val(result.id);
                            swal('Success', 'Cài đặt đã lưu thành công!', 'success');
                           }
                           $('#loading').hide();
                       }
                   });
                return false;
               });

               $('#stripeForm').submit(function () {
                   var data = new FormData(this);
                   $.ajax({
                       url: "{{ route('save-payment-gateway') }}",
                       data: data,
                       contentType: false,
                       processData: false,
                       type: 'POST',
                       success: function(result){
                           if(result.msg == 1){
                            swal('Success', 'Đã lưu thành công cài đặt Stripe!', 'success');
                           }
                           $('#loading').hide();
                       }
                   });
                return false;
               });


            });

        </script>
@endsection