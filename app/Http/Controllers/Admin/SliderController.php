<?php

namespace App\Http\Controllers\Admin;

use App\Slider;
use Auth;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Validator;

class SliderController extends Controller
{
	public function index() {
		return view('admin.slider.index');
	}

	public function create(Request $request) {
		if($request->isMethod('post')) {
			
			$slider = new Slider();
			$slider->title = $request->title;
			$slider->link = $request->link;
			$slider->status = Slider::STATUS_ACTIVE;
			if($request->hasFile('slider')) {
				$file = $request->slider;
				$file_name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)."_".time().".".$file->getClientOriginalExtension();
				$file->move(base_path() . '/assets/images/slider/', $file_name);
				$slider->path = 'assets/images/slider/'.$file_name;
			}
			$slider->save();
			\Session::flash('slider_success', 'Thêm slide thành công!');
			return redirect()->route('slider.index');
		}
		return view('admin.slider.create');
	}

	public function edit(Request $request) {
		$model = Slider::find($request->id);
		if($request->isMethod('post')) {
			$model->title = $request->title;
			$model->link = $request->link;
			if($request->hasFile('slider')) {
				$file = $request->slider;
				$file_name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)."_".time().".".$file->getClientOriginalExtension();
				$file->move(base_path() . '/assets/images/slider/', $file_name);
				$model->path = 'assets/images/slider/'.$file_name;
			}
			$model->save();
			\Session::flash('slider_success', 'Cập nhật slide thành công!');
			return redirect()->route('slider.index');
		}
		return view('admin.slider.create', ['model' => $model]);
	}
}