<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scrollings extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'scrolling', 'created_at', 'updated_at'
    ];

    protected $dates = ['created_at'];
}
