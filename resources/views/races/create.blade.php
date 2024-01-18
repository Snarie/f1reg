@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <form style="margin-left: 2rem" action="{{ route('races.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="name" style="font-weight:700" class="form-label text-muted lead">Name:</label>
                        <input type="text" class="form-control border border-2" id="name" name="name" value="{{ old('name') }}">
                        @error('name')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="location" style="font-weight:700" class="form-label text-muted lead">Location:</label>
                        <input type="text" class="form-control border border-2" id="location" name="location" value="{{ old('location') }}">
                        @error('location')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="length_circuit" style="font-weight:700" class="form-label text-muted lead">Length of Circuit (in km):</label>
                        <input type="text" class="form-control border border-2" id="length_circuit" name="length_circuit" value="{{ old('length_circuit') }}">
                        @error('length_circuit')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="date" style="font-weight: 700" class="form-label text-muted lead">Date:</label>
                        <input type="date" class="form-control border border-2" id="date" name="date" value="{{ old('date') }}">
                        @error('date')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
