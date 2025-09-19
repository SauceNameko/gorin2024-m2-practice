<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Log;
use App\Models\Spot;
use Illuminate\Http\Request;

class LogController extends Controller
{
    //
    public function store(Request $request)
    {
        $event_id = $request->event_id;
        $spot_id = $request->spot_id;
        $operation_type = $request->operation_type;
        $event = Event::find($event_id);
        if (!$event) {
            return response()->json(["error" => "イベントが存在しません"], 404);
        }
        $spot = null;
        if (!empty($spot_id)) {
            $spot = Spot::find($spot_id);
            if (!$spot) {
                return response()->json(["error" => "スポットが存在しません"], 404);
            }
        }
        Log::query()->create([
            "event_id" => $event_id,
            "spot_id" => $spot_id,
            "operation_type" => $operation_type
        ]);
    }
}
