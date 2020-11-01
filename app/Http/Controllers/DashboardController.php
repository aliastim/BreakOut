<?php


namespace App\Http\Controllers;


use Cocur\Slugify\Slugify;
use Illuminate\Http\Request;
use App\Carousel;
use App\Rooms_selected;
use App\Scrollings;
use Illuminate\Support\Facades\Auth;

class DashboardController
{
    public function loadCarousel()
    {
        $carousel = Carousel::all();
        return response()->json($carousel, 200);
    }

    public function loadSelectedRooms()
    {
        $rooms_selected = Rooms_selected::all();
        return response()->json($rooms_selected, 200);
    }

    public function loadScrolling()
    {
        $scrolling = Scrollings::find(1);
        return response()->json($scrolling, 200);
    }

    public function updateCarousel(Request $request)
    {
        $admin = Auth::user();
        if (isset($admin->admin) and ($admin->admin === 1) ) {

            $carousel= Carousel::find($request->carousel_id);
            if (!empty($carousel) && $carousel != null) {

                $carousel->img = $request->carousel_img;
                $carousel->save();
                return response()->json($carousel, 200);

            } else
            {
                return response()->json(["error" => "Cet id n'existe pas"], 401);
            }


        } else
        {
            return response()->json(["error" => "L'utilisateur connecté n'est pas administrateur"], 401);
        }
    }

    public function updateScrolling(Request $request)
    {
        $admin = Auth::user();
        if (isset($admin->admin) and ($admin->admin === 1) ) {
            $scrolling = Scrollings::find(1);
            $scrolling->scrolling = $request->text_scrolling;
            $scrolling->save();
            return response()->json($scrolling, 200);
        } else
        {
            return response()->json(["error" => "L'utilisateur connecté n'est pas administrateur"], 401);
        }
    }
}
