<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Items;
use App\User_item;

class UserItemController extends Controller
{
    public function loadItem(Request $request)
    {
        $user = Auth::user();
        //Vérifie que l'utilisateur est connecté
        if (isset($user->id) and (!empty($user->id))) {
            // Charge l'id de l'utilisateur
            $user_id = $user->id;

            // Charge l'item à vérifier
            $item = Items::where('slug', $request->item_slug)->first();
            if (isset($item) and !empty($item))
            {
                // Vérifie que l'utilisateur possède l'item
                $item_verify = User_item::where(['user_id' => $user_id, 'item_id' => $item->id])->first();
                if (isset($item_verify) and !empty($item_verify))
                {
                    // Vérifie que l'utilisateur possède au moins 1 item
                    if($item_verify->amount >= 1)
                    {
                        /*return response()->json($item_verify, 200);*/
                        return response()->json("itemok", 200);
                    } else
                    {
                        return response()->json("notitem", 200);
                    }

                } else
                {
                    return response()->json("notitem", 200);
                }

            } else
            {
                return response()->json("item doesn't exist", 200);
            }

        } else
        {
            return response()->json("notconnected", 200);
        }


    }

    public function getGold()
    {
        $user = Auth::user();
        //Vérifie que l'utilisateur est connecté
        if (isset($user->id) and (!empty($user->id))) {
            $gold = $user->gold;
            return response()->json($gold, 200);
        }  else
        {
            return response()->json("notconnected", 200);
        }
    }

    public function getGem()
    {
        $user = Auth::user();
        //Vérifie que l'utilisateur est connecté
        if (isset($user->id) and (!empty($user->id))) {
            $gem = $user->gem;
            return response()->json($gem, 200);
        }  else
        {
            return response()->json("notconnected", 200);
        }
    }

    public function addGold(Request $request)
    {
        $user = Auth::user();
        //Vérifie que l'utilisateur est connecté
        if (isset($user->id) and (!empty($user->id))) {

            $gold = $request->gold;

            $golduser = User::find($user->id);
            $golduser->gold = $golduser->gold + $gold;
            $golduser->save();
            return response()->json($gold . " pièces d'or ont été ajoutées au compte", 200);
        } else
        {
            return response()->json(["error" => "L'utilisateur n'est pas connecté"], 401);
        }
    }
}
