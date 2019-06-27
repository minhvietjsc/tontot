@extends('layouts.app')
@section('title', 'Giỏ hàng')
@section('content')
<style type="text/css">
    .user_avatar {
        display: inline-block;
        margin-right: 15px;
        transform: translate(0%, -35%);
    }
    .user_avatar img {
        height: 74px;
        width: 74px;
        border-radius: 37px;
    }
    .user_info {
        display: inline-block;
    }
    .user_info span {
        display: block;
        margin-bottom: 5px;
    }
    .row-user {
        margin-left: -10px;
        border-bottom: 1px solid #ccc;
    }
    .row-ads {
        padding: 10px;
        border-bottom: 1px dotted #ccc;
    }
    .row-ads:last-child {
        border-bottom: none;
    }
    .row-ads div {
        height: 40px; 
        line-height: 40px;
        border-right: 1px dotted #ccc;
    }
    .row-ads div:last-child {
        border-right: none;
    }
    #ads_image {
        width: 40px;
        height: 40px;
    }
    .amount {
        width: 50px;
        height: 30px;
        padding: 5px;
        text-align: center;
        border-radius: 3px;
    }
    div.remove-cart {text-align: center;}
    .cart-item {
        box-shadow: 0px 1px 6px 2px #ccc;
        background: #fff;
        padding: 10px;
        border-radius: 4px;
        margin-top: 10px;
    }
    .remove-user {
        margin-top: 3%;
        margin-right: 3.2%;
        transform: translate(-100%, 50%);
    }
    .dathang-item-title {
        text-align: center;
        font-size: 1.3rem;
        font-weight: 500;
        text-transform: uppercase;
        border-bottom: .5px solid #c7c7cd;
    }
    .dathang-item-content {
        transform: translate(0%, 70%);
        text-align: right;
    }
    .dathang-item-content .dathang-total {
        margin-bottom: 1rem;
    }
    .buy-now:hover, .buy-now:visited, .buy-now:focus, .buy-now{
        background-color: #C72F28!important;
        border: 1px solid #C72F28 !important;
        color: #fff;
    }
    .total-price {
        font-weight: 600;
        color: #ff9113;
        font-size: 1rem
    }
</style>
<div class="main-container">
    <div class="container" id="view-cart">
        @include('order.cartitem')
    </div>
</div>
<script type="text/javascript">
    function changeAmount(id, amount) {
        if(amount < 1) {
            $('#amount' + id).val(1);
            return false;
        } else {
            $.ajax({
                type: 'GET',
                url: '{{route('order.addToCart')}}',
                data: {id: id, amount: amount},
                success: function(rsp) {
                    if(rsp.success !== undefined && rsp.success === true) {
                        $(`#total_${rsp.user_id}`).text(rsp.total);
                    }
                }
            });
        }
    }

    function removeCart(id, type) {
        $.ajax({
            type: 'GET',
            url: '{{route('order.removeCart')}}',
            data: {id: id, type: type},
            success: function(rsp) {
                if(rsp.success !== undefined && rsp.success === true) {
                    $('#item-cart').text(rsp.amount);
                    $('#view-cart').html(rsp.html);
                }
            }
        });
    }
</script>
@endsection
