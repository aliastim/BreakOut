<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Avatar;

class UserController extends Controller
{
    public function loadAll()
    {
        //$user = User::where('email', $request->email)->first();
        $user = User::all();
        return response()->json($user, 200);
    }

    public function userDelete($id)
    {
        $user = User::find($id);
        $avatar = Avatar::where('user_id', $id)->first();
        $user->delete();
        $avatar->delete();
        return response("User deleted");

    }

    public function findOne(Request $id)
    {
        $user = User::where('id', $id->id)->first();
        return response()->json(['user' => $user], 200);
    }

    public function searchUser($search)
    {
        $user = User::where('name', 'like', '%'.$search.'%')
            ->orWhere('email', 'like', '%'.$search.'%')
            ->get();
        return response()->json($user, 200);

    }

    public function updatestatus(Request $request)
    {
        $user = User::where('id', $request->id)->first();
        $user->admin = $request->admin;
        $user->save();
        return response()->json($user, 200);

    }

    public function setStats(Request $request)
    {
        $user = Auth::user();
        if($user !== null)
        {
            $user = User::find($user->id);
            $room_duration = ((intval($request->room_duration_hour) * 60 * 60)+(intval($request->room_duration_minute) * 60)+intval($request->room_duration_second));
            $user_duration = ((intval($request->user_duration_hour) * 60 * 60)+(intval($request->user_duration_minute) * 60)+intval($request->user_duration_second));
            $duration = $room_duration - $user_duration;

            $user->games_duration = ((($user->games_duration * $user->games_played) + $duration)/($user->games_played+1));
            if(($user->games_best_duration > $duration) or ($user->games_best_duration == null) or  ($user->games_best_duration == 0) )
            {
                $user->games_best_duration = $duration;
            }

            if($request->room_status == 'victory')
            {
                $user->games_win = $user->games_win + 1;
            }

            $user->games_played = $user->games_played + 1;

            $user->save();

            return response("Statistiques de partie enregistrés.");
        }
    }

    /*Request pour les objets uniquement*/
    /*https://laravel.com/docs/4.2/eloquent*/

}
