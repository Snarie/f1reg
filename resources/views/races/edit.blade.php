@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <form style="margin-left: 2rem; margin-bottom: 1rem" action="{{ route('races.update', $race->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="name" style="font-weight:700" class="form-label text-muted lead">Name:</label>
                        <input type="text" class="form-control border border-2" id="name" name="name" value="{{ $race->name }}">
                        @error('name')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="location" style="font-weight:700" class="form-label text-muted lead">Location:</label>
                        <input type="text" class="form-control border border-2" id="location" name="location" value="{{ $race->location }}">
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
                        <input type="text" class="form-control border border-2" id="length_circuit" name="length_circuit" value="{{ $race->length_circuit }}">
                        @error('length_circuit')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="date" style="font-weight: 700" class="form-label text-muted lead">Date:</label>
                        <input type="date" class="form-control border border-2" id="date" name="date" value="{{ $race->date }}">
                        @error('date')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <form style="margin-left: 2rem" action="{{ route('races.destroy', $race->id) }}" method="POST">
            @csrf
            <input type="hidden" value="{{ $race->id }}" name="id">
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
@endsection
