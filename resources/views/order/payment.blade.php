@extends('layouts.app')
@section('title', 'Thanh toán')
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
        <div class="row col-md-6 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form id="payment-form" class="form-horizontal" method="POST" action="{{ route('order.pPaymentCart') }}" autocomplete="off">
                        {{ csrf_field() }}
                        <input type="hidden" name="userId" value="{{$userId}}">
                        <div class="col-md-12">
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="control-label">Họ tên:</label>
                                <div class="input-icon"><i class="icon-user fa"></i>
                                    <input id="name" type="text" class="form-control" name="name" value="{{ isset($customer['name']) ? $customer['name'] : '' }}" required autofocus autocomplete="off">
                                </div>
                                <span class="help-block">{{ $errors->first('name') }}</span>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="control-label">Email:</label>
                                <div class="input-icon"><i class="fa fa-envelope"></i>
                                    <input id="email" type="text" class="form-control" name="email" value="{{ isset($customer['email']) ? $customer['email'] : '' }}" required autocomplete="off">
                                </div>
                                <span class="help-block">{{ $errors->first('email') }}</span>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group{{ $errors->has('tel') ? ' has-error' : '' }}">
                                <label for="tel" class="control-label">Số điện thoại:</label>
                                <div class="input-icon"><i class="icon-phone fa"></i>
                                    <input id="tel" type="text" class="form-control" name="tel" value="{{ isset($customer['tel']) ? $customer['tel'] : '' }}" required autocomplete="off">
                                </div>
                                <span class="help-block">{{ $errors->first('tel') }}</span>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                <label for="address" class="control-label">Địa chỉ:</label>
                                <div class="input-icon"><i class="fa fa-address-card"></i>
                                    <input id="address" type="text" class="form-control" name="address" value="{{ isset($customer['address']) ? $customer['address'] : '' }}" required autocomplete="off">
                                </div>
                                <span class="help-block">{{ $errors->first('address') }}</span>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <label for="description" class="control-label">Ghi chú:</label>
                                <div class="input-icon"><i class="fas fa-file-alt"></i>
                                    <textarea id="description" class="form-control" rows="4" name="description">{{ isset($customer['description']) ? $customer['description'] : '' }}</textarea>
                                </div>
                                <span class="help-block">{{ $errors->first('description') }}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12" style="margin-bottom: -15px; margin-top: 10px;">
                                <label for="male" style="cursor: pointer;">
                                    <input id="male" type="checkbox" name="saveInfo" value="1" {{ isset($customer['name']) ? 'checked' : '' }}>
                                    Lưu thông tin
                                </label>
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('payment_method') ? ' has-error' : '' }}" style="margin-top: 15px;">
                            <label class="control-label">Hình thức thanh toán</label>
                            <div class="row payment-wrap">
                                <div class="col-md-6" style="height: 86px;">
                                    <input type="radio" id="payment1" name="payment_method" value="1" checked>
                                    <label for="payment1" class="btn-primary payment-label" style="height: 100%;">Thanh toán khi nhận hàng</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="radio" id="payment2" name="payment_method" value="2">
                                    <label for="payment2" class="payment-label"><img src="https://www.nganluong.vn/css/newhome/img/button/safe-pay-3.png"border="0" /></label>
                                </div>
                            </div>
                            <span class="help-block">{{ $errors->first('payment_method') }}</span>
                        </div>
                        
                        <div id="payment-online">
                            @include('order.payment_online')
                        </div>

                        <div class="form-group" style="margin-top: 15px;text-align: center;">
                            <button type="submit" id="submit-form" class="btn-primary btn-block">Đặt hàng</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class=" col-md-4 bg-white p-20 panel-right">
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
                                    <span><img style="width: 60px; height: 60px;" src="{{($item['image'] !='')? asset('assets/images/listings/'.$item['image']) : asset('assets/images/user_hidden.png')}}" ></span>
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
                        Tổng đơn hàng: {{ $setting->currency_place == 'left' ? $setting->currency : ''  }}
                        <span id="total_{{$key}}">{{ number_format($total) }} </span>
                        {{  $setting->currency_place == 'right' ? $setting->currency : ''  }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('#payment-form input').change(function(e) {
        e.preventDefault();
        validateRegisForm($(this));
    });

    $('#submit-form').click(function(e) {
        e.preventDefault();
        validateRegisForm();
    });

    $('input[name="payment_method"]').change(function() {
        if($(this).val() == 2) {
            $('#payment-online').show();
        } else {
            $('#payment-online').hide();
        }
    });

    function validateRegisForm(_this) {
        $.ajax({
            type: 'POST',
            url: "{{route('order.validatePayment')}}",
            data: $('#payment-form').serialize(),
            success: function(rsp) {
                if(_this != undefined) {
                    let _name = $(_this).attr('name');
                    if(rsp.error && rsp.data[_name] != undefined) {
                        $(_this).closest('div.form-group').addClass('has-error');
                        $(_this).closest('div.form-group').find('span.help-block').text(rsp.data[_name]);
                    } else {
                        $(_this).closest('div.form-group').removeClass('has-error');
                        $(_this).closest('div.form-group').find('span.help-block').text('');
                    }
                    return false;
                } else {
                    if(rsp.error) {
                        $('#payment-form .has-error').removeClass('has-error');
                        $('#payment-form .help-block').text('');
                        $.each(rsp.data, function(index, val) {
                            let el = $('#payment-form input[name="' + index + '"], select[name="' + index + '"]');
                            $(el).closest('div.form-group').addClass('has-error');
                            $(el).closest('div.form-group').find('span.help-block').text(val);
                        });
                        return false;
                    } else {
                        $('#payment-form').submit();
                    }
                }
            }
        });
    }
</script>
@endsection
