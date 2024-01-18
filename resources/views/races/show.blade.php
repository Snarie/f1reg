@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <h1>{{ $race->name }} {{ $race->location }} - {{$race->length_circuit}} km</h1>
            <p>Average: {{ $avgLaptime }}</p>

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Lap Time</th>
                        <th>Km/h</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($race->raceResults->sortBy('laptime') as $result)
                    <tr>
                        <td style="background-color: rgba(255,255,255,0.9)">{{$result->user->name}}</td>
                        <td style="background-color: rgba(255,255,255,0.9)">{{$result->laptime}}</td>
                        <td style="background-color: rgba(255,255,255,0.9)">{{$result->calculateKMPH()}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
