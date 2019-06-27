<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /*public static function buildCategory($parent, $category, $dash = '') {
	    //print_r($category['parent_cats'][$parent]);
	    $html = $bold = "";
	    if (isset($category['parent_cats'][$parent])) {
	    	if ($parent == 0)
	    		$dash = '--';
	    	else 
	    		$dash .= '--';
	        foreach ($category['parent_cats'][$parent] as $cat_id) {
	        	if ($parent == 0)
        			$html .= "<option value='".$cat_id."'>" .ucfirst($category['categories'][$cat_id]['name']). "</option>";
        		else {
        			
        			$html .= "<option value='".$cat_id."'>" .$dash.ucfirst($category['categories'][$cat_id]['name']). "</option>";
        		}
	        	if (isset($category['parent_cats'][$cat_id])) {
	        		$html .= self::buildCategory($cat_id, $category, $dash);
	        	}	            
	        }
	    }
	    return $html;
	}*/

	public static function buildCategory($parent, $category) {
	    //print_r($category['parent_cats'][$parent]);
	    $html = $bold = "";
	    if (isset($category['parent_cats'][$parent])) {
	        $html .= "";
	        foreach ($category['parent_cats'][$parent] as $cat_id) {
	            if (!isset($category['parent_cats'][$cat_id])) {
	                $html .= "<option value='".$cat_id."'>" .ucfirst($category['categories'][$cat_id]['name']). "</option>";
	            }
	            if (isset($category['parent_cats'][$cat_id])) {
	                if($category['categories'][$cat_id]['parent_id'] == 0){
	                    $html .= "<optgroup label='" . ucfirst($category['categories'][$cat_id]['name']) . "'>";
	                }else{
	                    $html .= "<option  value='".$cat_id."'> " .ucfirst($category['categories'][$cat_id]['name']). "</option>";
	                }
	                //$html .= "<optgroup label='" . ucfirst($category['categories'][$cat_id]['name']) . "'>";
	                $html .= self::buildCategory($cat_id, $category);
	                $html .= "</optgroup>";
	            }
	        }
	        $html .= "";
	    }
	    $html .='';
	    return $html;
	}
}
