@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4 py-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="index-header-title">Team</h1>
                <p class="index-header-sub mb-0">
                    {{ $teams->count() }}
                    {{ $teams->count() == 1 ? 'team registrato' : 'team registrati' }}
                </p>
            </div>
            <a href="{{ route('teams.create') }}" class="btn btn-dark px-4 d-flex align-items-center gap-2">
                <i class="bi bi-plus-lg"></i> Aggiungi team
            </a>
        </div>

        <div class="card border rounded-3 shadow-sm">
            <div class="table-responsive">
                <table class="table index-table mb-0">
                    <thead>
                        <tr>
                            <th>Team</th>
                            <th>Nome completo</th>
                            <th>Base</th>
                            <th>Team Principal</th>
                            <th>Azioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($teams as $team)
                            <tr>

                                <td>
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="rounded-circle bg-dark d-flex align-items-center justify-content-center flex-shrink-0"
                                            style="width: 40px; height: 40px;">
                                            <img src="{{ asset('storage/' . $team->logo_image) }}" alt="{{ $team->name }}"
                                                class="object-fit-contain" style="width: 26px; height: 26px;">
                                        </div>
                                        <span class="driver-name">{{ $team->name }}</span>
                                    </div>
                                </td>

                                <td class="text-muted">{{ $team->full_name }}</td>

                                <td class="text-muted">
                                    <i class="bi bi-geo-alt me-1 text-muted"></i>
                                    {{ $team->base_city }}
                                </td>

                                <td class="text-muted">{{ $team->team_chief }}</td>

                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('teams.show', $team) }}" class="btn-action btn-action-view">
                                            <i class="bi bi-eye"></i> Dettaglio
                                        </a>
                                        <a href="{{ route('teams.edit', $team) }}" class="btn-action btn-action-edit">
                                            <i class="bi bi-pencil"></i> Modifica
                                        </a>
                                        <button type="button" class="btn-action btn-action-delete" data-bs-toggle="modal"
                                            data-bs-target="#modalDestroy{{ $team->id }}">
                                            <i class="bi bi-trash"></i> Elimina
                                        </button>
                                    </div>

                                    <div class="modal fade" id="modalDestroy{{ $team->id }}" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content border-0 shadow">
                                                <div class="modal-header border-0 pb-0">
                                                    <h5 class="modal-title fw-semibold">Elimina team</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body text-muted">
                                                    Sei sicuro di voler eliminare <strong
                                                        class="text-dark">{{ $team->name }}</strong>?
                                                    Questa azione è irreversibile.
                                                </div>
                                                <div class="modal-footer border-0 pt-0">
                                                    <button type="button" class="btn btn-outline-secondary"
                                                        data-bs-dismiss="modal">
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
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection