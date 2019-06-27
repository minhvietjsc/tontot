<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderAds extends \Eloquent
{
	protected $table = 'order_ads';
    public function ads() {
        return $this->hasMany(Ads::class, 'category_id', 'id');
    }

    public function children () {
        return $this->hasMany(self::class, 'parent_id', 'id');
    }

}