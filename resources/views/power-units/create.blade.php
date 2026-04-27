@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4 py-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="form-page-title">Aggiungi una nuova power unit</h1>
                <p class="form-page-sub mb-0">Compila i campi per registrare una nuova power unit</p>
            </div>
            <a href="{{ route('power-units.index') }}" class="btn-action btn-action-view">
                <i class="bi bi-arrow-left"></i> Torna indietro
            </a>
        </div>

        <form action="{{ route('power-units.store') }}" method="POST">
            @csrf

            <div class="row g-4">
                <div class="col-12">
                    <div class="card border rounded-3 shadow-sm">
                        <div class="card-body px-4 py-4">
                            <h5 class="form-card-title">
                                <i class="bi bi-lightning-charge me-2"></i>Dettagli
                            </h5>
                            <div class="row g-3">

                                <div class="col-md-4">
                                    <label class="form-label-custom d-block">Nome <span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control form-control-custom" required>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label-custom d-block">Produttore <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="manufacturer" class="form-control form-control-custom"
                                        required>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label-custom d-block">Stagione <span
                                            class="text-danger">*</span></label>
                                    <input type="number" name="season" class="form-control form-control-custom" required>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end gap-2 mt-4">
                <a href="{{ route('power-units.index') }}" class="btn-action btn-action-view">
                    <i class="bi bi-x"></i> Annulla
                </a>
                <button type="submit" class="btn btn-dark px-4 d-flex align-items-center gap-2">
                    <i class="bi bi-check-lg"></i> Salva power unit
                </button>
            </div>

        </form>

    </div>
@endsection