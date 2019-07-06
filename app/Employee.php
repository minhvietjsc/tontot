<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table="employees_profile";

    protected $fillable=[
    	'name',
    	'email',
    	'telephone',
    	'address',
    	'created_at',
    	'update_at'
    ];
}
