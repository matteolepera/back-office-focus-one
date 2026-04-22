@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4 py-4">

        <div class="mb-4">
            <h1 class="h3 fw-semibold mb-0">Dashboard</h1>
            <small class="text-muted">Benvenuto, {{ auth()->user()->name }}</small>
        </div>

        @if (session('status'))
            <div class="alert alert-success mb-4">{{ session('status') }}</div>
        @endif

        <div class="row g-4">

            <div class="col-md-6">
                <a href="{{ route('teams.index') }}" class="text-decoration-none">
                    <div class="card border rounded-3 shadow-sm h-100">
                        <div class="card-body px-4 py-3 d-flex align-items-center justify-content-between">
                            <div>
                                <small class="text-muted text-uppercase fw-semibold"
                                    style="font-size: 11px; letter-spacing: .06em;">Team</small>
                                <div class="fs-2 fw-semibold text-dark mt-1">{{ $teamsCount }}</div>
                                <small
                                    class="text-muted">{{ $teamsCount == 1 ? 'team registrato' : 'team registrati' }}</small>
                            </div>
                            <div class="rounded-circle bg-dark d-flex align-items-center justify-content-center flex-shrink-0"
                                style="width: 52px; height: 52px;">
                                <div class="rounded-circle bg-dark d-flex align-items-center justify-content-center flex-shrink-0"
                                    style="width: 52px; height: 52px;">
                                    <i class="bi bi-trophy text-white fs-4"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-6">
                <a href="{{ route('drivers.index') }}" class="text-decoration-none">
                    <div class="card border rounded-3 shadow-sm h-100">
                        <div class="card-body px-4 py-3 d-flex align-items-center justify-content-between">
                            <div>
                                <small class="text-muted text-uppercase fw-semibold"
                                    style="font-size: 11px; letter-spacing: .06em;">Piloti</small>
                                <div class="fs-2 fw-semibold text-dark mt-1">{{ $driversCount }}</div>
                                <small
                                    class="text-muted">{{ $driversCount == 1 ? 'pilota registrato' : 'piloti registrati' }}</small>
                            </div>
                            <div class="rounded-circle bg-dark d-flex align-items-center justify-content-center flex-shrink-0"
                                style="width: 52px; height: 52px;">
                                <div class="rounded-circle bg-dark d-flex align-items-center justify-content-center flex-shrink-0"
                                    style="width: 52px; height: 52px;">
                                    <i class="bi bi-person-fill text-white fs-4"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-6">
                <a href="{{ route('car-specs.index') }}" class="text-decoration-none">
                    <div class="card border rounded-3 shadow-sm h-100">
                        <div class="card-body px-4 py-3 d-flex align-items-center justify-content-between">
                            <div>
                                <small class="text-muted text-uppercase fw-semibold"
                                    style="font-size: 11px; letter-spacing: .06em;">Car Specs</small>
                                <div class="fs-2 fw-semibold text-dark mt-1">{{ $carSpecsCount }}</div>
                                <small
                                    class="text-muted">{{ $carSpecsCount == 1 ? 'auto registrata' : 'auto registrate' }}</small>
                            </div>
                            <div class="rounded-circle bg-dark d-flex align-items-center justify-content-center flex-shrink-0"
                                style="width: 52px; height: 52px;">
                                <div class="rounded-circle bg-dark d-flex align-items-center justify-content-center flex-shrink-0"
                                    style="width: 52px; height: 52px;">
                                    <i class="bi bi-car-front text-white fs-4"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-6">
                <a href="{{ route('power-units.index') }}" class="text-decoration-none">
                    <div class="card border rounded-3 shadow-sm h-100">
                        <div class="card-body px-4 py-3 d-flex align-items-center justify-content-between">
                            <div>
                                <small class="text-muted text-uppercase fw-semibold"
                                    style="font-size: 11px; letter-spacing: .06em;">Power Units</small>
                                <div class="fs-2 fw-semibold text-dark mt-1">{{ $powerUnitsCount }}</div>
                                <small
                                    class="text-muted">{{ $powerUnitsCount == 1 ? 'power unit registrata' : 'power unit registrate' }}</small>
                            </div>
                            <div class="rounded-circle bg-dark d-flex align-items-center justify-content-center flex-shrink-0"
                                style="width: 52px; height: 52px;">
                                <div class="rounded-circle bg-dark d-flex align-items-center justify-content-center flex-shrink-0"
                                    style="width: 52px; height: 52px;">
                                    <i class="bi bi-lightning-charge text-white fs-4"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

        </div>
    </div>
@endsection