@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4 py-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h3 fw-semibold mb-0">{{ $driver->first_name }} {{ $driver->last_name }}</h1>
                <small class="text-muted fst-italic">"{{ $driver->driver_slogan }}"</small>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('drivers.edit', $driver) }}" class="btn btn-outline-secondary px-4">Modifica</a>
                <button type="button" class="btn btn-outline-danger px-4" data-bs-toggle="modal"
                    data-bs-target="#modalDestroyDriver">Elimina</button>
                <a href="{{ route('drivers.index') }}" class="btn btn-dark px-4">Torna indietro</a>
            </div>
        </div>

        <div class="row g-4">

            <div class="col-md-4">
                <div class="card border rounded-3 shadow-sm h-100">
                    <img src="{{ asset('storage/' . $driver->photo) }}" class="card-img-top object-fit-cover"
                        style="height: 320px; object-position: top;" alt="{{ $driver->first_name }}">
                    <div class="card-body px-4 py-3">
                        <div class="d-flex align-items-center justify-content-between">
                            <span class="text-muted" style="font-size: 13px;">{{ $driver->team->name }}</span>
                            <span class="badge bg-dark rounded-pill fs-6"># {{ $driver->driver_number }}</span>
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
                                <td class="fw-medium">{{ $driver->team->name }}</td>
                            </tr>
                            <tr>
                                <td class="text-muted ps-0">Nazionalità</td>
                                <td class="fw-medium">{{ $driver->nationality }}</td>
                            </tr>
                            <tr>
                                <td class="text-muted ps-0">Data di nascita</td>
                                <td class="fw-medium">{{ \Carbon\Carbon::parse($driver->date_of_birth)->format('d/m/Y') }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-muted ps-0">Stagione</td>
                                <td class="fw-medium">{{ $driver->season }}</td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="card border rounded-3 shadow-sm">
                    <div class="card-body px-4 py-3">
                        <h5 class="fw-semibold mb-3">Statistiche</h5>
                        <div class="row g-3 text-center">
                            <div class="col-3">
                                <div class="border rounded-3 p-3">
                                    <div class="fs-3 fw-semibold">{{ $driver->total_pole_positions }}</div>
                                    <small class="text-muted">Pole</small>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="border rounded-3 p-3">
                                    <div class="fs-3 fw-semibold">{{ $driver->total_wins }}</div>
                                    <small class="text-muted">Vittorie</small>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="border rounded-3 p-3">
                                    <div class="fs-3 fw-semibold">{{ $driver->total_podiums }}</div>
                                    <small class="text-muted">Podi</small>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="border rounded-3 p-3">
                                    <div class="fs-3 fw-semibold">{{ $driver->total_world_championships }}</div>
                                    <small class="text-muted">Titoli</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card border rounded-3 shadow-sm">
                    <div class="card-body px-4 py-3">
                        <h5 class="fw-semibold mb-3">Biografia</h5>
                        <p class="text-muted mb-0" style="line-height: 1.8;">{{ $driver->biography }}</p>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="modal fade" id="modalDestroyDriver" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title fw-semibold">Elimina pilota</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-muted">
                    Sei sicuro di voler eliminare <strong class="text-dark">{{ $driver->first_name }}
                        {{ $driver->last_name }}</strong>?
                    Questa azione è irreversibile.
                </div>
                <div class="modal-footer border-0 pt-0">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Annulla</button>
                    <form action="{{ route('drivers.destroy', $driver) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Conferma eliminazione</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection