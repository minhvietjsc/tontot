@forelse($carts as $key => $item)
<div class="row cart-item">
    <div class="col-md-10" style="border-right: 1px solid #ccc;">
        <div class="row row-user">
            <div class="user_avatar">
                <img src="{{($item['user']['image'] !="")? asset('assets/images/users/'.$item['user']['image']) : asset('assets/images/user_hidden.png')}}" alt="" class="img-thumbnail">
            </div>
            <div class="user_info">
                <span>{{$item['user']['name']}}</span>
                <span>{{$item['user']['email']}}</span>
                <span>{{$item['user']['tel']}}</span>
            </div>
            <div class="pull-right remove-user">
                <a href="javascript: void(0);" onclick="removeCart({{$key}}, 'user')"><i class="glyphicon glyphicon-trash"></i></a>
            </div>
        </div>
        @php
            $total = 0;
        @endphp
        @foreach($item['ads'] as $ads_id => $ads)
        @php
            $total += $ads['price']*$ads['amount'];
        @endphp
        <div class="row row-ads">
            <div class="col-md-8">
                <div class="col-md-1" style="padding: 0;">
                    <img id="ads_image" src="{{($ads['image'] !='')? asset('assets/images/listings/'.$ads['image']) : asset('assets/images/user_hidden.png')}}" alt="" class="img-thumbnail">
                </div>
                <div class="col-md-11" style="padding-right: 0;"> 
                    <span class="ads-name">{{$ads['name']}}</span>
                </div>
            </div>
            <div class="col-md-2">{{ $setting->currency_place == 'left' ? $setting->currency : ''  }}{{ number_format($ads['price']) }} {{  $setting->currency_place == 'right' ? $setting->currency : ''  }}</div>
            <div class="col-md-1">
                <input type="text" id="amount{{$ads_id}}" class="amount" onkeyup="changeAmount({{$ads_id}}, this.value)" value="{{$ads['amount']}}">
            </div>
            <div class="col-md-1 remove-cart">
                <a href="javascript: void(0);" onclick="removeCart({{$ads_id}}, 'item')"><i class="glyphicon glyphicon-trash"></i></a></div>
        </div>
        @endforeach
    </div>
    <div class="col-md-2">
        <div class="dathang-item-title">Đặt hàng</div>
        <div class="dathang-item-content">
            <div class="dathang-total">
               <strong>Tổng tiền:</strong><span class="total-price"> {{ $setting->currency_place == 'left' ? $setting->currency : ''  }}
                <span id="total_{{$key}}">{{ number_format($total) }} </span>
                {{  $setting->currency_place == 'right' ? $setting->currency : ''  }}
                </span>
            </div>
            <div class="dathang-item-button">
                <a href="{{route('order.paymentCart',['userId' => $key])}}" class="btn buy-now"> Thanh toán </a>
            </div>
        </div>
    </div>
</div>
@empty
<div class="row cart-item">
    <span style="font-style: italic; padding: 10px 15px;">Không có sản phẩm nào trong giỏ hàng.</span>
</div>
@endforelse