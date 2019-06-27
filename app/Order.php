<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends \Eloquent
{
    protected $table = 'orders';

    const STATUS_WAIT = 0;
    const STATUS_PROCESSING = 1;
    const STATUS_BLOCK = 2;
    const PAYMENT_OFFLINE = 1;
    const PAYMENT_ONLINE = 2;

    static $STATUS = [
        self::STATUS_WAIT => 'Chờ xử lý',
        self::STATUS_PROCESSING => 'Đang giao hàng',
        self::STATUS_BLOCK => 'Đã giao hàng'
    ];
    static $PAYMENT_METHOD = [
        self::PAYMENT_OFFLINE => 'Thanh toán khi nhận hàng',
        self::PAYMENT_ONLINE => 'Thanh toán trực tuyến'
    ];

    public function ads() {
        return $this->belongsToMany(Ads::class, 'order_ads', 'order_id', 'ads_id');
    }

    public static function countCart() {
        $count = 0;
        if(\Session::has('shopCart')) {
            $carts = \Session::get('shopCart');
            $count = array_reduce($carts, function($count, $item) {
                return $count + count($item['ads']);
            }, 0);
        }
        return $count;
    }

}