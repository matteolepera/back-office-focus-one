@extends('layouts.app')

@section('content')
<div class="container-fluid px-4 py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="form-page-title">Modifica {{ $carSpec->chassis }}</h1>
            <p class="form-page-sub mb-0">Aggiorna i dati della vettura</p>
        </div>
        <a href="{{ route('car-specs.show', $carSpec) }}" class="btn-action btn-action-view">
            <i class="bi bi-arrow-left"></i> Torna indietro
        </a>
    </div>

    <form action="{{ route('car-specs.update', $carSpec->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row g-4">

            <div class="col-12">
                <div class="card border rounded-3 shadow-sm">
                    <div class="card-body px-4 py-4">
                        <h5 class="form-card-title">
                            <i class="bi bi-car-front me-2"></i>Dettagli
                        </h5>
                        <div class="row g-3">

                            <div class="col-md-4">
                                <label class="form-label-custom d-block">Team <span class="text-danger">*</span></label>
                                <select name="team_id" class="form-select form-control-custom" required>
                                    <option value="">-- Seleziona team --</option>
                                    @foreach ($teams as $team)
                                        <option value="{{ $team->id }}" {{ $carSpec->team_id == $team->id ? 'selected' : '' }}>
                                            {{ $team->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label-custom d-block">Power Unit <span class="text-danger">*</span></label>
                                <select name="power_unit_id" class="form-select form-control-custom" required>
                                    <option value="">-- Seleziona power unit --</option>
                                    @foreach ($powerUnits as $powerUnit)
                                        <option value="{{ $powerUnit->id }}" {{ $carSpec->power_unit_id == $powerUnit->id ? 'selected' : '' }}>
                                            {{ $powerUnit->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label-custom d-block">Stagione <span class="text-danger">*</span></label>
                                <input type="number" name="season" class="form-control form-control-custom" value="{{ $carSpec->season }}" required>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label-custom d-block">Chassis <span class="text-danger">*</span></label>
                                <input type="text" name="chassis" class="form-control form-control-custom" value="{{ $carSpec->chassis }}" required>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label-custom d-block">Peso (kg) <span class="text-danger">*</span></label>
                                <input type="number" name="weight_kg" class="form-control form-control-custom" value="{{ $carSpec->weight_kg }}" required>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label-custom d-block">Immagine vettura</label>
                                <div class="d-flex align-items-center gap-3">
                                    @if ($carSpec->car_image)
                                        <img src="{{ asset('storage/' . $carSpec->car_image) }}"
                                             alt="{{ $carSpec->chassis }}"
                                             class="object-fit-contain flex-shrink-0"
                                             style="width: 48px; height: 48px;">
                                    @endif
                                    <input type="file" name="car_image" class="form-control form-control-custom">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card border rounded-3 shadow-sm">
                    <div class="card-body px-4 py-4">
                        <h5 class="form-card-title">
                            <i class="bi bi-tools me-2"></i>Sospensioni
                        </h5>
                        <div class="row g-3">

                            <div class="col-md-6">
                                <label class="form-label-custom d-block">Sospensione anteriore <span class="text-danger">*</span></label>
                                <input type="text" name="front_suspension" class="form-control form-control-custom" value="{{ $carSpec->front_suspension }}" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label-custom d-block">Sospensione posteriore <span class="text-danger">*</span></label>
                                <input type="text" name="rear_suspension" class="form-control form-control-custom" value="{{ $carSpec->rear_suspension }}" required>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="d-flex justify-content-end gap-2 mt-4">
            <a href="{{ route('car-specs.show', $carSpec) }}" class="btn-action btn-action-view">
                <i class="bi bi-x"></i> Annulla
            </a>
            <button type="submit" class="btn btn-dark px-4 d-flex align-items-center gap-2">
                <i class="bi bi-check-lg"></i> Salva modifiche
            </button>
        </div>

    </form>

</div>
@endsection