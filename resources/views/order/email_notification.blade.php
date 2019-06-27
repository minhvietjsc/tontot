@extends('layouts.app')
@section('title', 'Mail thông báo')
@section('content')
    <style>
        .form-group {
            margin-bottom: 0;
        }
        .b-registration-info-container{
            height: 260px;
        }
        .panel-right {
            border: 1px solid #ddd;
            border-radius: 4px;
            -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05);
            box-shadow: 0 1px 1px rgba(0,0,0,.05);
        }
         .b-registration-info-container .b-registration-info-title {
             font-size: 20px;
             margin-bottom: 15px;
             color: #1f1f1f;
             border-bottom: 1px solid #ddd;
         }
        .b-registration-info-container .b-registration-info-text {
            font-size: 15px;
            margin-top: -27px;
        }
        .b-rounded-list {
            list-style-type: none;
            margin: 50px 0 25px -10px;
            font-size: 13px;
        }
        .b-rounded-list li {
            float: left;
            width: 100%;
            border: 0;
            vertical-align: baseline;
            margin: 0;
            padding: 0;
        }
        .b-rounded-list li .b-rounded-list-pointer {
            float: left;
        }
        .b-rounded-list {
            list-style-type: none;
            margin: 50px 0 25px -10px;
            font-size: 13px;
        }
        .b-rounded-list li .b-rounded-list-pointer span {
            font-size: 22px;
            font-weight: bold;
            color: #000;
            height: 60px;
            width: 60px;
            border-radius: 100%;
            background: #fff;
            display: table-cell;
            vertical-align: middle;
            text-align: center;
            overflow: hidden;
            border: none;
        }
        .b-rounded-list li .b-rounded-list-content {
            padding: 10px 0 10px 50px;
            margin-left: 27px;
            border-left: none;
        }
        .b-rounded-list li {
            float: left;
            width: 100%;
        }
        .total-detail {
            position: absolute;
            width: 100%;
            padding-right: 20px;
        }
        .total-detail-content {
            bottom: 20px;
            border-top: 1px dotted;
            padding-top: 10px;
        }
        .payment-wrap {
            border: 1px solid #ccc;
            margin-left: 0px;
            margin-right: 0px;
            padding-top: 10px;
        }
        .payment-label {
            border-radius: 3px;
            cursor: pointer;
            height: 100%;
            padding: 0 10px;
            vertical-align: middle;
            line-height: 86px;
        }
        #submit-form {
            width: 150px;
            padding: 10px;
            border-radius: 3px;
            font-weight: bold;
            margin-left: 50%;
            margin-right: 50%;
            transform: translate(-50%);
        }
        #payment-online {
            display: none;
            margin-top: 20px;
        }
    </style>
<div class="container m-t-30">
    <div class="row">
        <div class="alert alert-success text-center">
            {{$slogan_success}}
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 bg-white p-20 panel-right col-md-offset-1">
            <div class="b-registration-info-container">
                <div class="b-registration-info">
                    <div class="b-registration-info-title"> Thông tin khách hàng </div>
                    <div class="b-registration-info-text" style="margin-top: 27px;">
                        <div class="row">
                            <div class="col-md-3">Họ tên:</div>
                            <div class="col-md-9">{{$customer['name']}}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">Email:</div>
                            <div class="col-md-9">{{$customer['email']}}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">SĐT:</div>
                            <div class="col-md-9">{{$customer['tel']}}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">Địa chỉ:</div>
                            <div class="col-md-9">{{$customer['address']}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 bg-white p-20 panel-right">
            <!-- Start -->
            <div class="b-registration-info-container">
                <div class="b-registration-info">
                    <div class="b-registration-info-title"> Chi tiết đơn hàng </div>
                    <div class="b-registration-info-text">
                        <ul class="b-rounded-list">
                            @php
                            $total = 0;
                            $idx = 0;
                            @endphp
                            @foreach($carts as $item)
                            @php
                            $total += $item['amount']*$item['price'];
                            $idx++;
                            @endphp
                            <li class="{{$idx == count($carts) ? 'b-last' : ''}}">
                                <div class="b-rounded-list-pointer">
                                    <span><img style="width: 60px; height: 60px;" src="{{($item['image'] !='')? asset('assets/images/listings/'.urlencode($item['image'])) : asset('assets/images/user_hidden.png')}}" ></span>
                                </div>
                                 <div class="b-rounded-list-content">
                                    <div class="font-weight-bold">{{$item['name']}}</div>
                                    <p>{{$item['amount']}} x {{ $setting->currency_place == 'left' ? $setting->currency : ''  }} {{ number_format($item['price']) }} {{  $setting->currency_place == 'right' ? $setting->currency : ''  }}</p>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="total-detail">
                        <div class="total-detail-content">
                            Tổng đơn hàng: {{ $setting->currency_place == 'left' ? $setting->currency : ''  }}
                            <span id="total_{{$key}}">{{ number_format($total) }} </span>
                            {{  $setting->currency_place == 'right' ? $setting->currency : ''  }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection