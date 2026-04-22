@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4 py-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h3 fw-semibold mb-0">Piloti</h1>
                <p class="text-muted mb-0 mt-1">
                    <small>
                        {{ $powerUnits->count() }}
                        {{ $powerUnits->count() == 1 ? 'power-unit registrata' : 'power-units registrate' }}
                    </small>
                </p>
            </div>
            <a href="{{ route('dashboard') }}" class="btn btn-outline-dark px-4">Dashboard</a>
            <a href="{{ route('power-units.create') }}" class="btn btn-dark px-4">
                + Aggiungi power-unit
            </a>
        </div>

        <div class="card border rounded-3 shadow-sm">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead>
                        <tr class="border-bottom">
                            <th class="px-4 py-3 text-uppercase text-muted fw-semibold"
                                style="font-size: 11px; letter-spacing: .06em;">Nome</th>
                            <th class="px-4 py-3 text-uppercase text-muted fw-semibold"
                                style="font-size: 11px; letter-spacing: .06em;">Produttore</th>
                            <th class="px-4 py-3 text-uppercase text-muted fw-semibold"
                                style="font-size: 11px; letter-spacing: .06em;">Stagione</th>
                            <th class="px-4 py-3 text-uppercase text-muted fw-semibold"
                                style="font-size: 11px; letter-spacing: .06em;">Azioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($powerUnits as $powerUnit)
                            <tr class="border-bottom">

                                <td class="px-4 fw-semibold">{{ $powerUnit->name }}</td>

                                <td class="px-4">
                                    <span class="badge bg-secondary bg-opacity-10 text-dark border fw-normal px-3 py-2"
                                        style="font-size: 12px;">
                                        {{ $powerUnit->manufacturer }}
                                    </span>
                                </td>

                                <td class="px-4 text-muted">{{ $powerUnit->season }}</td>

                                <td class="px-4">
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('power-units.show', $powerUnit) }}"
                                            class="btn btn-sm btn-outline-dark px-3">Dettaglio</a>
                                        <a href="{{ route('power-units.edit', $powerUnit) }}"
                                            class="btn btn-sm btn-outline-secondary px-3">Modifica</a>
                                        <button type="button" class="btn btn-sm btn-outline-danger px-3" data-bs-toggle="modal"
                                            data-bs-target="#modalDestroy{{ $powerUnit->id }}">
                                            Elimina
                                        </button>

                                        <div class="modal fade" id="modalDestroy{{ $powerUnit->id }}" tabindex="-1"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content border-0 shadow">
                                                    <div class="modal-header border-0 pb-0">
                                                        <h5 class="modal-title fw-semibold">Elimina power unit</h5>
                                                        <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body text-muted">
                                                        Sei sicuro di voler eliminare <strong
                                                            class="text-dark">{{ $powerUnit->name }}</strong>?
                                                        Questa azione è irreversibile.
                                                    </div>
                                                    <div class="modal-footer border-0 pt-0">
                                                        <button type="button" class="btn btn-outline-secondary"
                                                            data-bs-dismiss="modal">Annulla</button>
                                                        <form action="{{ route('power-units.destroy', $powerUnit) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Conferma
                                                                eliminazione</button>
                                                        </form>
                                                    </div>
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