<?php

namespace App\Http\Controllers;

use Cocur\Slugify\Slugify;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function addGem()
    {
        $user = Auth::user();
        if (isset($user) and !empty($user) ) {
            $gemuser = User::find($user->id);
            $gemuser->gem = $gemuser->gem + 1;
            $user->gem = $user->gem + 1;
            $gemuser->save();
            return response("Et paf + 1 gemme !!");
        } else
        {
            return response()->json(["error" => "L'utilisateur n'est pas connecté"], 401);
        }
    }
}
