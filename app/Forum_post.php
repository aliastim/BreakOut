<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forum_post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'subject', 'slug', 'user_id', 'message', 'closed', 'isImg', 'img', 'comments', 'created_at', 'updated_at'
    ];

    protected $dates = ['created_at'];
}
