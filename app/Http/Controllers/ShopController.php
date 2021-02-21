<?php

namespace App\Http\Controllers;

use Exception;
use Cocur\Slugify\Slugify;
use Illuminate\Http\Request;
use App\User;
use App\Items;
use App\User_item;
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

    public function loadAllGoldItem()
    {
        $golditems = Items::where(['money' => 'gold', 'type' => 'objet'])->get();
        return response()->json($golditems, 200);
    }

    public function loadAllGemItem()
    {
        $gemitems = Items::where(['money' => 'gem', 'type' => 'objet'])->get();
        return response()->json($gemitems, 200);
    }

    public function loadAllAvatarItem()
    {
        $avataritems = Items::where('type', 'like', 'avatar/%')->get();
        return response()->json($avataritems, 200);
    }

    public function buyItem(Request $request)
    {
        $user = Auth::user();
        if (isset($user) and !empty($user) ) {
            $item = Items::find($request->id);
            if(isset($item) and !empty($item))
            {
                if ($item->money == "gold") {
                    // Vérifie que l'utilisateur a assez d'or
                    if($user->gold >= $item->price)
                    {
                        // Vérifie que l'utilisateur possède l'item
                        try {
                            $item_verify = User_item::where(['user_id' => $user->id, 'item_id' => $request->id])->first();
                            $item_verify->amount ++;
                            $item_verify->save();

                            $user->gold = ($user->gold - $item->price);
                            $user->save();
                            return response()->json("Achat validé !", 200);
                            //return response()->json($item, 200);
                        } catch (Exception $e)
                        {
                            $useritem = new User_item();
                            $useritem->user_id = $user->id;
                            $useritem->item_id = $request->id;
                            $useritem->amount = 1;
                            $useritem->save();

                            $user->gold = ($user->gold - $item->price);
                            $user->save();

                            return response()->json("Achat validé !", 200);
                        }

                    } else
                    {
                        return response()->json(["error" => "Vous n'avez pas assez d'or"], 401);
                    }

                } elseif ($item->money == "gem") {
                    // Vérifie que l'utilisateur a assez de gemmes
                    if($user->gem >= $item->price)
                    {
                        // Vérifie que l'utilisateur possède l'item
                        $item_verify = User_item::where(['user_id' => $user->id, 'item_id' => $request->id])->first();
                        if (isset($item_verify) and !empty($item_verify))
                        {
                            $item_verify->amount ++;
                            $item_verify->save();

                            $user->gem = ($user->gem - $item->price);
                            $user->save();
                            return response()->json("Achat validé !", 200);

                        } else
                        {
                            $useritem = new User_item();
                            $useritem->user_id = $user->id;
                            $useritem->item_id = $request->id;
                            $useritem->amount = 1;
                            $useritem->save();

                            $user->gem = ($user->gem - $item->price);
                            $user->save();

                            return response()->json("Achat validé !", 200);
                        }

                    } else
                    {
                        return response()->json(["error" => "Vous n'avez pas assez de gemmes"], 401);
                    }

                } else
                {
                    return response()->json(["error" => "erreur"], 401);
                }
            } else
            {
                return response()->json(["error" => "Cet item n'existe pas"], 401);
            }

        } else
        {
            return response()->json(["error" => "Vous devez vous connecter pour acheter un objet"], 401);
        }
    }
}
