<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Avatar extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'sexe', 'eye_color', 'hair_color', 'bas_id', 'haut_id', 'accessoire_id', 'chaussures_id', 'gants_id', 'visage_id'
    ];

    protected $dates = ['created_at'];

    // Pour éviter que les requêtes ajoute un s à la fin du nom de la table : "avatars"
    protected $table = "avatar";
}
