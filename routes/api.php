<?php

use App\Http\Controllers\api\EventController;
use App\Http\Controllers\api\LogController;
use App\Http\Controllers\api\SpotController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get("/events", [EventController::class, "index"]);
Route::get("/spots", [SpotController::class, "index"]);
Route::post("/logs", [LogController::class, "store"]);
