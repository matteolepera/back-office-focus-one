@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4 py-4">

        <div class="mb-4">
            <h1 class="dashboard-title">Dashboard</h1>
            <p class="dashboard-subtitle mb-0">Benvenuto, {{ auth()->user()->name }}</p>
        </div>

        @if (session('status'))
            <div class="alert alert-success mb-4">{{ session('status') }}</div>
        @endif

        <div class="row g-4">

            <div class="col-md-6">
                <a href="{{ route('teams.index') }}" class="dashboard-card card shadow-sm">
                    <div class="card-body px-4 py-4 d-flex align-items-center justify-content-between">
                        <div>
                            <p class="dashboard-card-label mb-0">Team</p>
                            <div class="dashboard-card-count">{{ $teamsCount }}</div>
                            <p class="dashboard-card-sub mb-0">
                                {{ $teamsCount == 1 ? 'team registrato' : 'team registrati' }}
                            </p>
                        </div>
                        <div class="dashboard-icon">
                            <i class="bi bi-trophy"></i>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-6">
                <a href="{{ route('drivers.index') }}" class="dashboard-card card shadow-sm">
                    <div class="card-body px-4 py-4 d-flex align-items-center justify-content-between">
                        <div>
                            <p class="dashboard-card-label mb-0">Piloti</p>
                            <div class="dashboard-card-count">{{ $driversCount }}</div>
                            <p class="dashboard-card-sub mb-0">
                                {{ $driversCount == 1 ? 'pilota registrato' : 'piloti registrati' }}
                            </p>
                        </div>
                        <div class="dashboard-icon">
                            <i class="bi bi-person-fill"></i>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-6">
                <a href="{{ route('car-specs.index') }}" class="dashboard-card card shadow-sm">
                    <div class="card-body px-4 py-4 d-flex align-items-center justify-content-between">
                        <div>
                            <p class="dashboard-card-label mb-0">Vetture</p>
                            <div class="dashboard-card-count">{{ $carSpecsCount }}</div>
                            <p class="dashboard-card-sub mb-0">
                                {{ $carSpecsCount == 1 ? 'vettura registrata' : 'vetture registrate' }}
                            </p>
                        </div>
                        <div class="dashboard-icon">
                            <i class="bi bi-car-front"></i>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-6">
                <a href="{{ route('power-units.index') }}" class="dashboard-card card shadow-sm">
                    <div class="card-body px-4 py-4 d-flex align-items-center justify-content-between">
                        <div>
                            <p class="dashboard-card-label mb-0">Power Units</p>
                            <div class="dashboard-card-count">{{ $powerUnitsCount }}</div>
                            <p class="dashboard-card-sub mb-0">
                                {{ $powerUnitsCount == 1 ? 'power unit registrata' : 'power unit registrate' }}
                            </p>
                        </div>
                        <div class="dashboard-icon">
                            <i class="bi bi-lightning-charge"></i>
                        </div>
                    </div>
                </a>
            </div>

        </div>
    </div>
@endsection