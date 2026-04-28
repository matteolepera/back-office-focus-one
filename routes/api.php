<?php

use App\Http\Controllers\Api\DriverController;
use App\Http\Controllers\Api\TeamController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get("/teams", [TeamController::class, "index"]);
Route::get("/teams/{team}", [TeamController::class, "show"]);

Route::get("/drivers", [DriverController::class, "index"]);
Route::get("/drivers/{driver}", [DriverController::class, "show"]);