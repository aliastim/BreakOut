<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'img', 'created_at', 'updated_at'
    ];

    protected $dates = ['created_at'];

    // Pour éviter que les requêtes ajoute un s à la fin du nom de la table : "carousels"
    protected $table = "carousel";
}
