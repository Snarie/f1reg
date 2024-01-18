@extends('layouts.app')

@section('content')

    <h1>Leaderboard voor {{ $race->name }}</h1>
    <table>
        <thead>
        <tr>
            <th>Positie</th>
            <th>Gebruiker</th>
            <th>Ronde Tijd</th>
        </tr>
        </thead>
        <tbody>
        @foreach($leaderboard as $index => $result)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $result->user->name }}</td>
                <td>{{ $result->laptime }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
