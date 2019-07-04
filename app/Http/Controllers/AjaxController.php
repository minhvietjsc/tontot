<?php

namespace App\Http\Controllers;

use App\AdsImages;
use App\Category;
use App\CustomPage;
use App\Groups;
use App\Region;
use App\City;
use App\Slider;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\User;
use App\Ads;
use App\Order;
use App\OrderAds;
use App\GroupFields;
use DB;
use Auth;
use App\Chat;
use Illuminate\Support\Facades\Mail;
use Response;
use App\SaveAdd;
Use App\Session;
use App\Employee;

class AjaxController extends Controller
{

    private  $notification_subject, $notification_to_email,$items = "";
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function loadUsers(Request $request)
    {
        $data = User::All()->where('type', '!=', 'adm');
        return Datatables::of($data)

            ->addColumn('action', function ($data)
            {
                if ($data->status == 0){ $status = "fa-unlock";$title = 'Kích hoạt'; $btn_clr = 'btn-success'; }
                if ($data->status == 1){ $status = "fa-lock"; $title = 'Khóa'; $btn_clr = 'btn-danger'; }

                $b = '<input type="checkbox" name="status" data-id="' . $data->id . '" data-obj="users" " ' . (($data->status == '1') ? 'checked' : '') . ' " data-on-text="On" data-off-text="Off" data-size="mini"  >&nbsp; <span id="action_separator">|</span> &nbsp;';
                $b = '<a onclick="editRow(' . $data->id . ')" href="javascript:;" title="Sửa" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i></a> ';
                $b .= '<a onclick="deleteRow(this)" data-id="' . $data->id . '"  data-obj="users" href="javascript:;" title="Xóa" class="btn btn-xs btn-danger danger-alert"><i class="glyphicon glyphicon-trash"></i></a> ';
                $b .= '&nbsp;<a onclick="changeStatus(this)" data-obj="users" data-id="'.$data->id.'"  title="'.$title.'" class="btn btn-xs '.$btn_clr.' "><i class="fa '.$status.' "></i></a>';
                if ($data->id_card !='') {
                    $b .= '&nbsp;<a onclick="view_card('.$data->id.')" title="Ảnh thẻ" class="btn btn-xs btn-warning "><i class="fa fa-credit-card"></i></a>';
                }
                if ($data->id_card !='' && $data->is_verified == 2) {
                    $b .= '&nbsp;<a  title="Người dùng đã xác minh" class="btn btn-xs btn-success "><i class="fa fa-check-square-o"></i></a>';
                }
                if ($data->id_card !='' && $data->is_verified == 3) {
                    $b .= '&nbsp;<a  title="Chưa được xác minh / Người dùng bị từ chối" class="btn btn-xs btn-danger "><i class="fa fa-user-secret"></i></a>';
                }
                if ($data->mobile_verify !='' && $data->mobile_verify == 1) {
                    $b .= '&nbsp;<a  title="Đã xác minh số điện thoại" class="btn btn-xs btn-purple "><i class="fa fa-mobile"></i></a>';
                }
                return $b;
            })
            ->make(true);
    }
    public function loadEmployee(Request $request)
    {
        $data = Employee::All()->where('type', '!=', 'adm');
        return Datatables::of($data)

            ->addColumn('action', function ($data)
            {
                if ($data->status == 0){ $status = "fa-unlock";$title = 'Kích hoạt'; $btn_clr = 'btn-success'; }
                if ($data->status == 1){ $status = "fa-lock"; $title = 'Khóa'; $btn_clr = 'btn-danger'; }

                $b = '<input type="checkbox" name="status" data-id="' . $data->id . '" data-obj="employee" " ' . (($data->status == '1') ? 'checked' : '') . ' " data-on-text="On" data-off-text="Off" data-size="mini"  >&nbsp; <span id="action_separator">|</span> &nbsp;';
                $b = '<a onclick="editRow(' . $data->id . ')" href="javascript:;" title="Sửa" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i></a> ';
                $b .= '<a onclick="deleteRow(this)" data-id="' . $data->id . '"  data-obj="employee" href="javascript:;" title="Xóa" class="btn btn-xs btn-danger danger-alert"><i class="glyphicon glyphicon-trash"></i></a> ';
                $b .= '&nbsp;<a onclick="changeStatus(this)" data-obj="employee" data-id="'.$data->id.'"  title="'.$title.'" class="btn btn-xs '.$btn_clr.' "><i class="fa '.$status.' "></i></a>';
                if ($data->id_card !='') {
                    $b .= '&nbsp;<a onclick="view_card('.$data->id.')" title="Ảnh thẻ" class="btn btn-xs btn-warning "><i class="fa fa-credit-card"></i></a>';
                }
                if ($data->id_card !='' && $data->is_verified == 2) {
                    $b .= '&nbsp;<a  title="Người dùng đã xác minh" class="btn btn-xs btn-success "><i class="fa fa-check-square-o"></i></a>';
                }
                if ($data->id_card !='' && $data->is_verified == 3) {
                    $b .= '&nbsp;<a  title="Chưa được xác minh / Người dùng bị từ chối" class="btn btn-xs btn-danger "><i class="fa fa-user-secret"></i></a>';
                }
                if ($data->mobile_verify !='' && $data->mobile_verify == 1) {
                    $b .= '&nbsp;<a  title="Đã xác minh số điện thoại" class="btn btn-xs btn-purple "><i class="fa fa-mobile"></i></a>';
                }
                return $b;
            })
            ->make(true);
    }
    /*
     * load region
     */
    public function loadRegions(Request $request)
    {
        $data = Region::All();
        $count=0;
        return Datatables::of($data)
            ->addColumn('action', function ($data)
            {
                $b = '<a href="'.url('edit-region/'.$data->id).'" title="Sửa" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i></a> ';
                $b .= '<a onclick="deleteRow(this)" data-id="' . $data->id . '" data-obj="region" href="javascript:;" title="Xóa" class="btn btn-xs btn-danger danger-alert"><i class="glyphicon glyphicon-trash"></i></a> ';
                return $b;
            })
            ->editColumn('id', function($data){global $count;
                $count++;
                return $count;
            })
            ->make(true);
    }
    /*
     * load city
     */
    public function loadCity(Request $request)
    {
        $data = DB::table('region')
            ->join('city', 'city.region_id', 'region.id')
            ->select('city.id', 'city.title', 'region.title as region','region.created_at');

        $count=0;
        return Datatables::of($data)
            ->addColumn('action', function ($data)
            {
                $b = '<a href="'.url('edit-city/'.$data->id).'" title="Sửa" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i></a> ';
                $b .= '<a onclick="deleteRow(this)" data-id="' . $data->id . '" data-obj="city" href="javascript:;" title="Xóa" class="btn btn-xs btn-danger danger-alert"><i class="glyphicon glyphicon-trash"></i></a> ';
                return $b;
            })
            ->editColumn('id', function($data){global $count;
                $count++;
                return $count;
            })
            ->make(true);
    }

