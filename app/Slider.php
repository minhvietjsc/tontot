<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = 'sliders';
    const STATUS_ACTIVE = 1;
    const STATUS_HIDE = 0;
}