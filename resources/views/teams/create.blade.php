@extends('layouts.app')

@section('content')
    <h1>Aggiungi un nuovo team</h1>
    <form class="p-3" action="{{ route('teams.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">

            <div class="col-md-4 mb-3">
                <label class="form-label">Nome</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="col-md-4 mb-3">
                <label class="form-label">Nome completo</label>
                <input type="text" name="full_name" class="form-control" required>
            </div>

            <div class="col-md-4 mb-3">
                <label class="form-label">Logo</label>
                <input type="file" name="logo_image" class="form-control">
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Base</label>
                <input type="text" name="base_city" class="form-control">
            </div>

            <div class="col-md-3 mb-3">
                <label class="form-label">Team Principal</label>
                <input type="text" name="team_chief" class="form-control">
            </div>

            <div class="col-md-3 mb-3">
                <label class="form-label">Technical Chief</label>
                <input type="text" name="technical_chief" class="form-control">
            </div>

            <div class="col-md-2 mb-3">
                <label class="form-label">Anno primo ingresso</label>
                <input type="number" name="first_team_entry" class="form-control">
            </div>

            <div class="col-md-5 mb-3">
                <label class="form-label">Pilota di riserva</label>
                <input type="text" name="reserve_driver" class="form-control">
            </div>

            <div class="col-md-5 mb-3">
                <label class="form-label">Titoli mondiali</label>
                <input type="number" name="total_world_championships" class="form-control">
            </div>

        </div>

        <button type="submit" class="btn btn-primary">
            Salva Team
        </button>

    </form>

    <div class="text-center mt-4">
        <a class="btn btn-warning col-3 text-center" href={{ route("teams.index") }}> Torna indietro</a>
    </div>

@endsection