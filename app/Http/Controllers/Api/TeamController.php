<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::with(['carSpecs.powerUnit', 'drivers'])->get();
        return response()->json([
            "success" => true,
            "data" => $teams,
        ]);
    }

    public function show(Team $team)
    {
        $team->load(['carSpecs.powerUnit', 'drivers']);
        return response()->json([
            "success" => true,
            "data" => $team,
        ]);
    }
}
