<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Spot;
use Illuminate\Http\Request;

class SpotController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $spots = Spot::all();
        return view("spot_home", compact("spots"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $events = Event::all();
        return view("spot_create", compact("events"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate(
            [
                "name" => "required",
                "select" => "required",
                "description" => "required",
                "location_x" => "required",
                "location_y" => "required",
                "images" => "required"
            ],
            [
                "name.required" => "エラーが発生しました",
                "select.required" => "エラーが発生しました",
                "description.required" => "エラーが発生しました",
                "location_x.required" => "エラーが発生しました",
                "location_y.required" => "エラーが発生しました",
                "images.required" => "エラーが発生しました",
            ]
        );
        $images = str_replace(["　", " "], "", $request->images);
        Spot::query()->create([
            "name" => $request->name,
            "event_id" => $request->select,
            "description" => $request->images,
            "location_x" => $request->location_x,
            "location_y" => $request->location_y,
            "images" => $images
        ]);
        return redirect(route("spot_create"))->with(["message" => "スポット情報が登録されました"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $events = Event::all();
        $spot = spot::query()->find($id);
        return view("spot_edit", compact("spot", "events"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $spot = spot::query()->find($id);
        $request->validate(
            [
                "name" => "required",
                "select" => "required",
                "description" => "required",
                "location_x" => "required",
                "location_y" => "required",
                "images" => "required"
            ],
            [
                "name.required" => "エラーが発生しました",
                "select.required" => "エラーが発生しました",
                "description.required" => "エラーが発生しました",
                "location_x.required" => "エラーが発生しました",
                "location_y.required" => "エラーが発生しました",
                "images.required" => "エラーが発生しました",
            ]
        );
        $images = str_replace(["　", " "], "", $request->images);
        $spot->update([
            "name" => $request->name,
            "event_id" => $request->select,
            "description" => $request->images,
            "location_x" => $request->location_x,
            "location_y" => $request->location_y,
            "images" => $images
        ]);
        return redirect(route("spot_create"))->with(["message" => "スポット情報が更新されました"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $spot = Spot::query()->find($id);
        $spot->delete();
        return redirect(route("spot_index"));
    }
}
