<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table="employees";

    public $timestamps = true;
    
    protected $fillable=[
    	'name',
    	'email',
    	'telephone',
    	'address',
    	'created_at',
    	'updated_at'
    ];
}
