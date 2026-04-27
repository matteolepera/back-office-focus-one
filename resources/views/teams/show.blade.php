@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4 py-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="d-flex align-items-center gap-3">
                <div class="rounded-circle bg-dark d-flex align-items-center justify-content-center flex-shrink-0"
                    style="width: 52px; height: 52px;">
                    <img src="{{ asset('storage/' . $team->logo_image) }}" alt="{{ $team->name }}"
                        class="object-fit-contain" style="width: 34px; height: 34px;">
                </div>
                <div>
                    <h1 class="form-page-title mb-0">{{ $team->name }}</h1>
                    <p class="form-page-sub mb-0">{{ $team->full_name }}</p>
                </div>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('teams.edit', $team) }}" class="btn-action btn-action-edit">
                    <i class="bi bi-pencil"></i> Modifica
                </a>
                <button type="button" class="btn-action btn-action-delete" data-bs-toggle="modal"
                    data-bs-target="#modalDestroyTeam">
                    <i class="bi bi-trash"></i> Elimina
                </button>
                <a href="{{ route('teams.index') }}" class="btn-action btn-action-view">
                    <i class="bi bi-arrow-left"></i> Torna indietro
                </a>
            </div>
        </div>

        <div class="row g-4">

            <div class="col-md-4">
                <div class="card border rounded-3 shadow-sm h-100">
                    <div class="card-body px-4 py-4">
                        <h5 class="form-card-title">
                            <i class="bi bi-info-circle me-2"></i>Informazioni
                        </h5>
                        <table class="table table-borderless mb-0" style="font-size: 14px;">
                            <tr>
                                <td class="text-muted ps-0" style="width: 50%;">Base</td>
                                <td class="fw-medium">
                                    <i class="bi bi-geo-alt me-1 text-muted"></i>
                                    {{ $team->base_city }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-muted ps-0">Team Principal</td>
                                <td class="fw-medium">{{ $team->team_chief }}</td>
                            </tr>
                            <tr>
                                <td class="text-muted ps-0">Technical Chief</td>
                                <td class="fw-medium">{{ $team->technical_chief }}</td>
                            </tr>
                            <tr>
                                <td class="text-muted ps-0">Primo ingresso</td>
                                <td class="fw-medium">{{ $team->first_team_entry }}</td>
                            </tr>
                            <tr>
                                <td class="text-muted ps-0">Pilota di riserva</td>
                                <td class="fw-medium">{{ $team->reserve_driver ?? '—' }}</td>
                            </tr>
                            <tr>
                                <td class="text-muted ps-0">Titoli mondiali</td>
                                <td>
                                    <span class="d-flex align-items-center gap-1">
                                        <i class="bi bi-trophy-fill text-dark"></i>
                                        <span class="fw-semibold">{{ $team->total_world_championships }}</span>
                                    </span>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card border rounded-3 shadow-sm mb-4">
                    <div class="card-body px-4 py-4">
                        <h5 class="form-card-title">
                            <i class="bi bi-person-fill me-2"></i>Piloti
                        </h5>
                        @if($team->drivers->count())
                            <div class="row g-3">
                                @foreach($team->drivers as $driver)
                                    <div class="col-md-6">
                                        <div class="d-flex align-items-center gap-3 p-3 border rounded-3">
                                            <img src="{{ asset('storage/' . $driver->photo) }}" alt="{{ $driver->first_name }}"
                                                class="driver-avatar flex-shrink-0">
                                            <div>
                                                <div class="driver-name">{{ $driver->first_name }} {{ $driver->last_name }}</div>
                                                <div class="d-flex align-items-center gap-2 mt-1">
                                                    <span class="number-badge"># {{ $driver->driver_number }}</span>
                                                    <span class="driver-dob">{{ $driver->nationality }}</span>
                                                </div>
                                            </div>
                                            <a href="{{ route('drivers.show', $driver) }}"
                                                class="btn-action btn-action-view ms-auto">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-muted mb-0">Nessun pilota associato.</p>
                        @endif
                    </div>
                </div>

                <div class="card border rounded-3 shadow-sm">
                    <div class="card-body px-4 py-4">
                        <h5 class="form-card-title">
                            <i class="bi bi-car-front me-2"></i>Vettura
                        </h5>
                        @if($team->carSpecs)
                            <table class="table table-borderless mb-0" style="font-size: 14px;">
                                <tr>
                                    <td class="text-muted ps-0" style="width: 40%;">Chassis</td>
                                    <td class="fw-medium">{{ $team->carSpecs->chassis }}</td>
                                </tr>
                                <tr>
                                    <td class="text-muted ps-0">Peso</td>
                                    <td class="fw-medium">{{ $team->carSpecs->weight_kg }} kg</td>
                                </tr>
                                <tr>
                                    <td class="text-muted ps-0">Sospensioni</td>
                                    <td class="fw-medium">
                                        {{ $team->carSpecs->front_suspension }} / {{ $team->carSpecs->rear_suspension }}
                                    </td>
                                </tr>
                            </table>
                        @else
                            <p class="text-muted mb-0">Nessuna vettura disponibile.</p>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="modal fade" id="modalDestroyTeam" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title fw-semibold">Elimina team</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-muted">
                    Sei sicuro di voler eliminare <strong class="text-dark">{{ $team->name }}</strong>?
                    Questa azione è irreversibile.
                </div>
                <div class="modal-footer border-0 pt-0">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        <i class="bi bi-x me-1"></i> Annulla
                    </button>
                    <form action="{{ route('teams.destroy', $team) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="bi bi-trash me-1"></i> Conferma eliminazione
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection