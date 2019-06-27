<?php

namespace App\Http\Controllers\Admin;

use App\Slider;
use Auth;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Validator;

class OrderController extends Controller
{
	public function index() {
		return view('admin.order.list');
	}
}