    public function loadAdsLists(Request $request)
    {
        $data = DB::table('ads')
            ->join('region', 'region.id', '=', 'ads.region_id')
            ->join('city', 'city.id', '=', 'ads.city_id')
            ->join('users', 'users.id', '=', 'ads.user_id')
            ->join('categories', 'categories.id', '=', 'ads.category_id')
            ->select(
                'region.id',
                'region.title as ad_title',
                'ads.title',
                'ads.description',
                'ads.status',
                'ads.f_type',
                'ads.id as ads_id',
                'ads.created_at',
                'users.name as user_name',
                'users.email as user_email',
                'users.phone as user_phone',
                'region.title as region_title',
                'city.title as city_title',
                'categories.name as category_title'
            )->whereIn('ads.status', [0,1,2]);
         $count = 0;
        return Datatables::of($data)
            ->editColumn('id', function($data){
                global $count;
                $count++;
                return $count;
            })
            ->editColumn('user_name', function($data){
                return $data->user_name.'</br>SĐT: '.$data->user_phone.'<br>Email: '.$data->user_email;
            })
            ->editColumn('f_type', function($data){
                $result = str_replace('_', '', $data->f_type );
                $result = str_replace('price', '', $result );
                return '<span class="label label-primary">'.$result.'</span>';
            })
            ->editColumn('title', function($data){
                $title='';
                $title .= '<a href="'.url('tin/'.urlencode(str_slug(str_replace(' - ', '', $data->title.'-'.$data->ads_id), '-'))).'">'.ucfirst($data->title).'</a>';
                return $title;
            })
            ->addColumn('action', function ($data)
            {
                if ($data->status == 0){
                    $status = "fa-lock"; $title = 'Khóa'; $btn_clr = 'btn-danger';
                }
                if ($data->status == 1){
                    $status = "fa-unlock";$title = 'Kích hoạt'; $btn_clr = 'btn-success';
                }
                if ($data->status == 2){
                    $status = "fa-ban"; $title = 'Chờ kích hoạt'; $btn_clr = 'btn-warning';
                }

                $b = '<a href="'.route('ads.edit', $data->ads_id).'" title="Sửa" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i></a> ';
                $b .= '<a onclick="deleteRow(this)" data-id="' . $data->ads_id . '" data-obj="ads" href="javascript:;" title="Xóa" class="btn btn-xs btn-danger danger-alert"><i class="glyphicon glyphicon-trash"></i></a> ';
                $b .= '&nbsp;<a onclick="changeStatus(this)" data-obj="ads" data-id="'.$data->ads_id.'"  title="'.$title.'" class="btn btn-xs '.$btn_clr.' "><i class="fa '.$status.' "></i></a>';
                
                return $b;
            })
            ->rawColumns(['title', 'user_name', 'action', 'f_type'])
            ->make(true);
    }

