@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4 py-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="index-header-title">Piloti</h1>
                <p class="index-header-sub mb-0">
                    {{ $drivers->count() }}
                    {{ $drivers->count() == 1 ? 'pilota registrato' : 'piloti registrati' }}
                </p>
            </div>
            <a href="{{ route('drivers.create') }}" class="btn btn-dark px-4 d-flex align-items-center gap-2">
                <i class="bi bi-plus-lg"></i> Aggiungi pilota
            </a>
        </div>

        <div class="card border rounded-3 shadow-sm">
            <div class="table-responsive">
                <table class="table index-table mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Pilota</th>
                            <th>Team</th>
                            <th>Nazionalità</th>
                            <th>Stagione</th>
                            <th>Vittorie</th>
                            <th>Titoli</th>
                            <th>Azioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($drivers as $driver)
                            <tr>

                                <td><span class="number-badge">{{ $driver->driver_number }}</span></td>

                                <td>
                                    <div class="d-flex align-items-center gap-3">
                                        <img src="{{ asset('storage/' . $driver->photo) }}"
                                            alt="{{ $driver->first_name }} {{ $driver->last_name }}" class="driver-avatar">
                                        <div>
                                            <div class="driver-name">{{ $driver->first_name }} {{ $driver->last_name }}</div>
                                            <div class="driver-dob">
                                                {{ \Carbon\Carbon::parse($driver->date_of_birth)->format('d/m/Y') }}
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td><span class="team-badge">{{ $driver->team->name }}</span></td>

                                <td class="text-muted">{{ $driver->nationality }}</td>

                                <td class="text-muted">{{ $driver->season }}</td>

                                <td>
                                    <span class="d-flex align-items-center gap-1">
                                        <i class="bi bi-flag-fill text-dark" style="font-size: 13px;"></i>
                                        <span class="fw-semibold">{{ $driver->total_wins }}</span>
                                    </span>
                                </td>

                                <td>
                                    <span class="d-flex align-items-center gap-1">
                                        <i class="bi bi-trophy-fill text-dark" style="font-size: 13px;"></i>
                                        <span class="fw-semibold">{{ $driver->total_world_championships }}</span>
                                    </span>
                                </td>

                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('drivers.show', $driver) }}" class="btn-action btn-action-view">
                                            <i class="bi bi-eye"></i> Dettaglio
                                        </a>
                                        <a href="{{ route('drivers.edit', $driver) }}" class="btn-action btn-action-edit">
                                            <i class="bi bi-pencil"></i> Modifica
                                        </a>
                                        <button type="button" class="btn-action btn-action-delete" data-bs-toggle="modal"
                                            data-bs-target="#modalDestroy{{ $driver->id }}">
                                            <i class="bi bi-trash"></i> Elimina
                                        </button>
                                    </div>

                                    <div class="modal fade" id="modalDestroy{{ $driver->id }}" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content border-0 shadow">
                                                <div class="modal-header border-0 pb-0">
                                                    <h5 class="modal-title fw-semibold">Elimina pilota</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body text-muted">
                                                    Sei sicuro di voler eliminare <strong
                                                        class="text-dark">{{ $driver->first_name }}
                                                        {{ $driver->last_name }}</strong>?
                                                    Questa azione è irreversibile.
                                                </div>
                                                <div class="modal-footer border-0 pt-0">
                                                    <button type="button" class="btn btn-outline-secondary"
                                                        data-bs-dismiss="modal">
                                                        <i class="bi bi-x me-1"></i> Annulla
                                                    </button>
                                                    <form action="{{ route('drivers.destroy', $driver) }}" method="POST">
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