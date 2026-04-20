@extends("layouts.app")
@section("content")
    <h1>Team Index</h1>

    @foreach ($teams as $team)
        <img src="{{ $team->logo_image }}" class="card-img-top" alt="{{ $team->name }}">

        <div class="card-body">
            <h5 class="card-title">{{ $team->name }}</h5>
            <p class="card-text">
                Base: {{ $team->base_city }}
            </p>
        </div>

        <div class="card-footer bg-white border-0">
            <a href="{{ route("teams.show", $team->id)}}" class="btn btn-primary w-50">
                Dettagli
            </a>
        </div>
    @endforeach
@endsection