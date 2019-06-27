<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OrderAds;
use App\Ads;
use App\Order;
use GuzzleHttp\Client;

use Session;
use DB;
use Auth;
use Validator;
use App\Http\Helper\NL_CheckOutV3;
use App\Events\OrderSuccess;

class OrderController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
        error_reporting(0);
    }

    function addToCart(Request $request) 
    {
        $carts = [];
        if(!\Session::has('shopCart')) {
            \Session::put('shopCart', $carts);
        }
        $carts = \Session::get('shopCart');
        $ads = Ads::findOrFail($request->id);
        if(isset($carts[$ads->user->id])) {
            if(isset($carts[$ads->user->id]['ads'][$ads->id])) {
                $carts[$ads->user->id]['ads'][$ads->id]['amount'] = $request->amount;
            } else {
                $carts[$ads->user->id]['ads'][$ads->id] = [
                        'name' => $ads->title,
                        'price' => $ads->price_option != '' ? $ads->price_option : $ads->price,
                        'price_option' => $ads->price_option,
                        'amount' => $request->amount,
                        'image' => count($ads->ad_images) > 0 ? $ads->ad_images[0]->image : ''
                    ];
            }
        } else {
            $carts[$ads->user->id] = [
                'user' => [
                    'id' => $ads->user->id,
                    'name' => $ads->user->name,
                    'email' => $ads->user->email,
                    'image' => $ads->user->image,
                    'tel' => $ads->user->phone
                ],
                'ads' => [
                    $ads->id => [
                        'name' => $ads->title,
                        'price' => $ads->price_option != '' ? $ads->price_option : $ads->price,
                        'price_option' => $ads->price_option,
                        'amount' => $request->amount,
                        'image' => count($ads->ad_images) > 0 ? $ads->ad_images[0]->image : ''
                    ]
                ]
            ];
        }

        $total = array_reduce($carts[$ads->user->id]['ads'], function($tmp_total, $ads) {
            return $tmp_total + $ads['price']*$ads['amount'];
        }, 0);
        $amount = array_reduce($carts, function($count, $item) {
                    return $count + count($item['ads']);
                }, 0);
        \Session::put('shopCart', $carts);
        if($request->type == 'now') {
            return redirect('/gio-hang');
        }
        return response()->json([
            'success' => true, 
            'amount' => $amount, 
            'total' => number_format($total),
            'user_id' => $ads->user->id
        ]);
    }

    function removeCart(Request $request) {
        $carts = \Session::get('shopCart');
        if($request->type == 'item') {
            $ads = Ads::findOrFail($request->id);
            if(isset($carts[$ads->user->id])) { 
                unset($carts[$ads->user->id]['ads'][$ads->id]);
                if(count($carts[$ads->user->id]['ads']) == 0) {
                    unset($carts[$ads->user->id]);
                }
            }
        } else {
            if(isset($carts[$request->id])) { 
                unset($carts[$request->id]);
            }
        }
        $amount = array_reduce($carts, function($count, $item) {
                    return $count + count($item['ads']);
                }, 0);
        \Session::put('shopCart', $carts);
        return response()->json([
            'success' => true, 
            'amount' => $amount,
            'html' => view('order.cartitem', compact('carts'))->render()
        ]);
    }

    function viewCart(Request $request) 
    {
        if($request->has('type') && $request->type == 'buynow') {
            $carts = [];
            if(!\Session::has('shopCart')) {
                \Session::put('shopCart', $carts);
            }
            $carts = \Session::get('shopCart');
            $ads = Ads::findOrFail($request->id);
            if(isset($carts[$ads->user->id])) {
                if(isset($carts[$ads->user->id]['ads'][$ads->id])) {
                    $carts[$ads->user->id]['ads'][$ads->id]['amount'] = $request->amount;
                } else {
                    $carts[$ads->user->id]['ads'][$ads->id] = [
                            'name' => $ads->title,
                            'price' => $ads->price_option != '' ? $ads->price_option : $ads->price,
                            'price_option' => $ads->price_option,
                            'amount' => $request->amount,
                            'image' => count($ads->ad_images) > 0 ? $ads->ad_images[0]->image : ''
                        ];
                }
            } else {
                $carts[$ads->user->id] = [
                    'user' => [
                        'id' => $ads->user->id,
                        'name' => $ads->user->name,
                        'email' => $ads->user->email,
                        'image' => $ads->user->image,
                        'tel' => $ads->user->phone
                    ],
                    'ads' => [
                        $ads->id => [
                            'name' => $ads->title,
                            'price' => $ads->price_option != '' ? $ads->price_option : $ads->price,
                            'price_option' => $ads->price_option,
                            'amount' => $request->amount,
                            'image' => count($ads->ad_images) > 0 ? $ads->ad_images[0]->image : ''
                        ]
                    ]
                ];
            }
            \Session::put('shopCart', $carts);
        }
        $carts = \Session::get('shopCart');
        return view('order.cart', compact('carts'));
    }

    function paymentCart(Request $request) 
    {
        $carts = \Session::get('shopCart');
        if(!isset($carts[$request->userId])) {
            return redirect('/');
        }
        if($request->isMethod('post')) {

            \Validator::make($request->all(), [
                'name' => 'required|max:255',
                'address' => 'required|max:255',
                'email' => 'required|max:255|email',
                'tel' => 'required|max:50'
            ])->setAttributeNames([
                'name' => 'Họ tên',
                'address' => 'Địa chỉ',
                'tel' => 'Số điện thoại',
                'email' => 'Email'
            ])->validate();

            /*save customer info*/
            $order = new Order();
            $order->user_id = $request->userId;
            $order->customer_name = $request->name;
            $order->email = $request->email;
            $order->tel = $request->tel;
            $order->address = $request->address;
            $order->pay_total = array_reduce($carts[$request->userId]['ads'], function($total, $item) {
                    return $total + $item['price']*$item['amount'];
                }, 0);
            $order->status = Order::STATUS_WAIT;
            $order->payment_method = $request->payment_method;
            $order->save();
            $data_order_ads = [];
            foreach ($carts[$request->userId]['ads'] as $ads_id => $ads) {
                $item = [
                    'order_id' => $order->id,
                    'ads_id' => $ads_id,
                    'ads_name' => $ads['name'],
                    'price' => $ads['price'],
                    'amount' => $ads['amount'],
                    'created_at' => date('Y-m-d', time()),
                    'updated_at' => date('Y-m-d', time())
                ];
                array_push($data_order_ads, $item);
            }
            OrderAds::insert($data_order_ads);
            
            // initial order info
            $email = [
                'subject' => 'Đặt hàng thành công',
                'mail_to' => $request->email,
                'data' => [
                            'slogan_success' => 'Quý khách đã đặt hàng thành công trên hệ thống Nuomnuop.com. <br>Cảm ơn Quý khách đã sử dụng dịch vụ của chúng tôi!<br> Sau đây là thông tin đơn hàng:',
                            'carts' => $carts[$request->userId]['ads'],
                            'customer' => [
                                    'name' => $request->name,
                                    'tel' => $request->tel,
                                    'address' => $request->address,
                                    'email' => $request->email
                            ] 
                        ]
            ];
            /*remove item in cart*/
            if($request->saveInfo == 1) {
                $customer = [
                    'name' => $request->name,
                    'tel' => $request->tel,
                    'address' => $request->address,
                    'email' => $request->email
                ];
                \Session::put('customer', $customer);
            } else {
                \Session::put('customer', []);
            }

            /*set payment online*/
            if($request->payment_method == Order::PAYMENT_ONLINE) {
                \Session::put('shopCart', $carts);
                $bank_code = $request->has('bankcode') ? $request->bankcode : '';
                $rs = $this->paymentOnline($request->option_payment, $bank_code, $order);
                if(!$rs['error']) {
                    /* send mail notification, payment COD*/
                    event(new OrderSuccess($email));
                    /*delete cart of userid*/
                    unset($carts[$request->userId]);
                    \Session::put('shopCart', $carts);
                    return redirect($rs['url']);
                } else {
                    $order_id = $order->id;
                    Order::where('id', $order_id)->delete();
                    OrderAds::where('order_id', $order_id)->delete();
                    return redirect()->route('order.paymentCart', ['userId' => $request->userId])->withErrors('payment_method', $rs['msg']);
                }
            } else {
                /*delete cart of userid*/
                 unset($carts[$request->userId]);
                
                \Session::put('shopCart', $carts);
                \Session::flash('success', 'Đặt hàng thành công. Cảm ơn Quý khách đã sử dụng dịch vụ của chúng tôi!');
                /* send mail notification, payment COD*/
                event(new OrderSuccess($email));

                return redirect()->route('order.success', ['order_id' => $order->id]);
            }
        }
        $customer = \Session::has('customer') ? \Session::get('customer') : [];
        return view('order.payment', [
                    'carts' => $carts[$request->userId]['ads'], 
                    'userId' => $request->userId,
                    'customer' => $customer
                ]);
    }

    public function validateAjax(Request $request) 
    {
        $validator = \Validator::make($request->all(), [
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'email' => 'required|max:255|email',
            'tel' => 'required|max:50'
        ])->setAttributeNames([
            'name' => 'Họ tên',
            'address' => 'Địa chỉ',
            'tel' => 'Số điện thoại',
            'email' => 'Email'
        ]);
        if ($validator->fails()) {
            $response = [
                'error' => true,
                'data' => $validator->errors()
            ];
        } else {
            $response = [
                'error' => false,
                'data' => ''
            ];
        }
        return response()->json($response);
    }

    public function success($order_id) 
    {
        if($order_id) {
            \Session::flash('success', 'Đặt hàng thành công. Cảm ơn Quý khách đã sử dụng dịch vụ của chúng tôi!');
            return view('order.success');
        } else {
            return redirect('/');
        }
    }

    public function delete($order_id) 
    {
        Order::where('id', $order_id)->delete();
        OrderAds::where('order_id', $order_id)->delete();
        \Session::flash('success', 'Hủy đơn hàng thành công. Cảm ơn Quý khách đã sử dụng dịch vụ của chúng tôi!');
        return view('order.success');
    }

    public function paymentOnline($option_payment, $bankcode, $order) 
    {
        $nlcheckout= new NL_CheckOutV3(env('MERCHANT_ID_NGANLUONG'),env('MERCHANT_PASS_NGANLUONG'),env('RECEIVER_NGANLUONG'),env('URL_API_NGANLUONG'));

        $total_amount=$order->pay_total;
        
        $carts = \Session::get('shopCart');
        $array_items = [];
        $idx = 0;
        foreach ($carts[$order->user_id]['ads'] as $ads_id => $ads) {
            $idx++;
            $array_items[] = [
                'item_name'.$idx => $ads['name'],
                'item_quantity'.$idx => $ads['amount'],
                'item_amount'.$idx => $ads['price'],
                'item_url'.$idx => url('tin/'.urlencode(str_slug(str_replace(' - ', '', $ads['name'].'-'.$ads_id), '-')))
            ];
        }                         
                
        $payment_method = $option_payment;
        $bank_code = $bankcode;
        $order_code = $order->id;
        
        /*Kiểu giao dịch: 1 - Ngay; 2 - Tạm giữ; Nếu không truyền hoặc bằng rỗng thì lấy theo chính sách của NganLuong.vn*/
        $payment_type = '';
        /*Số tiền giảm giá*/
        $discount_amount = 0;
        $order_description = $order->description;
        $tax_amount = 0;
        $fee_shipping = 0;
        $return_url = route('order.success', ['order_id' => $order->id]);
        $cancel_url = route('order.delete', ['order_id' => $order->id]);
        
        $buyer_fullname = $order->customer_name;
        $buyer_email = $order->email;
        $buyer_mobile = $order->tel;
         
        $buyer_address = $order->address;

        if($payment_method == "VISA") {
        
            $nl_result= $nlcheckout->VisaCheckout($order_code,$total_amount,$payment_type,$order_description,$tax_amount,
                                              $fee_shipping,$discount_amount,$return_url,$cancel_url,$buyer_fullname,$buyer_email,$buyer_mobile, 
                                              $buyer_address,$array_items,$bank_code);
                                              
        }elseif($payment_method =="NL"){
            $nl_result= $nlcheckout->NLCheckout($order_code,$total_amount,$payment_type,$order_description,$tax_amount,
                                                $fee_shipping,$discount_amount,$return_url,$cancel_url,$buyer_fullname,$buyer_email,$buyer_mobile, 
                                                $buyer_address,$array_items);
                                                
        }elseif($payment_method =="ATM_ONLINE" && $bank_code !='' ){
            $nl_result= $nlcheckout->BankCheckout($order_code,$total_amount,$bank_code,$payment_type,$order_description,$tax_amount,
                                                  $fee_shipping,$discount_amount,$return_url,$cancel_url,$buyer_fullname,$buyer_email,$buyer_mobile, 
                                                  $buyer_address,$array_items) ;
            
        }
        elseif($payment_method =="NH_OFFLINE"){
                $nl_result= $nlcheckout->officeBankCheckout($order_code, $total_amount, $bank_code, $payment_type, $order_description, $tax_amount, $fee_shipping, $discount_amount, $return_url, $cancel_url, $buyer_fullname, $buyer_email, $buyer_mobile, $buyer_address, $array_items);
            }
        elseif($payment_method =="ATM_OFFLINE"){
                $nl_result= $nlcheckout->BankOfflineCheckout($order_code, $total_amount, $bank_code, $payment_type, $order_description, $tax_amount, $fee_shipping, $discount_amount, $return_url, $cancel_url, $buyer_fullname, $buyer_email, $buyer_mobile, $buyer_address, $array_items);
                
            }
        elseif($payment_method =="IB_ONLINE"){
                $nl_result= $nlcheckout->IBCheckout($order_code, $total_amount, $bank_code, $payment_type, $order_description, $tax_amount, $fee_shipping, $discount_amount, $return_url, $cancel_url, $buyer_fullname, $buyer_email, $buyer_mobile, $buyer_address, $array_items);
            }
        elseif ($payment_method == "CREDIT_CARD_PREPAID") {

            $nl_result = $nlcheckout->PrepaidVisaCheckout($order_code, $total_amount, $payment_type, $order_description, $tax_amount, $fee_shipping, $discount_amount, $return_url, $cancel_url, $buyer_fullname, $buyer_email, $buyer_mobile, $buyer_address, $array_items, $bank_code);
        }
        elseif ($payment_method == "QRCODE") {
            $nl_result= $nlcheckout->QRCodeCheckout($order_code, $total_amount, $bank_code, $payment_type, $order_description, $tax_amount, $fee_shipping, $discount_amount, $return_url, $cancel_url, $buyer_fullname, $buyer_email, $buyer_mobile, $buyer_address, $array_items);
        }
        if ($nl_result->error_code =='00'){
            return [
                'url' => (string)$nl_result->checkout_url,
                'error' => false
            ];
        } else {
            return [
                'msg' => $nl_result->error_message,
                'error' => true
            ];
            
        }
    }
}
