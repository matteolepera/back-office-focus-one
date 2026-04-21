@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4 py-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h3 fw-semibold mb-0">Modifica {{ $driver->first_name }} {{ $driver->last_name }}</h1>
                <small class="text-muted">Aggiorna i dati del pilota</small>
            </div>
            <a href="{{ route('drivers.show', $driver) }}" class="btn btn-dark px-4">Torna indietro</a>
        </div>

        <form action="{{ route('drivers.update', $driver->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row g-4">

                <div class="col-12">
                    <div class="card border rounded-3 shadow-sm">
                        <div class="card-body px-4 py-3">
                            <h5 class="fw-semibold mb-3">Anagrafica</h5>
                            <div class="row g-3">

                                <div class="col-md-4">
                                    <label class="form-label text-muted" style="font-size: 13px;">Nome <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="first_name" class="form-control"
                                        value="{{ $driver->first_name }}" required>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label text-muted" style="font-size: 13px;">Cognome <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="last_name" class="form-control"
                                        value="{{ $driver->last_name }}" required>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label text-muted" style="font-size: 13px;">Foto</label>
                                    <div class="d-flex align-items-center gap-3">
                                        @if ($driver->photo)
                                            <img src="{{ asset('storage/' . $driver->photo) }}" alt="{{ $driver->first_name }}"
                                                class="rounded-circle object-fit-cover flex-shrink-0"
                                                style="width: 48px; height: 48px; object-position: top;">
                                        @endif
                                        <input type="file" name="photo" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label text-muted" style="font-size: 13px;">Nazionalità</label>
                                    <input type="text" name="nationality" class="form-control"
                                        value="{{ $driver->nationality }}">
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label text-muted" style="font-size: 13px;">Data di nascita</label>
                                    <input type="date" name="date_of_birth" class="form-control"
                                        value="{{ $driver->date_of_birth }}">
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label text-muted" style="font-size: 13px;">Slogan</label>
                                    <input type="text" name="driver_slogan" class="form-control"
                                        value="{{ $driver->driver_slogan }}">
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label text-muted" style="font-size: 13px;">Biografia</label>
                                    <textarea name="biography" class="form-control"
                                        rows="4">{{ $driver->biography }}</textarea>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="card border rounded-3 shadow-sm">
                        <div class="card-body px-4 py-3">
                            <h5 class="fw-semibold mb-3">Dettagli di gara</h5>
                            <div class="row g-3">

                                <div class="col-md-4">
                                    <label class="form-label text-muted" style="font-size: 13px;">Team <span
                                            class="text-danger">*</span></label>
                                    <select name="team_id" class="form-select" required>
                                        <option value="">-- Seleziona team --</option>
                                        @foreach ($teams as $team)
                                            <option value="{{ $team->id }}" {{ $driver->team_id == $team->id ? 'selected' : '' }}>
                                                {{ $team->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label text-muted" style="font-size: 13px;">Stagione <span
                                            class="text-danger">*</span></label>
                                    <input type="number" name="season" class="form-control" value="{{ $driver->season }}"
                                        required>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label text-muted" style="font-size: 13px;">Numero di gara <span
                                            class="text-danger">*</span></label>
                                    <input type="number" name="driver_number" class="form-control"
                                        value="{{ $driver->driver_number }}" required>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="card border rounded-3 shadow-sm">
                        <div class="card-body px-4 py-3">
                            <h5 class="fw-semibold mb-3">Statistiche</h5>
                            <div class="row g-3">

                                <div class="col-md-3">
                                    <label class="form-label text-muted" style="font-size: 13px;">Pole positions</label>
                                    <input type="number" name="total_pole_positions" class="form-control"
                                        value="{{ $driver->total_pole_positions }}" min="0">
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label text-muted" style="font-size: 13px;">Vittorie</label>
                                    <input type="number" name="total_wins" class="form-control"
                                        value="{{ $driver->total_wins }}" min="0">
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label text-muted" style="font-size: 13px;">Podi</label>
                                    <input type="number" name="total_podiums" class="form-control"
                                        value="{{ $driver->total_podiums }}" min="0">
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label text-muted" style="font-size: 13px;">Titoli mondiali</label>
                                    <input type="number" name="total_world_championships" class="form-control"
                                        value="{{ $driver->total_world_championships }}" min="0">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="d-flex justify-content-end gap-2 mt-4">
                <a href="{{ route('drivers.show', $driver) }}" class="btn btn-outline-secondary px-4">Annulla</a>
                <button type="submit" class="btn btn-dark px-4">Salva modifiche</button>
            </div>

        </form>

    </div>
@endsection