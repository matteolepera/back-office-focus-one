@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4 py-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h3 fw-semibold mb-0">Aggiungi una nuova power unit</h1>
                <small class="text-muted">Compila i campi per registrare una nuova power unit</small>
            </div>
            <a href="{{ route('power-units.show', $powerUnit) }}" class="btn btn-dark px-4">Torna indietro</a>
        </div>

        <form action="{{ route('power-units.update', $powerUnit->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row g-4">

                <div class="col-12">
                    <div class="card border rounded-3 shadow-sm">
                        <div class="card-body px-4 py-3">
                            <h5 class="fw-semibold mb-3">Dettagli</h5>
                            <div class="row g-3">

                                <div class="col-md-4">
                                    <label class="form-label text-muted" style="font-size: 13px;">Nome <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control" value="{{ $powerUnit->name }}"
                                        required>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label text-muted" style="font-size: 13px;">Produttore <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="manufacturer" class="form-control"
                                        value="{{ $powerUnit->manufacturer }}" required>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label text-muted" style="font-size: 13px;">Stagione <span
                                            class="text-danger">*</span></label>
                                    <input type="number" name="season" class="form-control" value="{{ $powerUnit->season }}"
                                        required>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="d-flex justify-content-end gap-2 mt-4">
                <a href="{{ route('power-units.show', $powerUnit) }}" class="btn btn-outline-secondary px-4">Annulla</a>
                <button type="submit" class="btn btn-dark px-4">Salva modifiche</button>
            </div>

        </form>

    </div>
@endsection