@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4 py-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h3 fw-semibold mb-0">{{ $carSpec->chassis }}</h1>
                <small class="text-muted">{{ $carSpec->team->name }} · {{ $carSpec->season }}</small>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('car-specs.edit', $carSpec) }}" class="btn btn-outline-secondary px-4">Modifica</a>
                <button type="button" class="btn btn-outline-danger px-4" data-bs-toggle="modal"
                    data-bs-target="#modalDestroyCarSpec">Elimina</button>
                <a href="{{ route('car-specs.index') }}" class="btn btn-dark px-4">Torna indietro</a>
            </div>
        </div>

        <div class="row g-4">

            <div class="col-md-4">
                <div class="card border rounded-3 shadow-sm h-100">
                    <img src="{{ asset('storage/' . $carSpec->car_image) }}" class="card-img-top object-fit-contain p-3"
                        style="height: 280px;" alt="{{ $carSpec->chassis }}">
                    <div class="card-body px-4 py-3">
                        <div class="d-flex align-items-center justify-content-between">
                            <span class="text-muted" style="font-size: 13px;">{{ $carSpec->team->name }}</span>
                            <span class="badge bg-dark rounded-pill">{{ $carSpec->season }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card border rounded-3 shadow-sm mb-4">
                    <div class="card-body px-4 py-3">
                        <h5 class="fw-semibold mb-3">Informazioni</h5>
                        <table class="table table-borderless mb-0" style="font-size: 14px;">
                            <tr>
                                <td class="text-muted ps-0" style="width: 40%;">Team</td>
                                <td class="fw-medium">{{ $carSpec->team->name }}</td>
                            </tr>
                            <tr>
                                <td class="text-muted ps-0">Power Unit</td>
                                <td class="fw-medium">{{ $carSpec->powerUnit->name }}</td>
                            </tr>
                            <tr>
                                <td class="text-muted ps-0">Stagione</td>
                                <td class="fw-medium">{{ $carSpec->season }}</td>
                            </tr>
                            <tr>
                                <td class="text-muted ps-0">Chassis</td>
                                <td class="fw-medium">{{ $carSpec->chassis }}</td>
                            </tr>
                            <tr>
                                <td class="text-muted ps-0">Peso</td>
                                <td class="fw-medium">{{ $carSpec->weight_kg }} kg</td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="card border rounded-3 shadow-sm">
                    <div class="card-body px-4 py-3">
                        <h5 class="fw-semibold mb-3">Sospensioni</h5>
                        <div class="row g-3 text-center">
                            <div class="col-6">
                                <div class="border rounded-3 p-3">
                                    <small class="text-muted d-block mb-1">Anteriore</small>
                                    <div class="fw-semibold">{{ $carSpec->front_suspension }}</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="border rounded-3 p-3">
                                    <small class="text-muted d-block mb-1">Posteriore</small>
                                    <div class="fw-semibold">{{ $carSpec->rear_suspension }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="modal fade" id="modalDestroyCarSpec" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title fw-semibold">Elimina car spec</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-muted">
                    Sei sicuro di voler eliminare <strong class="text-dark">{{ $carSpec->chassis }}</strong>?
                    Questa azione è irreversibile.
                </div>
                <div class="modal-footer border-0 pt-0">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Annulla</button>
                    <form action="{{ route('car-specs.destroy', $carSpec) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Conferma eliminazione</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection