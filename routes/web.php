<?php

use App\Http\Controllers\Admin\CarSpecController;
use App\Http\Controllers\Admin\DriverController;
use App\Http\Controllers\Admin\PowerUnitController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\ProfileController;
use App\Models\CarSpec;
use App\Models\Driver;
use App\Models\PowerUnit;
use App\Models\Team;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard', [
        'teamsCount' => Team::count(),
        'driversCount' => Driver::count(),
        'carSpecsCount' => CarSpec::count(),
        'powerUnitsCount' => PowerUnit::count(),
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource("teams", TeamController::class)
    ->middleware(['auth', 'verified']);

Route::resource("drivers", DriverController::class)
    ->middleware(['auth', 'verified']);

Route::resource("power-units", PowerUnitController::class)
    ->middleware(['auth', 'verified']);

Route::resource("car-specs", CarSpecController::class)
    ->middleware(['auth', 'verified']);


require __DIR__ . '/auth.php';
