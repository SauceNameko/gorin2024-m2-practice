<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Spot;
use Illuminate\Http\Request;

class SpotController extends Controller
{
    //
    public function index(Request $request)
    {
        $event_id = $request->event_id;
        $result = [];
        $description = $request->description;
        $name = $request->name;
        $min_x = $request->min_x;
        $max_x = $request->max_x;
        $min_y = $request->min_y;
        $max_y = $request->max_y;
        $query = Spot::query()->where("event_id", $event_id);
        if ($description) {
            $query->where("description", $description);
        }
        if ($name) {
            $query->where("name", "like", "%$name%");
        }
        if ($min_x) {
            $query->where("location_x", ">=", $min_x);
        }
        if ($min_y) {
            $query->where("location_y", ">=", $min_y);
        }
        if ($max_x) {
            $query->where("location_x", "<=", $max_x);
        }
        if ($max_y) {
            $query->where("location_y", "<=", $max_y);
        }
        $spots = $query->get();
        if ($spots->isEmpty()) {
            return response()->json(["error" => "エラーが発生しました"], 404);
        }
        foreach ($spots as $spot) {
            $explode = explode(",", $spot->images);
            $data = [
                "name" => $spot->name,
                "description" => $spot->description,
                "location_x" => $spot->location_x,
                "location_y" => $spot->location_y,
                "map_image" => $explode
            ];
            $result[] = $data;
        }



        return response()->json($result, 200);
    }
}
