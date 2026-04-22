<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CarSpec;
use App\Models\PowerUnit;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\Storage;

class CarSpecController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carSpecs = CarSpec::with(['team', 'powerUnit'])->get();
        return view("car-specs.index", compact("carSpecs"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teams = Team::all();
        $powerUnits = PowerUnit::all();

        return view("car-specs.create", compact("teams", "powerUnits"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $newCarSpec = new CarSpec();
        $newCarSpec->team_id = $data["team_id"];
        $newCarSpec->power_unit_id = $data["power_unit_id"];
        $newCarSpec->season = $data["season"];
        $newCarSpec->chassis = $data["chassis"];
        $newCarSpec->weight_kg = $data["weight_kg"];
        $newCarSpec->front_suspension = $data["front_suspension"];
        $newCarSpec->rear_suspension = $data["rear_suspension"];

        if (array_key_exists("car_image", $data)) {
            $img_url = Storage::putFile("car_image", $data["car_image"]);
            $newCarSpec->car_image = $img_url;
        }


        $newCarSpec->save();

        return redirect()->route("car-specs.show", $newCarSpec);
    }

    /**
     * Display the specified resource.
     */
    public function show(CarSpec $carSpec)
    {
        return view("car-specs.show", compact("carSpec"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CarSpec $carSpec)
    {
        $teams = Team::all();
        $powerUnits = PowerUnit::all();
        return view("car-specs.edit", compact("carSpec", "teams", "powerUnits"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CarSpec $carSpec)
    {
        $data = $request->all();
        $carSpec->team_id = $data["team_id"];
        $carSpec->power_unit_id = $data["power_unit_id"];
        $carSpec->season = $data["season"];
        $carSpec->chassis = $data["chassis"];
        $carSpec->weight_kg = $data["weight_kg"];
        $carSpec->front_suspension = $data["front_suspension"];
        $carSpec->rear_suspension = $data["rear_suspension"];

        if (array_key_exists("car_image", $data)) {
            Storage::delete($carSpec->car_image);
            $img_url = Storage::putFile("car_image", $data["car_image"]);
            $carSpec->car_image = $img_url;
        }


        $carSpec->update();

        return redirect()->route("car-specs.show", $carSpec);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CarSpec $carSpec)
    {
        if ($carSpec->car_image) {
            Storage::delete($carSpec->car_image);
        }

        $carSpec->delete();

        return redirect()->route("car-specs.index");
    }
}
