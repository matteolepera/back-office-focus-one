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
        return view("power-units.edit", compact("powerUnit"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PowerUnit $powerUnit)
    {
        $data = $request->all();
        $powerUnit->name = $data["name"];
        $powerUnit->manufacturer = $data["manufacturer"];
        $powerUnit->season = $data["season"];

        $powerUnit->update();

        return redirect()->route("power-units.show", $powerUnit);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PowerUnit $powerUnit)
    {

        $powerUnit->delete();

        return redirect()->route("power-units.index");
    }
}