    public function loadOrderLists(Request $request)
    {
        $data = DB::table('orders')
            ->join('users', 'users.id', '=', 'orders.user_id')
            ->select(
                'orders.id',
                'users.name',
                'orders.customer_name',
                'orders.tel',
                'orders.address',
                'orders.description',
                'orders.payment_method',
                'orders.pay_total',
                'orders.status',
                'orders.created_at'
            );
         $count = 0;
        return Datatables::of($data)
            ->editColumn('id', function($data){
                global $count;
                $count++;
                return $count;
            })
            ->editColumn('customer_name', function($data){
                $name = '<p>'.$data->customer_name.'</p>'
                        .'<p>SĐT: '.$data->tel.'</p>'
                        .'<p>Đ/c: '.$data->address.'</p>'; 
                return $name;
            })
            ->editColumn('payment_method', function($data){
                return isset(Order::$PAYMENT_METHOD[$data->payment_method]) ? 
                        Order::$PAYMENT_METHOD[$data->payment_method] : Order::$PAYMENT_METHOD[1];
            })
            ->editColumn('pay_total', function($data){
                return number_format($data->pay_total). ' đ';
            })
            ->addColumn('action', function ($data)
            {
                if ($data->status == 0){
                    $status = "fa-ban"; $title = 'Chờ xử lý'; $btn_clr = 'btn-warning';
                } elseif ($data->status == 1){
                    $status = "fa-unlock";$title = 'Đang giao hàng'; $btn_clr = 'btn-success';
                } elseif ($data->status == 2){
                    $status = "fa-lock"; $title = 'Đã giao hàng'; $btn_clr = 'btn-danger';
                }

                /*$b = '<a onclick="deleteRow(this)" data-id="' . $data->id . '" data-obj="order" href="javascript:;" title="Xóa" class="btn btn-xs btn-danger danger-alert"><i class="glyphicon glyphicon-trash"></i></a> ';*/
                /*$b .= '&nbsp;<a onclick="changeStatus(this)" data-obj="order" data-id="'.$data->ads_id.'"  title="'.$title.'" class="btn btn-xs '.$btn_clr.' "><i class="fa '.$status.' "></i></a>';*/
                $b = '&nbsp;<select onchange="changeStatus(this)" data-obj="order" data-id="'.$data->id.'">';
                foreach (Order::$STATUS as $key => $value) {
                    $selected = $data->status == $key ? 'selected' : '';
                    $b .= '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
                }
                $b .= '</select>';
                $b .= '&nbsp;<a onclick="viewDetail(this)" data-id="'.$data->id.'" title="Chi tiết đơn hàng" class="btn btn-xs"><i class="fa fa-eye"></i></a>';
                return $b;
            })
            ->rawColumns(['customer_name', 'payment_method', 'pay_total', 'action'])
            ->make(true);
    }

