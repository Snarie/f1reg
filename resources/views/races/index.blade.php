@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        @foreach ($races->sortByDesc('date') as $race)
            <div class="card mb-4">
                <div class="card-body">
                    <h4 class="card-title">{{ $race->name }}</h4>
                    <p class="card-subtitle text-muted">{{ $race->location }} - {{ $race->length_circuit }} km</p>
                    <p class="card-text">{{ $race->date }} <a href="{{ route('races.show', $race->id) }}">See all results</a></p>
                    <ul class="list-group">
                        @foreach($race->raceResults->sortBy('laptime')->take(3) as $raceResult)
                            <li class="list-group-item">
                                <span class="fw-bold">{{ $raceResult->user->name }}</span> - {{ $raceResult->laptime }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endforeach
    </div>
@endsection
