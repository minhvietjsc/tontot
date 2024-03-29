<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupFields extends Model
{

    protected $table = 'group_fields';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title','icon','group_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];
}