<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rooms extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'reviews', 'number_reviews', 'description', 'players', 'device', 'riddles', 'duration', 'difficulty', 'difficulty_reviews', 'games_played', 'price', 'img_link', 'url', 'created_at'
    ];

    protected $dates = ['created_at'];
}
