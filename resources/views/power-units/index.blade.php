@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4 py-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="index-header-title">Power Units</h1>
                <p class="index-header-sub mb-0">
                    {{ $powerUnits->count() }}
                    {{ $powerUnits->count() == 1 ? 'power unit registrata' : 'power unit registrate' }}
                </p>
            </div>
            <a href="{{ route('power-units.create') }}" class="btn btn-dark px-4 d-flex align-items-center gap-2">
                <i class="bi bi-plus-lg"></i> Aggiungi power unit
            </a>
        </div>

        <div class="card border rounded-3 shadow-sm">
            <div class="table-responsive">
                <table class="table index-table mb-0">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Produttore</th>
                            <th>Stagione</th>
                            <th>Azioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($powerUnits as $powerUnit)
                            <tr>

                                <td><span class="driver-name">{{ $powerUnit->name }}</span></td>

                                <td><span class="team-badge">{{ $powerUnit->manufacturer }}</span></td>

                                <td class="text-muted">{{ $powerUnit->season }}</td>

                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('power-units.show', $powerUnit) }}"
                                            class="btn-action btn-action-view">
                                            <i class="bi bi-eye"></i> Dettaglio
                                        </a>
                                        <a href="{{ route('power-units.edit', $powerUnit) }}"
                                            class="btn-action btn-action-edit">
                                            <i class="bi bi-pencil"></i> Modifica
                                        </a>
                                        <button type="button" class="btn-action btn-action-delete" data-bs-toggle="modal"
                                            data-bs-target="#modalDestroy{{ $powerUnit->id }}">
                                            <i class="bi bi-trash"></i> Elimina
                                        </button>
                                    </div>

                                    <div class="modal fade" id="modalDestroy{{ $powerUnit->id }}" tabindex="-1"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content border-0 shadow">
                                                <div class="modal-header border-0 pb-0">
                                                    <h5 class="modal-title fw-semibold">Elimina power unit</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body text-muted">
                                                    Sei sicuro di voler eliminare <strong
                                                        class="text-dark">{{ $powerUnit->name }}</strong>?
                                                    Questa azione è irreversibile.
                                                </div>
                                                <div class="modal-footer border-0 pt-0">
                                                    <button type="button" class="btn btn-outline-secondary"
                                                        data-bs-dismiss="modal">
                                                        <i class="bi bi-x me-1"></i> Annulla
                                                    </button>
                                                    <form action="{{ route('power-units.destroy', $powerUnit) }}" method="POST">
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