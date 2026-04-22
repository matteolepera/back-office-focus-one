@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4 py-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h3 fw-semibold mb-0">Aggiungi una nuova vettura</h1>
                <small class="text-muted">Compila i campi per registrare una nuova vettura</small>
            </div>
            <a href="{{ route('car-specs.show', $carSpec) }}" class="btn btn-dark px-4">Torna indietro</a>
        </div>

        <form action="{{ route('car-specs.update', $carSpec->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row g-4">

                <div class="col-12">
                    <div class="card border rounded-3 shadow-sm">
                        <div class="card-body px-4 py-3">
                            <h5 class="fw-semibold mb-3">Dettagli</h5>
                            <div class="row g-3">

                                <div class="col-md-4">
                                    <label class="form-label text-muted" style="font-size: 13px;">Team <span
                                            class="text-danger">*</span></label>
                                    <select name="team_id" class="form-select" required>
                                        <option value="">-- Seleziona team --</option>
                                        @foreach ($teams as $team)
                                            <option value="{{ $team->id }}" {{ $carSpec->team_id == $team->id ? "selected" : "" }}>{{ $team->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label text-muted" style="font-size: 13px;">Power Unit <span
                                            class="text-danger">*</span></label>
                                    <select name="power_unit_id" class="form-select" required>
                                        <option value="">-- Seleziona power unit --</option>
                                        @foreach ($powerUnits as $powerUnit)
                                            <option value="{{ $powerUnit->id }}" {{ $carSpec->power_unit_id == $powerUnit->id ? "selected" : "" }}>{{ $powerUnit->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label text-muted" style="font-size: 13px;">Stagione <span
                                            class="text-danger">*</span></label>
                                    <input type="number" name="season" class="form-control" value="{{ $carSpec->season }}"
                                        required>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label text-muted" style="font-size: 13px;">Chassis <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="chassis" class="form-control" value="{{ $carSpec->chassis }}"
                                        required>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label text-muted" style="font-size: 13px;">Peso (kg) <span
                                            class="text-danger">*</span></label>
                                    <input type="number" name="weight_kg" class="form-control"
                                        value="{{ $carSpec->weight_kg }}" required>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label text-muted" style="font-size: 13px;">Immagine vettura</label>
                                    <div class="d-flex align-items-center gap-3">
                                        @if ($carSpec->car_image)
                                            <img src="{{ asset('storage/' . $carSpec->car_image) }}"
                                                alt="{{ $carSpec->chassis }}"
                                                class="rounded-circle object-fit-cover flex-shrink-0"
                                                style="width: 48px; height: 48px; object-position: top;">
                                        @endif
                                        <input type="file" name="car_image" class="form-control">
                                        <div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="card border rounded-3 shadow-sm">
                                <div class="card-body px-4 py-3">
                                    <h5 class="fw-semibold mb-3">Sospensioni</h5>
                                    <div class="row g-3">

                                        <div class="col-md-6">
                                            <label class="form-label text-muted" style="font-size: 13px;">Sospensione
                                                anteriore
                                                <span class="text-danger">*</span></label>
                                            <input type="text" name="front_suspension" class="form-control"
                                                value="{{ $carSpec->front_suspension }}" required>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label text-muted" style="font-size: 13px;">Sospensione
                                                posteriore
                                                <span class="text-danger">*</span></label>
                                            <input type="text" name="rear_suspension" class="form-control"
                                                value="{{ $carSpec->rear_suspension }}" required>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="d-flex justify-content-end gap-2 mt-4">
                        <a href="{{ route('car-specs.show', $carSpec) }}" class="btn btn-outline-secondary px-4">Annulla</a>
                        <button type="submit" class="btn btn-dark px-4">Salva vettura</button>
                    </div>

        </form>

    </div>
@endsection