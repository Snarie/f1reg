@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <h1>Track Records:</h1>

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Mobile</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($profiles as $profile)
                    <tr>
                        <td style="background-color: rgba(255,255,255,0.9)">{{ $profile->firstname }}</td>
                        <td style="background-color: rgba(255,255,255,0.9)">{{ $profile->lastname }}</td>
                        <td style="background-color: rgba(255,255,255,0.9)">{{ $profile->email }}</td>
                        <td style="background-color: rgba(255,255,255,0.9)"><a href="{{route('profiles.show', $profile->id )}} ">Show Profile</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
