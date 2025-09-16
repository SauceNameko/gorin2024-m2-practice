<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\SpotController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix("admin")->group(function () {
    Route::get("/", function () {
        return view("menu");
    })->name("menu");
    Route::get("/event", [EventController::class, "index"])->name("event_index");
    Route::get("/event/create", [EventController::class, "create"])->name("event_create");
    Route::post("/event/store", [EventController::class, "store"])->name("event_store");
    Route::get("/event/edit/{id}", [EventController::class, "edit"])->name("event_edit");
    Route::post("/event/update/{id}", [EventController::class, "update"])->name("event_update");
    Route::post("/event/destroy/{id}", [EventController::class, "destroy"])->name("event_destroy");

    Route::get("/spot", [SpotController::class, "index"])->name("spot_index");
    Route::get("/spot/create", [SpotController::class, "create"])->name("spot_create");
    Route::post("/spot/store", [SpotController::class, "store"])->name("spot_store");
    Route::get("/spot/edit/{id}", [SpotController::class, "edit"])->name("spot_edit");
    Route::post("/spot/update/{id}", [SpotController::class, "update"])->name("spot_update");
    Route::post("/spot/destroy/{id}", [SpotController::class, "destroy"])->name("spot_destroy");

     Route::get("/log", [LogController::class, "index"])->name("log_index");
    Route::post("/log/destroy/{id}", [LogController::class, "destroy"])->name("log_destroy");
});
