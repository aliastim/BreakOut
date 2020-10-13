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

}
