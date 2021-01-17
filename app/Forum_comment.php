<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forum_comment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'post_id', 'message', 'isImg', 'img', 'created_at', 'updated_at'
    ];

    protected $dates = ['created_at'];
}
