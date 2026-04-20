@extends("layouts.app")
@section("content")
    <h1>Team Index</h1>
    <a class="btn btn-primary" href={{ route("teams.create") }}>Aggiungi un team</a>

    <div>
        @foreach ($teams as $team)
            <img src="{{ asset("storage/" . $team->logo_image) }}" alt="logo {{ $team->full_name }}">
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
    </div>
@endsection