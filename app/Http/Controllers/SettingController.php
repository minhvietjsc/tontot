<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Setting::find(1);
        return view('admin.setting.adsense', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Setting::find(1);
        return view('admin.setting.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $obj = new Setting();

        if($request->id!='')
        {
            $obj = $obj->findOrFail($request->id);
        }

        $obj->fill($request->all());
        if (!$request->has('live_chat')) {
            $obj->live_chat = 0;
        }
        if (!$request->has('map_listings'))  {
            $obj->map_listings = 0;
        }
        if (!$request->has('translate'))  {
            $obj->translate = 0;
        }
        if (!$request->has('hide_price'))  {
            $obj->hide_price = 0;
        }
        if (!$request->has('social_links'))  {
            $obj->social_links = 0;
        }
        if (!$request->has('mobile_verify'))  {
            $obj->mobile_verify = 0;
        }

        // image
        if ($request->hasFile('logo'))
        {
            $file_name  = time() . '.' . $request->logo->getClientOriginalExtension();
            $request->logo->move(base_path() . '/assets/images/logo/', $file_name);
            $obj->logo = $file_name;
        }

        if($obj->save())
        {
            return back()->with('success', 'Lưu cài đặt thành công!');
        }else{
            return back()->with('error', 'Unknown error!');
        }
    }

    function adsenseStore(Request $request)
    {

        print_r($request->all());

        $obj = new Setting();

        if($request->id!='')
        {
            $obj = $obj->findOrFail($request->id);
        }

        $obj->fill($request->all());

        if (!$request->has('home_ads'))
        {
            $obj->home_ads = 0;
        }

        if (!$request->has('search_ads'))
        {
            $obj->search_ads = 0;
        }

        if (!$request->has('profile_ads'))
        {
            $obj->profile_ads = 0;
        }

        if (!$request->has('single_ads'))
        {
            $obj->single_ads = 0;
        }

        if($obj->save())
        {
            return back()->with('success', 'Lưu cài đặt thành công!');
        }else{
            return back()->with('error', 'Unknown error!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


}
