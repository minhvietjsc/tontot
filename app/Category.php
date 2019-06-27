<?php



namespace App;



use Illuminate\Database\Eloquent\Model;



use Nestable\NestableTrait;



class Category extends \Eloquent

{



    use NestableTrait;



    protected $parent = 'parent_id';

    public function ads() {
        return $this->hasMany(Ads::class, 'category_id', 'id');
    }

    public function children () {
        return $this->hasMany(self::class, 'parent_id', 'id');
    }

    static function childIds($cat){
        $child_ids = array();
        array_walk_recursive($cat, function($value, $key) use(&$child_ids) {
            if($key == 'id') {
                array_push($child_ids, $value);
            }
        });
        return $child_ids;
    }

    static function childIdsActive($cat){
        $child_ids = array();
        array_walk_recursive($cat, function($value, $key) use(&$child_ids) {
            if($key == 'id') {
                $ex = explode('_', $value);
                if ($ex[1] == 1) {
                    array_push($child_ids, $ex[0]);
                }
            }
        });
        return $child_ids;
    }

    static function childNamesActive($cat){
        $child_names = array();
        array_walk_recursive($cat, function($value, $key) use(&$child_names) {
            if($key == 'name') {
                array_push($child_names, $value);
            }
        });
        return $child_names;
    }

    static function getAllChildsActive($categories) {
        $data = [];
        foreach ($categories as $category) {
            $data[] = [
                'id' => $category->id.'_'.$category->status,
                'name' => $category,
                'children' => self::getAllChildsActive($category->children)
            ];
        }
        return $data;
    }


    public static function buildCategory($parent, $category) {
        $html = "";
        if (isset($category['parent_cats'][$parent])) {
            $html .= "";
            foreach ($category['parent_cats'][$parent] as $cat_id) {
                if (!isset($category['parent_cats'][$cat_id])) {
                    $html .= "<option> " .ucfirst($category['categories'][$cat_id]['name']). "</option>";
                }

                if (isset($category['parent_cats'][$cat_id])) {
                    $html .= "<optgroup label='" . ucfirst($category['categories'][$cat_id]['name']) . "'>";
                    $html .= buildCategory($cat_id, $category);
                    $html .= "</optgroup>";
                }
            }
            $html .= "";
        }
        $html .='';
        return $html;
    }

}