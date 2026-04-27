@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4 py-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h3 fw-semibold mb-0">Aggiungi un nuovo pilota</h1>
                <small class="text-muted">Compila i campi per registrare un nuovo pilota</small>
            </div>
            <a href="{{ route('drivers.index') }}" class="btn btn-dark px-4">Torna indietro</a>
        </div>

        <form action="{{ route('drivers.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row g-4">

                <div class="col-12">
                    <div class="card border rounded-3 shadow-sm">
                        <div class="card-body px-4 py-3">
                            <h5 class="fw-semibold mb-3">Anagrafica</h5>
                            <div class="row g-3">

                                <div class="col-md-4">
                                    <label class="form-label text-muted" style="font-size: 13px;">Nome <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="first_name" class="form-control" required>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label text-muted" style="font-size: 13px;">Cognome <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="last_name" class="form-control" required>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label text-muted" style="font-size: 13px;">Foto <span
                                            class="text-danger">*</span></label>
                                    <input type="file" name="photo" class="form-control">
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label text-muted" style="font-size: 13px;">Nazionalità <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="nationality" class="form-control">
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label text-muted" style="font-size: 13px;">Data di nascita <span
                                            class="text-danger">*</span></label>
                                    <input type="date" name="date_of_birth" class="form-control">
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label text-muted" style="font-size: 13px;">Slogan <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="driver_slogan" class="form-control">
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label text-muted" style="font-size: 13px;">Biografia <span
                                            class="text-danger">*</span></label>
                                    <textarea name="biography" class="form-control" rows="4"></textarea>
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
                                            <option value="{{ $team->id }}">{{ $team->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label text-muted" style="font-size: 13px;">Stagione <span
                                            class="text-danger">*</span></label>
                                    <input type="number" name="season" class="form-control" required>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label text-muted" style="font-size: 13px;">Numero di gara <span
                                            class="text-danger">*</span></label>
                                    <input type="number" name="driver_number" class="form-control" required>
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
                                    <input type="number" name="total_pole_positions" class="form-control" value="0" min="0">
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label text-muted" style="font-size: 13px;">Vittorie</label>
                                    <input type="number" name="total_wins" class="form-control" value="0" min="0">
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label text-muted" style="font-size: 13px;">Podi</label>
                                    <input type="number" name="total_podiums" class="form-control" value="0" min="0">
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label text-muted" style="font-size: 13px;">Titoli mondiali</label>
                                    <input type="number" name="total_world_championships" class="form-control" value="0"
                                        min="0">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="d-flex justify-content-end gap-2 mt-4">
                <a href="{{ route('drivers.index') }}" class="btn btn-outline-secondary px-4">Annulla</a>
                <button type="submit" class="btn btn-dark px-4">Salva pilota</button>
            </div>

        </form>

    </div>
@endsection