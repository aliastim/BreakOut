<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\User;
use App\Avatar;
use Illuminate\Support\Facades\Auth;

class AvatarController extends Controller
{
   public function loadAvatar($user_id)
   {
       $avatar= Avatar::find($user_id);
       return response()->json($avatar, 200);
   }

    public function autoGenerate()
    {
        $users= User::all();
        foreach ($users as $user)
        {
            try
            {
                $avatar_exist = Avatar::where('user_id', $user->id)->get()->id;

            } catch (Exception $e)
            {
                $avatar_new = new Avatar();
                $avatar_new->user_id = intval($user->id);
                $avatar_new->save();

            }
        }

        return response()->json("Tous les utilisateurs ont maintenant leur avatar", 200);
        //return response()->json(["error" => "Aucun avatar"], 401);



    }
}