    public function loadSliderLists(Request $request)
    {
        $data = DB::table('sliders')->get();
         $count = 0;
        return Datatables::of($data)
            ->editColumn('id', function($data){
                global $count;
                $count++;
                return $count;
            })
            ->editColumn('path', function($data){
                $path='';
                $path .= '<img src="'.asset($data->path).'" style="width: 150px; height: 100px;">';
                return $path;
            })
            ->editColumn('link', function($data){
                $link='';
                $link .= '<a href="'.$data->link.'">'.$data->link.'</a>';
                return $link;
            })
            ->addColumn('action', function ($data)
            {
                if ($data->status == 0){
                    $status = "fa-lock"; $title = 'Khóa'; $btn_clr = 'btn-danger';
                }
                if ($data->status == 1){
                    $status = "fa-unlock";$title = 'Kích hoạt'; $btn_clr = 'btn-success';
                }

                $b = '<a href="'.route('slider.edit', $data->id).'" title="Sửa" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i></a> ';
                $b .= '<a onclick="deleteRow(this)" data-id="' . $data->id . '" data-obj="slider" href="javascript:;" title="Xóa" class="btn btn-xs btn-danger danger-alert"><i class="glyphicon glyphicon-trash"></i></a> ';
                $b .= '&nbsp;<a onclick="changeStatus(this)" data-obj="slider" data-id="'.$data->id.'"  title="'.$title.'" class="btn btn-xs '.$btn_clr.' "><i class="fa '.$status.' "></i></a>';
                
                return $b;
            })
            ->rawColumns(['path', 'link', 'action'])
            ->make(true);
    }

    function changeStatus(Request $request){

        $object = $request->obj;

        if ($object == 'users')
        {
            $user = User::whereId($request->id)->first();
            if ($user->status == 1)
            {
                $status = 0;
                $status_txt = 'Đã hủy kích hoạt';
            }
            if ($user->status == 0)
            {
                $status = 1;
                $status_txt = 'kích hoạt';
            }
            $update = DB::table('users')->where(['id' => $request->id])->update(['status' => $status]);

            $email_temp = DB::table('email_settings')->select('status_subject','status_content')->where('user_id', Auth::user()->id)->first();

            $subject = $email_temp->status_subject;
            $content = $email_temp->status_content;

            $content = str_replace('%email%',$user->email, $content);
            $content = str_replace('%name%',$user->name, $content);
            $content = str_replace('%status%', $status_txt, $content);
            $content = str_replace('%password%',$user->plain_password, $content);

            $this->notification_to_email = $user->email;
            $this->notification_subject = $subject;

            $data = array('email' => $user->email, 'content' => $content, 'subject' => $subject );

            Mail::send('admin.user.email_notification', $data, function($msg){
                $msg->subject($this->notification_subject);
                $msg->to($this->notification_to_email);
            });
            echo json_encode(array('res' => $status));

        }
        // admin ads status change
        if ($object == 'ads')
        {
            $stat = DB::table('ads')->where(['id' => $request->id])->value('status');
            if ($stat == 1)
            {
                $status = 0;
            }
            if ($stat == 0 || $stat == 2)
            {
                $status = 1;
            }
            $update = DB::table('ads')->where(['id' => $request->id])->update(['status' => $status]);
            echo json_encode(array('res' => $status));
        }
        // user ads status change
        if ($object == 'user_ads')
        {
            $stat = DB::table('ads')->where(['id' => $request->id])->value('status');
            if ($stat == 1) { $status = 2; }
            if ($stat == 2) { $status = 1; }

            $update = DB::table('ads')->where(['id' => $request->id])->update(['status' => $status]);
            if ($update)
            {
                $active = Ads::where(['user_id' => Auth::user()->id, 'status' => 1])->count();
                $inactive = Ads::where(['user_id' => Auth::user()->id, 'status' => 2])->count();
                echo json_encode(array('active' => $active, 'inactive' => $inactive));
                //echo json_encode(array('res' => $status));
            }
        }

        // slider status change
        if ($object == 'slider')
        {
            $slider = Slider::find($request->id);
            $slider->status = !$slider->status;
            $slider->save();
            echo json_encode(array('res' => $slider->status));
        }

        if ($object == 'order')
        {
            $update = DB::table('orders')->where(['id' => $request->id])->update(['status' => $request->status]);
            echo json_encode(array('res' => $request->status));

        }
    }

