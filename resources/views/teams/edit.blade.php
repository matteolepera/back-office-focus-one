@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4 py-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="form-page-title">Modifica {{ $team->name }}</h1>
                <p class="form-page-sub mb-0">Aggiorna i dati del team</p>
            </div>
            <a href="{{ route('teams.show', $team) }}" class="btn-action btn-action-view">
                <i class="bi bi-arrow-left"></i> Torna indietro
            </a>
        </div>

        <form action="{{ route('teams.update', $team) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row g-4">

                <div class="col-12">
                    <div class="card border rounded-3 shadow-sm">
                        <div class="card-body px-4 py-4">
                            <h5 class="form-card-title">
                                <i class="bi bi-shield me-2"></i>Identità
                            </h5>
                            <div class="row g-3">

                                <div class="col-md-4">
                                    <label class="form-label-custom d-block">Nome breve <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control form-control-custom"
                                        value="{{ $team->name }}" required>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label-custom d-block">Nome completo <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="full_name" class="form-control form-control-custom"
                                        value="{{ $team->full_name }}" required>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label-custom d-block">Logo</label>
                                    <div class="d-flex align-items-center gap-3">
                                        @if ($team->logo_image)
                                            <div class="rounded-circle bg-dark d-flex align-items-center justify-content-center flex-shrink-0"
                                                style="width: 48px; height: 48px;">
                                                <img src="{{ asset('storage/' . $team->logo_image) }}" alt="{{ $team->name }}"
                                                    class="object-fit-contain" style="width: 30px; height: 30px;">
                                            </div>
                                        @endif
                                        <input type="file" name="logo_image" class="form-control form-control-custom">
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
                                <i class="bi bi-building me-2"></i>Struttura
                            </h5>
                            <div class="row g-3">

                                <div class="col-md-4">
                                    <label class="form-label-custom d-block">Base <span class="text-danger">*</span></label>
                                    <input type="text" name="base_city" class="form-control form-control-custom"
                                        value="{{ $team->base_city }}">
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label-custom d-block">Team Principal <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="team_chief" class="form-control form-control-custom"
                                        value="{{ $team->team_chief }}">
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label-custom d-block">Technical Chief <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="technical_chief" class="form-control form-control-custom"
                                        value="{{ $team->technical_chief }}">
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label-custom d-block">Pilota di riserva</label>
                                    <input type="text" name="reserve_driver" class="form-control form-control-custom"
                                        value="{{ $team->reserve_driver }}">
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label-custom d-block">Anno primo ingresso <span
                                            class="text-danger">*</span></label>
                                    <input type="number" name="first_team_entry" class="form-control form-control-custom"
                                        value="{{ $team->first_team_entry }}">
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label-custom d-block">Titoli mondiali</label>
                                    <input type="number" name="total_world_championships"
                                        class="form-control form-control-custom"
                                        value="{{ $team->total_world_championships }}" min="0">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="d-flex justify-content-end gap-2 mt-4">
                <a href="{{ route('teams.show', $team) }}" class="btn-action btn-action-view">
                    <i class="bi bi-x"></i> Annulla
                </a>
                <button type="submit" class="btn btn-dark px-4 d-flex align-items-center gap-2">
                    <i class="bi bi-check-lg"></i> Salva modifiche
                </button>
            </div>

        </form>

    </div>
@endsection