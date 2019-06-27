<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setting', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('logo')->nullable();
            $table->string('nav_bg')->nullable();
            $table->string('body_bg')->nullable();
            $table->string('footer_bg')->nullable();
            $table->string('copy_right_text')->nullable();
            $table->tinyInteger('live_chat')->nullable()->unsigned()->default(1);
            $table->tinyInteger('search_ads')->nullable()->unsigned()->default(1);
            $table->string('search_ads_p')->nullable();
            $table->text('search_adsense')->nullable();
            $table->tinyInteger('profile_ads')->nullable()->unsigned()->default(1);
            $table->string('profile_ads_p')->nullable();
            $table->text('profile_adsense')->nullable();
            $table->tinyInteger('single_ads')->nullable()->nullable()->unsigned()->default(1);
            $table->string('single_ads_p')->nullable();
            $table->text('single_adsense')->nullable();
            $table->tinyInteger('home_ads')->nullable()->nullable()->unsigned()->default(1);
            $table->string('home_ads_p')->nullable();
            $table->text('home_adsense')->nullable();
            $table->string('footer_head_color')->nullable();
            $table->string('footer_link_color')->nullable();
            $table->string('version')->nullable();
            $table->string('currency', 50)->nullable();
            $table->string('currency_place', 50)->nullable();
            $table->string('contact_email', 199)->nullable();
            $table->tinyInteger('mail_conf')->nullable();
            $table->tinyInteger('map_listings')->nullable();
            $table->tinyInteger('hide_price')->nullable();
            $table->tinyInteger('translate')->nullable();
            $table->tinyInteger('social_links')->nullable()->default(0);
            $table->string('facebook', 199)->nullable();
            $table->string('twitter', 199)->nullable();
            $table->string('linkedin', 199)->nullable();
            $table->string('googleplus', 199)->nullable();
            $table->tinyInteger('mobile_verify')->default(0);

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('setting');
    }
}