<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $drivers = driver::all();
        return view("drivers.index", compact("drivers"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teams = Team::all();
        return view("drivers.create", compact("teams"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $newDriver = new Driver();
        $newDriver->first_name = $data["first_name"];
        $newDriver->last_name = $data["last_name"];
        $newDriver->nationality = $data["nationality"];
        $newDriver->season = $data["season"];
        $newDriver->driver_number = $data["driver_number"];
        $newDriver->date_of_birth = $data["date_of_birth"];
        $newDriver->team_id = $data["team_id"];
        $newDriver->driver_slogan = $data["driver_slogan"];
        $newDriver->biography = $data["biography"];
        $newDriver->total_pole_positions = $data["total_pole_positions"];
        $newDriver->total_podiums = $data["total_podiums"];
        $newDriver->total_wins = $data["total_wins"];
        $newDriver->total_world_championships = $data["total_world_championships"];

        if (array_key_exists("photo", $data)) {
            $img_url = Storage::putFile("photo_drivers", $data["photo"]);
            $newDriver->photo = $img_url;
        }

        $newDriver->save();

        return redirect()->route("drivers.show", $newDriver);
    }

    /**
     * Display the specified resource.
     */
    public function show(Driver $driver)
    {
        return view("drivers.show", compact("driver"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Driver $driver)
    {
        $teams = Team::all();
        return view("drivers.edit", compact("driver", "teams"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Driver $driver)
    {
        $data = $request->all();
        // dd($data);

        $driver->first_name = $data["first_name"];
        $driver->last_name = $data["last_name"];
        $driver->nationality = $data["nationality"];
        $driver->season = $data["season"];
        $driver->driver_number = $data["driver_number"];
        $driver->date_of_birth = $data["date_of_birth"];
        $driver->team_id = $data["team_id"];
        $driver->driver_slogan = $data["driver_slogan"];
        $driver->biography = $data["biography"];
        $driver->total_pole_positions = $data["total_pole_positions"];
        $driver->total_podiums = $data["total_podiums"];
        $driver->total_wins = $data["total_wins"];
        $driver->total_world_championships = $data["total_world_championships"];

        if (array_key_exists("photo", $data)) {
            Storage::delete($driver->photo);

            $img_url = Storage::putFile("drivers_logo", $data["photo"]);
            $driver->photo = $img_url;
        }

        $driver->update();

        return redirect()->route("drivers.show", $driver);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Driver $driver)
    {
        if ($driver->photo) {
            Storage::delete($driver->photo);
        }

        $driver->delete();

        return redirect()->route("drivers.index");
    }
}
