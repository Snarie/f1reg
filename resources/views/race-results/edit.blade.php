@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <form style="margin-left: 2rem" action="{{ route('race-results.update', $raceResult->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="name" style="font-weight:700" class="form-label text-muted lead">User:</label>
                        <select class="form-control border border-2" name="user_id">
                            @foreach ($users as $user)
                                <option {{$raceResult->user_id === $user->id ? 'selected' : null }} value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                        @error('user_id')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="race_id" style="font-weight:700" class="form-label text-muted lead">Race:</label>
                        <select class="form-control border border-2" name="race_id">
                            @foreach ($races as $race)
                                <option {{$raceResult->race_id === $race->id ? 'selected' : null }} value="{{ $race->id }}">{{ $race->name }}</option>
                            @endforeach
                        </select>
                        @error('race_id')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="laptime" style="font-weight:700" class="form-label text-muted lead">Laptime:</label>
                        <input class="form-control border border-2" type="text" value="{{ $raceResult->laptime}}" placeholder="mm:ss:mmm" name="laptime">
                        @error('laptime')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
