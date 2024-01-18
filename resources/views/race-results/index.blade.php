@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <form method="GET" action="{{ route('race-results.index') }}" class="mb-4">
                <div class="row">
                    <div class="col-md-3">
                        <label for="sortBy" class="form-label h4">Sort By:</label>
                        <select name="sortBy" class="form-select">
                            <option {{ (old('sortBy') == 'user_name') ? 'selected' : '' }} value="user_name">User Name</option>
                            <option {{ (old('sortBy') == 'race_name') ? 'selected' : '' }} value="race_name">Race Name</option>
                            <option {{ (old('sortBy') == 'laptime'  ) ? 'selected' : '' }} value="laptime">Lap Time</option>
                        </select>
                        @error('sortBy')
                        {{ $message }}
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="laptimeMin" class="form-label h4">Min Lap Time:</label>
                        <input type="text" name="laptimeMin" class="form-control" value="{{ old('laptimeMin') }}">
                        @error('laptimeMin')
                        {{ $message }}
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="laptimeMax" class="form-label h4">Max Lap Time:</label>
                        <input type="text" name="laptimeMax" class="form-control" value="{{ old('laptimeMax') }}">
                        @error('laptimeMax')
                        {{ $message }}
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary mt-4">Apply Filters</button>
                    </div>
                </div>
            </form>

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>User Name</th>
                        <th>Race Name</th>
                        <th>Lap Time</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($raceResults as $raceResult)
                    <tr>
                        <td style="background-color: rgba(255,255,255,0.9)">{{ $raceResult->user->name }}</td>
                        <td style="background-color: rgba(255,255,255,0.9)">{{ $raceResult->race->name }}</td>
                        <td style="background-color: rgba(255,255,255,0.9)">{{ $raceResult->laptime }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
