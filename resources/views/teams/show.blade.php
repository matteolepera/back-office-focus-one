@extends('layouts.app')

@section('content')

    <h1 class="mb-4">{{ $team->name }}
        <img src="{{ asset("storage/" . $team->logo_image) }}" alt="logo {{ $team->full_name }}">
    </h1>
    <div>
        <a class="btn btn-warning" href={{ route("teams.edit", $team) }}>Modifica team</a>
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDestroyProject">
            Elimina team
        </button>
    </div>

    <div class="mb-5">
        <p><strong>Nome completo:</strong> {{ $team->full_name }}</p>
        <p><strong>Base:</strong> {{ $team->base_city }}</p>
        <p><strong>Team Principal:</strong> {{ $team->team_chief }}</p>
        <p><strong>Technical Chief:</strong> {{ $team->technical_chief }}</p>
        <p><strong>Primo ingresso:</strong> {{ $team->first_team_entry }}</p>
        <p><strong>Pilota di riserva:</strong> {{ $team->reserve_driver }}</p>
        <p><strong>Titoli mondiali:</strong> {{ $team->total_world_championships }}</p>
    </div>

    <hr>

    <h3>Piloti</h3>

    <div class="row mb-5">
        @foreach($team->drivers as $driver)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5>{{ $driver->first_name }} {{ $driver->last_name }}</h5>
                        <p>Numero: {{ $driver->driver_number }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <hr>

    <h3>Car Specs</h3>

    @if($team->carSpecs)
        <div class="card p-3">
            <p><strong>Chassis:</strong> {{ $team->carSpecs->chassis }}</p>
            <p><strong>Peso:</strong> {{ $team->carSpecs->weight_kg }} kg</p>
            <p><strong>Sospensioni:</strong> {{ $team->carSpecs->front_suspension }} / {{ $team->carSpecs->rear_suspension }}
            </p>
        </div>
    @else
        <p>Nessuna auto disponibile</p>
    @endif


    <a class="btn btn-primary" href={{ route("teams.index") }}>Torna indietro</a>

    <!-- Modal -->
    <div class="modal fade" id="modalDestroyProject" tabindex="-1" aria-labelledby="modalDestroyProjectLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalDestroyProjectLabel">Conferma eliminazione team</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Sei sicuro di voler eliminare il team?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                    <form action={{ route("teams.destroy", $team) }} method="POST">
                        @csrf
                        @method("DELETE")
                        <input class="btn btn-danger" type="submit" value="Conferma eliminazione">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection