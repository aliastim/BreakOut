<?php

namespace App\Http\Controllers;

use Cocur\Slugify\Slugify;
use Illuminate\Http\Request;
use App\Rooms;
use Illuminate\Support\Facades\Auth;

class RoomsController extends Controller
{
    public function loadAll()
    {
        $rooms = Rooms::all();
        return response()->json($rooms, 200);
    }

    public function newRoom(Request $request)
    {
        //https://serversideup.net/uploading-files-vuejs-axios/
        $slugify = new Slugify();

        $isexist = Rooms::where('slug', $slugify->slugify($request->room_name))->first();
        if (isset($isexist->id))
        {
            return response()->json(['error' => 'Cette salle existe déjà'], 401);
        }

        if(isset($request->room_name) and !empty($request->room_name))
        {
            $room = new Rooms();
            $room->name = $request->room_name;
            $room->slug = $slugify->slugify($request->room_name);

            if(isset($request->room_description) and !empty($request->room_description))
            {
                $room->description = $request->room_description;
            }
            if(isset($request->room_players) and !empty($request->room_players))
            {
                $room->players = $request->room_players;
            }
            if(isset($request->room_device) and !empty($request->room_device))
            {
                $room->device = $request->room_device;
            }
            if(isset($request->room_riddles) and !empty($request->room_riddles))
            {
                $room->riddles = $request->room_riddles;
            }
            if(isset($request->room_duration) and !empty($request->room_duration))
            {
                $room->duration = $request->room_duration;
            }
            if(isset($request->room_difficulty) and !empty($request->room_difficulty))
            {
                $room->difficulty = $request->room_difficulty;
            }
            if(isset($request->room_price) and !empty($request->room_price))
            {
                if(is_int($request->room_price))
                {
                    $room->price = $request->room_price;
                } else
                {
                    $room->price = intval($request->room_price);
                    //return response()->json(['error' => 'Le prix doit être un entier'], 401);
                }

            }
            if(isset($request->room_image) and !empty($request->room_image))
            {
                $room->img_link = $request->room_image;
            }
            if(isset($request->room_url) and !empty($request->room_url))
            {
                $room->url = $request->room_url;
            }

            $room->save();

            return response()->json($room, 200);
        } else
        {
            return response()->json(['error' => 'Un nom de salle est nécéssaire'], 401);
        }

    }

    public function updateRoom(Request $request)
    {
        //Ne modifier que les valeurs différents de "" pour les strings et de null pour les entiers
        $admin = Auth::user();
        if (isset($admin->admin) and ($admin->admin === 1) ) {

            $room = Rooms::find($request->room_id);

            if(isset($request->room_name) and !empty($request->room_name))
            {
                $slugify = new Slugify();
                $room->name = $request->room_name;
                $room->slug = $slugify->slugify($request->room_name);
            }
            if(isset($request->room_description) and !empty($request->room_description))
            {
                $room->description = $request->room_description;
            }
            if(isset($request->room_players) and ($request->room_players !== null))
            {
                $room->players = $request->room_players;
            }
            if(isset($request->room_device) and !empty($request->room_device))
            {
                $room->device = $request->room_device;
            }
            if(isset($request->room_riddles) and ($request->room_riddles !== null))
            {
                $room->riddles = $request->room_riddles;
            }
            if(isset($request->room_duration) and !empty($request->room_duration))
            {
                $room->duration = $request->room_duration;
            }
            if(isset($request->room_difficulty) and ($request->room_difficulty !== null))
            {
                $room->difficulty = $request->room_difficulty;
            }
            if(isset($request->room_price) and ($request->room_price !== null))
            {
                if(is_int($request->room_price))
                {
                    $room->price = $request->room_price;
                } else
                {
                    $room->price = intval($request->room_price);
                    //return response()->json(['error' => 'Le prix doit être un entier'], 401);
                }
            }
            if(isset($request->room_image) and !empty($request->room_image))
            {
                $room->img_link = $request->room_image;
            }
            if(isset($request->room_url) and !empty($request->room_url))
            {
                $room->url = $request->room_url;
            }

            $room->save();
            return response()->json($room, 200);

        } else
        {
            return response()->json(["error" => "L'utilisateur connecté n'est pas administrateur"], 401);
        }
    }

    public function deleteRoom($id)
    {
        $admin = Auth::user();

        if (isset($admin->admin) and ($admin->admin === 1) ) {
            $room = Rooms::find($id);
            $room->delete();
            return response("Room deleted");
        } else
        {
            return response()->json(["error" => "L'utilisateur connecté n'est pas administrateur"], 401);
        }

    }

    public function rateRoom(Request $request)
    {
        $user = Auth::user();
        if($user !== null)
        {
            $room = Rooms::where('slug', $request->room_slug)->first();
            if(isset($room->id))
            {
                $rate = $request->note;

                $room->reviews = ((($room->reviews * $room->number_reviews) + $rate)/($room->number_reviews+1));
                $room->number_reviews = $room->number_reviews+1;
                $room->save();
                return response("La note a bien été enregistée !");

            } else
            {
                return response()->json(["error" => "Cette salle n'existe pas"], 401);
            }


        } else
        {
            return response()->json(["error" => "L'utilisateur doit être connecté pour noter une salle"], 401);
        }

    }
}
