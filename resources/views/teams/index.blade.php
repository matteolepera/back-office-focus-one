@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4 py-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h3 fw-semibold mb-0">Team</h1>
                <p class="text-muted mb-0 mt-1">
                    <small>
                        {{ $teams->count() }}
                        {{ $teams->count() == 1 ? 'team registrato' : 'team registrati' }}
                    </small>
                </p>
            </div>
            <a href="{{ route('dashboard') }}" class="btn btn-outline-dark px-4">Dashboard</a>
            <a href="{{ route('teams.create') }}" class="btn btn-dark px-4">+ Aggiungi team</a>
        </div>

        <div class="card border rounded-3 shadow-sm">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead>
                        <tr class="border-bottom">
                            <th class="px-4 py-3 text-uppercase text-muted fw-semibold"
                                style="font-size: 11px; letter-spacing: .06em;">Team</th>
                            <th class="px-4 py-3 text-uppercase text-muted fw-semibold"
                                style="font-size: 11px; letter-spacing: .06em;">Nome completo</th>
                            <th class="px-4 py-3 text-uppercase text-muted fw-semibold"
                                style="font-size: 11px; letter-spacing: .06em;">Base</th>
                            <th class="px-4 py-3 text-uppercase text-muted fw-semibold"
                                style="font-size: 11px; letter-spacing: .06em;">Team Principal</th>
                            <th class="px-4 py-3 text-uppercase text-muted fw-semibold"
                                style="font-size: 11px; letter-spacing: .06em;">Titoli</th>
                            <th class="px-4 py-3 text-uppercase text-muted fw-semibold"
                                style="font-size: 11px; letter-spacing: .06em;">Azioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($teams as $team)
                            <tr class="border-bottom">

                                <td class="px-4 py-3">
                                    <div class="rounded-circle bg-dark d-flex align-items-center justify-content-center flex-shrink-0"
                                        style="width: 40px; height: 40px;">
                                        <img src="{{ asset('storage/' . $team->logo_image) }}" alt="{{ $team->name }}"
                                            class="object-fit-contain" style="width: 26px; height: 26px;">
                                    </div>
                                </td>

                                <td class="px-4 text-muted">{{ $team->full_name }}</td>

                                <td class="px-4 text-muted">{{ $team->base_city }}</td>

                                <td class="px-4 text-muted">{{ $team->team_chief }}</td>

                                <td class="px-4 fw-semibold">{{ $team->total_world_championships }}</td>

                                <td class="px-4">
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('teams.show', $team) }}"
                                            class="btn btn-sm btn-outline-dark px-3">Dettaglio</a>
                                        <a href="{{ route('teams.edit', $team) }}"
                                            class="btn btn-sm btn-outline-secondary px-3">Modifica</a>
                                        <form action="{{ route('teams.destroy', $team) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger px-3"
                                                onclick="return confirm('Eliminare questo team?')">Elimina</button>
                                        </form>
                                    </div>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection