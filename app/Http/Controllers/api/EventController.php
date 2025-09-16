<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Spot;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class EventController extends Controller
{
    //
    public function index(Request $request)
    {
        $event_id = $request->id;
        $event = Event::query()->find($event_id);
        if (empty($event)) {
            return response()->json(["error" => "エラーが発生しました"], 404);
        }
        $result = [];
        $spots = Spot::query()->where("event_id", $event_id)->get();
        if ($spots->isEmpty()) {
            return response()->json(["error" => "エラーが発生しました"], 404);
        }
        foreach ($spots as $spot) {
            $explode = explode(",", $spot->images);
            $data = [
                "name" => $event->name,
                "map_image" => $event->map_image,
                "spot" => [
                    "name" => $spot->name,
                    "description" => $spot->description,
                    "location_x" => $spot->location_x,
                    "location_y" => $spot->location_y,
                    "map_image" => $explode
                ]
            ];
            $result[] = $data;
        }



        return response()->json($result, 200);
    }
}
