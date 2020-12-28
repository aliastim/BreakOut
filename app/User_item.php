<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_item extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'item_id', 'amount', 'created_at', 'updated_at'
    ];

    protected $dates = ['created_at'];
}
