<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PowerUnit;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PowerUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $powerUnits = PowerUnit::all();
        return view("power-units.index", compact("powerUnits"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view("power-units.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $newPowerUnit = new PowerUnit();
        $newPowerUnit->name = $data["name"];
        $newPowerUnit->manufacturer = $data["manufacturer"];
        $newPowerUnit->season = $data["season"];

        $newPowerUnit->save();

        return redirect()->route("power-units.show", $newPowerUnit);
    }

    /**
     * Display the specified resource.
     */
    public function show(PowerUnit $powerUnit)
    {
        return view("power-units.show", compact("powerUnit"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PowerUnit $powerUnit)
    {
        // $teams = Team::all();
        // return view("drivers.edit", compact("driver", "teams"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PowerUnit $powerUnit)
    {
        // $data = $request->all();
        // // dd($data);

        // $driver->first_name = $data["first_name"];
        // $driver->last_name = $data["last_name"];
        // $driver->nationality = $data["nationality"];
        // $driver->season = $data["season"];
        // $driver->driver_number = $data["driver_number"];
        // $driver->date_of_birth = $data["date_of_birth"];
        // $driver->team_id = $data["team_id"];
        // $driver->driver_slogan = $data["driver_slogan"];
        // $driver->biography = $data["biography"];
        // $driver->total_pole_positions = $data["total_pole_positions"];
        // $driver->total_podiums = $data["total_podiums"];
        // $driver->total_wins = $data["total_wins"];
        // $driver->total_world_championships = $data["total_world_championships"];

        // if (array_key_exists("photo", $data)) {
        //     Storage::delete($driver->photo);

        //     $img_url = Storage::putFile("drivers_logo", $data["photo"]);
        //     $driver->photo = $img_url;
        // }

        // $driver->update();

        // return redirect()->route("drivers.show", $driver);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PowerUnit $powerUnit)
    {
        // if ($driver->photo) {
        //     Storage::delete($driver->photo);
        // }

        // $driver->delete();

        // return redirect()->route("drivers.index");
    }
}