    public function delete(Request $request)
    {
        if ($request->id!='' && $request->obj!='')
        {
            $delete = 1;
            $msg = 'Đã xoá thành công.';

            if ($request->obj == 'custom_page')
            {
                $delete = CustomPage::findOrFail($request->id)->delete();
                if (!$delete) {
                    $delete = 0;
                }
            }
            // region
            if ($request->obj == 'region')
            {
                $delete = Region::findOrFail($request->id)->delete();
                if (!$delete)
                {
                    $delete = 0;
                }
            }
            // region
            if ($request->obj == 'city')
            {
                $delete = City::findOrFail($request->id)->delete();
                if (!$delete)
                {
                    $delete = 0;
                }
            }

            // users
            if ($request->obj=='users')
            {
                $check_usage1 = Ads::where('user_id', '=', $request->id)->first();
                if ($check_usage1 )
                {
                    $delete = 0;
                    $msg = 'Người dùng có một số mẫu email và chủ đề. Nếu bạn xóa Người dùng, các Mẫu này cũng sẽ bị xóa.';
                }else{
                    $user = User::findOrFail($request->id)->delete();
                }
            }

            if ($request->obj == 'chat_setting')
            {
                $delete = DB::table('chat_setting')->where(['user_id' => Auth::user()->id, 'blocked_user' => $request->id])->delete();
                if (!$delete)
                {
                    $delete = 0;
                }
            }
            if ($request->obj == 'ads')
            {
                $delete = Ads::findOrFail($request->id)->delete();
                if(!$delete)
                {
                    $delete = 0;
                }
            }
            if($request->obj == 'chat')
            {
                die();
                $temp = explode(',', $request->id);
                $identifier = $temp[0] .':'. $temp[1];
                $identifier2 = $temp[1] .':'. $temp[0];

                $delete = Chat::where(['identifier' => $identifier, 'identifier' => $identifier2])->delete();
                if(!$delete)
                {
                    $delete = 0;
                }
            }
            // delete user ads
            if($request->obj == 'user_ads')
            {
                $delete = Ads::findOrFail($request->id)->delete();
                if(!$delete)
                {
                    $delete = 0;
                }else{
                    $images = AdsImages::where('ad_id', $request->id)
                        ->select('image')
                        ->get()
                        ->toArray();
                    // delete images
                    foreach($images as $val)
                    {
                        if (file_exists(base_path('assets/images/listings/' . $val['image'])) && $val['image'] != null )
                        {
                            unlink(base_path('assets/images/listings/' . $val['image']));
                        }
                    }
                }
            }
            // groups
            if($request->obj=='groups')
            {
                $check_usage1 = GroupFields::where('group_id', '=', $request->id)->first();
                if($check_usage1 )
                {
                    $delete = 0;
                    $msg = 'Để xóa nhóm, bạn cần xóa các trường của nó.';
                }else{
                    $group = Groups::findOrFail($request->id)->delete();
                }
            }
        // groups fields
            if($request->obj=='group_fields')
            {
                $delete =  GroupFields::where('id',$request->id)->delete();
                if(!$delete)
                {
                    $delete = 0;
                }
            }
            // slider
            if ($request->obj == 'slider')
            {
                $slider = Slider::findOrFail($request->id);
                $delete = $slider->delete();
                if (!$delete) {
                    $delete = 0;
                } else {
                    unlink($slider->path);
                }
            }

            if ($request->obj == 'order')
            {
                $order = Order::findOrFail($request->id);
                $delete = $order->delete();
                if (!$delete) {
                    $delete = 0;
                }
            }

            if($delete==1)
            {
                echo '{"type":"success","msg":"'.$msg.'"}';
            }else{
                echo '{"type":"error","msg":"'.$msg.'"}';
            }
        }else{
            echo '0';
        }
    }

    function deleteCategory(Request $request)
    {
        $category = $request->cat_id;

        foreach ($category as $item) {
            $id = Category::where('id', $item)->select('parent_id')->first();
            $result = $this->getTree($item);
        }
        echo 1;
    }

    private function getTree($cat_id)
    {
       Category::where(['id' => $cat_id])->update(['status' => 0]);

        $cate = Category::where('parent_id', $cat_id)->get();
        foreach( $cate as $Child ) {
            $this->getTree($Child->category_id);
        }
    }

    private function testTree($cat_id)
    {
        $parent_id = '';
        $cate = Category::where('id', $cat_id)->get();
        foreach( $cate as $Child ) {
            $this->testTree($Child->parent_id);
            if($Child->parent_id ==0)
            {
                $parent_id=  $Child->id;
            }
        }
        if ($parent_id!='')
        {
            \Session::put('parent_id', $parent_id);
        }
    }

