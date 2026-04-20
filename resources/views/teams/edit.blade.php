@extends('layouts.app')

@section('content')
    <h1>Modifica il team</h1>
    <form class="p-3" action="{{ route('teams.update', $team) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">

            <div class="col-md-4 mb-3">
                <label class="form-label">Nome</label>
                <input type="text" name="name" class="form-control" value="{{ $team->name }}" required>
            </div>

            <div class="col-md-4 mb-3">
                <label class="form-label">Nome completo</label>
                <input type="text" name="full_name" class="form-control" value="{{ $team->full_name }}" required>
            </div>

            <div class="col-md-4 mb-3">
                <label class="form-label">Logo</label>
                <input type="file" name="logo_image" class="form-control">
                @if ($team->logo_image)
                    <img src="{{ asset("storage/" . $team->logo_image) }}" alt="logo {{ $team->full_name }}">
                @endif
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Base</label>
                <input type="text" name="base_city" class="form-control" value="{{ $team->base_city }}">
            </div>

            <div class="col-md-3 mb-3">
                <label class="form-label">Team Principal</label>
                <input type="text" name="team_chief" class="form-control" value="{{ $team->team_chief }}">
            </div>

            <div class="col-md-3 mb-3">
                <label class="form-label">Technical Chief</label>
                <input type="text" name="technical_chief" class="form-control" value="{{ $team->technical_chief }}">
            </div>

            <div class="col-md-2 mb-3">
                <label class="form-label">Anno primo ingresso</label>
                <input type="number" name="first_team_entry" class="form-control" value="{{ $team->first_team_entry }}">
            </div>

            <div class="col-md-5 mb-3">
                <label class="form-label">Pilota di riserva</label>
                <input type="text" name="reserve_driver" class="form-control" value="{{ $team->reserve_driver }}">
            </div>

            <div class="col-md-5 mb-3">
                <label class="form-label">Titoli mondiali</label>
                <input type="number" name="total_world_championships" class="form-control"
                    value="{{ $team->total_world_championships }}">
            </div>

        </div>

        <button type="submit" class="btn btn-primary">
            Salva Team
        </button>

    </form>

    <div class="text-center mt-4">
        <a class="btn btn-warning col-3 text-center" href={{ route("teams.show", $team) }}> Torna indietro</a>
    </div>

@endsection