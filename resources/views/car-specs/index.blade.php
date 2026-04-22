@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4 py-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h3 fw-semibold mb-0">Car Specs</h1>
                <p class="text-muted mb-0 mt-1">
                    <small>
                        {{ $carSpecs->count() }}
                        {{ $carSpecs->count() == 1 ? 'auto registrata' : 'auto registrate' }}
                    </small>
                </p>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('dashboard') }}" class="btn btn-outline-dark px-4">Dashboard</a>
                <a href="{{ route('car-specs.create') }}" class="btn btn-dark px-4">+ Aggiungi car spec</a>
            </div>
        </div>

        <div class="card border rounded-3 shadow-sm">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead>
                        <tr class="border-bottom">
                            <th class="px-4 py-3 text-uppercase text-muted fw-semibold"
                                style="font-size: 11px; letter-spacing: .06em;">Auto</th>
                            <th class="px-4 py-3 text-uppercase text-muted fw-semibold"
                                style="font-size: 11px; letter-spacing: .06em;">Team</th>
                            <th class="px-4 py-3 text-uppercase text-muted fw-semibold"
                                style="font-size: 11px; letter-spacing: .06em;">Power Unit</th>
                            <th class="px-4 py-3 text-uppercase text-muted fw-semibold"
                                style="font-size: 11px; letter-spacing: .06em;">Stagione</th>
                            <th class="px-4 py-3 text-uppercase text-muted fw-semibold"
                                style="font-size: 11px; letter-spacing: .06em;">Peso</th>
                            <th class="px-4 py-3 text-uppercase text-muted fw-semibold"
                                style="font-size: 11px; letter-spacing: .06em;">Azioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($carSpecs as $carSpec)
                            <tr class="border-bottom">

                                <td class="px-4 py-3">
                                    <div class="d-flex align-items-center gap-3">
                                        <img src="{{ asset('storage/' . $carSpec->car_image) }}" alt="{{ $carSpec->chassis }}"
                                            class="object-fit-contain flex-shrink-0" style="width: 48px; height: 48px;">
                                        <span class="fw-semibold">{{ $carSpec->chassis }}</span>
                                    </div>
                                </td>

                                <td class="px-4">
                                    <span class="badge bg-secondary bg-opacity-10 text-dark border fw-normal px-3 py-2"
                                        style="font-size: 12px;">
                                        {{ $carSpec->team->name }}
                                    </span>
                                </td>

                                <td class="px-4 text-muted">{{ $carSpec->powerUnit->name }}</td>

                                <td class="px-4 text-muted">{{ $carSpec->season }}</td>

                                <td class="px-4 text-muted">{{ $carSpec->weight_kg }} kg</td>

                                <td class="px-4">
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('car-specs.show', $carSpec) }}"
                                            class="btn btn-sm btn-outline-dark px-3">Dettaglio</a>
                                        <a href="{{ route('car-specs.edit', $carSpec) }}"
                                            class="btn btn-sm btn-outline-secondary px-3">Modifica</a>
                                        <button type="button" class="btn btn-sm btn-outline-danger px-3" data-bs-toggle="modal"
                                            data-bs-target="#modalDestroy{{ $carSpec->id }}">
                                            Elimina
                                        </button>

                                        <div class="modal fade" id="modalDestroy{{ $carSpec->id }}" tabindex="-1"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content border-0 shadow">
                                                    <div class="modal-header border-0 pb-0">
                                                        <h5 class="modal-title fw-semibold">Elimina car spec</h5>
                                                        <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body text-muted">
                                                        Sei sicuro di voler eliminare <strong
                                                            class="text-dark">{{ $carSpec->chassis }}</strong>?
                                                        Questa azione è irreversibile.
                                                    </div>
                                                    <div class="modal-footer border-0 pt-0">
                                                        <button type="button" class="btn btn-outline-secondary"
                                                            data-bs-dismiss="modal">Annulla</button>
                                                        <form action="{{ route('car-specs.destroy', $carSpec) }}" method="POST">
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