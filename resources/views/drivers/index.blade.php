@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4 py-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h3 fw-semibold mb-0">Piloti</h1>
                <p class="text-muted mb-0 mt-1">
                    <small>
                        {{ $drivers->count() }}
                        {{ $drivers->count() == 1 ? 'pilota registrato' : 'piloti registrati' }}
                    </small>
                </p>
            </div>
            <a href="{{ route('dashboard') }}" class="btn btn-outline-dark px-4">Dashboard</a>
            <a href="{{ route('drivers.create') }}" class="btn btn-dark px-4">
                + Aggiungi pilota
            </a>
        </div>

        <div class="card border rounded-3 shadow-sm">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead>
                        <tr class="border-bottom">
                            <th class="px-4 py-3 text-uppercase text-muted fw-semibold"
                                style="font-size: 11px; letter-spacing: .06em; width: 60px;">#</th>
                            <th class="px-4 py-3 text-uppercase text-muted fw-semibold"
                                style="font-size: 11px; letter-spacing: .06em;">Pilota</th>
                            <th class="px-4 py-3 text-uppercase text-muted fw-semibold"
                                style="font-size: 11px; letter-spacing: .06em;">Team</th>
                            <th class="px-4 py-3 text-uppercase text-muted fw-semibold"
                                style="font-size: 11px; letter-spacing: .06em;">Nazionalità</th>
                            <th class="px-4 py-3 text-uppercase text-muted fw-semibold"
                                style="font-size: 11px; letter-spacing: .06em;">Stagione</th>
                            <th class="px-4 py-3 text-uppercase text-muted fw-semibold"
                                style="font-size: 11px; letter-spacing: .06em;">Vittorie</th>
                            <th class="px-4 py-3 text-uppercase text-muted fw-semibold"
                                style="font-size: 11px; letter-spacing: .06em;">Titoli</th>
                            <th class="px-4 py-3 text-uppercase text-muted fw-semibold"
                                style="font-size: 11px; letter-spacing: .06em;">Azioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($drivers as $driver)
                            <tr class="border-bottom">

                                <td class="px-4">
                                    <span class="badge rounded-pill bg-dark">{{ $driver->driver_number }}</span>
                                </td>

                                <td class="px-4 py-3">
                                    <div class="d-flex align-items-center gap-3">
                                        <img src="{{ asset('storage/' . $driver->photo) }}"
                                            alt="{{ $driver->first_name }} {{ $driver->last_name }}"
                                            class="rounded-circle object-fit-cover flex-shrink-0"
                                            style="width: 40px; height: 40px; object-position: top;">
                                        <div>
                                            <div class="fw-semibold">{{ $driver->first_name }} {{ $driver->last_name }}</div>
                                            <small
                                                class="text-muted">{{ \Carbon\Carbon::parse($driver->date_of_birth)->format('d/m/Y') }}</small>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-4">
                                    <span class="badge bg-secondary bg-opacity-10 text-dark border fw-normal px-3 py-2"
                                        style="font-size: 12px;">
                                        {{ $driver->team->name }}
                                    </span>
                                </td>

                                <td class="px-4 text-muted">{{ $driver->nationality }}</td>

                                <td class="px-4 text-muted">{{ $driver->season }}</td>

                                <td class="px-4 fw-semibold">{{ $driver->total_wins }}</td>

                                <td class="px-4 fw-semibold">{{ $driver->total_world_championships }}</td>

                                <td class="px-4">
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('drivers.show', $driver) }}"
                                            class="btn btn-sm btn-outline-dark px-3">Dettaglio</a>
                                        <a href="{{ route('drivers.edit', $driver) }}"
                                            class="btn btn-sm btn-outline-secondary px-3">Modifica</a>
                                        <button type="button" class="btn btn-sm btn-outline-danger px-3" data-bs-toggle="modal"
                                            data-bs-target="#modalDestroy{{ $driver->id }}">
                                            Elimina
                                        </button>

                                        <div class="modal fade" id="modalDestroy{{ $driver->id }}" tabindex="-1"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content border-0 shadow">
                                                    <div class="modal-header border-0 pb-0">
                                                        <h5 class="modal-title fw-semibold">Elimina pilota</h5>
                                                        <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body text-muted">
                                                        Sei sicuro di voler eliminare <strong
                                                            class="text-dark">{{ $driver->first_name }}
                                                            {{ $driver->last_name }}</strong>?
                                                        Questa azione è irreversibile.
                                                    </div>
                                                    <div class="modal-footer border-0 pt-0">
                                                        <button type="button" class="btn btn-outline-secondary"
                                                            data-bs-dismiss="modal">Annulla</button>
                                                        <form action="{{ route('drivers.destroy', $driver) }}" method="POST">
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