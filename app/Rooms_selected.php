<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rooms_selected extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'room_id', 'created_at', 'updated_at'
    ];

    protected $dates = ['created_at'];

    // Pour éviter que les requêtes ajoute un s à la fin du nom de la table : "carousels"
    protected $table = "rooms_selected";
}
