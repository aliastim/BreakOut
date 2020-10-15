<?php

namespace App\Http\Controllers;

use Cocur\Slugify\Slugify;
use Illuminate\Http\Request;
use App\Rooms;

class RoomsController extends Controller
{
    public function loadAll()
    {
        //$user = User::where('email', $request->email)->first();
        $rooms = Rooms::all();
        return response()->json($rooms, 200);
    }

    public function newRoom(Request $request)
    {
        //https://serversideup.net/uploading-files-vuejs-axios/
        $slugify = new Slugify();

        $room = new Rooms();
        $room->name = $request->room_name;
        $room->slug = $slugify->slugify($request->room_name);
        $room->description = $request->room_description;
        $room->players = $request->room_players;
        $room->device = $request->room_device;
        $room->riddles = $request->room_riddles;
        $room->duration = $request->room_duration;
        $room->difficulty = $request->room_difficulty;
        $room->price = $request->room_price;
        $room->img_link = $request->room_image;
        $room->url = $request->room_url;

        $room->save();

        return response()->json($room, 200);
    }
}
