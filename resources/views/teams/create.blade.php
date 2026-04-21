@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4 py-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h3 fw-semibold mb-0">Aggiungi un nuovo team</h1>
                <small class="text-muted">Compila i campi per registrare un nuovo team</small>
            </div>
            <a href="{{ route('teams.index') }}" class="btn btn-dark px-4">Torna indietro</a>
        </div>

        <form action="{{ route('teams.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row g-4">

                <div class="col-12">
                    <div class="card border rounded-3 shadow-sm">
                        <div class="card-body px-4 py-3">
                            <h5 class="fw-semibold mb-3">Identità</h5>
                            <div class="row g-3">

                                <div class="col-md-4">
                                    <label class="form-label text-muted" style="font-size: 13px;">Nome breve <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control" required>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label text-muted" style="font-size: 13px;">Nome completo <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="full_name" class="form-control" required>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label text-muted" style="font-size: 13px;">Logo</label>
                                    <input type="file" name="logo_image" class="form-control">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="card border rounded-3 shadow-sm">
                        <div class="card-body px-4 py-3">
                            <h5 class="fw-semibold mb-3">Struttura</h5>
                            <div class="row g-3">

                                <div class="col-md-4">
                                    <label class="form-label text-muted" style="font-size: 13px;">Base</label>
                                    <input type="text" name="base_city" class="form-control">
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label text-muted" style="font-size: 13px;">Team Principal</label>
                                    <input type="text" name="team_chief" class="form-control">
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label text-muted" style="font-size: 13px;">Technical Chief</label>
                                    <input type="text" name="technical_chief" class="form-control">
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label text-muted" style="font-size: 13px;">Pilota di riserva</label>
                                    <input type="text" name="reserve_driver" class="form-control">
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label text-muted" style="font-size: 13px;">Anno primo
                                        ingresso</label>
                                    <input type="number" name="first_team_entry" class="form-control">
                                </div>

                                <div class="col-md-4">
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
                <a href="{{ route('teams.index') }}" class="btn btn-outline-secondary px-4">Annulla</a>
                <button type="submit" class="btn btn-dark px-4">Salva team</button>
            </div>

        </form>

    </div>
@endsection