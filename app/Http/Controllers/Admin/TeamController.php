<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Team::all();
        return view("teams.index", compact("teams"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("teams.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $newTeam = new Team();
        $newTeam->name = $data["name"];
        $newTeam->full_name = $data["full_name"];
        $newTeam->base_city = $data["base_city"];
        $newTeam->team_chief = $data["team_chief"];
        $newTeam->technical_chief = $data["technical_chief"];
        $newTeam->first_team_entry = $data["first_team_entry"];
        $newTeam->reserve_driver = $data["reserve_driver"];
        $newTeam->total_world_championships = $data["total_world_championships"];

        if (array_key_exists("logo_image", $data)) {
            $img_url = Storage::putFile("teams_logo", $data["logo_image"]);
            $newTeam->logo_image = $img_url;
        }

        $newTeam->save();

        return redirect()->route("teams.show", $newTeam);
    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team)
    {
        return view("teams.show", compact("team"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Team $team)
    {
        return view("teams.edit", compact("team"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Team $team)
    {
        $data = $request->all();

        $team->name = $data["name"];
        $team->full_name = $data["full_name"];
        $team->base_city = $data["base_city"];
        $team->team_chief = $data["team_chief"];
        $team->technical_chief = $data["technical_chief"];
        $team->first_team_entry = $data["first_team_entry"];
        $team->reserve_driver = $data["reserve_driver"];
        $team->total_world_championships = $data["total_world_championships"];

        if (array_key_exists("logo_image", $data)) {
            Storage::delete($team->logo_image);

            $img_url = Storage::putFile("teams_logo", $data["logo_image"]);
            $team->logo_image = $img_url;
        }

        $team->update();

        return redirect()->route("teams.show", $team);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team)
    {
        if ($team->logo_image) {
            Storage::delete($team->logo_image);
        }

        $team->delete();

        return redirect()->route("teams.index");
    }
}
