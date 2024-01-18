@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">User Name</h5>
                        <p class="card-text">{{ $raceResult->user->name }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Race Name</h5>
                        <p class="card-text">{{ $raceResult->race->name }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Lap Time</h5>
                        <p class="card-text">{{ $raceResult->laptime }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
