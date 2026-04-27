@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4 py-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="form-page-title">Modifica {{ $driver->first_name }} {{ $driver->last_name }}</h1>
                <p class="form-page-sub mb-0">Aggiorna i dati del pilota</p>
            </div>
            <a href="{{ route('drivers.show', $driver) }}" class="btn-action btn-action-view">
                <i class="bi bi-arrow-left"></i> Torna indietro
            </a>
        </div>

        <form action="{{ route('drivers.update', $driver->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row g-4">

                <div class="col-12">
                    <div class="card border rounded-3 shadow-sm">
                        <div class="card-body px-4 py-4">
                            <h5 class="form-card-title">
                                <i class="bi bi-person me-2"></i>Anagrafica
                            </h5>
                            <div class="row g-3">

                                <div class="col-md-4">
                                    <label class="form-label-custom d-block">Nome <span class="text-danger">*</span></label>
                                    <input type="text" name="first_name" class="form-control form-control-custom"
                                        value="{{ $driver->first_name }}" required>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label-custom d-block">Cognome <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="last_name" class="form-control form-control-custom"
                                        value="{{ $driver->last_name }}" required>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label-custom d-block">Foto <span class="text-danger">*</span></label>
                                    <div class="d-flex align-items-center gap-3">
                                        @if ($driver->photo)
                                            <img src="{{ asset('storage/' . $driver->photo) }}" alt="{{ $driver->first_name }}"
                                                class="driver-avatar flex-shrink-0">
                                        @endif
                                        <input type="file" name="photo" class="form-control form-control-custom">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label-custom d-block">Nazionalità <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="nationality" class="form-control form-control-custom"
                                        value="{{ $driver->nationality }}">
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label-custom d-block">Data di nascita <span
                                            class="text-danger">*</span></label>
                                    <input type="date" name="date_of_birth" class="form-control form-control-custom"
                                        value="{{ $driver->date_of_birth }}">
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label-custom d-block">Slogan <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="driver_slogan" class="form-control form-control-custom"
                                        value="{{ $driver->driver_slogan }}">
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label-custom d-block">Biografia <span
                                            class="text-danger">*</span></label>
                                    <textarea name="biography" class="form-control form-control-custom"
                                        rows="4">{{ $driver->biography }}</textarea>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="card border rounded-3 shadow-sm">
                        <div class="card-body px-4 py-4">
                            <h5 class="form-card-title">
                                <i class="bi bi-flag me-2"></i>Dettagli di gara
                            </h5>
                            <div class="row g-3">

                                <div class="col-md-4">
                                    <label class="form-label-custom d-block">Team <span class="text-danger">*</span></label>
                                    <select name="team_id" class="form-select form-control-custom" required>
                                        <option value="">-- Seleziona team --</option>
                                        @foreach ($teams as $team)
                                            <option value="{{ $team->id }}" {{ $driver->team_id == $team->id ? 'selected' : '' }}>
                                                {{ $team->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label-custom d-block">Stagione <span
                                            class="text-danger">*</span></label>
                                    <input type="number" name="season" class="form-control form-control-custom"
                                        value="{{ $driver->season }}" required>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label-custom d-block">Numero di gara <span
                                            class="text-danger">*</span></label>
                                    <input type="number" name="driver_number" class="form-control form-control-custom"
                                        value="{{ $driver->driver_number }}" required>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="card border rounded-3 shadow-sm">
                        <div class="card-body px-4 py-4">
                            <h5 class="form-card-title">
                                <i class="bi bi-bar-chart me-2"></i>Statistiche
                            </h5>
                            <div class="row g-3">

                                <div class="col-md-3">
                                    <label class="form-label-custom d-block">Pole positions</label>
                                    <input type="number" name="total_pole_positions"
                                        class="form-control form-control-custom" value="{{ $driver->total_pole_positions }}"
                                        min="0">
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label-custom d-block">Vittorie</label>
                                    <input type="number" name="total_wins" class="form-control form-control-custom"
                                        value="{{ $driver->total_wins }}" min="0">
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label-custom d-block">Podi</label>
                                    <input type="number" name="total_podiums" class="form-control form-control-custom"
                                        value="{{ $driver->total_podiums }}" min="0">
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label-custom d-block">Titoli mondiali</label>
                                    <input type="number" name="total_world_championships"
                                        class="form-control form-control-custom"
                                        value="{{ $driver->total_world_championships }}" min="0">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="d-flex justify-content-end gap-2 mt-4">
                <a href="{{ route('drivers.show', $driver) }}" class="btn-action btn-action-view">
                    <i class="bi bi-x"></i> Annulla
                </a>
                <button type="submit" class="btn btn-dark px-4 d-flex align-items-center gap-2">
                    <i class="bi bi-check-lg"></i> Salva modifiche
                </button>
            </div>

        </form>

    </div>
@endsection