    // ajax show custom fields to ads post
    public function loadCustomFields(Request $request)
    {
        $cat = Category::parent($request->id)->renderAsArray();
        $cat_ids = Category::childIds($cat);
        array_push($cat_ids, $request->id);

        $cate = Category::where('id', $request->id)->value('parent_id');
        $this->testTree($cate);

       $parent_id = \Session::get('parent_id');
        \Session::forget('parent_id');


        $fields = DB::table('category_customfields')
            ->join('customfields', 'category_customfields.customfields_id', 'customfields.id')
            ->select(
                'customfields.id',
                'customfields.name',
                'customfields.type',
                'customfields.data_type',
                'customfields.options',
                'customfields.description',
                'customfields.inscription',
                'customfields.required_field',
                'customfields.icon',
                'customfields.image'
            )
            ->whereIn('category_customfields.category_id',$cat_ids)
            ->groupBy('category_customfields.customfields_id')
            ->get();
        // ->toArray()

        // groups
        $groups = array();

        $data = DB::table('category_groups')
            ->join('groups', 'category_groups.group_id', 'groups.id')
            ->select(
                'groups.id as group_id',
                'groups.title',
                'groups.icon',
                'groups.image'
            )
            ->where('category_groups.category_id',$parent_id)
            ->groupBy('groups.id')
            ->get()->toArray();

        foreach($data as $v)
        {
            $group_fields = GroupFields::select('title', 'icon', 'image', 'id')->where(['group_id' => $v->group_id, 'status' => 1])->get()->toArray();
            array_push( $groups,  [
                'group_title' => $v->title,
                'group_id' => $v->group_id,
                'group_icon' => $v->icon,
                'group_image' => $v->image,
                'group_fields' => $group_fields
            ]);
        }

        return view('ads.load_customfields', compact('fields', 'groups'));
    }

    function loadEditedCustomFields(Request $request)
    {
        if($request->id!='')
        {
            $id= $request->id;
            //echo '<pre>';
            $fields = DB::table('custom_field_data')
                ->join('customfields', 'customfields.id', 'custom_field_data.cf_id')
                ->select(
                    'custom_field_data.column_name',
                    'custom_field_data.column_value',
                    'customfields.id',
                    'customfields.name',
                    'customfields.type',
                    'customfields.data_type',
                    'customfields.options',
                    'customfields.description',
                    'customfields.inscription',
                    'customfields.required_field',
                    'customfields.icon',
                    'customfields.image'
                )
                ->where(['custom_field_data.ad_id' => $id])
                ->get()
                //->toArray()
            ;
            //print_r($ad_cf_data);
            //exit;
            //groups data
            $groups = array();
            $grup = DB::table('group_data')
                ->join('groups', 'group_data.group_id', 'groups.id')
                ->select(
                    'groups.id as group_id',
                    'groups.title',
                    'groups.icon',
                    'groups.image'
                )
                ->where('group_data.ad_id',$id)
                ->groupBy('group_data.group_id')
                ->get()->toArray();

            foreach($grup as $v)
            {
                $group_fields = DB::table('group_fields')
                    ->join('group_data', 'group_data.group_id', 'group_fields.group_id')
                    ->select(
                        'group_fields.title',
                        'group_fields.icon',
                        'group_fields.image',
                        'group_fields.id',
                        'group_data.column_name',
                        'group_data.column_value'
                    )
                    ->where([ 'group_data.ad_id' => $id , 'group_data.group_id' => $v->group_id, 'group_fields.status' => 1])
                    ->groupBy('group_fields.id')
                    ->get()
                    ->toArray();
                array_push( $groups,  [
                    'group_title' => $v->title,
                    'group_id' => $v->group_id,
                    'group_icon' => $v->icon,
                    'group_image' => $v->image,
                    'group_fields' => $group_fields,
                ]);
            }

            return view('ads.load_edited_customfields', compact('fields', 'groups'));
        }

    }

