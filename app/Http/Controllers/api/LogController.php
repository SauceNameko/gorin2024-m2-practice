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
        $event_flag = false;
        $spot_flag = false;
        $event = Event::query()->find($event_id);
        $spot = Spot::query()->find($spot_id);
        if (!empty($event)) {
            $event_flag = true;
        }

        if (!empty($spot)) {
            $spot_flag = true;
        }
        if ($event_flag) {
            Log::query()->create([
                "event_id" => $event_id,
                "spot_id" => $spot_flag ? $spot_id : null,
                "operation_type" => $operation_type
            ]);
        } else {
            return response()->json(["error" => "エラーが発生しました"], 404);
        }
    }
}
