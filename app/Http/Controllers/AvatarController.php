<?php

namespace App\Http\Controllers;

use Carbon\Exceptions\Exception;
use Illuminate\Http\Request;
use App\User;
use App\Avatar;
use App\User_item;
use App\items;
use Illuminate\Support\Facades\Auth;

class AvatarController extends Controller
{
   public function loadAvatar()
   {
       $user = Auth::user();
       //Vérifie que l'utilisateur est connecté
       if (isset($user->id) and (!empty($user->id))) {
           try
           {
               $avatar = Avatar::where('user_id', $user->id)->first();
               /*Load Avatar Items*/

               try{$bas_id = Items::find($avatar->bas_id);} catch (Exception $e) {$bas_id = null;}
               try{$haut_id = Items::find($avatar->haut_id);} catch (Exception $e) {$haut_id = null;}
               try{$accessoire_id = Items::find($avatar->accessoire_id);} catch (Exception $e) {$accessoire_id = null;}
               try{$chaussures_id = Items::find($avatar->chaussures_id);} catch (Exception $e) {$chaussures_id = null;}
               try{$gants_id = Items::find($avatar->gants_id);} catch (Exception $e) {$gants_id = null;}
               try{$visage_id = Items::find($avatar->visage_id);} catch (Exception $e) {$visage_id = null;}

               $items = [
                   'bas' => $bas_id,
                   'haut' => $haut_id,
                   'accessoire' => $accessoire_id,
                   'chaussures' => $chaussures_id,
                   'gants' => $gants_id,
                   'visage' =>  $visage_id
               ];

                return response()->json([$avatar, $items], 200);

           } catch (Exception $e)
           {
               return response()->json(["error" => $e], 401);
           }
       } else
       {
           return response()->json(["error" => "Utilisateur non connecté"], 401);
       }
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
    }

    public function changeSexe(Request $request)
    {
        $user = Auth::user();
        //Vérifie que l'utilisateur est connecté
        if (isset($user->id) and (!empty($user->id))) {
            try
            {
                $avatar = Avatar::where('user_id', $user->id)->first();
                $avatar->sexe = $request->sexe;
                $avatar->bas_id = null;
                $avatar->haut_id =null;
                $avatar->accessoire_id = null;
                $avatar->chaussures_id =null;
                $avatar->gants_id = null;
                $avatar->visage_id =null;
                $avatar->save();
                return response()->json("L'avatar a changé de sexe", 200);

            } catch (Exception $e)
            {
                return response()->json(["error" => $e], 401);
            }
        } else
        {
            return response()->json(["error" => "Utilisateur non connecté"], 401);
        }
    }

    public function loadEquipments(Request $request)
    {
        $user = Auth::user();
        //Vérifie que l'utilisateur est connecté
        if (isset($user->id) and (!empty($user->id))) {
            if(isset($request->sexe) and $request->sexe !== null)
            {
                if($request->sexe == 'female') { $sexe = 'Femme';}
                elseif ($request->sexe == 'male') { $sexe = 'Homme';}
                if(isset($request->equipements) and $request->equipements !== null and isset($sexe))
                {
                    $equipments = Items::where(['type' => 'avatar/'.$request->equipements, 'sexe' => $sexe])->get();
                    $user_equipments = [];
                    foreach ($equipments as $equipment)
                    {
                        try
                        {
                            $isUserEquipement = User_item::where(['user_id' => intval($user->id), 'item_id' => intval($equipment->id)])->first();
                            if(isset($isUserEquipement))
                            {
                                $UserEquipement = Items::find($isUserEquipement->item_id);
                                array_push($user_equipments, $UserEquipement);
                            }
                        }
                        catch (Exception $e)
                        {

                        }
                    }
                    return response()->json($user_equipments, 200);
                } else
                {
                    return response()->json(["error" => "La requêtes est incomplète"], 401);
                }
            }


        } else
        {
            return response()->json(["error" => "Utilisateur non connecté"], 401);
        }
    }

    public function updateAvatar(Request $request)
    {
        $user = Auth::user();
        //Vérifie que l'utilisateur est connecté
        if (isset($user->id) and (!empty($user->id))) {
            $avatar = Avatar::where('user_id', $user->id)->first();
            $selected_equipment = $request->selected_equipment;
            $equipement_id = $request->equipement_id;
            switch ($selected_equipment) {
                case("visage") :
                    if ($equipement_id === null)
                    {
                        $avatar->visage_id = null;
                    } else
                    {
                        $avatar->visage_id = intval($equipement_id );
                    }
                    break;
                case("hauts") :
                    if ($equipement_id === null)
                    {
                        $avatar->haut_id = null;
                    } else
                    {
                        $avatar->haut_id = intval($equipement_id );
                    }
                    break;
                case("bas") :
                    if ($equipement_id === null)
                    {
                        $avatar->bas_id = null;
                    } else
                    {
                        $avatar->bas_id = intval($equipement_id );
                    }
                    break;
                case("accessoires") :
                    if ($equipement_id === null)
                    {
                        $avatar->accessoire_id = null;
                    } else
                    {
                        $avatar->accessoire_id = intval($equipement_id );
                    }
                    break;
                case("chaussures") :
                    if ($equipement_id === null)
                    {
                        $avatar->chaussures_id = null;
                    } else
                    {
                        $avatar->chaussures_id = intval($equipement_id );
                    }
                    break;
                case("gants") :
                    if ($equipement_id === null)
                    {
                        $avatar->gants_id = null;
                    } else
                    {
                        $avatar->gants_id = intval($equipement_id );
                    }
                    break;
            }
            $avatar->save();
            return response()->json("L'équipement a bien été équipé", 200);

        } else
        {
            return response()->json(["error" => "Utilisateur non connecté"], 401);
        }
    }
}
