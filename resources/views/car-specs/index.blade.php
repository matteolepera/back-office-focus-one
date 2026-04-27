@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4 py-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="index-header-title">Vetture</h1>
                <p class="index-header-sub mb-0">
                    {{ $carSpecs->count() }}
                    {{ $carSpecs->count() == 1 ? 'vettura registrata' : 'vetture registrate' }}
                </p>
            </div>
            <a href="{{ route('car-specs.create') }}" class="btn btn-dark px-4 d-flex align-items-center gap-2">
                <i class="bi bi-plus-lg"></i> Aggiungi vettura
            </a>
        </div>

        <div class="card border rounded-3 shadow-sm">
            <div class="table-responsive">
                <table class="table index-table mb-0">
                    <thead>
                        <tr>
                            <th>Vettura</th>
                            <th>Team</th>
                            <th>Power Unit</th>
                            <th>Stagione</th>
                            <th>Peso</th>
                            <th>Azioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($carSpecs as $carSpec)
                            <tr>

                                <td>
                                    <div class="d-flex align-items-center gap-3">
                                        <img src="{{ asset('storage/' . $carSpec->car_image) }}" alt="{{ $carSpec->chassis }}"
                                            class="object-fit-contain flex-shrink-0" style="width: 48px; height: 48px;">
                                        <span class="driver-name">{{ $carSpec->chassis }}</span>
                                    </div>
                                </td>

                                <td>
                                    <span class="team-badge">{{ $carSpec->team->name }}</span>
                                </td>

                                <td class="text-muted">{{ $carSpec->powerUnit->name }}</td>

                                <td class="text-muted">{{ $carSpec->season }}</td>

                                <td class="text-muted">{{ $carSpec->weight_kg }} kg</td>

                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('car-specs.show', $carSpec) }}" class="btn-action btn-action-view">
                                            <i class="bi bi-eye"></i> Dettaglio
                                        </a>
                                        <a href="{{ route('car-specs.edit', $carSpec) }}" class="btn-action btn-action-edit">
                                            <i class="bi bi-pencil"></i> Modifica
                                        </a>
                                        <button type="button" class="btn-action btn-action-delete" data-bs-toggle="modal"
                                            data-bs-target="#modalDestroy{{ $carSpec->id }}">
                                            <i class="bi bi-trash"></i> Elimina
                                        </button>
                                    </div>

                                    <div class="modal fade" id="modalDestroy{{ $carSpec->id }}" tabindex="-1"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content border-0 shadow">
                                                <div class="modal-header border-0 pb-0">
                                                    <h5 class="modal-title fw-semibold">Elimina vettura</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body text-muted">
                                                    Sei sicuro di voler eliminare <strong
                                                        class="text-dark">{{ $carSpec->chassis }}</strong>?
                                                    Questa azione è irreversibile.
                                                </div>
                                                <div class="modal-footer border-0 pt-0">
                                                    <button type="button" class="btn btn-outline-secondary"
                                                        data-bs-dismiss="modal">
                                                        <i class="bi bi-x me-1"></i> Annulla
                                                    </button>
                                                    <form action="{{ route('car-specs.destroy', $carSpec) }}" method="POST">
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
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection