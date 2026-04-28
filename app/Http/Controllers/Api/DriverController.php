<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    public function index()
    {
        $drivers = Driver::with('team')->get();
        return response()->json([
            "success" => true,
            "data" => $drivers,
        ]);
    }

    public function show(Driver $driver)
    {
        $driver->load('team');
        return response()->json([
            "success" => true,
            "data" => $driver,
        ]);
    }
}
