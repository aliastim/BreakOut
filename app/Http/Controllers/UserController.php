<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

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
        $user->delete();
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

    /*Request pour les objets uniquement*/
    /*https://laravel.com/docs/4.2/eloquent*/

}