    function loadMyAds(Request $request)
    {
        $data = DB::table('ads')
            ->join('region', 'region.id', '=', 'ads.region_id')
            ->join('city', 'city.id', '=', 'ads.city_id')
            ->join('categories', 'categories.id', '=', 'ads.category_id')
            ->select(
                'region.id',
                'region.title as ad_title',
                'ads.title',
                'ads.price',
                'ads.description',
                'ads.status',
                'ads.id as ads_id',
                'ads.created_at',
                'region.title as region_title',
                'city.title as city_title',
                'categories.name as category_title'
            )->where('user_id', Auth::user()->id);

        if ($request->load_ads == 'active')
        {
            $data = $data->where('ads.status', 1);
        }
        if ($request->load_ads == 'inactive')
        {
            $data = $data->where('ads.status', 2);
        }
        if ($request->load_ads == 'pending')
        {
            $data = $data->where('ads.status', 0);
        }

        $count = 0;
        return Datatables::of($data)
            ->editColumn('id', function ($data) {
                global $count;
                $count++;
                return $count;
            })
            ->editColumn('title', function ($data) {
                $title = '';
                $title .= '<a href="'.url('single/'.urlencode(strtolower(str_replace(' ', '-', $data->title.'-'.$data->ads_id)))  ).'">'.ucfirst($data->title).'</a>';
                return $title;
            })
            ->addColumn('action', function ($data) {
                if ($data->status == 0)
                {
                    $status = "fa-lock";
                    $title = 'Chờ phê duyệt';
                    $btn_clr = 'btn-warning';
                }

                if ($data->status == 1)
                {
                    $status = "fa-unlock";
                    $title = 'Inactive';
                    $btn_clr = 'btn-success';
                }

                if ($data->status == 2)
                {
                    $status = "fa-ban";
                    $title = 'Kích hoạt quảng cáo';
                    $btn_clr = 'btn-primary';
                }

                $b = '<a href="'.route('ads.edit', $data->ads_id).'" title="Sửa" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i></a> ';
                $b .= '&nbsp;<a onclick="deleteRow(this)" data-id="' . $data->ads_id . '" data-obj="user_ads" href="javascript:;" title="Xóa" class="btn btn-sm btn-danger danger-alert"><i class="glyphicon glyphicon-trash"></i></a> ';
                if($data->status == 1 || $data->status == 2)
                {
                    $b .= '<a onclick="changeStatus(this)" data-obj="user_ads" data-id="' . $data->ads_id . '"  title="'.$title.'" class="btn btn-sm '.$btn_clr.'"><i class="fa '.$status.'"></i></a>';
                }
                return $b;
            })
            ->rawColumns(['title', 'action'])
            ->make(true);
    }

    public function loadMyOrders(Request $request)
    {
        $data = DB::table('orders')
            ->join('users', 'users.id', '=', 'orders.user_id')
            ->select(
                'orders.id',
                'users.name',
                'orders.customer_name',
                'orders.tel',
                'orders.description',
                'orders.address',
                'orders.pay_total',
                'orders.payment_method',
                'orders.status',
                'orders.created_at'
            )->where('user_id', Auth::user()->id);
         $count = 0;
        return Datatables::of($data)
            ->editColumn('id', function($data){
                global $count;
                $count++;
                return $count;
            })
            ->editColumn('customer_name', function($data){
                $name = '<p>'.$data->customer_name.'</p>'
                        .'<p>SĐT: '.$data->tel.'</p>'
                        .'<p>Đ/c: '.$data->address.'</p>'; 
                return $name;
            })
            ->editColumn('payment_method', function($data){
                return isset(Order::$PAYMENT_METHOD[$data->payment_method]) ? 
                        Order::$PAYMENT_METHOD[$data->payment_method] : Order::$PAYMENT_METHOD[1];
            })
            ->editColumn('pay_total', function($data){
                return number_format($data->pay_total). ' đ';
            })
            ->addColumn('action', function ($data)
            {
                $selected0 = '';
                $selected1 = '';
                $selected2 = '';
                if ($data->status == 0){
                    $selected0 = 'selected';
                    $status = "fa-ban"; $title = 'Chờ xử lý'; $btn_clr = 'btn-warning';
                } elseif ($data->status == 1){
                    $selected1 = 'selected';
                    $status = "fa-unlock";$title = 'Đang giao hàng'; $btn_clr = 'btn-success';
                } elseif ($data->status == 2){
                    $selected2 = 'selected';
                    $status = "fa-lock"; $title = 'Đã giao hàng'; $btn_clr = 'btn-danger';
                }

                /*$b = '<a onclick="deleteRow(this)" data-id="' . $data->id . '" data-obj="order" href="javascript:;" title="Xóa" class="btn btn-xs btn-danger danger-alert"><i class="glyphicon glyphicon-trash"></i></a> ';*/
                /*$b .= '&nbsp;<a onclick="changeStatus(this)" data-obj="order" data-id="'.$data->ads_id.'"  title="'.$title.'" class="btn btn-xs '.$btn_clr.' "><i class="fa '.$status.' "></i></a>';*/
                $b = '&nbsp;<select onchange="changeStatus(this)" data-obj="order" data-id="'.$data->id.'">'
                    .'<option value="0" '.$selected0.'>Chờ xử lý</option>'
                    .'<option value="1" '.$selected1.'>Đang giao hàng</option>'
                    .'<option value="2" '.$selected2.'>Đã giao hàng</option>'
                    .'</select>';

                $b .= '&nbsp;<a onclick="viewDetail(this)" data-id="'.$data->id.'" title="Chi tiết đơn hàng" class="btn btn-xs"><i class="fa fa-eye"></i></a>';
                
                return $b;
            })
            ->rawColumns(['customer_name', 'payment_method', 'pay_total', 'action'])
            ->make(true);
    }

