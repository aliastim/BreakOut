<?php


namespace App\Http\Controllers;


use Cocur\Slugify\Slugify;
use Illuminate\Http\Request;
use App\Items;
use Illuminate\Support\Facades\Auth;

class ItemsController extends Controller
{
    public function loadAll()
    {
        $items = Items::all();
        return response()->json($items, 200);
    }

    public function newItem(Request $request)
    {
        $admin = Auth::user();
        if (isset($admin->admin) and ($admin->admin === 1) ) {

            $slugify = new Slugify();

            $item = new Items();
            $item->name = $request->item_name;
            $item->slug = $slugify->slugify($request->item_name);

            if(isset($request->item_type) and !empty($request->item_type))
            {
                $item->type = $request->item_type;
            }
            if(isset($request->item_money) and !empty($request->item_money))
            {
                $item->money = $request->item_money;
            }
            if(isset($request->item_price) and !empty($request->item_price))
            {
                if(is_int($request->item_price))
                {
                    $item->price = $request->item_price;
                } else
                {
                    $item->price = intval($request->item_price);
                }
            }
            if(isset($request->item_ingame) and !empty($request->item_ingame))
            {
                $item->ingame = $request->item_ingame;
            }
            if(isset($request->item_image) and !empty($request->item_image))
            {
                $item->img = $request->item_image;
            }
            if(isset($request->item_description) and !empty($request->item_description))
            {
                $item->description = $request->item_description;
            }

            $item->save();

            return response()->json($item, 200);

        } else
        {
            return response()->json(["error" => "L'utilisateur connecté n'est pas administrateur"], 401);
        }

    }

    public function updateItem(Request $request)
    {
        $admin = Auth::user();
        if (isset($admin->admin) and ($admin->admin === 1) ) {

            $item = Items::find($request->item_id);


            if(isset($request->item_name) and !empty($request->item_name))
            {
                $slugify = new Slugify();
                $item->name = $request->item_name;
                $item->slug = $slugify->slugify($request->item_name);
            }
            if(isset($request->item_type) and !empty($request->item_type))
            {
                $item->type = $request->item_type;
            }
            if(isset($request->item_money) and !empty($request->item_money))
            {
                $item->money = $request->item_money;
            }
            if(isset($request->item_price) and !empty($request->item_price))
            {
                if(is_int($request->item_price))
                {
                    $item->price = $request->item_price;
                } else
                {
                    $item->price = intval($request->item_price);
                }
            }
            if(isset($request->item_ingame) and !empty($request->item_ingame))
            {
                $item->ingame = $request->item_ingame;
            }
            if(isset($request->item_image) and !empty($request->item_image))
            {
                $item->img = $request->item_image;
            }
            if(isset($request->item_description) and !empty($request->item_description))
            {
                $item->description = $request->item_description;
            }

            $item->save();
            return response()->json($item, 200);
        } else
        {
            return response()->json(["error" => "L'utilisateur connecté n'est pas administrateur"], 401);
        }
    }

    public function deleteItem($id)
    {
        $admin = Auth::user();
        if (isset($admin->admin) and ($admin->admin === 1) ) {
            $item = Items::find($id);
            $item->delete();
            return response("Item deleted");
        } else
        {
            return response()->json(["error" => "L'utilisateur connecté n'est pas administrateur"], 401);
        }
    }

}
