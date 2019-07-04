<?php



namespace App\Providers;



use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;
use View;
use App\CustomPage;
use App\Category;

class AppServiceProvider extends ServiceProvider

{

    /**

     * Bootstrap any application services.

     *

     * @return void

     */

    public function boot()

    {

        //

        Schema::defaultStringLength(191);
        $trans = Carbon::getTranslator();
        $trans->addResource('array', require base_path('resources/lang/en/carbon.php'), 'en');
        View::share('setting', \DB::table('setting')->first());
        View::share('region_top', \DB::table('region')->get());
        View::share('city_select', \DB::table('city')->get());
        View::share('pages_contact', CustomPage::where('type', CustomPage::TYPE_CONTACT)->orderBy('sort')->get());
        View::share('pages_purchase', CustomPage::where('type', CustomPage::TYPE_PURCHASE)->orderBy('sort')->get());
        View::share('pages_seller', CustomPage::where('type', CustomPage::TYPE_SELLER)->orderBy('sort')->get());
        $cat = Category::all()->where('status', 1)->toArray();
        $category = array(
            'categories' => array(),
            'parent_cats' => array()
        );
        //build the array lists with data from the category table
        foreach ($cat as $row)
        {
            //creates entry into categories array with current category id ie. $categories['categories'][1]
            $category['categories'][$row['id']] = $row;
            //creates entry into parent_cats array. parent_cats array contains a list of all categories with children
            $category['parent_cats'][$row['parent_id']][] = $row['id'];
        }
        View::share('category_top', $category);
    }



    /**

     * Register any application services.

     *

     * @return void

     */

    public function register()

    {

        //

    }

}