    /*
     * load saved ads
     * */
    function loadSaveAds(Request $request)
    {
        $data = DB::table('ads')
            ->join('region', 'region.id', 'ads.region_id')
            ->join('city', 'city.id', 'ads.city_id')
            ->join('categories', 'categories.id','ads.category_id')
            ->join('save_add', 'save_add.ad_id', 'ads.id')
            ->select(
                'region.id',
                'region.title as ad_title',
                'ads.title',
                'ads.price',
                'ads.description',
                'ads.status',
                'ads.id as ads_id',
                'ads.created_at',
                'region.title as region_title',
                'city.title as city_title',
                'categories.name as category_title'
            )->where('save_add.user_id', Auth::user()->id);


        $count = 0;
        return Datatables::of($data)
            ->editColumn('id', function ($data) {
                global $count;
                $count++;
                return $count;
            })
            ->editColumn('title', function ($data) {
                $title = '';
                $title .= '<a href="'.url('single/'.urlencode(strtolower(str_replace(' ', '-', $data->title.'-'.$data->ads_id)))  ).'">'.ucfirst($data->title).'</a>';
                return $title;
            })
            ->addColumn('action', function ($data) {
                $b = '<button title="Không lưu quảng cáo" class="btn btn-xs btn-danger" onclick="del_saved('.$data->ads_id.')"><i class="fa fa-star-o"></i></button>';
                return $b;
            })
            ->rawColumns(['title', 'action'])
            ->make(true);
    }

    function loadPriceOption(Request $request)
    {
        $option = DB::table('price_options')
            ->where('category_id', $request->id)->value('options');
        if($option)
        {
            return Response::json(explode(',', $option));
        }
    }

    function saveAdd(Request $request)
    {
        if($request->id !='' && $request->action =='ins')
        {
            $find = SaveAdd::where(['user_id' => Auth::user()->id, 'ad_id' => $request->id])->value('ad_id');
            if(!$find)
            {
                $insert = SaveAdd::insert(['user_id' => Auth::user()->id, 'ad_id' => $request->id]);
                if($insert)
                {
                    echo 1;
                }
            }
        }

        if($request->id !='' && $request->action=='del')
        {
            $find = SaveAdd::where(['user_id' => Auth::user()->id, 'ad_id' => $request->id])->value('ad_id');
            if($find)
            {
                $delete = SaveAdd::where(['user_id' => Auth::user()->id, 'ad_id' => $request->id])->delete();
                if($delete)
                {
                    echo 1;
                }
            }
        }
    }

    /*load detail order*/
    function viewDetailOrder($id) {
        $order = Order::find($id);
        $rs = OrderAds::where('order_id', $id)->get();
        return response()->json([
            'html' => view('order.detail', compact('rs'))->render(),
            'total' => number_format($order->pay_total).' đ'
        ]);
    }

    /* load child cats */
    function loadChildCat(Request $request){
        $id = $request->id;
        if ($id!='' && is_numeric($id)){
            $direct_childs = Category::select('id', 'name', 'parent_id')->where(['parent_id' => $id, 'status' => 1])->get();
            return view('ads.load_category', compact('direct_childs'));
        }
    }

    function userRating(Request $request){
        if($request->score!=''){
            /* check if already in record  */
            $user_rated = DB::table('user_rating')
                ->where(['user_id' => $request->user_id, 'by_user' => auth::user()->id ])
                ->value('id');

            if(!$user_rated){
                $ins = DB::table('user_rating')
                    ->insert(['user_id' => $request->user_id, 'by_user' => auth::user()->id , 'score' => $request->score ]);
                if($ins) {
                    return response()->json(['msg' => 1]);
                }
            }
        }
    }

}// end class
