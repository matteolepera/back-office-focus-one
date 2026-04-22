@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4 py-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h3 fw-semibold mb-0">{{ $powerUnit->name }}</h1>
                <small class="text-muted">{{ $powerUnit->manufacturer }} · {{ $powerUnit->season }}</small>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('power-units.edit', $powerUnit) }}" class="btn btn-outline-secondary px-4">Modifica</a>
                <button type="button" class="btn btn-outline-danger px-4" data-bs-toggle="modal"
                    data-bs-target="#modalDestroyPowerUnit">Elimina</button>
                <a href="{{ route('power-units.index') }}" class="btn btn-dark px-4">Torna indietro</a>
            </div>
        </div>

        <div class="row g-4">

            <div class="col-12">
                <div class="card border rounded-3 shadow-sm">
                    <div class="card-body px-4 py-3">
                        <h5 class="fw-semibold mb-3">Informazioni</h5>
                        <table class="table table-borderless mb-0" style="font-size: 14px;">
                            <tr>
                                <td class="text-muted ps-0" style="width: 20%;">Nome</td>
                                <td class="fw-medium">{{ $powerUnit->name }}</td>
                            </tr>
                            <tr>
                                <td class="text-muted ps-0">Produttore</td>
                                <td class="fw-medium">{{ $powerUnit->manufacturer }}</td>
                            </tr>
                            <tr>
                                <td class="text-muted ps-0">Stagione</td>
                                <td class="fw-medium">{{ $powerUnit->season }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="modal fade" id="modalDestroyPowerUnit" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title fw-semibold">Elimina power unit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-muted">
                    Sei sicuro di voler eliminare <strong class="text-dark">{{ $powerUnit->name }}</strong>?
                    Questa azione è irreversibile.
                </div>
                <div class="modal-footer border-0 pt-0">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Annulla</button>
                    <form action="{{ route('power-units.destroy', $powerUnit) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Conferma eliminazione</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection