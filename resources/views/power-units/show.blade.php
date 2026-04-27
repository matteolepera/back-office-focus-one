@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4 py-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="form-page-title mb-0">{{ $powerUnit->name }}</h1>
                <p class="form-page-sub mb-0">{{ $powerUnit->manufacturer }} · {{ $powerUnit->season }}</p>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('power-units.edit', $powerUnit) }}" class="btn-action btn-action-edit">
                    <i class="bi bi-pencil"></i> Modifica
                </a>
                <button type="button" class="btn-action btn-action-delete" data-bs-toggle="modal"
                    data-bs-target="#modalDestroyPowerUnit">
                    <i class="bi bi-trash"></i> Elimina
                </button>
                <a href="{{ route('power-units.index') }}" class="btn-action btn-action-view">
                    <i class="bi bi-arrow-left"></i> Torna indietro
                </a>
            </div>
        </div>

        <div class="row g-4">

            <div class="col-md-4">
                <div class="card border rounded-3 shadow-sm h-100">
                    <div
                        class="card-body px-4 py-4 d-flex flex-column align-items-center justify-content-center text-center gap-3">
                        <div class="rounded-circle bg-dark d-flex align-items-center justify-content-center"
                            style="width: 80px; height: 80px;">
                            <i class="bi bi-lightning-charge text-white" style="font-size: 32px;"></i>
                        </div>
                        <div>
                            <h4 class="fw-semibold mb-1">{{ $powerUnit->name }}</h4>
                            <span class="team-badge">{{ $powerUnit->manufacturer }}</span>
                        </div>
                        <div class="border rounded-3 px-4 py-2 w-100 text-center">
                            <small class="form-page-sub d-block">Stagione</small>
                            <span class="fw-semibold" style="font-size: 22px;">{{ $powerUnit->season }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card border rounded-3 shadow-sm h-100">
                    <div class="card-body px-4 py-4">
                        <h5 class="form-card-title">
                            <i class="bi bi-info-circle me-2"></i>Informazioni
                        </h5>
                        <div class="row g-3 mt-1">

                            <div class="col-6">
                                <div class="border rounded-3 px-4 py-3">
                                    <small class="form-page-sub d-block mb-1">Nome</small>
                                    <span class="fw-semibold">{{ $powerUnit->name }}</span>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="border rounded-3 px-4 py-3">
                                    <small class="form-page-sub d-block mb-1">Produttore</small>
                                    <span class="fw-semibold">{{ $powerUnit->manufacturer }}</span>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="border rounded-3 px-4 py-3">
                                    <small class="form-page-sub d-block mb-1">Stagione</small>
                                    <span class="fw-semibold">{{ $powerUnit->season }}</span>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="border rounded-3 px-4 py-3">
                                    <small class="form-page-sub d-block mb-1">Aggiornato il</small>
                                    <span class="fw-semibold">{{ $powerUnit->updated_at->format('d/m/Y') }}</span>
                                </div>
                            </div>

                        </div>
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
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        <i class="bi bi-x me-1"></i> Annulla
                    </button>
                    <form action="{{ route('power-units.destroy', $powerUnit) }}" method="POST">
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

@endsection