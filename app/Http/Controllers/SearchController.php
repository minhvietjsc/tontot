<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Ads;
use App\Category;
use App\Region;
use App\CategoryCustomfields;
use Auth;
use App\City;
use App\Http\Helper\Mobile_Detect;

class SearchController extends Controller
{

    private $where , $category , $region, $price_range, $price_sort, $keyword = '';
    private $custom_search = false;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //echo 'asdf';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function filter(){
    $data['bien'] ="aaaaaaaaaaaaaaaa";
    
        return view('search.index',$data);
       
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    public function search(Request $request)
    {
        // return $request->all();
        $detect = new Mobile_Detect;
        //print_r($request->all());
        //exit;
        
        //Là mobile
        if($detect->isMobile())
        {
            // dd("phone");
        }else{
            // dd("PC");
        }
        $result = array();
        $category_id = '';
        $this->keyword = $request->keyword;
        $this->price_sort = $request->price_sort;
        $this->price_range = $request->price_range;
        if (isset($request->reg)) {
            $this->region = Region::where('title', str_replace('-', ' ', $request->reg))->value('id');
        } else if (isset($request->region)) {
            $this->region = $request->region;
        }

        if ($request->category != '' && is_numeric($request->category)) {
            $category_id = $request->category;
        } else if ($request->main_category != '') {
            //echo 'ok';
            $category_id = Category::where('slug', urldecode($request->main_category) )->value('id');
        }
       
        $cat = Category::parent($category_id)->renderAsArray();
        $child_ids = Category::childIds($cat);
        array_push($child_ids, $category_id);

        $this->category = $child_ids;

        // custom search
        $totalCf = 0;
        $cf_req_array = array();
        if (is_array($request->custom_search)) {
            $where = '';
            foreach ($request->custom_search as $index => $item) {
                if ($index != '' && $item != '') {
                    $this->custom_search = true;
                    $where .= 'custom_field_data.column_name = "' . $index . '" and custom_field_data.column_value = "' . $item . '" OR ';
                    $totalCf++;
                    array_push($cf_req_array, $item);
                }
            }
            $this->where = rtrim(ltrim($where), 'OR ');
        }

//exit;
        $sql_search = Ads::with(array('region' => function ($query) {
                if ($this->region != '') {
                    $query->where('region.id', $this->region);
                }
            }, 'category' => function ($query) {
                $query->whereIn('categories.id', $this->category);
            }
            , 'save_add' => function ($query) {
                    if (!Auth::guest()) {
                        $query->where('save_add.user_id', Auth::user()->id);
                    }
                }
            , 'ad_cf_data' => function ($query) {

                    $query->join('customfields', 'customfields.id', '=', 'custom_field_data.cf_id');
                    $query->where('is_shown', 1);
                    if ($this->custom_search == true) {
                        $query->whereRaw($this->where);
                    }
                },
                'ad_images', 'city', 'user'

            )
        );


        if ($this->region != '') {
            $sql_search = $sql_search->where('region_id', $this->region);
        }

        if ($this->category != '') {
            $sql_search = $sql_search->whereIn('category_id', $child_ids);
        }
        // keyword
        if ($request->keyword != '') {
            $sql_search = $sql_search->where('title', 'LIKE', $request->keyword . '%');
        }
        // is image
        if ($request->image != '') {
            $sql_search = $sql_search->where('is_img', $request->image);
        }

        //tim kiem theo city
        if ($request->location != '') {
            $sql_search = $sql_search->where('city_id', $request->location);   
        }
        //sap xep gia
        if ($request->price_sort != ''){
                $sql_search = $sql_search->orderBy('price', $request->price_sort);
        }

        //price range    
        if ($request->price_range != '') {
            $p_range = explode(';', $request->price_range);
            $sql_search = $sql_search->whereBetween('price', [$p_range[0], $p_range[1]]);
        }

        //tim kiem online offline
        if ($request->online == 1 && $request->offline != 2) {
            $sql_search = $sql_search->where('is_login', 1);
        } elseif ($request->online == 2 && $request->offline != 1) {
            $sql_search = $sql_search->where('is_login', 0);
        }

        $sql_search = $sql_search->orderByRaw('CASE WHEN (ads.from_date <= NOW() AND ads.to_date >= NOW() AND ads.ads_type <> 1) THEN ads.ads_type END DESC, ads.created_at DESC');
       
        
        $sql_search = $sql_search->where('status',1);
        $sql_search = $sql_search->orderByRaw("FIELD(f_type , 'top_page_price', 'urgent_top_price', 'urgent_price','home_page_price') ASC, created_at DESC");
        $total = $sql_search->count();

        $sql_search = $sql_search
            ->paginate(10)
            ->appends(request()
                ->query());
            
        error_reporting(0);
        if($total > 0){

        if (isset($sql_search) && count($sql_search[0]->category) > 0 && count($sql_search[0]->city) > 0 && count($sql_search[0]->region) > 0) {

            if ($this->custom_search == true) {
                if (count($sql_search[0]->ad_cf_data) < 1) {
                    $result = array();
                }

            } else {
                $result = $sql_search;
            }
        }
    }

        $category = $request->category;
        //extra search
        $search_fields = DB::table('customfields')
            ->join('category_customfields','customfields.id', 'customfields_id')
            ->where(
                [
                    'category_customfields.category_id' => $category,
                    'customfields.search' => 1
                ]
            )
            ->select(
                'customfields.name',
                'customfields.options'
            )
            ->get()->toArray();

        // regions
        $region = Region::all();
        // get search fields

        $req_category = $category_id;
        $category = Category::find($category_id);

//        echo '<pre>';
//        print_r($result->toArray());
//        exit;
          $parent_cat = [];
        $rs = Category::where(['parent_id'=>$req_category, 'status' => 1])->get();
        foreach ($rs as $cat) {
            $cats = Category::getAllChildsActive($cat->children);
            $child_ids = Category::childIdsActive($cats);
            array_push($child_ids, $cat->id);
            $tmp_cat = [
                'cat' => $cat,
                'ads' => Ads::select('ads.id', 'ads.title', 'ads.price', 'ads_images.image')
                            ->join('ads_images', 'ads_images.ad_id', 'ads.id')
                            ->whereIn('ads.category_id', $child_ids)
                            ->where('ads.status', 1)
                            ->orderByRaw('CASE WHEN (ads.from_date <= NOW() AND ads.to_date >= NOW() AND ads.ads_type IN (3,4)) THEN ads.ads_type END DESC, ads.created_at DESC')
                            ->groupBy('ads.id')
                            ->take(4)
                            ->get()
            ];
            array_push($parent_cat, $tmp_cat);
        }

        return view('search.index', compact('search_fields','result', 'total', 'region', 'category', 'req_category','parent_cat'));
    }

    function ajaxSearch(Request $request){
        $where = '';
        foreach($request->all() as $index => $item){
            $where .= 'column_name = "'.$index.'" and column_value = "'.$item.'" OR ';
        }
        echo  $result = rtrim($where, 'OR ');
    }

}
